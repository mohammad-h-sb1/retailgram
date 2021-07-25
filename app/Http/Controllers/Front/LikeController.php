<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Resources\Front\LikeCollection;
use App\Models\Like;
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

        auth()->loginUsingId(1);
        if (auth()->user()->type==='admin'){
            $like=Like::all();
            return response()->json([
                'status'=>'ok',
                'data'=>LikeCollection::collection($like)
            ]);
        }
        else{
            $like=Like::query()->where('user_id',auth()->user()->id)->get();
            return response()->json($like);
        }
        return response()->json([
            'status'=>'شما دست رسی ندارید',
            'massager'=>'شما دست رسی ندارید'
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
        if (auth()->user()->id===$like->user_id){
            return response()->json([
                'status'=>'ok',
                'data'=>new LikeCollection($like)
            ]);
        }
        return abort(403,'شما دست رسی نداید');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function edit(Like $like)
    {
        auth()->loginUsingId(1);
        if (auth()->user()->id===$like->user_id){
            return response()->json([
                'status'=>'ok',
                'data'=>new LikeCollection($like)
            ]);
        }
        return abort(403,'شما دست رسی نداید');
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
//        $data=[
//            'user_id'=>auth()->user()->id,
//            'product_id'=>$request->product_id,
//        ];
//        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function destroy(Like $like)
    {
        auth()->loginUsingId(1);
        if (auth()->user()->id === $like->id) {
            $like->delete();
        }
        else
        {
            return abort(403,'شما دست رسی ندارید');
        }
    }
}
