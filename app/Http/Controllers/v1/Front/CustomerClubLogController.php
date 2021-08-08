<?php

namespace App\Http\Controllers\v1\Front;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\CustomerClubCollection;
use App\Http\Resources\Front\CustomerClubLogCollection;
use App\Models\CustomerClub;
use App\Models\CustomerClubLog;
use Illuminate\Http\Request;

class CustomerClubLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customerClubLog=CustomerClubLog::all();
        $count=count($customerClubLog);
        return response()->json([
            'status'=>'ok',
            'data'=>[
                'customerClubLog'=>CustomerClubLogCollection::collection($customerClubLog),
                'count'=>$count
            ]
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
     * @param  \App\Models\CustomerClubLog  $customerClubLog
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $customerClubLog=CustomerClubLog::query()
            ->where('user_id',auth()->user()->id)
            ->first();
         $customerClub=$customerClubLog->customerClubs;
         return response()->json([
             'status'=>'ok',
             'data'=>[
                 'customerClub'=>CustomerClubCollection::collection($customerClub),
                 'user_rating'=>auth()->user()->rating
             ],
         ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CustomerClubLog  $customerClubLog
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomerClubLog $customerClubLog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CustomerClubLog  $customerClubLog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CustomerClubLog $customerClubLog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CustomerClubLog  $customerClubLog
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomerClubLog $customerClubLog)
    {
        if (auth()->user()->type === 'admin'){
            $customerClubLog->delete();
        }
        elseif ($customerClubLog->user_id === auth()->user()->id){
            $customerClubLog->delete();
        }
        else{
           return  response()->json([
              'status'=>'Error',
              'massage'=>'شما دسترسی نداری'
           ],403);
        }
    }


    public function addToLevelClub($id)
    {
        $customerClub=CustomerClub::query()
            ->where('id',$id)
            ->pluck('rating'
            )->first();
        if (auth()->user()->rating >= $customerClub){
            $data=[
                'user_id'=>auth()->user()->id,
                'customer_club_id'=>$id,
                'user_rating'=>auth()->user()->rating,
            ];
            $customerClubLog=CustomerClubLog::create($data);
            return response()->json([
               'status'=>'ok',
               'data'=>new CustomerClubLogCollection($customerClubLog)
            ],201);
        }
        else{
            return response()->json([
                'status'=>'Error',
                'massager'=>'شما دسترسی ندارید'
            ],403);
        }

    }
}
