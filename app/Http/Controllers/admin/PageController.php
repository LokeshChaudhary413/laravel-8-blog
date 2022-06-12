<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PageController extends Controller
{
    function index(){
        $data['result'] = DB::table('pages')->orderBy('id','desc')->get();
        return view('admin.pages.pageList',$data);
    }
    function submit(Request $request){

        $request->validate([
            'name'=>'required',
            'slug'=>'required|unique:pages',
            'description'=>'required',
            
        ]);
        
        $data = [
            'name' => $request->input('name'),
            'slug' => $request->input('slug'),
            'description' => $request->input('description'),
            'status' => 1,
        ];

        DB::table('pages')->insert($data);
        $request->session()->flash('msg','Page Published');
        return redirect('admin/pages/');
    }
    function delete(Request $request,$id){
        DB::table('pages')->where('id',$id)->delete();
        $request->session()->flash('msg','Post Deleted');
        return redirect('admin/pages');
    }
    function edit(Request $request,$id){
        $data['result'] = DB::table('pages')->where('id',$id)->get();
        return view('admin.pages.editPage',$data);
    }

    function update(Request $request,$id){

        $request->validate([
            'name'=>'required',
            'slug'=>'required',
            'description'=>'required',
            
        ]);
        $data = [
            'name' => $request->input('name'),
            'slug' => $request->input('slug'),
            'description' => $request->input('description'),
            'status' => 1,
        ];

        DB::table('pages')->where('id',$id)->update($data);
        $request->session()->flash('msg','Page Updated');
        return redirect('admin/pages');
    }
}
