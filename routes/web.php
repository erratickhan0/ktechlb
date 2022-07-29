<?php

use Illuminate\Support\Facades\Auth;
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
    $brands = \App\Brand::get();
    return view('client/home',
        [ 'brands' => $brands
        ]);
});


Auth::routes();

Route::get('site/{brand}/{design}', 'Site\MySiteController@index')->name('mysite.index');





Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'], function () {

    Route::get('home', 'HomeController@index')->name('home');
    Route::get('brand/switch', 'HomeController@switchBrands')->name('brand.switch');
    Route::get('brand/{slug}/settings', 'HomeController@changeBrand')->name('mybrand.settings');

    Route::resource('brands', 'BrandsController', ['except' => ['show']]);
    Route::post('/brands/{brand}', 'BrandsController@update')->name('brands.update');

    Route::resource('user', 'UserController', ['except' => ['show']]);

    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);

	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

    Route::group(['middleware' => 'mybrandsession'], function () {
        Route::get('mybrand/{slug}/slider', 'MyBrandSliderController@index')->name('mybrand.slider');
        Route::get('mybrand/slider/create', 'MyBrandSliderController@create')->name('mybrand.slider.create');
        Route::post('mybrand/slider/store', 'MyBrandSliderController@store')->name('mybrand.slider.store');
        Route::delete('mybrand/slider/delete', 'MyBrandSliderController@destroy')->name('mybrand.slider.delete');

        Route::get('mybrand/{slug}/icon', 'MyBrandIconController@index')->name('mybrand.icon');
        Route::get('mybrand/icon/create', 'MyBrandIconController@create')->name('mybrand.icon.create');
        Route::post('mybrand/icon/store', 'MyBrandIconController@store')->name('mybrand.icon.store');
        Route::delete('mybrand/icon/delete', 'MyBrandIconController@destroy')->name('mybrand.icon.delete');

        Route::post('/mybrand/settings/{brand}', 'BrandSettingsController@store')->name('mybrand.settings.store');
    });


});


