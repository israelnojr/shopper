<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;

session_start();
class CategoryController extends Controller
{
    public function index()
    {
        $this->AdminAuthCheck();
        return view('backend.admin.add_category');
    }

    public function allCategory()
    {
        $this->AdminAuthCheck();
        $allCategory = DB::table('tbl_category')->get();
        $manageCategory = view('backend.admin.all_category')->with('allCategory',$allCategory);
        return view('backend.layout')->with('backend.admin.all_category',$manageCategory);

        //return view('backend.admin.all_category');
    }

    public function saveCategory(Request $request)
    {
        $this->AdminAuthCheck();
        $data=array();
        $data['category_id']=$request->category_id;
        $data['category_name']=$request->category_name;
        $data['category_description']=$request->category_description;
        $data['publication_status']=$request->publication_status;

        DB::table('tbl_category')->insert($data);
        Session::put('message','Category Added Successfully');
        return Redirect::to('/add-category');
    }

    public function inactive($category_id)
    {
        $this->AdminAuthCheck();
        DB::table('tbl_category')->where('category_id',$category_id)->update(['publication_status'=>0]);
        Session::put('message','Category Updated Successfully');
        return Redirect::to('/all-category');
    }

    public function Active($category_id)
    {
        $this->AdminAuthCheck();
        DB::table('tbl_category')->where('category_id',$category_id)->update(['publication_status'=>1]);
        Session::put('message','Category Updated Successfully');
        return Redirect::to('/all-category');
    }

    public function edit($category_id)
    {
        $this->AdminAuthCheck();
        $categoryInfo = DB::table('tbl_category')->where('category_id',$category_id)->first();
        $categoryInfo = view('backend.admin.edit_category')->with('categoryInfo',$categoryInfo);
        return view('backend.layout')->with('backend.admin.edit_category',$categoryInfo);

        //return view('backend.admin.edit_category');
    }

    public function update(Request $request, $category_id)
    {
        $this->AdminAuthCheck();
        $data=array();
        $data['category_name']=$request->category_name;
        $data['category_description']=$request->category_description;

        DB::table('tbl_category')->where('category_id',$category_id)->update($data);
        Session::put('message','Category Updated Successfully');
        return Redirect::to('/all-category');
    }

    public function delete($category_id)
    {
        $this->AdminAuthCheck();
        DB::table('tbl_category')->where('category_id',$category_id)->delete();
        Session::put('message','Category Deleted Successfully');
        return Redirect::to('/all-category');
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
