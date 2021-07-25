<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Comment\CommentStore;
use App\Http\Resources\Front\CommentCollection;
use App\Models\Comment;
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
        auth()->loginUsingId(1);
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
        auth()->loginUsingId(1);
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
    public function show(Comment $comment)
    {
        auth()->loginUsingId(1);
        if (auth()->user()->id == $comment->user_id){
            return response()->json([
                'status'=>'ok',
                'data'=>new CommentCollection($comment)
            ]);
        }
        else
        {
            return  abort(403,'شما دست رسی نداید');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        auth()->loginUsingId(3);
        if (auth()->user()->id == $comment->user_id){
            return response()->json([
                'status'=>'ok',
                'data'=>new CommentCollection($comment)
            ]);
        }
        else
        {
            return  abort(403,'شما دست رسی نداید');
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
            dd($comment);
        }
        else{
            return abort(403,'شما دست رسی ندارید');
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
            abort(403,'شما دست رسی ندارید');
        }

    }
}
