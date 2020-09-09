<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function show_product_by_category($category_id){
    	$product_by_category =DB::table('products')
    			  ->join('categories','products.category_id','categories.category_id')
    			  ->where('categories.category_id',$category_id)
    			  ->limit(18)
    	          ->get();
    	   // $manage_product_by_category=view('User.product_by_category')
    	   // 								->with('product_by_category',$product_by_category);
    	          return view('User.product_by_category',compact('product_by_category'));

    }

public function show_product_by_brand($brand_id){
		$product_by_brand =DB::table('products')
    			  ->join('categories','products.category_id','categories.category_id')
    			  ->join('brands','products.brand_id','brands.brand_id')
    			  ->where('brands.brand_id',$brand_id)
    			  ->limit(6)
    	          ->get();
    	          return view('User.product_by_brand',compact('product_by_brand'));



}
public function product_details_by_id($product_id){

$product_by_details =DB::table('products')
    			  ->join('categories','products.category_id','categories.category_id')
    			  ->join('brands','products.brand_id','brands.brand_id')
    			  ->where('products.product_id',$product_id)
    			  ->limit(6)
    	          ->first();
    	          return view('User.product_details',compact('product_by_details'));


}

public function product_category($category_id){

    $product_category =DB::table('products')
                  ->join('categories','products.category_id','categories.category_id')
                  ->where('categories.category_id',$category_id)
                  ->limit(18)
                  ->get();

               return view('User.product_category',compact('product_category'));
}




}
