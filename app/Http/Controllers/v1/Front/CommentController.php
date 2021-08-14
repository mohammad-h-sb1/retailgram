<?php

namespace App\Http\Controllers\v1\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Comment\CommentStore;
use App\Http\Resources\Front\CommentCollection;
use App\Models\Comment;
use App\Models\CommentLike;
use App\Models\Like;
use App\Models\Product;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $comment=Comment::query()->where('user_id',auth()->user()->id)->get();
        return response()->json([
            'status'=>'ok',
            'data'=>CommentCollection::collection($comment),
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
            'weakness'=>$request->weakness,
            'power'=>$request->power
        ];
        $comment=Comment::create($data);
        return response()->json([
            'status'=>'ok',
            'data'=>new CommentCollection($comment)
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product=Product::query()->findOrFail($id);
        $comment=Comment::query()->where('product_id',$product->id)->where('status',1)->get();
        $count=count($comment);
        return response()->json([
            'status'=>'ok',
            'data'=>[
                'comment'=>CommentCollection::collection($comment),
                'count'=>$count
            ]
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
        if (auth()->user()->id == $comment->user_id){
            return response()->json([
                'status'=>'ok',
                'data'=>new CommentCollection($comment)
            ]);
        }
        else
        {
            return response()->json([
                'status'=>'Error',
                'massage'=>'شما دسترسی ندرید'
            ],403);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        auth()->loginUsingId(3);
        if (auth()->user()->id == $comment->user_id) {
            $data = [
                'user_id' => auth()->user()->id,
                'product_id' => $request->product_id,
                'description' => $request->description,
                'weakness'=>$request->weakness,
                'power'=>$request->power
            ];
            $comment->update($data);
        }
        else{
            return response()->json([
                'status'=>'Error',
                'massage'=>'شما دسترسی ندرید'
            ],403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        auth()->loginUsingId(1);
        if (auth()->user()->id == $comment->user_id) {
            $comment->delete();
        }
        else{
            return response()->json([
                'status'=>'Error',
                'massage'=>'شما دسترسی ندرید'
            ],403);
        }

    }

    public function count()
    {
        $comment=Comment::query()->where('user_id',auth()->user()->id)->get();
        $count=count($comment);

        $commentActive=$comment->where('status',1);
        $countActive=count($commentActive);

        $commentInactive=$comment->where('status',0);
        $countInactive=count($commentInactive);

        return response()->json([
            'status'=>'ok',
            'data'=>[
                'comment'=>$comment,
                'commentActive'=>$countActive,
                'commentInactive'=>$countInactive
            ]
        ]);
    }

    public function like()
    {
        $comment=Comment::query()->where('user_id',auth()->user()->id)->get();
        $commentLike=CommentLike::query()->whereIn('comment_id',$comment)->get();

        $like=$commentLike->where('comment_like','comment_like');
        $countLike=count($like);

        $like=$commentLike->where('comment_like','comment_dislike');
        $countDislike=count($like);

        return response()->json([
            'status'=>'ok',
            'data'=>[
                'status'=>'ok',
                'data'=>[
                    'comment'=>$comment,
                    'countLike'=>$countLike,
                    'countDislike'=>$countDislike
                ]
            ]
        ]);

    }

}
