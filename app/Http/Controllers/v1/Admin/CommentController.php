<?php

namespace App\Http\Controllers\v1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\CommentCollection;
use App\Models\Comment;
use App\Models\Manager;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comment=Comment::all();
        $count=count($comment);
        return response()->json([
            'status'=>'ok',
            'data'=>[
                'comment'=>CommentCollection::collection($comment),
                'count'=>$count
            ],
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
            'description'=>$request->description,
        ];
        return response()->json([
            'status'=>'ok',
            'data'=>new CommentCollection($data)
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
            return response()->json([
                'status'=>'data',
                'data'=>new CommentCollection($comment),
            ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        return response()->json([
            'status'=>'data',
            'data'=>new CommentCollection($comment),
        ]);    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
            $data = [
                'user_id' => auth()->user()->id,
                'product_id' => $request->product_id,
                'description' => $request->description,
            ];
            $comment->update($data);
            return response()->json($comment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
            $comment->delete();

    }
    public function status($id)
    {
        if (auth()->user()->type === 'manager') {
            $user=auth()->user();
            $manger=Manager::query()->whereIn('user_id',$user)->pluck('id')->first();
            $status=Comment::query()->where('id',$id)->first();
            $data=[
                'status'=>!$status->status,
                'manager_id'=>$manger
            ];
            $status->update($data);
        }
        elseif (auth()->user()->type === 'admin'){
            $status=Comment::query()->where('id',$id)->first();
            $status->update([
                    'status' => !$status->status,
                ]
            );
        }
        else{
            return response()->json([
                'status'=>'Error',
                'massage'=>'شما دست رسی ندارید'
            ],403);
        }
    }
}
