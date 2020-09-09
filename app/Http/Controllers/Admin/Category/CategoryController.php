<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\Category;
use App\Model\Admin\Brand;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
class CategoryController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:admin');
    // }

    public function index(){
    	$category=Category::all();
    	return view('admin.category.category',compact('category'));
    }

    public function storeCategory(Request $request){

    	// $validatedData = $request->validate([
     //    'category_name' => 'required|unique:categories|max:55',
     //      ]);
    	// $data=array();
    	// $data['category_name']=$request->category_name;
    	// DB::table('categories')->insert($data);

    	$category =new Category();
    	$category->category_name=$request->category_name;
    	$category->description=$request->description;
    	$category->publication_status=$request->publication_status;

    	$category->save();

    	// $notification=array(
    	// 		'message'=>'Category Inserted Done',
    	// 		'alert-type'=>'success'
    	// 	);
    			//return view('admin.category.category',compact($category)) ;
    	return Redirect()->back();

    	


    }
    public function DeleteCategory($id){
    	$category=DB::table('categories')->where('category_id',$id)->delete();
    	// return view('admin.category.category',compact($category)) ;
    	
    	// echo "<pre>";
    	// print_r($category);

    	return Redirect()->back()->with($category);

    }

    public function EditCategory($id){


    	$category=DB::table('categories')->where('category_id',$id)->first();
    	return view('admin.category.edit_category',compact('category')) ;
    }

    public function UpdateCategory(Request $request,$id){
     
     $data=array();
    	$data['category_name']=$request->category_name;
    	$data['description']=$request->description;
    	$data['publication_status']=$request->publication_status;
    	DB::table('categories')->where('category_id',$id)->update($data);
    	
    	return Redirect()->route('admin.category')->with($data);

    }

  

   //  public function storeBrand(Request $request){

   //  	$data =array();
   //  	$data['brand_name']=$request->brand_name;
   //  	$image =$request->file('brand_logo');
   //  	if ($image) {
   //  		$image_name=hexdec(uniqid());
	  //        $ext=strtolower($image->getClientOriginalExtension());
			// $image_full_name=$image_name.'.'.$ext;
			// $upload_path ='public/media/brand/';
			// $image_url=$upload_path.$image_full_name;
			// $sucess=$image->move($upload_path,$image_full_name);
			// $data['brand_logo']=$image_url;

			// $data['brand_logo']=$image_url;
			// $brand=DB::table('brands')->insert($data);
			// return Redirect()->back()->with($brand);
   //  	}


   //  }

    // public function DeleteBrand($id){
    // 	$data =DB::table('brands')->where('id',$id)->first();
    // 	$image=$data->brand_logo;
    // 	unlink($image);

    // 	$brand =DB::table('brands')->where('id',$id)->delete();
    // 	return Redirect()->back()->with($brand);
    // }

    // public function EditBrand($id){
    // 	$brand =DB::table('brands')->where('id',$id)->first();
    // 	return view('admin.category.edit_brand',compact('brand'));
    // }

   //  public function Updatebrand(Request $request,$id){

   //  	$old_logo =$request->old_logo;
   //  	$data =array();
   //  	$data['brand_name']=$request->brand_name;
   //  	$image =$request->file('brand_logo');
   //  	if ($image) {
   //  		unlink($old_logo);
   //  		$image_name=hexdec(uniqid());
	  //        $ext=strtolower($image->getClientOriginalExtension());
			// $image_full_name=$image_name.'.'.$ext;
			// $upload_path ='public/media/brand/';
			// $image_url=$upload_path.$image_full_name;
			// $sucess=$image->move($upload_path,$image_full_name);
			// $data['brand_logo']=$image_url;

			// $data['brand_logo']=$image_url;
			// $brand=DB::table('brands')->where('id',$id)->update($data);
			// return Redirect()->back()->with($brand);
   //  	}


    }

    

