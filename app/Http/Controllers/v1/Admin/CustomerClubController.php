<?php

namespace App\Http\Controllers\v1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\CustomerClubCollection;
use App\Models\CustomerClub;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerClubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $club=CustomerClub::all();
        return response()->json([
            'status'=>'ok',
            'data'=>CustomerClubCollection::collection($club)
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
            'name'=>$request->name,
            'rating'=>$request->rating,
        ];
        $club=CustomerClub::create($data);
        return response()->json($club);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CustomerClub  $customerClub
     * @return \Illuminate\Http\Response
     */
    public function show(CustomerClub $customerClub)
    {
        return response()->json([
            'status'=>'ok',
            'data'=>new CustomerClubCollection($customerClub)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CustomerClub  $customerClub
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomerClub $customerClub)
    {
        return response()->json($customerClub);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CustomerClub  $customerClub
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CustomerClub $customerClub)
    {
        $data=[
            'user_id'=>auth()->user()->id,
            'user_rating'=>$request->user_rating,
            'name'=>$request->user_rating,
            'rating'=>$request->rating,
        ];
        $customerClub->update($data);
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CustomerClub  $customerClub
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomerClub $customerClub)
    {
        $customerClub->delete();
        return response()->json($customerClub);
    }

    public function addToLevelClub(CustomerClub $customerClub)
    {
        auth()->loginUsingId(1);


        if (auth()->user()->rating > $customerClub->golden_level())
        {
            $user=User::query()->where('id',auth()->user()->id)->pluck('rating_level');
            $user->rating_level='golden_level';
            dd($user);
        }
        elseif (auth()->user()->rating > $customerClub->silver_level())
        {
            $data=[
                'user_id'=>auth()->user()->id,
                'level'=>$customerClub->silver_level,
            ];
            return response()->json($data);
        }
        elseif (auth()->user()->rating > $customerClub->bronze_level()){
            $data=[
                'user_id'=>auth()->user()->id,
                'level'=>$customerClub->bronze_level,
            ];
            return response()->json($data);
        }
        else{
             $data=[
                'user_id'=>auth()->user()->id,
                'level'=>$customerClub->normal_level(),
            ];
            return response()->json($data);
        }
    }


}
