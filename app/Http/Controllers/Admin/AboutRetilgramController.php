<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutRetilgram\AboutRetilgramStore;
use App\Http\Resources\Admin\AboutRetilgramCollection;
use App\Models\AboutRetilgram;
use Illuminate\Http\Request;

class AboutRetilgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        auth()->loginUsingId(1);
        if (auth()->user()->type==='admin') {
            $aboutRetilgram = AboutRetilgram::all();
            return response()->json([
                'status'=>'ok',
                'data'=>AboutRetilgramCollection::collection($aboutRetilgram)
            ]);
        }
        return response()->json([
            'status'=>'Error',
            'massage'=>'شما دسترسی ندارید'
        ],403);
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
    public function store(AboutRetilgramStore $request)
    {
        auth()->loginUsingId(1);
        if (auth()->user()->type==='admin') {
            $data = [
                'user_id' => auth()->user()->id,
                'work_retilgrams' => $request->work_retilgrams,
                'blog_retilgrams' => $request->blog_retilgrams,
                'about_retilgrams' => $request->about_retilgrams,
                'training_and_guidance' => $request->training_and_guidance,
                'about_order_registration' => $request->about_order_registration,
                'about_send_product' => $request->about_send_product,
                'about_payment' => $request->about_payment,
                'product_return'=>$request->product_return,
                'terms_of_use'=>$request->terms_of_use,
                'privacy'=>$request->privacy,
                'bug'=>$request->bug,
            ];
            $aboutRetilgram = AboutRetilgram::create($data);
            return response()->json([
                'status'=>'ok',
                'data'=>new AboutRetilgramCollection($aboutRetilgram)
            ]);
        }
        return response()->json([
            'status'=>'Error',
            'massage'=>'شماا دسترسی ندارید'
        ],403);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AboutRetilgram  $aboutRetilgram
     * @return \Illuminate\Http\Response
     */
    public function show(AboutRetilgram $aboutR)
    {
        auth()->loginUsingId(1);
        if (auth()->user()->type==='admin') {
            return response()->json([
                'status'=>'ok',
                'data'=> new AboutRetilgramCollection($aboutR)
            ]);
        }
        return response()->json([
            'status'=>'Error',
            'massage'=>'شما دسترسی ندارید'
        ],403);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AboutRetilgram  $aboutRetilgram
     * @return \Illuminate\Http\Response
     */
    public function edit(AboutRetilgram $aboutR)
    {
        auth()->loginUsingId(1);
        if (auth()->user()->type==='admin') {
            return response()->json($aboutR);
        }
        return response()->json([
            'status'=>'Error',
            'massage'=>'شما  دست رسیندارید'
        ],403);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AboutRetilgram  $aboutRetilgram
     * @return \Illuminate\Http\Response
     */
    public function update(AboutRetilgramStore $request, AboutRetilgram $aboutR)
    {
//        dd($aboutR);
        auth()->loginUsingId(1);
        if (auth()->user()->type==='admin') {
            $data = [
                'user_id' => auth()->user()->id,
                'work_retilgrams' => $request->work_retilgrams,
                'blog_retilgrams' => $request->blog_retilgrams,
                'about_retilgrams' => $request->about_retilgrams,
                'training_and_guidance' => $request->training_and_guidance,
                'about_order_registration' => $request->about_order_registration,
                'about_send_product' => $request->about_send_product,
                'about_payment' => $request->about_payment,
            ];
            $aboutR->update($data);
        }
        return response()->json([
            'status'=>'Error',
            'massage'=>'شما دسترسی ندارید'
        ],403);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AboutRetilgram  $aboutRetilgram
     * @return \Illuminate\Http\Response
     */
    public function destroy(AboutRetilgram $aboutRetilgram)
    {
        if (auth()->user()->type==='admin') {
            $aboutRetilgram->delete();
            return response()->json($aboutRetilgram);
        }
        return response()->json([
            'status'=>'Error',
            'massage'=>'شما دسترسی ندارید'
        ],403);

    }
}
