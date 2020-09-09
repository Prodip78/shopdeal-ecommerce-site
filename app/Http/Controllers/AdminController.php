<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
session_start();

class AdminController extends Controller
{
    public function index(){
    	return view('admin_login');
    }

   

    public function show_dashboard(Request $request){

    	$admin_email =$request->admin_email;
    	$password    =md5($request->password);
    	$result  =DB::table('tbl_admins')
    				->where('admin_email',$admin_email)
    				->where('password',$password)
    				->first();
    		if ($result) {
    					//Session::put('admin_name',$admin_name);
    					//Session::put('admin_id',$admin_id);
    					return Redirect::to('/dashboard');
    				}	else{
    					Session::put('message','email or password invalid');
    					return Redirect::to('/admin');

    				}	
    }






}
