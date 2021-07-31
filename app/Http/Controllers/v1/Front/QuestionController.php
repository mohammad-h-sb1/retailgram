<?php

namespace App\Http\Controllers\v1\Front;

use App\Http\Controllers\Controller;
use App\Http\Resources\Front\QuestionCollection;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        auth()->loginUsingId(1);
        $question=Question::query()->where('user_id',auth()->user()->id)->get();
        return response()->json([
            'status'=>'ok',
            'data'=>QuestionCollection::collection($question)
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
            'question'=>$request->question,
            'answer'=>'csdsdsd'
        ];
        $question=Question::create($data);
        return response()->json([
            'status'=>'ok',
            'data'=>new QuestionCollection($question)
        ]);
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
        if (auth()->user()->id == $question->user_id){
            return response()->json([
                'status'=>'ok',
                'data'=>new QuestionCollection($question)
            ]);
        }
        return abort(403,"شما سوالی نپرسیدید");
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
        if (auth()->user()->id == $question->user_id){
            return response()->json($question);
        }
        return abort(403,"شما سوالی نپرسیدید");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        auth()->loginUsingId(1);
        if (auth()->user()->id === $question->user_id) {
            $data = [
                'question' => $request->question,
            ];
            $question->update($data);
        }
        else {
            return abort(403, 'شما دسترسی ندارید');
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
        auth()->loginUsingId(1);
        if (auth()->user()->id == $question->user_id) {
            $question->delete();
        }
        elseif (auth()->user()->type === $question->delete()){
            $question->delete();
        }
        else {
            return abort(403, "شما دسترسی ندارید");
        }
    }
}
