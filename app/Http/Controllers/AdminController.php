<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('backend.admin.dashboard');
    }

    public function store(Request $request)
    {
        //
    }

    
}
