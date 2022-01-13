<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class PostController extends Controller
{
    
    public function post() {

        $data['result'] = DB::table('posts')->orderBy('id','desc')->get();

        return view('admin/post/list',$data);
    }

    public function addpost() {

        return view('admin/post/add');
    }


    public function submit(Request $request) {

        $request->validate([

            'title'=>'required',
            'slug'=>'required|unique:posts',
            'short_desc'=>'required',
            'long_desc'=>'required',
            'image'=>'required|mimes:png,jpg,jpeg',
            'post_date'=>'required'

        ]);

        // $image=$request->file('image')->store('public/post');


        $image=$request->file('image');
        $ext=$image->extension();
        $file=time().'.'.$ext;
        $image->storeAs('/public/post',$file);

        $data=array(
            'title'=>$request->post('title'),
            'slug'=>$request->post('slug'),
            'short_desc'=>$request->post('short_desc'),
            'long_desc'=>$request->post('long_desc'),
            'image'=>$file,
            'post_date'=>$request->post('post_date'),
            'status'=>1,
            'added_on'=>date('Y-m-d h:i:s')


        );

        DB::table('posts')->insert($data);

        $request->session()->flash('msg','Post Saved');
        return redirect('admin/post/list');
    }


    public function delete(Request $request ,$id) {

        DB::table('posts')->where('id',$id)->delete();

        $request->session()->flash('msg','Post Deleted');
        return redirect('/admin/post/list');
    }


    public function edit(Request $request , $id) {

        $data['result']=DB::table('posts')->where('id',$id)->get();
        return view('admin/post/edit',$data);
    }

    public function update(Request $request, $id) {

        $request->validate([

            'title'=>'required',
            'slug'=>'required',
            'short_desc'=>'required',
            'long_desc'=>'required',
            'image'=>'mimes:png,jpg,jpeg',
            'post_date'=>'required'

        ]);


        $data=array(
            'title'=>$request->post('title'),
            'slug'=>$request->post('slug'),
            'short_desc'=>$request->post('short_desc'),
            'long_desc'=>$request->post('long_desc'),
            // 'image'=>$file,
            'post_date'=>$request->post('post_date'),
            'status'=>1,
            'added_on'=>date('Y-m-d h:i:s')


        );

        if($request->hasFile('image')){
        // $image=$request->file('image')->store('public/post');


        $image=$request->file('image');
        $ext=$image->extension();
        $file=time().'.'.$ext;
        $image->storeAs('/public/post',$file);

        $data['image']=$file;
        }

       

        DB::table('posts')->where('id',$id)->update($data);

        $request->session()->flash('msg','Post Updated');
        return redirect('admin/post/list');

    }
}
