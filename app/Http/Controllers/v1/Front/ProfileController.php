<?php

namespace App\Http\Controllers\v1\Front;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\ProfileCollection;
use App\Http\Resources\Front\LikeCollection;
use App\Models\Like;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show(Profile $profile)
    {
        return response()->json([
            'status'=>'ok',
            'data'=>new ProfileCollection($profile)
        ]);
    }

    public function store(Request $request)
    {
        $data=[
            'user_id'=>auth()->user()->id,
            'description'=>$request->description,
            'address'=>$request->address,
            'birth'=>$request->birth
        ];
        $profile=Profile::create($data);
        return response()->json([
            'status'=>'ok',
            'data'=>new ProfileCollection($profile)
        ]);
    }

    public function edit(Profile $profile)
    {
        if (auth()->user()->id === $profile->user_id) {
            return response()->json([
                'status' => 'ok',
                'data' => new ProfileCollection($profile)
            ]);
        }
        else{
            return response()->json([
                'status'=>'Error',
                'massager'=>'شما دسترسی ندارید'
            ],403);        }
    }


    public function update(Request $request , Profile $profile)
    {
        if (auth()->user()->id === $profile->user_id) {
            $data = [
                'description' => $request->description,
                'address' => $request->address,
            ];
            $profile->update($data);
        }
        else{
            return response()->json([
                'status'=>'Error',
                'massager'=>'شما دسترسی ندارید'
            ],403);
        }
    }

    public function destroy(Profile $profile)
    {
        if (auth()->user()->type === 'admin' | auth()->user()->id === $profile->user_id) {
            $profile->delete();
        }
        else{
            return response()->json([
                'status'=>'Error',
                'massager'=>'شما دسترسی ندارید'
            ],403);        }
    }




}
