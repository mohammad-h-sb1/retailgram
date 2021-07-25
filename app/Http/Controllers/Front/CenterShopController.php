<?php

namespace App\Http\Controllers\Front;

use App\Http\Requests\CenterShop\CenterShopStore;
use App\Http\Requests\CenterShop\CenterShopUpdate;
use App\Http\Resources\Admin\CategoryCollection;
use App\Http\Resources\Front\CenterShopCollection;
use App\Models\CenterShop;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Routing\Controller;

class CenterShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $centerShop=CenterShop::query()->where('status',1)->get();
        return response()->json([
            'status'=>'ok',
            'data'=>CenterShopCollection::collection($centerShop),
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
    public function store(CenterShopStore $request)
    {
       $data=[
           'user_id'=>auth()->user()->id,
           'name'=>$request->name,
           'central_address'=>$request->central_address,
           'central_phone'=>$request->central_phone,
           'description'=>$request->description,
       ];
       $centerShop=CenterShop::create($data);
       return response()->json([
           'status'=>'ok',
           'data'=>new CenterShopCollection($centerShop)
       ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CenterShop  $centerShop
     * @return \Illuminate\Http\Response
     */
    public function show(CenterShop $centerShop)
    {
        if ($centerShop->status == 1) {
            return response()->json([
                'status' => 'ok',
                'data' => new CenterShopCollection($centerShop)
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
     * @param  \App\Models\CenterShop  $centerShop
     * @return \Illuminate\Http\Response
     */
    public function edit(CenterShop $centerShop)
    {
        if ($centerShop->user_id == auth()->user()->id){
            return response()->json([
                'status' => 'ok',
                'data' => new CenterShopCollection($centerShop)
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
     * @param  \App\Models\CenterShop  $centerShop
     * @return \Illuminate\Http\Response
     */
    public function update(CenterShopUpdate $request, CenterShop $centerShop)
    {
        if ($centerShop->user_id == auth()->user()->id){
            $data=[
                'user_id'=>auth()->user()->id,
                'name'=>$request->name,
                'central_address'=>$request->central_address,
                'central_phone'=>$request->central_phone,
                'description'=>$request->description,
            ];
            $centerShop->update($data);
            dd('yes');
        }
        else{
            return response()->json([
                'status'=>'Error',
                'massage'=>'شما دسترسی ندارید'
            ],403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CenterShop  $centerShop
     * @return \Illuminate\Http\Response
     */
    public function destroy(CenterShop $centerShop)
    {
        if($centerShop->user_id == auth()->user()->id){
            $centerShop->delete();
        }
        else{
            return response()->json([
                'status'=>'Error',
                'massage'=>'شما دسترسی ندارید'
            ],403);
        }
    }
}
