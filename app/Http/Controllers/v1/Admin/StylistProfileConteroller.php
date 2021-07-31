<?php

namespace App\Http\Controllers\v1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Front\ImageCollection;
use App\Http\Resources\Front\StyListCollection;
use App\Http\Resources\Front\StyListProductCollection;
use App\Models\Image;
use App\Models\Stylist;
use App\Models\StylistProduct;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Filesystem\Filesystem;

class StylistProfileConteroller extends Controller
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
    public function store(Request $request,Filesystem $filesystem)
    {
        $stylist=Stylist::query()->where('user_id',auth()->user()->id)->first();
        if ($stylist == true){
            $file=$request->file('image');
            $year=Carbon::now()->year;
            $month=Carbon::now()->month;
            $day=Carbon::now()->day;
            $imagePath="/upload/image/{$year}/{$month}/{$day}";
            $fileName=$file->getClientOriginalName();
            if ($filesystem->exists(public_path("{$imagePath}/{$fileName}"))){
                $fileName=Carbon::now()->timespan()."-{$fileName}";
            }
            $address=$imagePath.$fileName;
            $file->move(public_path($address));
            $data=[
                'user_id'=>auth()->user()->id,
                'styList_id'=>$stylist->id,
                'url'=>$address
            ];
            $a=Image::create($data);
            return response([
                'status"ok',
                'data'=>[
                    'collection'=>new ImageCollection($a),
                    'image'=>url("{$imagePath}/{$fileName}",),
                ],
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $img=Image::query()->where('styList_id',$id)->where('user_id',auth()->user()->id)->first();
        if ($img == true){
            return response()->json([
                'status'=>'ok',
                'data'=>[
                    'collection'=>new ImageCollection($img),
                ]
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stylist=Stylist::query()->where('id',$id)->where('user_id',auth()->user()->id)->first();
        if ($stylist == true){
            return response()->json([
                'status'=>'ok',
                'data'=>new StyListCollection($stylist)
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        $image->where('user_id',auth()->user())->first();
        if ($image == true){
            $image->delete();
        }
        else{
            return response()->json([
                'status'=>'Error',
                'massage'=>'شما دسترسی ندارید'
            ]);
        }
    }

    //این فاکشن برای اینکه استایل لیست بدونه چقدر نظر داده
    public function count_the_number_of_comments()
    {
        $stylist=Stylist::query()->where('user_id',auth()->user()->id)->first();
        $stylistProduct=$stylist->StylistProduct->where('stylist_id',$stylist->id)->get();
        $count=count($stylistProduct);
        return response()->json([
            'status'=>'ok',
            'data'=>[
                'comment'=>StyListProductCollection::collection($stylistProduct),
                'count'=>$count
            ]
        ]);

    }


}
