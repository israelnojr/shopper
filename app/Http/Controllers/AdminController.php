<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;

session_start();
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.admin.login');
    }

    public function dashboard()
    {
        //
    }

    public function manage(Request $request)
    {
       
        $admin_email = $request->admin_email;
        $admin_pwd = md5($request->admin_pwd);
        $result = DB::table('tbl_admin')->where('admin_email', $admin_email)->where('admin_pwd', $admin_pwd)->first();
        if($result){
            Session::put('admin_email',$result->admin_email);
            Session::put('admin_id',$result->admin_id);
            return Redirect::to('/dashboard');
        }else{
            Session::put('message', 'Email or Password was Incorrect');
            return Redirect::to('/admin');
        }
    }

}
