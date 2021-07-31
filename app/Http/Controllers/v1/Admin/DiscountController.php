<?php

namespace App\Http\Controllers\v1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Discount\DiscountStore;
use App\Http\Resources\Admin\DataCollection;
use App\Http\Resources\Admin\DiscountCollection;
use App\Models\Discount;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discount=Discount::all();
        return response()->json([
            'status'=>'ok',
            'data'=>DiscountCollection::collection($discount),
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
        auth()->loginUsingId(1);
        $data=[
            'user_id'=>auth()->user()->id,
            'category_id'=>$request->category_id,
            'protect_id'=>$request->protect_id,
            'code'=>$request->code,
            'influencers_id'=>$request->influencers_id,
            'discount_percent'=>$request->discount_percent,
            'amount_of_discount'=>$request->amount_of_discount,
            'code_validity'=>$request->code_validity,
        ];
        $discount=Discount::create($data);
        return response()->json([
            'status'=>'ok',
            'data'=>new DiscountCollection($discount)
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function show(Discount $discount)
    {
        return response()->json([
            'status'=>'ok',
            'data'=>new DiscountCollection($discount),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function edit(Discount $discount)
    {
        return response()->json([
            'status'=>'ok',
            'data'=>new DiscountCollection($discount)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function update(DiscountStore $request, Discount $discount)
    {
        $data=[
            'user_id'=>$request->user_id,
            'product_id'=>$request->product_id,
            'category_id'=>$request->category_id,
            'code'=>$request->code,
            'influencers_id'=>$request->influencers_id,
            'discount_percent'=>$request->discount_percent,
            'amount_of_discount'=>$request->amount_of_discount,
            'code_validity'=>$request->code_validity,
        ];
        $discount->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function destroy(Discount $discount)
    {
        $discount->delete();
    }

    public function status($id)
    {
        $status=Discount::query()->findOrFail($id);
        $status->update([
                'status'=> !$status->status ,
            ]
        );
        return response()->json($status);
    }

    public function code_validity($code)
    {
        auth()->loginUsingId(1);
        $codes=Discount::query()->where('code',$code)->
        where('discount_end_date','>=',Carbon::now())->
        where('discount_start_date','<=',Carbon::now())->
        where('status','=',1)->
        count();
        if (! $codes) {
            return response()->json([
                'status'=>'Error',
                'massage'=>'کد تخفیف اعتبار ندارد',
            ],400);
        }
        else{
            return response()->json([
                'status'=>'ok',
                'data'=>new DiscountCollection($codes)
            ]);
        }


    }

}
