<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class FrontController extends Controller
{
    
    public function home () {

        return view('front/home');
    }

    public function post() {

        return view('front.post');
    }


    public function homeData() {

        $data['result'] = DB::table('posts')->orderBy('id','desc')->get();

        return view('front/home',$data);
    }
}
