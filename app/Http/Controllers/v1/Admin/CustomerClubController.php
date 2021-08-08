<?php

namespace App\Http\Controllers\v1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\CustomerClubCollection;
use App\Http\Resources\Front\CustomerClubLogCollection;
use App\Models\CustomerClub;
use App\Models\CustomerClubLog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
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
            'user'=>auth()->user()->id,
            'name'=>$request->name,
            'type'=>$request->type,
            'rating'=>$request->rating,
        ];

        $club=CustomerClub::create($data);
        return response()->json([
            'status'=>'ok',
            'data'=>new CustomerClubCollection($club)
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CustomerClub  $customerClub
     * @return \Illuminate\Http\Response
     */
    public function show(CustomerClub $customerClub)
    {
        $customerClubLog=CustomerClubLog::query()->where('customer_club_id',$customerClub->id)->get();
        $count=count($customerClubLog);

        return response()->json([
            'status'=>'ok',
            'data'=>[
                'customerClub'=>new CustomerClubCollection($customerClub),
                'customerClubLog'=>CustomerClubLogCollection::collection($customerClubLog),
                'count'=>$count
            ]
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
        return response()->json([
            'status'=>'ok',
            'data'=>new CustomerClubCollection($customerClub),
        ]);

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
            'user'=>auth()->user()->id,
            'name'=>$request->name,
            'type'=>$request->type,
            'rating'=>$request->rating,
        ];
        $customerClub->update($data);

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
    }




}
