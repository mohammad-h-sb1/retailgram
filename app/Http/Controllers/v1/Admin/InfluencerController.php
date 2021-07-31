<?php

namespace App\Http\Controllers\v1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Front\InfluencerCollection;
use App\Models\Discount;
use App\Models\Influencer;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\In;

class InfluencerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $influencer=Influencer::all();
        return response()->json([
            'status'=>'ok',
            'data'=>InfluencerCollection::collection($influencer)
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
            'discount_id'=>$request->discount_id,
        ];
        $influ=Influencer::create($data);
        return response()->json([
            'status'=>'ok',
            'data'=>$influ
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Influencer  $influencer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $influencer=Influencer::query()->where('user_id',auth()->user()->id)->findOrFail($id);
        return response()->json([
            'status'=>'ok',
            'data'=>new InfluencerCollection($influencer)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Influencer  $influencer
     * @return \Illuminate\Http\Response
     */
    public function edit(Influencer $influencer)
    {
        return response()->json([
            'status'=>'ok',
            'data'=>new InfluencerCollection($influencer)
        ]);    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Influencer  $influencer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Influencer $influencer)
    {
        $data=[
            'user_id'=>auth()->user()->id,
            'discount_id'=>$request->discount_id,
        ];
        $influencer->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Influencer  $influencer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Influencer $influencer)
    {
        $influencer->delete();
    }

    public function NumberCodeUse($id)
    {
        if (auth()->user()->type === 'admin'){
            $influ=Influencer::query()->findOrFail($id);
            $discount=$influ->discount->where('influencers_id',$influ->id)->first();
            $payment=Payment::query()->where('discount_id',$discount->id)->where('status',1)->get();
            $count=count($payment);
            return response()->json([
                'status'=>'ok',
                'data'=>$count
            ]);
        }
        else {
            $influ = Influencer::query()->where('user_id', auth()->user()->id)->first();
            $discount = $influ->discount->where('influencers_id', $influ->id)->first();
            $payment = Payment::query()->where('discount_id', $discount->id)->where('status', 1)->get();
            $count = count($payment);
            return response()->json([
                'status' => 'ok',
                'data' => $count
            ]);
        }
    }

}
