<?php

namespace App\Http\Controllers\v1\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImageStore;
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
        auth()->loginUsingId(1);
        $img=Image::query()->where('user_id',auth()->user()->id)->get();
        if ($img == true){
            return response()->json([
                'status'=>'ok',
                'data'=>ImageCollection::collection($img)
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
    public function store(ImageStore $request,Filesystem $filesystem)
    {
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
            'profile_id'=>$request->profile_id,
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $img)
    {
        if ($img->user_id === auth()->user()->id) {
            return response()->json([
                'status' => 'ok',
                'data' => new ImageCollection($img)
            ]);
        }
        else{
            return response()->json([
                'status'=>'Error',
                'massage'=>new ImageCollection($img)
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $img)
    {
        if ($img->user_id === auth()->user()->id) {
            return response()->json([
                'status' => 'ok',
                'data' => new ImageCollection($img)
            ]);
        }
        else {
            return response()->json([
                'status' => 'Error',
                'massage' => new ImageCollection($img)
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(ImageStore $request, Image $img,Filesystem $filesystem)
    {
        auth()->loginUsingId(1);
        dd($request->file('image'));
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
            'category_id'=>$request->category_id,
            'url'=>$address
        ];
        $img->update($data);
        return response([
            'status"ok',
            'data'=>[
                'collection'=>new ImageCollection($a),
                'image'=>url("{$imagePath}/{$fileName}",),
            ],
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $img)
    {
        auth()->loginUsingId(1);
        if (auth()->user()->id === $img->user_id){
            $img->delete();
        }
        else{
            return response()->json([
                'status'=>'Error',
                'massage'=>'شمادسترسی ندارید'
            ],403);
        }
    }
}
