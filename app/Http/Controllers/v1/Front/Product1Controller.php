<?php

namespace App\Http\Controllers\v1\Front;

use App\Http\Controllers\Controller;
use App\Http\Resources\Front\CommentCollection;
use App\Http\Resources\Front\ProductCollection;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Product;
use App\Models\ProductSold;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Product1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product=Product::query()->where('status',1)->get();
        $count=count($product);
        return response()->json([
            'status'=>'ok',
            'data'=>[
                'product'=>ProductCollection::collection($product),
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        if ($product->status == 1){
            $like=Like::query()->where('product_id',$product->id)->get();
            $countLike=count($like);
            $productSold=ProductSold::query()->where('product_id',$product->id)->get();
            $countProductSold=count($productSold);
            $comment=Comment::query()->where('product_id',$product->id)->where('status',1)->get();
            $countComment=count($comment);
            return response()->json([
                'status'=>'ok',
                'data'=>[
                    'product'=>new ProductCollection($product),
                    'comment'=>CommentCollection::collection($comment),
                    'countLike'=>$countLike,
                    'countProductSold'=>$countProductSold,
                    'countComment'=>$countComment
                ]
            ]);
        }
        return response()->json([
            'status'=>'Error',
            'massage'=>'شما دسترسی ندارید'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    //دیدن کامنت های یک پست برای manager
    public function showComment($id)
    {
        $product=Product::query()->where('id',$id)->where('status',1)->first();
        $comment=$product->comments;
        $countComment=count($comment);
        return response()->json([
            'status'=>'ok',
            'data'=>[
                'product'=>new ProductCollection($product),
                'comment'=>CommentCollection::collection($comment),
                'countComment'=>$countComment
            ]
        ]);
    }

    //محبوب ترین ها
    public function favorites()
    {;
        $product=Product::query()->orderBy('like','DESC')->where('status',1)->paginate(5);
        return response()->json([
            'status'=>'ok',
            'data'=>ProductCollection::collection($product)
        ]);

    }
    //اخرین پست ها
    public function recentPosts()
    {
        $product=Product::query()->orderBy('created_at','DESC')->where('status',1)->paginate(5);
        return response()->json([
            'status'=>'ok',
            'data'=>ProductCollection::collection($product)
        ]);
    }
    //پیشنهاد برای شما
    public function suggestionsForYou()
    {
        $productSold=ProductSold::query()->where('user_id',auth()->user()->id)->pluck('product_id');
        $product1=Product::query()->whereIn('id',$productSold)->pluck('category_id');
        $category=Category::query()->whereIn('id',$product1)->pluck('id');
        $product=Product::query()->whereIn('category_id',$category)->orderBy('like','DESC')->paginate(5);
        return response()->json([
            'status'=>'ok',
            'data'=>ProductCollection::collection($product)
        ]);

    }
}
