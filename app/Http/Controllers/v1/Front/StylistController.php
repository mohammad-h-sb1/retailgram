<?php

namespace App\Http\Controllers\v1\Front;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\DiscountCollection;
use App\Http\Resources\Front\StyListCollection;
use App\Models\Stylist;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class  StylistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stylist=Stylist::all();
        return response()->json([
            'status'=>'ok',
            'data'=>StyListCollection::collection($stylist)
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
            'user_id'=>$request->user_id,
            'name'=>$request->name,
            'description'=>$request->description,
        ];
        $stylist=Stylist::create($data);
        return response()->json([
            'status'=>'ok',
            'data'=>new StyListCollection($stylist)
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stylist  $stylist
     * @return \Illuminate\Http\Response
     */
    public function show(Stylist $stylist)
    {
        if (auth()->user()->id == $stylist->user_id){
            return response()->json([
               'status'=>'ok',
               'data'=>new StyListCollection($stylist)
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
     * @param  \App\Models\Stylist  $stylist
     * @return \Illuminate\Http\Response
     */
    public function edit(Stylist $stylist)
    {
        if (auth()->user()->id == $stylist->user_id){
            return response()->json([
                'status'=>'ok',
                'data'=>new StyListCollection($stylist)
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
     * @param  \App\Models\Stylist  $stylist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stylist $stylist)
    {
        $data=[
            'name'=>$request->name,
            'description'=>$request->description
        ];
        $stylist->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stylist  $stylist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stylist $stylist)
    {

    }

    public function numberProducts()
    {

    }
}
