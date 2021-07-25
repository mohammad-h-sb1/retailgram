<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\OrderStore;
use App\Http\Resources\Front\OrderCollection;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order=Order::query()->where('user_id',auth()->user()->id)->get();
        return response()->json([
            'status'=>'ok',
            'data'=>OrderCollection::collection($order)
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
            'user_id'=>$request->user_id,
            'product_id'=>$request->product_id,
            'discount_id'=>$request->discount_id,
            'product_amount'=>$request->product_amount,
            'product_quantity_with_discount'=>$request->product_quantity_with_discount
        ];
        $order=Order::create($data);
        return response()->json([
            'status'=>'ok',
            'data'=>new OrderCollection($order)
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {

        if (auth()->user()->id === $order->user_id){
            return response()->json([
                'status'=>'ok',
                'data'=>new OrderCollection($order)
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
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        if (auth()->user()->id === $order->user_id){
            return response()->json([
                'status'=>'ok',
                'data'=>new OrderCollection($order)
            ]);
        }
        return response()->json([
            'status'=>'Error',
            'massage'=>'شما دسترسی ندارید'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        if (auth()->user()->id === $order->user_id){
            $data=[
                'user_id'=>$request->user_id,
                'product_id'=>$request->product_id,
                'discount_id'=>$request->discount_id,
                'product_amount'=>$request->product_amount,
                'product_quantity_with_discount'=>$request->product_quantity_with_discount
            ];
            $order->update($data);
        }
        return response()->json([
            'status'=>'Error',
            'massage'=>'شما دسترسی ندارید'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        auth()->loginUsingId(1);
        if (auth()->user()->id ===$order->user_id) {
            $order->delete();
            dd('yes');
        }
        else{
            return response()->json([
                'status'=>'Error',
                'massage'=>'شما دسترسی ندارید'
            ]);
        }
    }
    public function status($id,Request $request)
    {
        $status=Order::query()->findOrFail($id);
        $status->update([
                'status'=> !$status->status ,
            ]
        );
        return response()->json([
            'status'=>'ok',
            'data'=>new OrderCollection($status)
        ]);
    }
}
