<?php

namespace App\Http\Controllers\v1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\SizeCollection;
use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $size=Size::all();
        return response()->json([
            'status'=>'ok',
            'data'=>SizeCollection::collection($size)
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
            'product_id'=>$request->product_id,
            'title'=>$request->title
        ];
        $size=Size::create($data);
        return response()->json([
            'status'=>'ok',
            'data'=>new SizeCollection($size)
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function show(Size $size)
    {
        auth()->loginUsingId(1);
        return response()->json([
            'status'=>'ok',
            'data'=>new SizeCollection($size)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function edit(Size $size)
    {
        auth()->loginUsingId(1);
        return response()->json([
            'status'=>'ok',
            'data'=>new SizeCollection($size)
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Size $size)
    {
        auth()->loginUsingId(2);
        $data=[
        'product_id'=>$request->product_id,
        'title'=>$request->title
    ];
        $size->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function destroy(Size $size)
    {
        $size->delete();
    }
}
