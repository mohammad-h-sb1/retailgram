<?php

namespace App\Http\Controllers\v1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Front\SearchCollection;
use App\Http\Resources\Front\StyListCollection;
use App\Http\Resources\Front\StyListProductCollection;
use App\Models\Stylist;
use App\Models\StylistProduct;
use App\Models\User;
use Illuminate\Http\Request;

class StylistController extends Controller
{
    public function index()
    {
        $stylist=Stylist::all();
        $count=count($stylist);
        return response()->json([
            'status'=>'ok',
            'data'=>[
                'stylist'=>StyListCollection::collection($stylist),
                'count'=>$count
            ]
        ]);
    }

    public function show(Stylist $stylist)
    {
        return response()->json([
            'status'=>'ok',
            'data'=>new StyListCollection($stylist)
        ]);
    }

    public function store(Request $request)
    {

       $data=[
           'user_id'=>auth()->user()->id,
           'name'=>$request->name,
           'description'=>$request->description
       ] ;
       $stylist=Stylist::create($data);
       return response()->json([
           'status'=>'ok',
           'data'=>new StyListCollection($stylist)
       ]);
    }

    public function delete(Stylist $stylist)
    {
        $stylist->delete();
    }

    public function stylistActivity($id)
    {
       $user=User::query()->where('id',$id)->first();
       $stylist=$user->stylists->where('user_id',$user->id)->first();
       $stylistProduct=$stylist->StylistProduct->where('stylist_id',$stylist->id)->get();
       $count=count($stylistProduct);
       return response()->json([
           'status'=>'ok',
           'data'=>[
               'stylist'=>new StyListCollection($stylist),
               'stylistProduct'=>StyListProductCollection::collection($stylistProduct),
               'count'=>$count
           ]
       ]);
    }
}
