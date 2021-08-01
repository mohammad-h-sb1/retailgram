<?php

namespace App\Http\Controllers\v1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductSold\ProductSoldStore;
use App\Http\Resources\Admin\ProductSoldCollection;
use App\Models\CenterShop;
use App\Models\City;
use App\Models\ProductSold;
use App\Models\Province;
use App\Models\User;
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
        if (auth()->user()->type === 'admin_center') {
            $adminCenter = CenterShop::query()->where('user_id', auth()->user()->id)->pluck('id');
            $productSold = ProductSold::query()->where('center_shop_id', $adminCenter)->where('status',1)->get();
            $count=count($productSold);
            return response()->json([
                'status' => 'ok',
                'data' =>[
                    'productSold'=>ProductSoldCollection::collection($productSold),
                    'count'=>$count
                ],
            ]);
        }
        elseif (auth()->user()->type ==='admin'){
            $productSold = ProductSold::all();
            $count=count($productSold);
            return response()->json([
                'status' => 'ok',
                'data' =>[
                    'productSold'=>ProductSoldCollection::collection($productSold),
                    'count'=>$count
                ],
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


    public function SalesReportByGender()
    {
        $userMan=User::query()->where('gender','gender_mane')->pluck('id');
        $productSoldMan=ProductSold::query()->whereIn('user_id',$userMan)->get();
        $countMane=count($productSoldMan);

        $userWoman=User::query()->where('gender','gender_woman')->pluck('id');
        $productSoldWoman=ProductSold::query()->whereIn('user_id',$userWoman)->get();
        $countWoman=count($productSoldWoman);

        return response()->json([
            'status'=>'ok',
            'data'=>[
                'countMane'=>$countMane,
                'countWoman'=>$countWoman
            ]
        ]);
    }

    public function byCity($city)
    {
        $city=City::query()->where('name',$city)->first();
        $products=$city->productSolds;
        $count=count($products);

        $active=$products->where('status',1);
        $countActive=count($active);

        $inactive=$products->where('status',0);
        $countInactive=count($inactive);

        return response()->json([
            'status'=>'ok',
            'data'=>[
                'count'=>$count,
                'countActive'=>$countActive,
                'countInactive'=>$countInactive
            ]
        ]);
    }

    public function province($province)
    {
        $province=Province::query()->where('name',$province)->first();
        $product=$province->productSolds;
        $count=count($product);


        $active=$product->where('status','1');
        $countActive=count($active);

        $inactive=$product->where('status',0);
        $countInactive=count($inactive);

        return response()->json([
            'status'=>'ok',
            'data'=>[
                'count'=>$count,
                'Active'=>$countActive,
                'Inactive'=>$countInactive
            ]
        ]);
    }

}
