<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function Productindex(){
    	$product=DB::table('products')
    			  ->join('categories','products.category_id','categories.category_id')
    			  ->join('brands','products.brand_id','brands.brand_id')
    	          ->get();
    	return view('Admin.category.add_product',compact('product'));
    }

public function storeProduct(Request $request){
$data['product_name']             =$request->product_name;
$data['category_id']              =$request->category_id;
$data['brand_id']     			  =$request->brand_id;
$data['product_short_description']=$request->product_short_description;
$data['product_long_description'] =$request->product_long_description;
$data['product_price']			  =$request->product_price;
$data['product_size']             =$request->product_size;
$data['product_color']            =$request->product_color;
$data['publication_status']       =$request->publication_status;

$image=$request->file('product_image');
    	if ($image) {
    		$image_name=hexdec(uniqid());
	         $ext=strtolower($image->getClientOriginalExtension());
			$image_full_name=$image_name.'.'.$ext;
			$upload_path ='image/';
			$image_url=$upload_path.$image_full_name;
			$sucess=$image->move($upload_path,$image_full_name);
			$data['product_image']=$image_url;

			$data['product_image']=$image_url;
			$brand=DB::table('products')->insert($data);
			return Redirect()->back()->with($brand);
    	}





}

public function DeleteProduct($id){

$product=DB::table('products')->where('product_id',$id)->delete();

    	return Redirect()->back()->with($product);



}

public function Editproduct($id){
$product=DB::table('products')->where('product_id',$id)->first();
    	return view('admin.category.edit_product',compact('product')) ;

}

public function UpdateProduct(Request $request,$id){

$old_image =$request->old_image;
    	$data =array();
        $data['product_name']             =$request->product_name;
        $data['category_id']              =$request->category_id;
        $data['brand_id']     			  =$request->brand_id;
        $data['product_short_description']=$request->product_short_description;
        $data['product_long_description'] =$request->product_long_description;
        $data['product_price']			  =$request->product_price;
        $data['product_size']             =$request->product_size;
        $data['product_color']            =$request->product_color;
        $data['publication_status']       =$request->publication_status;
    	$image =$request->file('product_image');
    	if ($image) {
    		unlink($old_image);
    		$image_name=hexdec(uniqid());
	         $ext=strtolower($image->getClientOriginalExtension());
			$image_full_name=$image_name.'.'.$ext;
			$upload_path ='image/';
			$image_url=$upload_path.$image_full_name;
			$sucess=$image->move($upload_path,$image_full_name);
			$data['product_image']=$image_url;

			$data['product_image']=$image_url;
			$brand=DB::table('products')->where('product_id',$id)->update($data);
			//return Redirect()->back();
			echo "<pre>";
			print_r($data);
			echo "</pre>";
			exit();



    	}

}




}
