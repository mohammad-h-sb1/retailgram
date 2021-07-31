<?php

namespace App\Http\Controllers\v1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\PaymentCollection;
use App\Models\Cart;
use App\Models\Payment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payment=Payment::query()->where('user_id',auth()->user()->id)->get();
        return response()->json([
            'status'=>'ok',
            'data'=>PaymentCollection::collection($payment)
        ]);

    }

    /*
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
        $product=Product::query()->where('id',$request->product_id)->get();
        $cart=Cart::query()->where('product_id',$request->product_id)->where('user_id',auth()->user()->id)->get();
        $payment=$product->sum('The_final_amount') * $cart->sum('count');
        $data=[
            'user_id'=>auth()->user()->id,
            'product_id'=>$request->product_id,
            'discount_id'=>$request->discount_id,
            'amount'=>$payment,
        ];
        $payment=Payment::create($data);
        return response()->json([
            'status'=>'ok',
            'data'=>new PaymentCollection($payment)
        ]);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        if ($payment->user_id === auth()->user()->id | auth()->user()->type === 'admin') {
            return response()->json([
                'status' => 'ok',
                'data' => new PaymentCollection($payment)
            ]);
        }
        else{
            return response()->json([
                'status'=>'Error',
                'massage'=>'شما دسترسی ندارید'
            ],403);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        if (auth()->user()->type === 'admin') {
            return response()->json([
                'status' => 'ok',
                'data' => new PaymentCollection($payment)
            ]);
        }
        else{
            return response()->json([
                'status'=>'Error',
                'massage'=>'شما دسترسی ندارید'
            ],403);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        $product=Product::query()->where('id',$request->product_id)->get();
        $cart=Cart::query()->where('product_id',$request->product_id)->where('user_id',auth()->user()->id)->get();
        $payment=$product->sum('The_final_amount') * $cart->sum('count');
        $data=[
            'user_id'=>auth()->user()->id,
            'discount_id'=>$request->discount_id,
            'product_id'=>$request->product_id,
            'amount'=>$request->amount,
        ];
        $payment->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        if (auth()->user()->type ==='admin'){
            $payment->delete();
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
        auth()->loginUsingId(1);
        if (auth()->user()->type === 'admin'| auth()->user()->type === 'manager') {
            $status = Payment::query()->findOrFail($id);
            $status->update([
                    'status' => !$status->status,
                ]
            );
            return response()->json([
                'status'=>'ok',
                'data'=>new PaymentCollection($status)
            ]);
        }
        else{
            return response()->json([
                'status'=>'Error',
                'massage'=>'شما دست رسی ندارید'
            ],403);
        }
    }
}
