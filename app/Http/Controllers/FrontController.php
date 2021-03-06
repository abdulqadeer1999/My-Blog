<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class FrontController extends Controller
{
    
    // public function home () {

    //     return view('front/home');
    
    // }

    


    public function homeData() {

        $data['result'] = DB::table('posts')->orderBy('id','desc')->get();

        return view('front/home',$data);
    }


    public function post($id) {

        $data['result'] = DB::table('posts')->where('slug',$id)->get();
        return view('front/post',$data);

    }


    public static function page_menu() {

        $result = DB::table('pages')->where('status',1)->get();
        return $result;
    }

    public function page($id) {
        $data['result'] = DB::table('pages')->where('slug',$id)->get();

        return view('front/page',$data);
    }


    public function contact(Request $request) {

        $data=array(
            'name'=>$request->post('name'),
            'email'=>$request->post('email'),
            'mobile'=>$request->post('mobile'),
            'message'=>$request->post('message'),
            'added_on'=>date('Y-m-d h:i:s')

        );

        DB::table('contacts')->insert($data);

        $request->session()->flash('msg','Thank you we have received your message');
        return redirect('/page/contact-us');
    }
}
