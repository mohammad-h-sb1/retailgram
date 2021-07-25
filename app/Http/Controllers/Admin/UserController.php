<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\UserCollection;
use App\Http\Resources\Front\StyListCollection;
use App\Models\CustomerClub;
use App\Models\Influencer;
use App\Models\Stylist;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        return response()->json([
            'status'=>'ok',
            'data'=>UserCollection::collection($user)
        ]);
    }

    public function store(Request $request)
    {
        $data = [
            'name' => $request->name,
            'customer_id'=>1,
            'mobile' => $request->mobile,
            'type' => $request->type,
            'email' => $request->email,
            'gender' => $request->gender,
            'password' => Hash::make('password'),
            'api_token'=>Str::random(100),
        ];
        $user = User::create($data);
        $user->permissions()->sync($request->input('permissionLog'));
        if ($request->type === 'stylist'){
            $data=[
                'user_id'=>$user->id,
                'name'=>$request->name,
                'description'=>$request->description
            ] ;
            $stylist=Stylist::create($data);
            return response()->json([
                'status'=>'ok',
                'data'=>new StyListCollection($stylist)
            ]);
        }
        if ($request->type==='influenser'){
            $data=[
                'user_id'=>$user->id,
                'discount_id'=>$request->discount_id,
            ];
            $influ=Influencer::create($data);
            return response()->json([
                'status'=>'ok',
                'data'=>$influ
            ]);
        }
        return response()->json([
            'status'=>'ok',
            'data'=>new UserCollection($user)
        ]);
    }

    public function show(User $user)
    {
        return response()->json([
            'status'=>'ok',
            'data'=>new UserCollection($user)
        ]);
    }

    public function edit(User $user)
    {
        return response()->json([
            'status'=>'ok',
            'data'=>new UserCollection($user)
        ]);
    }

    public function update(Request $request, User $user)
    {
        $data = [
            'name' => $request->name,
            'mobile' => $request->mobile,
            'type' => $request->type,
            'email' => $request->email,
            'gender' => $request->gemder,
            'password' => Hash::make('password'),
        ];
        $user->update($data);
    }

    public function destroy(User $user)
    {
        $user->delete();
    }





}
