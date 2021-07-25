<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\UserRatingCollection;
use App\Http\Resources\Front\UserRatingLogCollection;
use App\Models\Cart;
use App\Models\UserRating;
use App\Models\UserRatingLog;
use Illuminate\Http\Request;

class UserRatingLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        auth()->loginUsingId(1);
        $userRating=UserRating::query()->where('user_id',auth()->user()->id)->get();
//        dd($userRating);
        $log=UserRatingLog::query()->where('user_rating_id',$userRating)->get();
        dd($log);
        return response()->json([
            'status'=>'ok',
            'data'=>UserRatingLogCollection::collection($log)
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
        $userRating=UserRating::query()->where('user_id',auth()->user()->id)->pluck('id');
        $cart=Cart::query()->where('user_id',auth()->user()->id)->pluck('count');
        $userRatingLog=UserRatingLog::query()
            ->where('user_rating_id',$userRating)
            ->pluck('id');
        $userRatingLog->where('cart_id',$cart)->pluck('id');
        dd($userRatingLog);
        $data=[
            'user_rating_id'=>$request->user_rating_id,
            'cart_id'=>$request->cart_id,
            'rating'=>$request->rating,
        ];
        dd($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserRatingLog  $userRatingLog
     * @return \Illuminate\Http\Response
     */
    public function show(UserRatingLog $userRatingLog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserRatingLog  $userRatingLog
     * @return \Illuminate\Http\Response
     */
    public function edit(UserRatingLog $userRatingLog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserRatingLog  $userRatingLog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserRatingLog $userRatingLog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserRatingLog  $userRatingLog
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserRatingLog $userRatingLog)
    {
        //
    }
}
