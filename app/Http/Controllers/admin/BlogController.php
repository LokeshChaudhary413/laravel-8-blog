<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    function index(){
        $data['result'] = DB::table('posts')->where('status',1)->orderBy('id','desc')->get();
        return view('admin/posts/postList',$data);
    }
    function submit(Request $request){
        $request->validate([
            'title'=>'required',
            'short_desc'=>'required',
            'slug'=>'required|unique:posts',
            'long_desc'=>'required',
            'image'=>'required|mimes:jpeg,jpg,png',
            'post_date'=>'required',
        ]);

        // this is the simple way to upload with whole path
        // $image = $request->file('image')->store('public/post');

        $image = $request->file('image');
        $ext = $image->extension();    
        $file = time().'.'.$ext;
        $image->storeAs('/public/post',$file);
        
        $data = [
            'title' => $request->input('title'),
            'short_desc' => $request->input('short_desc'),
            'slug' => $request->input('slug'),
            'long_desc' => $request->input('long_desc'),
            'image' => $file,
            'post_date' => $request->input('post_date'),
            'status' => 1,
        ];

        DB::table('posts')->insert($data);
        $request->session()->flash('msg','Post Published');
        return redirect('admin/posts');
    }
    function delete(Request $request,$id){
        DB::table('posts')->where('id',$id)->delete();
        $request->session()->flash('msg','Post Deleted');
        return redirect('admin/posts');
    }
    function edit(Request $request,$id){
        $data['result'] = DB::table('posts')->where('id',$id)->get();
        return view('admin/posts/editPost',$data);
    }

    function update(Request $request,$id){

        $request->validate([
            'title'=>'required',
            'short_desc'=>'required',
            'slug'=>'required',
            'long_desc'=>'required',
            'image'=>'mimes:jpeg,jpg,png',
            'post_date'=>'required',
        ]);
        
        $data = [
            'title' => $request->input('title'),
            'short_desc' => $request->input('short_desc'),
            'long_desc' => $request->input('long_desc'),
            'slug' => $request->input('slug'),
            'post_date' => $request->input('post_date'),
            'status' => 1,
        ];

        // this is the simple way to upload with whole path
        if($request->hasfile('image')){
            $image = $request->file('image')->store('public/post');
            $image = $request->file('image');
            $ext = $image->extension();    
            $file = time().'.'.$ext;
            $image->storeAs('/public/post',$file);

            $data['image'] = $file;
        }

        DB::table('posts')->where('id',$id)->update($data);
        $request->session()->flash('msg','Post Updated');
        return redirect('admin/posts/');
    }
}
