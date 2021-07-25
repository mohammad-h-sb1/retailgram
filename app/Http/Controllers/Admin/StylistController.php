<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Front\SearchCollection;
use App\Http\Resources\Front\StyListCollection;
use App\Models\Stylist;
use Illuminate\Http\Request;

class StylistController extends Controller
{
    public function index()
    {
        $stylist=Stylist::all();
        return response()->json([
            'status'=>'ok',
            'data'=>StyListCollection::collection($stylist)
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
}
