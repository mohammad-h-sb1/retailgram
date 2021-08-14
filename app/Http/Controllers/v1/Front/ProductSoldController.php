<?php

namespace App\Http\Controllers\v1\Front;

use App\Http\Controllers\Controller;
use App\Http\Resources\Front\ProductSoldCollection;
use App\Models\ProductSold;
use Illuminate\Http\Request;

class ProductSoldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $productSold=ProductSold::query()->where('user_id',auth()->user()->id)->get();
        $active=$productSold->where('status',1);
        $count=count($active);
        return response()->json([
            'status',
            'data'=>[
                'productSold'=>ProductSoldCollection::collection($productSold),
                'count'=>$count
            ]
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
            'center_shop_id'=>$request->center_shop_id,
            'product_id'=>$request->product_id,
            'count'=>$request->count,
//            'customer_address'=>$request->customer_address,
            'province_id'=>$request->province_id,
            'city_id'=>$request->city_id
        ];
        $product=ProductSold::create($data);
        return response()->json([
            'status'=>'ok',
            'data'=>new ProductSoldCollection($product)
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductSold  $productSold
     * @return \Illuminate\Http\Response
     */
    public function show(ProductSold $productsSold)
    {
        if(auth()->user()->id === $productsSold->user_id){
            return response()->json([
                'status',
                'data'=>new ProductSoldCollection($productsSold),
            ]);
        }
        else{
            return response()->json([
                'status'=>'Errore',
                'massage'=>'شما دسترسی ندارید'
            ],403);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductSold  $productSold
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductSold $productSold)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductSold  $productSold
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductSold $productSold)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductSold  $productSold
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductSold $productSold)
    {
        if (auth()->user()->id == $productSold->user-id){
            $productSold->delete();
        }
        else{
            return response()->json([
                'status'=>'Error',
                'massage'=>'شما دسترسی ندارید'
            ],400);
        }
    }

    public function total_price()
    {
        $productSold=ProductSold::query()->where('user_id',auth()->user()->id)->get();
        $total_price=$productSold->sum('total_price');

        return response()->json([
            'status'=>'ok',
            'data'=>[
                'product_sold'=>ProductSoldCollection::collection($productSold),
                'total_price'=>$total_price
            ]
        ]);
    }
}
