<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;

session_start();
class SliderController extends Controller
{
    public function index()
    {
        $this->AdminAuthCheck();
        return view('backend.admin.add_slider');
    }

    public function saveSlider(Request $request)
    {
        $this->AdminAuthCheck();
        $data=array();
        $data['slider_id']=$request->slider_id;
        $data['slider_name']=$request->slider_name;
        $data['slider_description']=$request->slider_description;
        $data['slider_url']=$request->slider_url;
        $data['pub_status']=$request->pub_status;

        $image = $request->file('slider_image');
        if($image){
            $imageName = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $imageFullName = $imageName.'.'.$ext;
            $upload_path='image/slider/';
            $imageUrl  = $upload_path.$imageFullName;
            $isUploaded = $image->move($upload_path,$imageFullName);
            if($isUploaded){
                $data['slider_image']=$imageUrl;

                    DB::table('sliders')->insert($data);
                    Session::put('message','Slider Added Successfully');
                    return Redirect::to('/add-slider');
            }
        }
        $data['image']='';

            DB::table('sliders')->insert($data);
            Session::put('message','slider Added Successfully');
            return Redirect::to('/add-slider');
            
    }

    public function allSlider()
    {
        $this->AdminAuthCheck();
        $allSlider = DB::table('sliders')->get();
        $manageSlider = view('backend.admin.all_slider')->with('allSlider',$allSlider);
        return view('backend.layout')->with('backend.admin.all_slider',$manageSlider);

        //return view('backend.admin.all_slider');
    }

    public function inactive($slider_id)
    {
        $this->AdminAuthCheck();
        DB::table('sliders')->where('slider_id',$slider_id)->update(['pub_status'=>0]);
        Session::put('message','Slider Updated Successfully');
        return Redirect::to('/all-slider');
    }

    public function Active($slider_id)
    {
        $this->AdminAuthCheck();
        DB::table('sliders')->where('slider_id',$slider_id)->update(['pub_status'=>1]);
        Session::put('message','slider Updated Successfully');
        return Redirect::to('/all-slider');
    }

    public function delete($slider_id)
    {
        $this->AdminAuthCheck();
        DB::table('sliders')->where('slider_id',$slider_id)->delete();
        Session::put('message','slider Deleted Successfully');
        return Redirect::to('/all-slider');
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
