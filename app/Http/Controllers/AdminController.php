<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illumunate\Support\Facades\Redirect;
session_start();
class AdminController extends Controller
{
    //
    public function AuthLogin(){
        $admin_id = session::get('admin_id');
        if($admin_id){
            return redirect('/dashboard');
        }
        else{
            return redirect('/admin')->send();
        }
    }
    public function index()
    {
        return view('admin_login');
    }
    public function show_dashboard()
    {
        $this->AuthLogin();
        return view('admin.dashboard');
    }
    public function dashboard(Request $request)
    {
        $admin_email = $request->email;
        $admin_password = $request->password;
        $result = DB::table('admin')->where('admin_email', $admin_email)->where('password', $admin_password)->first();
        if ($result) {
            session::put('admin_name', $result->admin_name);
            session::put('admin_id', $result->admin_id);
            return Redirect('/dashboard');
        } else {
            Session::put('massage', 'email or password unavailabe,please try again');
            return redirect('/admin');
        }

    }
    public function logout()
    {
        $this->AuthLogin();
        Session::put('admin_name', null);
        Session::put('admin_id', null);
        return redirect('/admin');
    }
}
