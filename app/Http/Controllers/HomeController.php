<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    public function index(){
        $moive = DB::table('moives')->latest('id')->get();
        // dd($post);

        return view('home', compact('moive'));
    }

    
}
