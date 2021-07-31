<?php

namespace App\Http\Controllers\v1\Front;

use App\Http\Controllers\Controller;
use App\Http\Resources\Front\SearchCollection;
use App\Models\Category;
use App\Models\CenterShop;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $protect=Product::query()->where('name','like',"%{$request->search}%")->get();
        $centerShop=CenterShop::query()->where('name','like',"%{$request->search}%")->get();
        $category=Category::query()->where('name','like',"%{$request->search}%")->get();

        return response()->json([
            'status'=>'ok',
            'data'=>[$protect,$centerShop,$category]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
