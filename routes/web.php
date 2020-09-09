<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Frontend Site...............
Route::get('/', function () {
    return view('User.user_content');
});
//category view route
Route::get('/product_by_category{category_id}','HomeController@show_product_by_category');
Route::get('/product_by_brand{brand_id}','HomeController@show_product_by_brand');
Route::get('/view.product{product_id}','HomeController@product_details_by_id');
Route::get('/product_category{category_id}','HomeController@product_category');
//cart route
Route::post('/add-to-cart','CartController@add_to_cart');
Route::get('/show_cart','CartController@show_to_cart');
Route::get('/delete-to-cart{rowId}','CartController@delete_to_cart');
Route::post('/update-cart','CartController@update_to_cart');

//checkout route....
Route::get('/login-check','CheckoutController@login_check');
Route::post('/registration-customer','CheckoutController@registration_customer');
Route::get('/checkout','CheckoutController@checkout');
Route::post('/save-shipping-details','CheckoutController@save_shipping_details');
//customer login route..
Route::post('/login-customer','CheckoutController@login_customer');
Route::get('/customer-logout','CheckoutController@customer_logout');

//payment route...
Route::get('/payment','CheckoutController@payment');
Route::post('/order-place','CheckoutController@order_place');
///order route...
Route::get('/manage-order','CheckoutController@manage_order');
Route::get('view/order{order_id}','CheckoutController@order_view');
Route::get('delete/order{order_id}','CheckoutController@delete');

//search route....
Route::get('/search','CheckoutController@search');






//BackendSite.................
Route::post('/logout','SuperAdminController@logout');
Route::get('/admin','AdminController@index');
Route::get('/dashboard','SuperAdminController@index');
Route::post('/admin.dashboard','AdminController@show_dashboard');


//category.....
Route::get('admin/category','Admin\Category\CategoryController@index')->name('admin.category');
Route::post('admin/category/store','Admin\Category\CategoryController@storeCategory')->name('store.category');
Route::get('edit/category{category_id}', 'Admin\Category\CategoryController@EditCategory');
Route::post('update/category{category_id}', 'Admin\Category\CategoryController@UpdateCategory');
Route::get('delete/category{category_id}', 'Admin\Category\CategoryController@DeleteCategory');


//brand route ....
Route::get('admin/brand','BrandController@Brandindex')->name('brand');
Route::post('admin/brand/store','BrandController@storeBrand')->name('store.brand');
Route::get('edit/brand{brand_id}', 'BrandController@EditBrand');
Route::post('update/brand{brand_id}', 'BrandController@UpdateBrand');
Route::get('delete/brand{brand_id}', 'BrandController@DeleteBrand');

//product route.....
Route::get('admin/product','ProductController@Productindex')->name('admin.product');
Route::post('admin/product/store','ProductController@storeProduct')->name('store.product');
Route::get('delete/product{product_id}', 'ProductController@DeleteProduct');
Route::get('edit/product{product_id}', 'ProductController@Editproduct');
Route::post('update/product{product_id}', 'ProductController@UpdateProduct');

//slider route.....
Route::get('admin/slider','SliderController@index')->name('admin.slider');
Route::post('admin/slider/store','SliderController@storeSlider')->name('store.slider');
Route::get('delete/slider{slider_id}', 'SliderController@DeleteSlider');
Route::get('edit/slider{slider_id}', 'SliderController@EditSlider');
Route::post('update/slider{slider_id}', 'SliderController@UpdateSlider');


