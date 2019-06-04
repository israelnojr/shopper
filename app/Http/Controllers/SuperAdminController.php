<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Redirect;

session_start();
class SuperAdminController extends Controller
{
    public function index()
    {
        $this->AdminAuthCheck();
        return view('backend.admin.dashboard');
    }

    public function logout(){
        Session::flush();
        return Redirect::to('/admin');
    }

    public function AdminAuthCheck()
    {
        $adminId = Session::get('admin_id');
        if($adminId){
            return;
        }else{
            return Redirect::to('/admin')->send();
        }
    }
}
