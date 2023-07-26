<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function auth(Request $request)
    {
        $email = $request->post('email');
        $password = $request->post('password');

        $result = User::where('email', $email)->first(); 
        // dd($result->id);
        if(isset($result)){
            if (Hash::check($password, $result->password)) {
                $request->session()->put('ADMIN_LOGIN',true);
                $request->session()->put('ADMIN_ID',$result->id);
                $request->session()->put('ADMIN_NAME',$result->name);
                return redirect('admin/dashboard');
            }else{
                $request->session()->flash('error','Password is wrong!');
                return redirect('admin');
            }
        }else{
            $request->session()->flash('error','Email is not Registered');
            return redirect('admin');
        }
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function logout()
    {
        session()->forget('ADMIN_ID');
        return redirect('admin');
    }
}
