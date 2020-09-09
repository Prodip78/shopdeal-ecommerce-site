<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Session;
use Cart;
class CheckoutController extends Controller
{
    public function login_check(){
    	return view('User.login');
    }

    public function registration_customer(Request $request){
    	$data =array();
    	$data['customer_name'] =$request->customer_name;
    	$data['customer_email'] =$request->customer_email;
    	$data['password'] =$request->password;
    	$data['phone'] =$request->phone;

    	$customer_id=DB::table('customers')
    	             ->insertGetId($data);
    	  Session::put('customer_id',$customer_id);
    	  Session::put('customer_name',$request->customer_name);

    	  return Redirect('/checkout');
    }

    public function checkout(){
    	return view('User.checkout');
    }

public function save_shipping_details(Request $request){

	$data=array();
	$data['shipping_email']    =$request->shipping_email;
	$data['shipping_fast_name']=$request->shipping_fast_name;
	$data['shipping_last_name']=$request->shipping_last_name;
	$data['shipping_address']  =$request->shipping_address;
	$data['city']              =$request->city;
	$data['phone']             =$request->phone;
	
	$shipping_id=DB::table('shippings')
	                     ->insertGetId($data);
	     Session::put('shipping_id',$shipping_id);
	     
	  return Redirect::to('/payment');                

}
 public function payment(){
 	return view('User.payment');
 }

public function order_place(Request $request){

	$payment_method=$request->payment_method;

	$payment_data = array();
	$payment_data['payment_method']=$payment_method;
	$payment_data['payment_status']='pending';

	$payment_id=DB::table('payments')
							->insertGetId($payment_data);

   $order_data=array();
   $order_data['customer_id']=Session::get('customer_id');
   $order_data['shipping_id']=Session::get('shipping_id');
   $order_data['payment_id'] =$payment_id;
   $order_data['order_total'] =Cart::total();
   $order_data['order_status'] ='pending';

   $order_id=DB::table('orders')
   					->insertGetId($order_data);

$contents=Cart::content();

$order_details_data=array();

foreach ($contents as $view) {
	$order_details_data['order_id']=$order_id;
	$order_details_data['product_id']=$view->id;
	$order_details_data['product_name']=$view->name;
	$order_details_data['product_price']=$view->price;
	$order_details_data['product_sales_quantity']=$view->qty;

	DB::table('order_details')
	           ->insert($order_details_data);

}

if ($payment_method=='Handcash') {
	Cart::destroy();
	return view('User.handcash');
}elseif ($payment_method=='cart') {
	echo "Successfully done by cart";
}elseif ($payment_method=='Bkash') {
	echo "Successfully done by Bkash";
}else{
	echo "not selected";
}





}


public function manage_order(){

	$manage_order=DB::table('orders')
    			  ->join('customers','orders.customer_id','customers.customer_id')
    			  ->select('orders.*','customers.customer_name')
    	          ->get();
    	return view('Admin.category.manage_order',compact('manage_order'));
}

public function order_view($order_id){
$order_view=DB::table('orders')
    			  ->join('customers','orders.customer_id','customers.customer_id')
    			  ->join('order_details','orders.order_id','order_details.order_id')
    			  ->join('shippings','orders.shipping_id','shippings.shipping_id')
    			  ->select('orders.*','order_details.*','shippings.*','customers.*')
    	          ->get();
//dd($order_view);

  return view('Admin.category.order_view',compact('order_view'));



}

public function delete($order_id){


	$order=DB::table('orders')->where('order_id',$order_id)->delete();

    	return Redirect()->back()->with($order);
}




public function login_customer(Request $request){

$customer_email=$request->customer_email;
$password=md5($request->password);
$result=DB::table('customers')
					->where('customer_email',$customer_email)
					->first();
	if ($result) {

		    Session::put('customer_id',$result->customer_id);
		    return Redirect::to('/checkout');
						
			}else{
				return Redirect::to('/login-check');
			}				
}




public function customer_logout(){

	Session::flush();
    return Redirect::to('/');
}

public function search(Request $request){

	$search=$request->search;

	 $data=DB::table('products')
	 					->orWhere('title','like','%'.$search.'%')
	 					->orWhere('brand_name','like','%'.$search.'%')
	 					->orWhere('category_name','like','%'.$search.'%')
	 					->orWhere('product_name','like','%'.$search.'%')
	 					->orWhere('category_short_description','like','%'.$search.'%')
	 					->orderBy('product_id','desc');
	 	return view('User.search',compact('search','data'));	
	 	//dd($search);			

}


}
