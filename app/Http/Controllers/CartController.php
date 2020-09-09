<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Cart;

class CartController extends Controller
{
    public function add_to_cart(Request $request){
    
    $quantity=$request->quantity;
    $product_id = $request->product_id;
    $product_info=DB::table('products')
    					   ->where('product_id',$product_id)
    					   ->first();
    	$data['qty']=$quantity;
    	$data['id']=$product_info->product_id;	
    	$data['name']=$product_info->product_name;		   
    	$data['price']=$product_info->product_price;		   
    	$data['options']['image']=$product_info->product_image;	

    	Cart::add($data);
    	return Redirect::to('/show_cart');

    }
    public function show_to_cart(){
    	$all_published_category=DB::table('categories')
    									->where('publication_status',1)
    									->get();
        return view('User.add_to_cart');
    }

    public function delete_to_cart($rowId){
    	Cart::update($rowId,0);
    	return Redirect::to('/show_cart');
    }
    public function update_to_cart(Request $request){
    	$qty =$request->quantity;
    	$rowId=$request->rowId;
    	Cart::update($rowId,$qty);
    	return Redirect::to('/show_cart');
    }
}
