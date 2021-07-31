<?php

namespace App\Http\Controllers\v1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\TagCollection;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tag=Tag::all();
        return response()->json([
            'status'=>'ok',
            'data'=>TagCollection::collection($tag)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=[
            'user_id'=>auth()->user()->id,
            'product_id'=>$request->product_id,
            'attributes'=>$request->attributes,
            'size'=>$request->size
        ];
        $tag=Tag::create($data);
        return response()->json([
            'status'=>'ok',
            'data'=>new TagCollection([
                'status'=>'ok',
                'data'=>new TagCollection($tag)
            ])
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        return response()->json([
            'status'=>'ok',
            'data'=>new TagCollection($tag),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        auth()->loginUsingId(1);
        if (auth()->user()->type === 'admin'){
            return response()->json([
                'status'=>'ok',
                'data'=>new TagCollection($tag)
            ]);
        }
        elseif ($tag->user_id === auth()->user()->id) {
            return response()->json([
                'status'=>'ok',
                'data'=>new TagCollection($tag)
            ]);
        }
        else{
            return response()->json([
               'status'=>'Error',
               'massage'=>'شما دسترسی ندارید'
            ]);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        if ($tag->user_id === auth()->user()->id) {
            $data = [
                'user_id' => auth()->user()->id,
                'product_id' => $request->product_id,
                'attributes' => $request->attributes,
                'size' => $request->size
            ];
            $tag->create($data);
        }
        else{
            return response()->json([
               'status'=>'Error',
               'massage'=>'شما دسترسی ندارید'
            ],403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
    }
}
