<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\UserCollection;
use App\Http\Resources\Admin\UserRatingCollection;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use App\Models\UserRating;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserRatingController extends Controller
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
        $product=Product::query()->where('id',$request->product_id)->pluck('rating')->first();
        $cart=Cart::query()->where('product_id',$request->product_id)->where('status',1)->pluck('count')->first();
        if ($cart==true){
            $rating=auth()->user()->rating + ($product * $cart);
            auth()->user()->update([
                'rating'=>$rating
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
     * Display the specified resource.
     *
     * @param  \App\Models\UserRating  $userRating
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        dd();
       $user=auth()->user();
       return response()->json([
           'status'=>'ok',
           'data'=>new UserCollection($user)
       ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserRating  $userRating
     * @return \Illuminate\Http\Response
     */
    public function edit(UserRating $userRating)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserRating  $userRating
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserRating $userRating)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserRating  $userRating
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserRating $userRating)
    {
        $userRating->delete();
    }
}
