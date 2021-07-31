<?php

namespace App\Http\Controllers\v1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CenterShop\CenterShopStore;
use App\Http\Requests\CenterShop\CenterShopUpdate;
use App\Http\Resources\Admin\CenterShopCollection;
use App\Http\Resources\Admin\UserCollection;
use App\Models\CenterShop;
use App\Models\Product;
use App\Models\ProductSold;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class CenterShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $centerShop=CenterShop::all();
        //برند های فعال
        $Active=$centerShop->where('status',1);
        $countActive=count($Active);

        //برند های غیز فعال
        $Inactive=$centerShop->where('status',0);
        $countInactive=count($Inactive);

        return response()->json([
            'status'=>'ok',
            'data'=>[
                'centerShops'=>CenterShopCollection::collection($centerShop),
                'countActive'=>$countActive,
                'countInactive'=>$countInactive
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
    public function store(CenterShopStore $request)
    {
        $data=[
            'user_id'=>auth()->user()->id,
            'name'=>$request->name,
            'central_address'=>$request->central_address,
            'central_phone'=>$request->central_phone,
            'description'=>$request->description,
        ];
        $center=CenterShop::create($data);
        return response()->json([
            'status'=>'ok',
            'data'=>new CenterShopCollection($center)
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

        return response()->json([
            'status'=>'ok',
            'data'=>new CenterShopCollection($centerShop)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CenterShop  $centerShop
     * @return \Illuminate\Http\Response
     */
    public function edit(CenterShop $centerShop)
    {
        return response()->json([
            'status'=>'ok',
            'data'=>new CenterShopCollection($centerShop)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CenterShop  $centerShop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CenterShop $centerShop)
    {
        $data=[
            'user_id'=>auth()->user()->id,
            'name'=>$request->name,
            'central_address'=>$request->central_address,
            'central_phone'=>$request->central_phone,
            'description'=>$request->description,
        ];
        $centerShop->update($data);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CenterShop  $centerShop
     * @return \Illuminate\Http\Response
     */
    public function destroy(CenterShop $centerShop)
    {
        $centerShop->delete();
    }

    public function status($id)
    {

        $center=CenterShop::query()->findOrFail($id);
        $center->update([
                'status'=> !$center->status ,
            ]
        );
        if ($center->status == 1){
            $center->user()->update([
                'type'=>'admin_center'
            ]);
            return response()->json([
                'status'=>'ok',
                'massage'=>'یوزر به ادمین برند ها اضافه شد'
            ]);

        }
        else{
            $center->user()->update([
                'type'=>'user'
            ]);
            return response()->json([
                'status'=>'ok',
                'massage'=>'یوزر از ادمینی برند برکنار شد'
            ]);
        }
    }

    public function allProductBrand($id)
    {
        //پست های فعال این برند
        $brand=CenterShop::query()->findOrFail($id);
        $productActive=$brand->products->where('status',1);
        $countActive=count($productActive);

        //پست های  غیر فعال برند
        $productInactive=$brand->products->where('status',0);
        $countInactive=count($productInactive);
        return response()->json([
            'status'=>'ok',
            'data'=>[
                'countActive'=>$countActive,
                'countInactive'=>$countInactive
            ]
        ]);
    }

    //اجناس فروخته شده برند
    public function salesByBrand($id)
    {
        $brand=CenterShop::query()->where('id',$id)->first();
        $product=$brand->products;
        $productSold=ProductSold::query()->whereIn('product_id',$product)->where('status',1)->get();
        $count=count($productSold);
        return response()->json([
            'status'=>'ok',
            'data'=>$count
        ]);
    }

}
