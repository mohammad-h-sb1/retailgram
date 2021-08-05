<?php

namespace App\Http\Controllers\v1\Front;

use App\Http\Controllers\Controller;
use App\Http\Resources\Front\LikeCollection;
use App\Models\Like;
use App\Models\Product;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        ];
        $like=Like::create($data);
        return response()->json([
            'status'=>'ok',
            'data'=>new LikeCollection($like)
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function show(Like $like)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function edit(Like $like)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Like $like)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function destroy(Like $like)
    {

        if (auth()->user()->id === $like->id) {
            $like->delete();
        }
        else
        {
            return response()->json([
                'status'=>'Error',
                'massage'=>'شما دسترسی ندرید'
            ],403);
        }
    }

    public function product()
    {
        $like=Like::query()->where('user_id',auth()->user()->id)->pluck('product_id');
        $countLike=count($like);
        $product=Product::query()->whereIn('id',$like)->get();

        return response()->json([
            'status'=>'ok',
            'data'=>[
                'product'=>$product,
                'countLike'=>$countLike
            ]
        ]);
    }
}
