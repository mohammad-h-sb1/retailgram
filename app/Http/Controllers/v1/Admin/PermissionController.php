<?php

namespace App\Http\Controllers\v1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\PermissionCollection;
use App\Http\Resources\Admin\UserCollection;
use App\Models\Permission;
use App\Models\PermissionLog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (auth()->user()->type ==='admin'){
            $permission=Permission::all();
            return response()->json([
                'status'=>'ok',
                'data'=>PermissionCollection::collection($permission)
            ]);
        }
        else{
            $permission=Permission::query()->where('type',auth()->user()->type)->get();
            return response()->json([
                'status'=>'ok',
                'data'=>PermissionCollection::collection($permission)
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
    public function store(Request $request)
    {
        auth()->loginUsingId(1);
        if (auth()->user()->type==='admin'){
            $data=[
                'name'=>$request->name,
                'code'=>$request->code,
                'type'=>$request->type,
            ];
            $permission=Permission::create($data);
            return response()->json([
                'status'=>'ok',
                'data'=>new PermissionCollection($permission)
            ]);
        }
        else{
            return response()->json([
                'status'=>'Error',
                'massage'=>'شمادسترسی ندارید'
            ],403);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        auth()->loginUsingId(3);
        if (auth()->user()->type === 'admin' | auth()->user()->type === $permission->type){
            return response()->json([
                'status'=>'ok',
                'data'=>new PermissionCollection($permission)
            ]);
        }
        else{
            return response()->json([
                'status'=>'Error',
                'manager'=>'شما دسترسی ندارید'
            ],402);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        auth()->loginUsingId(3);
        if (auth()->user()->type ==='admin'){
            return response()->json([
                'status'=>'ok',
                'data'=>new PermissionCollection($permission)
            ]);
        }
        else{
            return response()->json([
                'status'=>'Error',
                'manager'=>'شما دسترسی ندارید'
            ],402);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        auth()->loginUsingId(1);
        if (auth()->user()->type === 'admin'){
            $data=[
                'name'=>$request->name,
                'code'=>$request->code,
                'type'=>$request->type,
            ];
            $permission->update($data);
        }
        else{
            return response()->json([
                'status'=>'Error',
                'manager'=>'شما دسترسی ندارید'
            ],402);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        auth()->loginUsingId(1);
        if (auth()->user()->type === 'admin'){
            $permission->delete();
        }
        else{
            return response()->json([
                'status'=>'Error',
                'manager'=>'شما دسترسی ندارید'
            ],402);
        }
    }

    public function showNumberPermission($id)
    {
       $user=User::query()->where('id',$id)->first();
       $permissionLog=PermissionLog::query()->whereIn('user_id',$user)->pluck('id');
       $permission=Permission::query()->whereIn('id',$permissionLog)->get();
       $count=count($permissionLog);
       return response()->json([
           'status'=>'ok',
           'data'=>[
               'user'=>new UserCollection($user),
               'permission'=>PermissionCollection::collection($permission),
               'count'=>$count
           ]
       ]);
    }
}
