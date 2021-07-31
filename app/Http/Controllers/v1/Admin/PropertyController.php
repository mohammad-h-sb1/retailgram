<?php

namespace App\Http\Controllers\v1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Front\PropertyCollection;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $property=Property::all();
        return response()->json([
            'status'=>'ok',
            'data'=>PropertyCollection::collection($property)
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
            'tag_id'=>$request->tag_id,
            'key'=>$request->ket,
            'value'=>$request->value,
        ];
        $property=Property::create($data);
        return response()->json([
            'status'=>'ok',
            'data'=>new PropertyCollection($property)
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        return response()->json([
            'status'=>'ok',
            'data'=>new PropertyCollection($property)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {
        return response()->json([
            'status'=>'ok',
            'data'=>new PropertyCollection($property)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Property $property)
    {
        $data=[
            'tag_id'=>$request->tag_id,
            'key'=>$request->ket,
            'value'=>$request->value,
        ];
        $property->update($data);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        $property->delete();
    }
}
