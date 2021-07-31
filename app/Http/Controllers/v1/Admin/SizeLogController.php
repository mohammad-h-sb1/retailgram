<?php

namespace App\Http\Controllers\v1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Front\SizeLogCollection;
use App\Models\SizeLog;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SizeLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sizeLog=SizeLog::all();
        return response()->json([
           'data'=>SizeLogCollection::collection($sizeLog)
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
            'size_id'=>$request->size_id,
            'size'=>$request->size
        ];
        $sizeLog=SizeLog::create($data);
        return response()->json([
            'status'=>'ok',
            'data'=>new SizeLogCollection($sizeLog)
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SizeLog  $sizeLog
     * @return \Illuminate\Http\Response
     */
    public function show(SizeLog $sizeLog)
    {
        if ($sizeLog->user_id == auth()->user()->id){
            return response()->json([
                'status'=>'ok',
                'data'=>new SizeLogCollection($sizeLog)
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
     * @param  \App\Models\SizeLog  $sizeLog
     * @return \Illuminate\Http\Response
     */
    public function edit(SizeLog $sizeLog)
    {
        if ($sizeLog->user_id == auth()->user()->id){
            return response()->json([
                'status'=>'ok',
                'data'=>new SizeLogCollection($sizeLog)
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
     * @param  \App\Models\SizeLog  $sizeLog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SizeLog $sizeLog)
    {
        if ($sizeLog->user_id == auth()->user()->id){
            $data=[
                'user_id'=>auth()->user()->id,
                'size_id'=>$request->size_id,
                'size'=>$request->size
            ];
            $sizeLog->update($data);
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
     * @param  \App\Models\SizeLog  $sizeLog
     * @return \Illuminate\Http\Response
     */
    public function destroy(SizeLog $sizeLog)
    {
        if ($sizeLog->user_id == auth()->user()->id){
            $sizeLog->delete();
        }
        else{
            return response()->json([
                'status'=>'Error',
                'massage'=>'شما دسترسی ندارید'
            ]);
        }
    }
}
