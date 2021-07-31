<?php

namespace App\Http\Controllers\v1\Front;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\CommentLike;
use App\Models\Product;
use Illuminate\Http\Request;

class CommentLikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comment=CommentLike::all();
        $commentLike=CommentLike::query()->where('comment_like','comment_like')->get();
        $countLike=count($commentLike);
        $commentDisLike=CommentLike::query()->where('comment_like','comment_dislike')->get();
        $countDisLike=count($commentDisLike);
        return response()->json([
            'status'=>'ok',
            'data'=>$comment,
            'countLike'=>$countLike,
            'countDisLike'=>$countDisLike
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
        if ($request->comment_like == 'like'){
            $data=[
              'user_id'=>auth()->user()->id,
              'comment_id'=>$request->comment_id,
              'comment_like'=>'comment_like'
            ];
            $commentLike=CommentLike::create($data);
            return response()->json([
               'status'=>'ok',
               'data'=>$commentLike
            ]);
        }
        elseif ($request->comment_like == 'dislike'){
            $data=[
                'user_id'=>auth()->user()->id,
                'comment_id'=>$request->comment_id,
                'comment_like'=>'comment_dislike'
            ];
            $commentLike=CommentLike::create($data);
            return response()->json([
                'status'=>'ok',
                'data'=>$commentLike
            ]);
        }
        else{
            return response()->json([
                'status'=>'Error',
                'data'=>'شما دسترسی ندارید'
            ],403);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CommentLike  $commentLike
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product=Product::query()->findOrFail($id);
        $comment=$product->comments->where('product_id',$product->id)->where('status',1)->first();
        if ($comment == true) {
            $commentLikes=$comment->commentLikes;
            $countLike = $commentLikes->where('comment_like', 'comment_like')->count();
            $countDisLike = $commentLikes->where('comment_like', 'comment_dislike')->count();
            return response()->json([
                'status' => 'ok',
                'data' => [
                    'comment' => $comment,
                    'countLike' => $countLike,
                    'countDisLike' => $countDisLike
                ]
            ]);
        }
        else{
            return response()->json([
                'status'=>'Error',
                'massage'=>'شما دسترسی ندارید'
            ],403);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CommentLike  $commentLike
     * @return \Illuminate\Http\Response
     */
    public function edit(CommentLike $commentLike)
    {
        if ($commentLike->user_id === auth()->user()->id){
            return response()->json([
                'status'=>'ok',
                'data'=>$commentLike
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
     * @param  \App\Models\CommentLike  $commentLike
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CommentLike $commentLike)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CommentLike  $commentLike
     * @return \Illuminate\Http\Response
     */
    public function destroy(CommentLike $commentLike)
    {
        if ($commentLike->user_id == auth()->user()->id){
            $commentLike->delete();
        }
        else{
            return response()->json([
                'status'=>'Error',
                'data'=>'شما دسترسی ندارید'
            ]);
        }
    }
}
