<?php

namespace App\Http\Controllers\v1\Front;

use App\Http\Controllers\Controller;

use App\Http\Resources\Admin\UserCollection;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function login(Request $request)
    {
       $validData=$this->validate($request,[
           'mobile' => 'required|string|digits:11',
           'password' => 'required|string|min:6|',
       ]);
        if (! auth()->attempt($validData)){
            return response()->json([
                'status'=>'error',
                'data'=>'اطلاعات صحیح نیست'
            ],403);
        }
        auth()->user()->update([
            'api_token'=>Str::random(100)
        ]);

        return response()->json([
            'status'=>'ok',
            'data'=>new UserCollection(auth()->user())
        ]);
    }

    public function register(Request $request)
    {

        $validData=$this->validate($request,[
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|digits:11',
            'email' => '|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|',
            'gender' => 'required|',
            'state'=>'string',
        ]);
        $user=User::create([
            'name'=>$validData['name'],
            'email'=>$validData['email'],
            'password'=>bcrypt($validData['password']),
            'mobile'=>$validData['mobile'],
            'gender'=>$validData['gender'],
            'api_token'=>Str::random(100),
            'state'=>$request->state,
            'city_id'=>$request->city_id,
            'province_id'=>$request->province_id
        ]);


        return response()->json([
            'status'=>'ok',
            'data'=>new UserCollection($user),
        ]);
    }

    public function logout()
    {
        auth()->user()->update([
            'api_token'=>null
        ]);
        dd('yes');
    }
}
