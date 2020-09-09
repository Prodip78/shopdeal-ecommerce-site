<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Admin\Brand;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;


class BrandController extends Controller
{
    public function Brandindex(){
    	$brand =Brand::all();
      return view('admin.category.brand',compact('brand'));   


       }
     public function storeBrand(Request $request){
     	$brand =new Brand();
    	$brand->brand_name=$request->brand_name;
    	$brand->description=$request->description;
    	$brand->publication_status=$request->publication_status;
    	$brand->save();
    	return Redirect()->back();


     }
     public function EditBrand($id){


    	$brand=DB::table('brands')->where('brand_id',$id)->first();
    	return view('admin.category.edit_brand',compact('brand')) ;
    }

     public function UpdateBrand(Request $request,$id){
     
     $data=array();
    	$data['brand_name']=$request->brand_name;
    	$data['description']=$request->description;
    	$data['publication_status']=$request->publication_status;
    	DB::table('brands')->where('brand_id',$id)->update($data);
    	
    	return Redirect()->back();

    }
    public function DeleteBrand($id){
    	$brand=DB::table('brands')->where('brand_id',$id)->delete();
    	// return view('admin.category.category',compact($category)) ;
    	
    	// echo "<pre>";
    	// print_r($category);

    	return Redirect()->back()->with($brand);

    }



}
