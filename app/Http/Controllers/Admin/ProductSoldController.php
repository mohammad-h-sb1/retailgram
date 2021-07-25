<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductSold\ProductSoldStore;
use App\Http\Resources\Admin\ProductSoldCollection;
use App\Models\CenterShop;
use App\Models\ProductSold;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductSoldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        auth()->loginUsingId(3);
        if (auth()->user()->type === 'admin_center') {
            $adminCenter = CenterShop::query()->where('user_id', auth()->user()->id)->pluck('id');
            $productSold = ProductSold::query()->where('center_shop_id', $adminCenter)->get();
            return response()->json([
                'status' => 'ok',
                'data' => ProductSoldCollection::collection($productSold),
            ]);
        }
        elseif (auth()->user()->type ==='admin'){
            $productSold = ProductSold::all();
            return response()->json([
                'status' => 'ok',
                'data' => ProductSoldCollection::collection($productSold),
            ]);
        }
        else{
            return response()->json([
                'status'=>'Error',
                'massage'=>'شما دست رسی ندارید'
            ]);
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
    public function store(ProductSoldStore $request)
    {
        auth()->loginUsingId(1);
        if (auth()->user()->type === 'admin') {
            $data = [
                'user_id' => auth()->user()->id,
                'center_shop_id' => $request->center_shop_id,
                'product_id' => $request->product_id,
                'count' => $request->count,
                'customer_address' => $request->customer_address,
            ];
            $product = ProductSold::create($data);
            return response()->json([
                'status'=>'ok',
                'data'=>new ProductSoldCollection($product)
            ]);
        }
        else{
            return response()->json([
                'status'=>'Error',
                'massage'=>'شما دست رسی ندارید'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductSold  $productSold
     * @return \Illuminate\Http\Response
     */
    public function show(ProductSold $productsSold)
    {
        auth()->loginUsingId(2);
        if ($productsSold->centerShop->user_id === auth()->user()->id) {
            return response()->json([
                'status' => 'ok',
                'data' => new ProductSoldCollection($productsSold),
            ]);
        }
        elseif(auth()->user()->type === 'admin'){
            return response()->json([
                'status' => 'ok',
                'data' => new ProductSoldCollection($productsSold),
            ]);
        }
        else{
            return response()->json([
                'status'=>'Error',
                'massage'=>'شما دست رسی ندارید'
            ]);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductSold  $productSold
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductSold $productsSold)
    {
        auth()->loginUsingId(2);
        if ($productsSold->centerShop->user_id === auth()->user()->id) {
            return response()->json([
                'status' => 'ok',
                'data' => new ProductSoldCollection($productsSold),
            ]);
        }
        elseif(auth()->user()->type === 'admin'){
            return response()->json([
                'status' => 'ok',
                'data' => new ProductSoldCollection($productsSold),
            ]);
        }
        else{
            return response()->json([
                'status'=>'Error',
                'massage'=>'شما دست رسی ندارید'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductSold  $productSold
     * @return \Illuminate\Http\Response
     */
    public function update(ProductSoldStore $request, ProductSold $productsSold)
    {
        auth()->loginUsingId(4);
        if ($productsSold->centerShop->user_id === auth()->user()->id) {
            $data = [
                'user_id' => auth()->user()->id,
                'center_shop' => $request->center_shop,
                'product_id' => $request->product_id,
                'count' => $request->count,
                'customer_address' => $request->customer_address,
            ];
            $productsSold->update($data);
        }
        elseif (auth()->user()->type === 'admin'){
            $data = [
                'user_id' => auth()->user()->id,
                'center_shop_id' => $request->center_shop_id,
                'product_id' => $request->product_id,
                'count' => $request->count,
                'customer_address' => $request->customer_address,
            ];
            $productsSold->update($data);
        }
        else{
            return response()->json([
                'status'=>'Error',
                'massage'=>'شما دست رسی ندارید'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductSold  $productSold
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductSold $productsSold)
    {
        if ($productsSold->centerShop->user_id === auth()->user()->id) {
            $productsSold->delete();
        } elseif (auth()->user()->type === 'admin') {
            $productsSold->delete();
        }
        else{
            return response()->json([
                'status'=>'Error',
                'massage'=>'شما دست رسی ندارید'
            ]);
        }
    }

//    زمانی که جنس از سمت برند ارسال شده باشد
        public function status($id)
    {
        $status=ProductSold::query()->findOrFail($id);
        $status->update([
                'status'=> !$status->status ,
            ]
        );
        return response()->json($status);
    }

}
