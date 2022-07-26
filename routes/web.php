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
    Route::get('brand/{slug}/slider', 'MyBrandSliderController@index')->name('mybrand.slider');
    Route::get('brand/{slug}/slider/create', 'MyBrandSliderController@create')->name('mybrand.slider.create');

    Route::resource('brands', 'BrandsController', ['except' => ['show']]);
    Route::post('/brands/{brand}', 'BrandsController@update')->name('brands.update');
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade');
	 Route::get('map', function () {return view('pages.maps');})->name('map');
	 Route::get('icons', function () {return view('pages.icons');})->name('icons');
	 Route::get('table-list', function () {return view('pages.tables');})->name('table');
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

    Route::post('/mybrand/settings/{brand}', 'BrandSettingsController@store')->name('mybrand.settings.store');
});


