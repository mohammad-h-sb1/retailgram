<?php

namespace App\Http\Controllers\v1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\ProfileCollection;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile=Profile::all();
        return response()->json([
            'status'=>'ok',
            'data'=>ProfileCollection::collection($profile),
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        return response()->json([
            'status'=>'ok',
            'data'=>new ProfileCollection($profile),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        if (auth()->user()->id === $profile->user_id | auth()->user()->type== 'admin'){
            return response()->json($profile);
        }
        return response()->json(403,'شما دسترسی نداید');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        if (auth()->user()->id === $profile->user_id | auth()->user()->type== 'admin') {
            $data = [
                'user_id' => auth()->user()->id,
                'description' => $request->description,
            ];
            $profile->update($data);
            return response()->json($profile);
        }
        return response()->json(403,'شما دسترسی ندارید');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        if (auth()->user()->id === $profile->user_id | auth()->user()->type== 'admin') {
            $profile->delete();
        }
        return response()->json($profile,'شما دسترسی ندارید');
    }

    public function favoriteList()
    {

    }
}
