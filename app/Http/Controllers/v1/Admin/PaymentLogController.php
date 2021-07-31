<?php

namespace App\Http\Controllers\v1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\PaymentLogCollection;
use App\Models\Payment;
use App\Models\PaymentLog;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PaymentLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $log=PaymentLog::all();
        return response()->json([
            'status'=>'ok',
            'data'=>PaymentLogCollection::collection($log)
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
        $product=Product::query()->where('id',$request->product_id)->pluck('rating')->first();
        $data=[
            'user_id'=>auth()->user()->id,
            'product_id'=>$request->product_id,
            'payment_id'=>$request->payment_id,
            'discount_id'=>$request->discount_id,
            'tag_id'=>$request->tag_id,
            'rating'=>$product
        ];
        $paymentLog=PaymentLog::create($data);
        return response()->json([
            'status'=>'ok',
            'data'=>new PaymentLogCollection($paymentLog)
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaymentLog  $log
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentLog $log)
    {
        if (auth()->user()->id === $log->user_id| auth()->user()->type==='admin'){
            return response()->json([
                'status'=>'ok',
                'data'=>new PaymentLogCollection($log)
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
     * @param  \App\Models\PaymentLog  $log
     * @return \Illuminate\Http\Response
     */
    public function edit(PaymentLog $log)
    {
        return response()->json([
            'status'=>'ok',
            'data'=>new PaymentLogCollection($log)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaymentLog  $log
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaymentLog $log)
    {
        $data=[
            'user_id'=>auth()->user()->id,
            'product_id'=>$request->product_id,
            'payment_id'=>$request->payment_id,
            'discount_id'=>$request->discount_id,
            'rating'=>$request->rating
        ];
        $log->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaymentLog  $log
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaymentLog $log)
    {
        $log->delete();
    }
}
