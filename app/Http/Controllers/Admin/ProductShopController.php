<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\ProductShopCollection;
use App\Models\ProductShop;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        auth()->loginUsingId(1);
        $productShop=ProductShop::all();
        return response()->json([
            'status'=>'ok',
            'data'=>ProductShopCollection::collection($productShop)
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
            'product_id'=>$request->product_id,
            'shop_id'=>$request->shop_id,
            'count'=>$request->count
        ];
        $productShop=ProductShop::create($data);
        return response()->json([
            'status'=>'ok',
            'data'=>new ProductShopCollection($productShop)
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductShop  $productShop
     * @return \Illuminate\Http\Response
     */
    public function show(ProductShop $productShop)
    {
        auth()->loginUsingId(1);
        if ($productShop->product->user_id === auth()->user()->id | auth()->user()->type === 'admin'){
            return response()->json([
                'status'=>'ok',
                'data'=>new ProductShopCollection($productShop)
            ]);
        }
        else{
            return response()->json([
                'status'=>'Error',
                'massage'=>'شمادسترسی ندارید'
            ],403);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductShop  $productShop
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductShop $productShop)
    {
        auth()->loginUsingId(1);
        if ($productShop->product->user_id === auth()->user()->id | auth()->user()->type === 'admin'){
            return response()->json([
                'status'=>'ok',
                'data'=>new ProductShopCollection($productShop)
            ]);
        }
        else{
            return response()->json([
                'status'=>'Error',
                'massage'=>'شمادسترسی ندارید'
            ],403);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductShop  $productShop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductShop $productShop)
    {
        auth()->loginUsingId(1);
        if ($productShop->product->user_id === auth()->user()->id | auth()->user()->type === 'admin'){
            $data=[
                'product_id'=>$request->product_id,
                'shop_id'=>$request->shop_id,
                'count'=>$request->count
            ];
            $productShop->update($data);
        }
        else{
            return response()->json([
                'status'=>'Error',
                'massage'=>'شمادسترسی ندارید'
            ],403);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductShop  $productShop
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductShop $productShop)
    {
        auth()->loginUsingId(1);
        if ($productShop->product->user_id === auth()->user()->id | auth()->user()->type === 'admin') {
            $productShop->delete();
        }
        else{
            return response()->json([
                'status'=>'Error',
                'massage'=>'شمادسترسی ندارید'
            ],403);
        }
    }

}
