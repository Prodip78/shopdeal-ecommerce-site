<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Admin\Slider;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class SliderController extends Controller
{
    public function index(){
    	$slider =Slider::all();
    	return view('Admin.Slider.slider',compact('slider'));
    }

    public function storeSlider(Request $request){
$data['publication_status']       =$request->publication_status;
$image=$request->file('slider_image');
    	if ($image) {
    		$image_name=hexdec(uniqid());
	         $ext=strtolower($image->getClientOriginalExtension());
			$image_full_name=$image_name.'.'.$ext;
			$upload_path ='image/';
			$image_url=$upload_path.$image_full_name;
			$sucess=$image->move($upload_path,$image_full_name);
			$data['slider_image']=$image_url;

			$data['slider_image']=$image_url;
			$brand=DB::table('sliders')->insert($data);
			return Redirect()->back()->with($brand);
    	}
    }

public function DeleteSlider($id){

$slider=DB::table('sliders')->where('slider_id',$id)->delete();

    	return Redirect()->back()->with($slider);



}

public function EditSlider($slider_id){

$slider=DB::table('sliders')->where('slider_id',$slider_id)->first();
    	return view('admin.Slider.edit_slider',compact('slider')) ;


}

public function UpdateSlider(Request $request,$slider_id){
	$old_image =$request->old_image;
    	$data =array();
      	$data['publication_status']=$request->publication_status;

    	$image =$request->file('slider_image');
    	if ($image) {
    		unlink($old_image);
    		$image_name=hexdec(uniqid());
	         $ext=strtolower($image->getClientOriginalExtension());
			$image_full_name=$image_name.'.'.$ext;
			$upload_path ='image/';
			$image_url=$upload_path.$image_full_name;
			$sucess=$image->move($upload_path,$image_full_name);
			$data['slider_image']=$image_url;

			$data['slider_image']=$image_url;
			

			$slider=DB::table('sliders')->where('slider_id',$slider_id)->update($data);
			return Redirect()->back()->with($slider);
    	}




}



}
