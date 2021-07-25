<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Resources\Front\StyListCollection;
use App\Http\Resources\Front\StyListProductCollection;
use App\Models\Product;
use App\Models\Stylist;
use App\Models\StylistProduct;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StylistProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stylist=StyList::query()->where('user_id',auth()->user()->id)->pluck('id');
        $stylistProduct=StylistProduct::query()->where('stylist_id',$stylist)->get();
        return response()->json([
            'status'=>'ok',
            'date'=>StyListProductCollection::collection($stylistProduct)
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {



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
            'product_id'=>$request->product_id,
            'stylist_id'=>auth()->user()->id,
            'description'=>$request->description
        ];
        $stylistProduct=StylistProduct::create($data);
        return response()->json([
            'status'=>'ok',
            'data'=>new StyListProductCollection($stylistProduct)
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StylistProduct  $productStylist
     * @return \Illuminate\Http\Response
     */
    public function show(StylistProduct $productStylist)
    {
        return response()->json([
            'status'=>'ok',
            'data'=>new StyListProductCollection($productStylist)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StylistProduct  $productStylist
     * @return \Illuminate\Http\Response
     */
    public function edit(StylistProduct $productStylist)
    {

        if ($productStylist->stylist->user_id  === auth()->user()->id){
            return response()->json([
                'status'=>'ok',
                'data'=>new StyListProductCollection($productStylist)
            ]);
        }
        else{
            return response()->json([
                'status'=>'Error',
                'massage'=>'شما دسترسی ندارید',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StylistProduct  $productStylist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StylistProduct $productStylist)
    {
        if ($productStylist->stylist->user_id  === auth()->user()->id){
            $data=[
                'description'=>$request->description
            ];
            $productStylist->update($data);
        }
        else{
            return response()->json([
                'status'=>'Error',
                'massage'=>'شما دسترسی ندارید',
            ],403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StylistProduct  $stylistProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(StylistProduct $productStylist)
    {
        if($productStylist->stylist->user_id === auth()->user()->id) {
            $productStylist->delete();
        }
        else{
            return response()->json([
                'status'=>'Error',
                'massage'=>'شما دسترسی ندارید',
            ],403);
        }
    }
}
