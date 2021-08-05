<?php

namespace App\Http\Controllers\v1\Front;

use App\Http\Controllers\Controller;
use App\Http\Resources\Front\FavoriteListCollection;
use App\Models\favoriteList;
use App\Models\Product;
use Illuminate\Http\Request;

class FavoriteListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $favorite=FavoriteList::query()->where('user_id',auth()->user()->id)->get();
        $count=count($favorite);
        return response()->json([
            'status'=>'ok',
            'data'=>[
                'favorite'=>FavoriteListCollection::collection($favorite),
                'count'=>$count
            ]
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
            'user_id'=>auth()->user()->id,
            'category_id'=>$request->category_id,
            'product_id'=>$request->product_id
        ];
        $favorite=FavoriteList::create($data);
        return response()->json([
            'status'=>'ok',
            'status'=>new FavoriteListCollection($favorite)
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\favoriteList  $favoriteList
     * @return \Illuminate\Http\Response
     */
    public function show(favoriteList $favoriteList)
    {
        if ($favoriteList->user_id === auth()->user()->id){
            return response()->json([
                'status'=>'ok',
                'data'=>new FavoriteListCollection($favoriteList)
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
     * @param  \App\Models\favoriteList  $favoriteList
     * @return \Illuminate\Http\Response
     */
    public function edit(favoriteList $favoriteList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\favoriteList  $favoriteList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, favoriteList $favoriteList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\favoriteList  $favoriteList
     * @return \Illuminate\Http\Response
     */
    public function destroy(favoriteList $favoriteList)
    {
        if ($favoriteList->user_id === auth()->user()->id){
            $favoriteList->delete();
        }
        else{
            return response()->json([
                'status'=>'Error',
                'massage'=>'شما دسترسی ندارید'
            ]);
        }
    }
}
