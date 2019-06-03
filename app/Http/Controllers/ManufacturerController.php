<?php

namespace App\Http\Controllers;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request; 

session_start();
class ManufacturerController extends Controller
{
   public function index()
   {
    return view('backend.admin.add_brand');
   }

   public function allBrand()
   {
    $allBrand = DB::table('manufacturer')->get();
    $manageBrand = view('backend.admin.all_brand')->with('allBrand',$allBrand);
    return view('backend.layout')->with('backend.admin.all_brand',$manageBrand);
   }

   public function saveBrand(Request $request)
    {
        $data=array();
        $data['manufacturer_id']=$request->manufacturer_id;
        $data['manufacturer_name']=$request->manufacturer_name;
        $data['manufacturer_description']=$request->manufacturer_description;
        $data['pub_status']=$request->pub_status;

        DB::table('manufacturers')->insert($data);
        Session::put('message','Brand Added Successfully');
        return Redirect::to('/all-brand');
    }

    public function inactive($manufacturer_id)
    {
        DB::table('manufacturers')->where('manufacturer_id',$manufacturer_id)->update(['pub_status'=>0]);
        Session::put('message','Brand Updated Successfully');
        return Redirect::to('/all-brand');
    }

    public function Active($manufacturer_id)
    {
        DB::table('manufacturers')->where('manufacturer_id',$manufacturer_id)->update(['pub_status'=>1]);
        Session::put('message','Brand Updated Successfully');
        return Redirect::to('/all-brand');
    }

    public function edit($manufacturer_id)
    {
        $brandInfo = DB::table('manufacturers')->where('manufacturer_id',$manufacturer_id)->first();
        $brandInfo = view('backend.admin.edit_brand')->with('brandInfo',$brandInfo);
        return view('backend.layout')->with('backend.admin.edit_brand',$brandInfo);

        //return view('backend.admin.edit_category');
    }

    public function update(Request $request, $manufacturer_id)
    {
        $data=array();
        $data['manufacturer_name']=$request->manufacturer_name;
        $data['manufacturer_description']=$request->manufacturer_description;

        DB::table('manufacturers')->where('manufacturer_id',$manufacturer_id)->update($data);
        Session::put('message','Brand Updated Successfully');
        return Redirect::to('/all-brand');
    }

    public function delete($manufacturer_id)
    {
        DB::table('manufacturers')->where('manufacturer_id',$manufacturer_id)->delete();
        Session::put('message','Brand Deleted Successfully');
        return Redirect::to('/all-brand');
    }
}
