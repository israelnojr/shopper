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



//backend Routes.................................
Route::get('/logout','SuperAdminController@logout');
Route::get('/admin','AdminController@index');
Route::get('/dashboard','AdminController@dashboard');
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
