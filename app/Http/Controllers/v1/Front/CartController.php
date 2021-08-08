<?php

namespace App\Http\Controllers\v1\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cart\CartStore;
use App\Http\Resources\Front\CartCollection;
use App\Http\Resources\Front\PriceCollection;
use App\Models\Cart;
use App\Models\Discount;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart=Cart::query()->where('user_id',auth()->user()->id)->get();
        return response()->json([
            'status'=>'ok',
            'data'=>CartCollection::collection($cart)
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
    public function store(CartStore $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|nullable|integer|numeric|exists:products,id',
            'tag_id' => 'required|integer|numeric|exists:tags,id',
            'count'=>'string',
            'user_id' => ['nullable', 'integer', Rule::exists('users', 'id')->where(function ($query) {
                return $query->where('type', 'USER');
            })],

        ]);
        if ($validator->failed()){
            return response()->json([
                'status'=>'VALIDATION_ERROR',
                'errors'=>$validator->errors()
            ],422);
        }
        $cart=Cart::create([
            'user_id'=>auth()->user()->id,
            'product_id'=>$request->product_id,
            'tag_id'=>$request->tag_id,
            'count'=>$request->tag_id
        ]);
        return response()->json([
            'status'=>'ok',
            'data'=>new CartCollection($cart)
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart,)
    {
        if (auth()->user()->id === $cart->user_id){
            return response()->json([
                'status'=>'ok',
                'data'=>new CartCollection($cart),
            ]);
        }
        else{
            return response()->json([
                'status'=>'ok',
                'massage'=>'شما دسترسی ندارید'
            ],403);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        if (auth()->user()->id === $cart->user_id){
            return response()->json($cart);
        }
        else{
            return response()->json([
                'status'=>'ok',
                'massage'=>'شما دسترسی ندارید'
            ],403);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(CartStore $request, Cart $cart)
    {
        if (auth()->user()->id === $cart->user_id) {
            $data = [
                'user_id' => auth()->user()->id,
                'product_id' => $request->product_id,
                'tag_id' => $request->product_id,
                'count' => $request->count,
            ];
            $cart->update($data);
        }
        else{
            return response()->json([
                'status'=>'ok',
                'massage'=>'شما دسترسی ندارید'
            ],403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        if (auth()->user()->id === $cart->user_id) {
            $cart->delete();
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
        $status=Cart::query()->findOrFail($id);
        $status->update([
                'status'=> !$status->status ,
            ]
        );
        return response()->json($status);
    }

//    public function createDiscount(Discount $discount,Cart $cart,Request $request)
//    {
//        if ($discount->discount_end_date > $cart->create_at & $discount->status = 1)
//        {
//            $data=[
//                'discount_id'=>$request->discount_id,
//            ];
//            $this->create($data);
//        }
//        else{
//            return response()->json([
//                'status'=>'Error',
//                'massage'=>'شما دسترسی ندارید'
//            ],403);
//        }
//
//     }

    public function Price(Request $request)
    {
        auth()->loginUsingId(1);
        $cart=Cart::query()->where('user_id',auth()->user()->id)->get();
        return response()->json([
           'status'=>'ok',
           'data'=>PriceCollection::collection($cart)
        ]);
     }
}
