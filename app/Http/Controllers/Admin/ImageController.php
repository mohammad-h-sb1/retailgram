<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Front\ImageCollection;
use App\Models\Image;
use Carbon\Carbon;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        auth()->loginUsingId(2);
        if (auth()->user()->type === 'admin'){
            $img=Image::all();
        }
        else{
            $img=Image::query()->where('user_id',auth()->user()->id)->get();
        };
        return response()->json([
            'status'=>'ok',
            'data'=>ImageCollection::collection($img)
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
    public function store(Request $request,Filesystem $filesystem)
    {

        auth()->loginUsingId(1);
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
            'product_id'=>$request->product_id,
            'profile_id'=>$request->profile_id,
            'centerShop_id'=>$request->centerShop_id,
            'url'=>$address
        ];
        if (auth()->user()->type ==='admin') {
            $data['category_id'] = $request->category_id;
        }
        if (auth()->user()->type === 'stylist'){
            $data['styList_id']=$request->styList_id;
        }
        $a=Image::create($data);
        return response([
            'status"ok',
            'data'=>[
                'collection'=>new ImageCollection($a),
                'image'=>url("{$imagePath}/{$fileName}",),
            ],
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        auth()->loginUsingId(2);
        if (auth()->user()->type=== 'admin'){
            return response()->json([
                'status'=>'Error',
                'data'=>new ImageCollection($image)
            ]);
        }
        elseif (auth()->user()->type === 'admin_center'){
            if ($image->user_id === auth()->user()->id) {
                return response()->json([
                    'status' => 'Error',
                    'data' => new ImageCollection($image)
                ]);
            }
            else{
                return response()->json([
                    'status'=>'Error',
                    'massage'=>'شما دسترسی ندارید'
                ],403);
            }
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    public function destroy(Image $image)
    {
        if ($image->user_id === auth()->user()->id){
            $image->delete();
        }
        else{
            return response()->json([
                'status'=>'Error',
                'massage'=>'شما دسترسی ندارید'
            ],403);
        }
    }
}
