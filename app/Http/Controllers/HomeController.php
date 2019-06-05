<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function index()
    {
        
        $publishedProduct = DB::table('products')
                           ->join('tbl_category','products.category_id','=','tbl_category.category_id')
                           ->join('manufacturers','products.manufacturer_id','=','manufacturers.manufacturer_id')
                           ->select('products.*','tbl_category.category_name','manufacturers.manufacturer_name')
                           ->where('products.pub_status',1)->limit(6)->get();
        $manageProduct = view('pages.home')->with('publishedProduct',$publishedProduct);
        return view('layout')->with('pages.home',$manageProduct);

        //return view('pages.home');
    } 

    public function ProductByCategory($category_id)
    {
        $ProductByCategory = DB::table('products')
                                ->join('tbl_category','products.category_id','=','tbl_category.category_id')
                                ->select('products.*','tbl_category.category_name')
                                ->where('tbl_category.category_id',$category_id)
                                ->where('products.pub_status',1)
                                ->limit(20)->get();
        $manageProduct = view('pages.category_product')->with('ProductByCategory',$ProductByCategory);
        return view('layout')->with('pages.category_product',$manageProduct);
    }

    public function ProductByBrand($manufacturer_id)
    {
        $ProductByManufacturer = DB::table('products')
                                ->join('manufacturers','products.manufacturer_id','=','manufacturers.manufacturer_id')
                                ->select('products.*','manufacturers.manufacturer_name')
                                ->where('manufacturers.manufacturer_id',$manufacturer_id)
                                ->where('products.pub_status',1)
                                ->limit(20)->get();
        $manageBrandProduct = view('pages.product_manufacturer')->with('ProductByManufacturer',$ProductByManufacturer);
        return view('layout')->with('pages.manufacturer_product',$manageBrandProduct);
    }

    public function SingleProduct($product_id)
    {
        $ProductDetail = DB::table('products')
                           ->join('tbl_category','products.category_id','=','tbl_category.category_id')
                           ->join('manufacturers','products.manufacturer_id','=','manufacturers.manufacturer_id')
                           ->select('products.*','tbl_category.category_name','manufacturers.manufacturer_name')
                           ->where('products.product_id',$product_id)->where('products.pub_status',1)->first();
        $manageProduct = view('pages.single_product')->with('ProductDetail',$ProductDetail);
        return view('layout')->with('pages.single_product',$manageProduct);

       // return view('pages.single_product');
    }
}
