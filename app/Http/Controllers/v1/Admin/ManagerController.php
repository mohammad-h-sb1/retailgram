<?php

namespace App\Http\Controllers\v1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\CommentCollection;
use App\Http\Resources\Front\ManagerCollection;
use App\Models\Comment;
use App\Models\Manager;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manager=Manager::all();
        return response()->json([
            'status'=>'ok',
            'data'=>ManagerCollection::collection($manager)
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

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function show(Manager $manager)
    {
        return response()->json([
            'status'=>'ok',
            'manager'=>new ManagerCollection($manager)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function edit(Manager $manager)
    {
        return response()->json([
            'status'=>'ok',
            'manager'=>new ManagerCollection($manager)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Manager $manager)
    {
        $data=[
            'name'=>$request->name,
        ];
        $manager->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manager $manager)
    {
        $manager->delete();
    }

    public function activityComment($id)
    {
        $manager=Manager::query()->where('id',$id)->pluck('id')->first();
        $comments=Comment::query()->where('manager_id',$manager)->get();
        $count=count($comments);

        return response()->json([
            'status'=>'ok',
            'data'=>[
                'comment'=>CommentCollection::collection($comments),
                'countActive'=>$count
            ]
        ]);

    }
}
