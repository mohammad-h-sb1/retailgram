<?php

namespace App\Http\Controllers\v1\Front;

use App\Http\Controllers\Controller;
use App\Models\AboutRetilgram;
use Illuminate\Http\Request;

class AboutRetilgramController extends Controller
{
    public function create()
    {

    }
    public function store(Request $request)
    {
        $data=[
            'product_return'=>$request->product_return,
            'terms_of_use'=>$request->terms_of_use,
            'privacy'=>$request->privacy,
            'bug'=>$request->bug,
        ];
        $aboutRetilgram=AboutRetilgram::create($data);
        return response()->json($aboutRetilgram);
    }
}
