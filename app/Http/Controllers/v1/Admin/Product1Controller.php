<?php

namespace App\Http\Controllers\v1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cart\CartStore;
use App\Http\Requests\Product\ProductUpdate;
use App\Http\Requests\StoreProductRequest;
use App\Http\Resources\Admin\ProductCollection;
use App\Models\CenterShop;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Product;
use App\Models\ProductSold;
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
            $count=count($product);
            return response()->json([
                'status'=>'ok',
                'data'=>[
                    'product'=>ProductCollection::collection($product),
                    'count'=>$count
                ]
            ]);
        }
        elseif (auth()->user()->type === 'admin_center'){
            $product=Product::query()->where('user_id',auth()->user()->id)->get();
            $count=count($product);
            return response()->json([
                'status'=>'ok',
                'data'=>[
                    'product'=>ProductCollection::collection($product),
                    'count'=>$count
                ]
            ]);
        }
        else{
            return response()->json([
                'status'=>'Error',
                'massage'=>'شمادسترسی ندارید'
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
        $like=Like::query()->where('product_id',$product->id)->get();
        $countLike=count($like);
        $productSold=ProductSold::query()->where('product_id',$product->id)->get();
        $countProductSold=count($productSold);
        $comment=Comment::query()->where('product_id',$product->id)->where('status',1)->get();
        $countComment=count($comment);
        if (auth()->user()->type === 'admin')
        {
            return response()->json([
                'status'=>'oky',
                'data'=>[
                    'product'=>new ProductCollection($product),
                    'countLike'=>$countLike,
                    'countProductSold'=>$countProductSold,
                    'countComment'=>$countComment
                ]
            ]);
        }
        elseif (auth()->user()->id === $product->user_id)
        {
            return response()->json([
                'status'=>'oky',
                'data'=>[
                    'product'=>new ProductCollection($product),
                    'countLike'=>$countLike,
                    'countProductSold'=>$countProductSold,
                    'countComment'=>$countComment
                ]
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
