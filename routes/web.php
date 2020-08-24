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

Route::get('/', function () {
    return view('pages.index');
});

Route::get('About/Us', 'PageController@About')->name('about.page');
Route::get('/Services', 'PageController@Services')->name('services.page');
Route::get('/Blog', 'PageController@Blog')->name('blog.page');
Route::get('Contact/Us', 'PageController@Contact')->name('contact.page');

Auth::routes(['verify' => true,'register' => false]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

//Category
Route::get('Category/All', 'CategoryController@AllCat')->name('all.category');
Route::post('Category/Add', 'CategoryController@AddCat')->name('store.category');
Route::get('Category/Edit/{id}', 'CategoryController@Edit');
Route::post('Store/Category/{id}', 'CategoryController@Update');
Route::get('softdelete/category/{id}', 'CategoryController@SoftDelete');
Route::get('Category/restore/{id}', 'CategoryController@Restore');
Route::get('pdelete/category/{id}', 'CategoryController@PDelete');

//Brand
Route::get('Brand/All', 'BrandController@AllBrand')->name('all.brand');
Route::post('Brand/Add', 'BrandController@StoreBrand')->name('store.brand');
Route::get('Brand/Edit/{id}', 'BrandController@Edit');
Route::post('Brand/Update/{id}', 'BrandController@Update');
Route::get('Brand/Delete/{id}', 'BrandController@Delete');

//Multi Image
Route::get('Multi/Image', 'MultiimgController@index')->name('multi.image');
Route::post('Multi/Image/Store', 'MultiimgController@StoreImage')->name('store.image');
Route::get('Multi/Image/Delete/{id}', 'MultiimgController@Delete');

//Profile
Route::get('User/Profile','ProfileController@index')->name('profile.user');
Route::post('User/Profile/Update','ProfileController@UpdateProfile')->name('update.user');

//Password
Route::get('User/ChangePassword','ProfileController@ChangePassword')->name('change.password');
Route::post('User/Update/Password', 'ProfileController@UpdatePassword')->name('update.password');


