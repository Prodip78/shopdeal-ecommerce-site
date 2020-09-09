<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
session_start();

class SuperAdminController extends Controller
{
     public function index(){
        //$this->adminAuthCheck();
    	return view('admin.home');
    }


    public function logout(Request $request){

    Session::put('admin_name',$request->admin_name);
    Session::put('admin_id',$request->admin_id);
    return Redirect::to('/admin');


}
public function adminAuthCheck(){

    $admin_id=Session::get('admin_id');

    if ($admin_id) {
        return view('admin.home');
    }else{
        return Redirect::to('/admin')->send();
    }
}



}
