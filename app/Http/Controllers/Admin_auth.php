<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Admin_auth extends Controller
{
    
    public function login() {

        return view('admin/login');
    }

    public function post() {

        return view('admin.post/list');
    }

    public function addpost() {

        return view('admin/post/add');
    }
}
