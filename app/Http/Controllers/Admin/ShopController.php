<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Shop\ShopStore;
use App\Http\Resources\Admin\ShopCollection;
use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shop=Shop::query()->where('user_id',auth()->user()->id | auth()->user()->type === 'admin')->get();
        if ($shop == true) {
            return response()->json([
                'status' => 'ok',
                'data' => ShopCollection::collection($shop),
            ]);
        }
        else{
            return response()->json([
                'status' => 'Error',
                'massage' => 'شما دسترسی ندارید',
            ],403);
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
    public function store(ShopStore $request)
    {
        $data=[
            'user_id'=>auth()->user()->id,
            'centerShop_id'=>$request->centerShop_id,
            'name'=>$request->name,
            'shop_address'=>$request->shop_address,
            'shop_phone'=>$request->shop_phone,
        ];

        $shop=Shop::create($data);
        return response()->json([
            'status'=>'ok',
            'data'=>new ShopCollection($shop)
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function show(Shop $shop)
    {

        if ($shop->user_id === auth()->user()->id | auth()->user()->type === 'admin') {
            return response()->json([
                'status' => 'ok',
                'data' => new ShopCollection($shop)
            ]);
        }
        else{
            return response()->json([
                'status' => 'Error',
                'massage' => 'شما دسترسی ندارید',
            ],403);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function edit(Shop $shop)
    {

        if ($shop->user_id === auth()->user()->id | auth()->user()->type === 'admin') {
            return response()->json([
                'status' => 'ok',
                'data' => new ShopCollection($shop)
            ]);
        }
        else{
            return response()->json([
                'status' => 'Error',
                'massage' => 'شما دسترسی ندارید',
            ],403);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function update(ShopStore $request, Shop $shop)
    {
        if ($shop->user_id === auth()->user()->id | auth()->user()->type === 'admin') {
            $data = [
                'user_id' => auth()->user()->id,
                'centerShop_id' => $request->centerShop_id,
                'name' => $request->name,
                'shop_address' => $request->shop_address,
                'shop_phone' => $request->shop_phone,
            ];
            $shop->update($data);
        }
        else{
            return response()->json([
                'status' => 'Error',
                'massage' => 'شما دسترسی ندارید',
            ],403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shop $shop)
    {
        if ($shop->user_id === auth()->user()->id | auth()->user()->type === 'admin') {
            $shop->delete();
        }
        else {
            return response()->json([
                'status' => 'Error',
                'massage' => 'شما دسترسی ندارید',
            ], 403);
        }
    }

    public function status($id,Request $request)
    {
        auth()->loginUsingId(1);
        $status=Shop::query()
            ->where('user_id',auth()->user()->id | auth()->user()->type === 'admin')->findOrFail($id);
        if ($status == true) {
            $status->update(
                [
                    'status' => !$status->status,
                ]
            );
            return response()->json([
                'status'=>'ok',
                'data'=>new ShopCollection($status)
            ]);
        }
        else {
            return response()->json([
                'status' => 'Error',
                'massage' => 'شما دسترسی ندارید',
            ], 403);
        }
    }
}
