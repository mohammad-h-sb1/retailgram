<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cart\CartStore;
use App\Http\Requests\Product\ProductUpdate;
use App\Http\Requests\StoreProductRequest;
use App\Http\Resources\Admin\ProductCollection;
use App\Models\CenterShop;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Product1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->type === 'admin') {
            $product = Product::all();
            return response()->json([
                'status'=>'ok',
                'data'=>ProductCollection::collection($product)
            ]);
        }
        elseif (auth()->user()->type === 'admin_center'){
//            $product=Product::query()->whereIn('center_id',function ($q){
//                $center=CenterShop::all();
//                $q->where(auth()->user()->id === $center->user_id)->pluck('name')->get();
//            })->get();
            $product=Product::query()->where('user_id',auth()->user()->id)->get();
            return response()->json([
                'status'=>'ok',
                'data'=>ProductCollection::collection($product)
            ]);
        }
        else{
            return abort(403,"شما دسترسی ندارید");
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
    public function store(Request $request)
    {

        $data=[
            'user_id'=>auth()->user()->id,
            'center_shop_id'=>$request->center_shop_id,
            'category_id'=>$request->category_id,
            'name'=>$request->name,
            'slug'=>$request->slug,
            'gender'=>$request->gender,
            'description'=>$request->description,
            'price_product'=>$request->price_product,
            "discount_product"=>$request->discount_product,
            'rating'=>$request->rating,
        ];
        $product=Product::create($data);
        return response()->json([
            'status'=>'ok',
            'data'=>new ProductCollection($product)
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {

        if (auth()->user()->type === 'admin')
        {
            return response()->json([
                'status'=>'oky',
                'data'=>new ProductCollection($product)
            ]);
        }
        elseif (auth()->user()->id === $product->user_id)
        {
            return response()->json(new ProductCollection($product));
        }
        else{
            return abort(403,'شما دست رسی ندارید');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {

        if (auth()->user()->type === 'admin')
        {
            return response()->json([
                'status'=>'oky',
                'data'=>new ProductCollection($product)
            ]);
        }
        elseif (auth()->user()->id === $product->user_id)
        {

            return response()->json([
                'status'=>'oky',
                'data'=>new ProductCollection($product)
            ]);
        }
        else{
            return response()->json([
                'status'=>'ok',
                'massage'=>'شما دسترسی ندارید'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdate $request, Product $product)
    {


        if (auth()->user()->type === 'admin') {
            $data = [
                'user_id' => auth()->user()->id,
                'center_shop_id'=>$request->center_shop_id,
                'category_id'=>$request->category_id,
                'name'=>$request->name,
                'slug'=>$request->slug,
                'gender'=>$request->gender,
                'description'=>$request->description,
                'price_product'=>$request->price_product,
                "discount_product"=>$request->discount_product,
                'rating'=>$request->rating,
            ];
            $product->update($data);
        }
        elseif (auth()->user()->id === $product->user_id){
            $data = [
                'user_id' => auth()->user()->id,
                'center_shop_id'=>$request->center_shop_id,
                'category_id'=>$request->category_id,
                'name'=>$request->name,
                'slug'=>$request->slug,
                'gender'=>$request->gender,
                'description'=>$request->description,
                'price_product'=>$request->price_product,
                "discount_product"=>$request->discount_product,
                'rating'=>$request->rating,
            ];

            $product->update($data);
        }
        else{
            return response()->json([
                'status'=>'ok',
                'massage'=>'شما دسترسی ندارید'
            ]);
        }
//        return response()->json($product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        auth()->loginUsingId(1);
        if (auth()->user()->type === 'admin'){
            $product->delete();
        }
        elseif(auth()->user()->id === $product->user_id){
            $product->delete();
        }
        else{
            return response()->json([
                'status'=>'ok',
                'massage'=>'شما دسترسی ندارید'
            ],403);
        }


    }

    public function status($id)
    {
        $status=Product::query()->findOrFail($id);
        $status->update([
                'status'=> !$status->status ,
            ]
        );
        return response()->json([
            'status'=>'ok',
            'data'=>new ProductCollection($status)
        ]);
    }
}
