<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;

session_start();
class ProductController extends Controller
{
    public function index()
    {
        $this->AdminAuthCheck();
        return view('backend.admin.add_product');
    }

    public function allProduct()
    {
        $this->AdminAuthCheck();
        $allProduct = DB::table('products')->join('tbl_category','products.category_id','=','tbl_category.category_id')
                                            ->join('manufacturers','products.manufacturer_id','=','manufacturers.manufacturer_id')
                                            ->select('products.*','tbl_category.category_name','manufacturers.manufacturer_name')->get();
        $manageProduct = view('backend.admin.all_product')->with('allProduct',$allProduct);
        return view('backend.layout')->with('backend.admin.all_product',$manageProduct);

        //return view('backend.admin.all_product');
    }

    public function saveProduct(Request $request)
    {
        $this->AdminAuthCheck();
        $data=array();
        $data['product_id']=$request->product_id;
        $data['product_name']=$request->product_name;
        $data['category_id']=$request->category_id;
        $data['manufacturer_id']=$request->manufacturer_id;
        $data['product_short_description']=$request->product_short_description;
        $data['product_long_description']=$request->product_short_description;
        $data['product_price']=$request->product_price;
        $data['product_size']=$request->product_size;
        $data['product_color']=$request->product_color;
        $data['pub_status']=$request->pub_status;

        $image = $request->file('product_image');
        if($image){
            $imageName = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $imageFullName = $imageName.'.'.$ext;
            $upload_path='image/product/';
            $imageUrl  = $upload_path.$imageFullName;
            $isUploaded = $image->move($upload_path,$imageFullName);
            if($isUploaded){
                $data['product_image']=$imageUrl;

                    DB::table('products')->insert($data);
                    Session::put('message','Product Added Successfully');
                    return Redirect::to('/add-product');
            }
        }
        $data['image']='';

            DB::table('products')->insert($data);
            Session::put('message','Product Added Successfully');
            return Redirect::to('/add-product');
    }

    public function inactive($product_id)
    {
        $this->AdminAuthCheck();
        DB::table('products')->where('product_id',$product_id)->update(['pub_status'=>0]);
        Session::put('message','product Updated Successfully');
        return Redirect::to('/all-product');
    }

    public function Active($product_id)
    {
        $this->AdminAuthCheck();
        DB::table('products')->where('product_id',$product_id)->update(['pub_status'=>1]);
        Session::put('message','Product Updated Successfully');
        return Redirect::to('/all-product');
    }

    public function delete($product_id)
    {
        $this->AdminAuthCheck();
        DB::table('products')->where('product_id',$product_id)->delete();
        Session::put('message','Product Deleted Successfully');
        return Redirect::to('/all-product');
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
