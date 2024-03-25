<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BiodataController extends Controller
{
    public function biodata(Request $request){
        return view('user.biodata');
    }

    public function storePersoneDetails(Request $request){

    }
}
