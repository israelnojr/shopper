<?php

namespace App\Http\Controllers;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;

session_start();
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function index()
    {
        $publishedProduct = DB::table('products')->where('pub_status',1)->limit(6)->get();
        $manageProduct = view('pages.home')->with('publishedProduct',$publishedProduct);
        return view('layout')->with('pages.home',$manageProduct);

        //return view('pages.home');
    } 
}
