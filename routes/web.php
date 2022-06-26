<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LogoutController;


Route::get('/', 'Homepage@index')->name('home');

Route::middleware('guest')->group(function(){
    // LOGIN
    Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
    Route::post('/login', [LoginController::class, 'authenticate']);

    // REGISTRASI
    Route::get('/registrasi', [RegisterController::class, 'index'])->middleware('guest');
    Route::post('/registrasi', [RegisterController::class, 'store']);

    //ALL PRODUCT
    Route::get('/products','AllProductController@index');

});
Route::group(['middleware' =>['auth','cekrole:admin']],function(){

    //DASHBOARD 
    // SLIDER
    Route::get('home-slider','SliderController@index')->name('homeslider');
    Route::get('add-slider','SliderController@create');
    Route::post('store-slider','SliderController@store');
    Route::get('edit-slider/{id}','SliderController@edit');
    Route::put('update-slider/{id}','SliderController@update');
    //PRODUCTS
    Route::get('home-product','ProductController@index')->name('homeproduct');
    Route::get('add-product','ProductController@create');
    Route::post('store-product','ProductController@store');
    Route::get('edit-product/{id}','ProductController@edit');
    Route::put('update-product/{id}','ProductController@update');



});
Route::group(['middleware' =>['auth','cekrole:admin,user']],function(){
    //LOGOUT
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    //ALL PRODUCT
    Route::get('/products','AllProductController@index');

});

