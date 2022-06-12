<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    function bloglisting(){
        $data['result'] = DB::table('posts')->where('status',1)->orderBy('id','desc')->get();
        return view('front/index',$data);
    }

    function fullPost($id){
        $data['result'] = DB::table('posts')->where('slug',$id)->get();
        return view('front/post',$data);
        
    }
    
    public static function page_menu(){
        $data = DB::table('pages')->where('status',1)->get();
        return $data;
    }

    function page($id){
        $data['result'] = DB::table('pages')->where('slug',$id)->get();
        return view('front/page',$data);
    }
    
}
