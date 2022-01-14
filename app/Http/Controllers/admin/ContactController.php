<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ContactController extends Controller
{
    public function contact() {

        $data['result'] = DB::table('contacts')->orderBy('id','desc')->get();

        return view('admin/contact/list',$data);
    }

   

        
    public function delete(Request $request ,$id) {

        DB::table('contacts')->where('id',$id)->delete();

        $request->session()->flash('msg','Contact Deleted');
        return redirect('/admin/contact/list');
    }

    
}
