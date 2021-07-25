<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRatingLog\LogStor;
use App\Http\Resources\Front\ProductRatingLogCollection;
use App\Models\ProductRatingLog;
use Illuminate\Http\Request;

class ProductRatingLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $log=ProductRatingLog::all();
        return response()->json([
            'status'=>'ok',
            'data'=>ProductRatingLogCollection::collection($log)
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
    public function store(LogStor $request)
    {

        auth()->loginUsingId(1);
        $data=[
            'user_id'=>auth()->user()->id,
            'product_rating_id'=>$request->product_rating_id,
            'rating'=>$request->rating
        ];
        $productRatingLog=ProductRatingLog::create($data);
        return response()->json([
            'status'=>'ok',
            'data'=>new ProductRatingLogCollection($productRatingLog)
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductRatingLog  $productRatingLog
     * @return \Illuminate\Http\Response
     */
    public function show(ProductRatingLog $productRatingLog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductRatingLog  $productRatingLog
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductRatingLog $productRatingLog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductRatingLog  $productRatingLog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductRatingLog $productRatingLog)
    {
        $productRatingLog->delete();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductRatingLog  $productRatingLog
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductRatingLog $productRatingLog)
    {
        //
    }
}
