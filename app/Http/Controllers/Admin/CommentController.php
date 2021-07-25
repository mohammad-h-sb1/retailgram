<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\CommentCollection;
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
        $comment=Comment::all();
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
            return response()->json($comment);
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
            return response()->json($comment);

    }
    public function status($id,Request $request)
    {
        auth()->loginUsingId(1);
        if (auth()->user()->type === 'admin'| auth()->user()->type === 'manager') {
            $status = Comment::query()->findOrFail($id);
            $status->update([
                    'status' => !$status->status,
                ]
            );
            return response()->json([
                'status'=>'ok',
                'data'=>new CommentCollection($status)
            ]);
        }
        else{
            return response()->json([
                'status'=>'Error',
                'massage'=>'شما دست رسی ندارید'
            ],403);
        }
    }
}
