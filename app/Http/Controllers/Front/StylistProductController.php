<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Resources\Front\StyListCollection;
use App\Http\Resources\Front\StyListProductCollection;
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
        auth()->loginUsingId(4);
        $stylist_id=Stylist::query()->where('user_id',auth()->user()->id)->pluck('id');
        $stylistProduct=StylistProduct::query()->where('stylist_id',$stylist_id)->get();
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
            'stylist_id'=>$request->stylist_id,
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
        auth()->loginUsingId(1);
        if($productStylist->stylist->user_id === auth()->user()->id) {
            return response()->json([
                'status'=>'ok',
                'data'=>new StyListProductCollection($productStylist)
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
        auth()->loginUsingId(1);

        if($productStylist->stylist->user_id === auth()->user()->id) {
            $data = [
                'product_id' => $request->product_id,
                'stylist_id' => $request->stylist_id,
                'description' => $request->description
            ];
            $productStylist->update($data);
            dd('yes');
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
        auth()->loginUsingId(1);
        if($productStylist->stylist->user_id === auth()->user()->id) {
            $productStylist->delete();
        }
    }
}
