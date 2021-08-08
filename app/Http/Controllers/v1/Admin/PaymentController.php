<?php

namespace App\Http\Controllers\v1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\PaymentCollection;
use App\Http\Resources\Admin\PaymentLogCollection;
use App\Http\Resources\Front\ProductSoldCollection;
use App\Models\Cart;
use App\Models\Payment;
use App\Models\PaymentLog;
use App\Models\Product;
use App\Models\ProductShop;
use App\Models\ProductSold;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

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
        $rating=$cart->sum('count') * $product->sum('rating');
        $data=[
            'user_id'=>auth()->user()->id,
            'product_id'=>$request->product_id,
            'discount_id'=>$request->discount_id,
            'amount'=>$payment,
        ];
        $payment=Payment::create($data);

        $paymentLogData=[
            'user_id'=>auth()->user()->id,
            'product_id'=>$request->product_id,
            'payment_id'=>$payment->id,
            'discount_id'=>$request->discount_id,
            'rating'=>$rating
        ];
        $paymentLog=PaymentLog::create($paymentLogData);
        return response()->json([
            'status'=>'ok',
            'data'=>new PaymentLogCollection($paymentLog)
        ],201);



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
        $payment = Payment::query()->where('id',$id)->first();
        $paymentLog=PaymentLog::query()
            ->where('payment_id',$payment->id)
            ->where('user_id',auth()->user()->id)
            ->pluck('rating')->first();

        if (auth()->user()->id === $payment->user_id ) {
            $payment->update([
                    'status' => !$payment->status,
                ]
            );
            if ($payment->status == 1){
                $rating=auth()->user()->rating + $paymentLog;
                auth()->user()->update([
                    'rating'=>$rating
                ]);
            }
            else{
                $rating=auth()->user()->rating - $paymentLog;
                auth()->user()->update([
                    'rating'=>$rating
                ]);
            }
            if ($payment->status == 1){
                $product=Product::query()->where('id',$payment->product_id)->first();
                $data=[
                   'user_id'=>auth()->user()->id,
                   'center_shop_id'=>$product->centerShop->id,
                   'product_id'=>$product->id,
                   'province_id'=>$request->province_id,
                   'city_id'=>$request->city_id,
                   'count'=>$request->count,
                   'status'=>1
               ];
                $productSold=ProductSold::create($data);
                return response()->json([
                    'status'=>'ok',
                    'data'=>new ProductSoldCollection($productSold)
                ]);
            }
        }
        else{
            return response()->json([
                'status'=>'Error',
                'massage'=>'شما دست رسی ندارید'
            ],403);
        }
    }
}
