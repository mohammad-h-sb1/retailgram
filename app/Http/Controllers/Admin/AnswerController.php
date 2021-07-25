<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Answer\AnswerStore;
use App\Http\Resources\Admin\AnswerCollection;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->type === 'admin'|'manager'){
            $question=Question::paginate(1);
            return response()->json([
            'status'=>'ok',
            'data'=>AnswerCollection::collection($question)
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
    public function store(AnswerStore $request)
    {
        auth()->loginUsingId(1);
        if (auth()->user()->type === 'admin'|'manager') {
            $data = [
                'user_id' => auth()->user()->id,
                'answer' => $request->answer,
            ];
            $question = Question::create($data);
            return response()->json([
                'status' => 'ok',
                'data' => new AnswerCollection($question)
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
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        auth()->loginUsingId(1);
        if (auth()->user()->type === 'admin'|'manager') {
            return response()->json([
                'status' => 'ok',
                'data' => new AnswerCollection($question)
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
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        auth()->loginUsingId(1);
        if (auth()->user()->type === 'admin'|'manager') {
            return response()->json([
                'status' => 'ok',
                'data' => new AnswerCollection($question)
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(AnswerStore $request, Question $question)
    {
        if (auth()->user()->type === 'admin'|'manager') {
            $data = [
                'user_id' => auth()->user()->id,
                'question' => $request->question,
            ];
            $question->update($data);
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
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        if (auth()->user()->type === 'admin'|'manager') {
            $question->delete();
        }
        else{
            return response()->json([
            'status'=>'Error',
            'massage'=>'شما دسترسی ندارید'
            ],403);
        }
    }

    public function answer(AnswerStore $request ,$id)
    {
        auth()->loginUsingId(1);
        $data=[
            'user_id'=>auth()->user()->id,
            'question'=>Question::query()->findOrFail($id)->get(),
            'answer' =>$request->answer,
        ];
        $answer=Question::query()->create($data);
        return response()->json([
            'status'=>'ok',
            'data'=>new AnswerCollection($answer)
        ]);
    }
}
