<?php

namespace App\Http\Controllers\v1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\UserCollection;
use App\Http\Resources\Front\StyListCollection;
use App\Models\CustomerClub;
use App\Models\Influencer;
use App\Models\Manager;
use App\Models\ProductSold;
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
        $count=count($user);
        return response()->json([
            'status'=>'ok',
            'data'=>[
                'user'=>UserCollection::collection($user),
                'count'=>$count
            ]
        ]);
    }

    public function store(Request $request)
    {


        $validData=$this->validate($request,[
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|digits:11',
            'email' => '|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|',
            'type' => 'required',
            'gender' => 'required|',
            'state'=>'string',
        ]);

        $user=User::create([
            'name'=>$validData['name'],
            'email'=>$validData['email'],
            'password'=>bcrypt($validData['password']),
            'mobile'=>$validData['mobile'],
            'gender'=>$validData['gender'],
            'type' => $request->type,
            'api_token'=>Str::random(100),
            'state'=>$request->state,
            'city_id'=>$request->city_id,
            'province_id'=>$request->province_id
        ]);
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

        if ($request->type === 'manager'){
            $data=[
                'user_id'=>$user->id,
                'name'=>$request->name,
            ];
            $manager=Manager::create($data);
            return response()->json([
                'status'=>'ok',
                'data'=>$manager
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


    //اجناسی که یوزر خریده
    public function buyUser($id)
    {
        $user=User::query()->findOrFail($id);
        $productSold=$user->productsSold->where('status',1);
        $count=count($productSold);
        $countProduct=$productSold->sum('count');
        $total_price=ProductSold::query()->where('user_id',$id)->sum('total_price');
        return response()->json([
            'status'=>'ok',
            'data'=>[
                'count'=>$count,
                'countProduct'=>$countProduct,
                'total_price'=>$total_price
            ]
        ]);
    }

}
