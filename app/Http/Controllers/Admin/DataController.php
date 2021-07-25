<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Data\DataStore;
use App\Http\Resources\Admin\DataCollection;
use App\Models\Data;
use Illuminate\Http\Request;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data=Data::all();
        return response()->json([
            'status'=>'oky',
            'data'=>DataCollection::collection($data),
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
    public function store(DataStore $request)
    {
        auth()->loginUsingId(1);
        if (auth()->user()->type === 'admin') {
            $information = [
                'user_id' => auth()->user()->id,
                'telegram' => $request->telegram,
                'instagram' => $request->instagram,
                'whatsapp' => $request->whatsapp,
                'phone' => $request->phone,
                'mobile' => $request->mobile,
                'address' => $request->address,
            ];
            $data = Data::create($information);
            return response()->json([
                'status'=>'ok',
                'data'=>new DataCollection($data),
            ]);
        }
        else {
            return response()->json([
                'status'=>'Error',
                'massage'=>'شما دسترسی ندارید'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function show(Data $data)
    {
        return response()->json([
            'status'=>'ok',
            'data'=>new DataCollection($data),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function edit(Data $data)
    {
        if (auth()->user()->type === 'admin') {
            return response()->json([
                'status' => 'ok',
                'data' => new DataCollection($data)
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
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function update(DataStore $request, Data $data)
    {
        auth()->loginUsingId(1);
        if (auth()->user()->type === 'admin') {
            $information = [
                'user_id' => auth()->user()->id,
                'telegram' => $request->telegram,
                'instagram' => $request->instagram,
                'whatsapp' => $request->whatsapp,
                'phone' => $request->phone,
                'mobile' => $request->mobile,
                'address' => $request->address,
            ];
            $data->update($information);
        }
        else{
            return response()->json([
                'status'=>'Error',
                'massage'=>'شما دسترسی ندارید'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function destroy(Data $data)
    {
        if (auth()->user()->type === 'admin'){
            $data->delete();
        }
        else{
            return response()->json([
                'status'=>'Error',
                'massage'=>'شما دسترسی ندارید'
            ]);
        }
    }
    public function status($id,Request $request)
    {
        auth()->loginUsingId(1);

        if (auth()->user()->type === 'admin'| auth()->user()->type === 'manager') {
            $status = Data::query()->findOrFail($id);
            $status->update([
                    'status' => !$status->status,
                ]
            );
            return response()->json([
                'status'=>'ok',
                'data'=>new DataCollection($status)
            ]);
        }
        else{
            return response()->json([
                'status'=>'Error',
                'massage'=>'شما دست رسی ندارید'
            ],403);
        }
    }



}
