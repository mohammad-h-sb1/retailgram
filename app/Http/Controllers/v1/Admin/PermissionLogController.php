<?php

namespace App\Http\Controllers\v1\dmin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\PermissionLogCollection;
use App\Models\PermissionLog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PermissionLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user= User::all();
        dd($user->permissions);
        return response()->json([
            'status'=>'ok',
            'data'=>$user->permissions
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
            'user_id'=>$request->user_id,
            'permission_id'=>$request->permission_id
        ];
        $permissionLog=PermissionLog::create($data);
        return response()->json([
            'status'=>'ok',
            'data'=> new PermissionLogCollection($permissionLog)
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PermissionLog  $permissionLog
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {

        return response()->json([
            'status'=>'ok',
            'data'=>$user->permissions
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PermissionLog  $permissionLog
     * @return \Illuminate\Http\Response
     */
    public function edit(PermissionLog $permissionLog)
    {
        return response()->json([
            'status'=>'ok',
            'data'=>new PermissionLogCollection($permissionLog)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PermissionLog  $permissionLog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PermissionLog $permissionLog)
    {
        $data=[
            'user_id'=>$request->user_id,
            'permission_id'=>$request->permission_id
        ];
        $permissionLog->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PermissionLog  $permissionLog
     * @return \Illuminate\Http\Response
     */
    public function destroy(PermissionLog $permissionLog)
    {
        $permissionLog->delete();
    }
}
