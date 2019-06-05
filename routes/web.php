<?php
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

//frontend Routes.................................
Route::get('/','HomeController@index');
Route::get('/product-by-category/{category_id}','HomeController@ProductByCategory');
Route::get('/product-by-brand/{manufacturer_id}','HomeController@ProductByBrand');
Route::get('/view-product/{product_id}','HomeController@SingleProduct');
Route::post('/add-to-cart','CartController@AddToCart');
Route::post('/update-cart','CartController@UpdateCart');
Route::get('/show-cart','CartController@ShowCart');
Route::get('/remove-cart/{product_id}','CartController@DeleteCart');

//checkout routes
Route::get('/checkout','CheckoutController@Checkout');



//backend Routes.................................
Route::get('/logout','SuperAdminController@logout');
Route::get('/admin','AdminController@index');
Route::get('/dashboard','SuperAdminController@index');
Route::get('/manage','AdminController@manage');


//Category ralated routes
Route::get('/add-category','CategoryController@index');
Route::get('/all-category','CategoryController@allCategory');
Route::post('/save-category','CategoryController@saveCategory');
Route::get('/inactive/{category_id}','CategoryController@inActive');
Route::get('/active/{category_id}','CategoryController@Active');
Route::get('/edit/{category_id}','CategoryController@edit');
Route::get('/delete-category/{category_id}','CategoryController@delete');
Route::post('/update-category/{category_id}','CategoryController@update');

//Manufacturer rated routes
Route::get('/add-brand','ManufacturerController@index');
Route::get('/all-brand','ManufacturerController@allBrand');
Route::post('/save-brand','ManufacturerController@saveBrand');
Route::get('/inactive-brand/{manufacturer_id}','ManufacturerController@inActive');
Route::get('/active-brand/{manufacturer_id}','ManufacturerController@Active');
Route::get('/edit-brand/{manufacturer_id}','ManufacturerController@edit');
Route::get('/delete-brand/{manufacturer_id}','ManufacturerController@delete');
Route::post('/update-brand/{manufacturer_id}','ManufacturerController@update');

// Product rated routes
Route::get('/add-product','ProductController@index');
Route::get('/all-product','ProductController@allProduct');
Route::post('/save-product','ProductController@saveProduct');
Route::get('/inactive-product/{product_id}','ProductController@inActive');
Route::get('/active-product/{product_id}','ProductController@Active');
Route::get('/edit-product/{productr_id}','ProductController@edit');
Route::get('/delete-product/{productr_id}','ProductController@delete');
Route::post('/update-product/{productr_id}','ProductController@update');


//Slider routes
Route::get('/add-slider','SliderController@index');
Route::get('/all-slider','SliderController@allSlider');
Route::post('/save-slider','SliderController@saveslider');
Route::get('/inactive-slider/{slider_id}','SliderController@inActive');
Route::get('/active-slider/{slider_id}','SliderController@Active');
Route::get('/edit-slider/{sliderr_id}','SliderController@edit');
Route::get('/delete-slider/{sliderr_id}','SliderController@delete');
Route::post('/update-slider/{sliderr_id}','SliderController@update');

