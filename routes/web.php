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
        Route::get('mybrand/icon/{icon}/details', 'MyBrandIconController@details')->name('mybrand.icon.details');
        Route::post('mybrand/icon/update/{icon}', 'MyBrandIconController@update')->name('mybrand.icon.update');
        Route::post('mybrand/icon/section-update/{icon}', 'MyBrandIconController@sectionUpdate')->name('mybrand.icon.section-update');
        Route::delete('mybrand/icon/section-delete/{icon_details}', 'MyBrandIconController@sectionDelete')->name('mybrand.icon.section-delete');
        Route::post('mybrand/icon/section-update-video/{icon}', 'MyBrandIconController@sectionUpdateVid')->name('mybrand.icon.section-update-vid');
        Route::delete('mybrand/icon/section-delete-slider/{icon_detail_slider}', 'MyBrandIconController@sectionDeleteSlider')->name('mybrand.icon.section-delete-slider');

        Route::get('mybrand/{slug}/box-icon', 'MyBrandBoxIconController@index')->name('mybrand.box-icon');
        Route::get('mybrand/box-icon/create', 'MyBrandBoxIconController@create')->name('mybrand.box-icon.create');
        Route::post('mybrand/box-icon/store', 'MyBrandBoxIconController@store')->name('mybrand.box-icon.store');
        Route::delete('mybrand/box-icon/delete', 'MyBrandBoxIconController@destroy')->name('mybrand.box-icon.delete');

        Route::get('mybrand/{slug}/product', 'MyBrandProductController@index')->name('mybrand.product');
        Route::get('mybrand/product/create', 'MyBrandProductController@create')->name('mybrand.product.create');
        Route::post('mybrand/product/store', 'MyBrandProductController@store')->name('mybrand.product.store');
        Route::delete('mybrand/product/delete', 'MyBrandProductController@destroy')->name('mybrand.product.delete');

        Route::get('mybrand/{slug}/banner', 'MyBrandHomepageBannerController@index')->name('mybrand.banner');
        Route::post('mybrand/banner/store', 'MyBrandHomepageBannerController@store')->name('mybrand.banner.store');
        Route::post('mybrand/banner/update/{banner}', 'MyBrandHomepageBannerController@update')->name('mybrand.banner.update');

        Route::get('mybrand/{slug}/logo-title', 'MyBrandLogoTitleSectionController@index')->name('mybrand.logo-title');
        Route::post('mybrand/logo-title/store', 'MyBrandLogoTitleSectionController@store')->name('mybrand.logo-title.store');
        Route::post('mybrand/logo-title/update/{logo_title}', 'MyBrandLogoTitleSectionController@update')->name('mybrand.logo-title.update');
        Route::post('mybrand/logo-title/update-details/{logo_title}', 'MyBrandLogoTitleSectionController@updateDetails')->name('mybrand.logo-title.update-details');
        Route::post('mybrand/logo-title/section-update-inner/{logo_title}', 'MyBrandLogoTitleSectionController@updateDetailInner')->name('mybrand.logo-title.update-details-inner');
        Route::post('mybrand/logo-title/section-update-inner2/{logo_title}', 'MyBrandLogoTitleSectionController@updateDetailInner2')->name('mybrand.logo-title.update-details-inner');
        Route::delete('mybrand/logo-title/section-delete1/{logo_title_details}', 'MyBrandLogoTitleSectionController@sectionDelete1')->name('mybrand.logo-title.section-delete1');
        Route::delete('mybrand/logo-title/section-delete2/{logo_title_detail_slider}', 'MyBrandLogoTitleSectionController@sectionDelete2')->name('mybrand.logo-title.section-delete2');

        Route::get('mybrand/{slug}/button-accordian', 'MyBrandButtonAccordianSectionController@index')->name('mybrand.button-accordian');
        Route::post('mybrand/button-accordian/store', 'MyBrandButtonAccordianSectionController@store')->name('mybrand.button-accordian.store');
        Route::post('mybrand/button-accordian/update/{button_accordian}', 'MyBrandButtonAccordianSectionController@update')->name('mybrand.button-accordian.update');

        Route::get('mybrand/{slug}/news', 'MyBrandNewsSectionController@index')->name('mybrand.news');
        Route::get('mybrand/news/create', 'MyBrandNewsSectionController@create')->name('mybrand.news.create');
        Route::post('mybrand/news/store', 'MyBrandNewsSectionController@store')->name('mybrand.news.store');
        Route::delete('mybrand/news/delete', 'MyBrandNewsSectionController@destroy')->name('mybrand.news.delete');
        Route::get('mybrand/news/{news}/details', 'MyBrandNewsSectionController@details')->name('mybrand.news.details');
        Route::post('mybrand/news/update/{news}', 'MyBrandNewsSectionController@update')->name('mybrand.news.update');
        Route::post('mybrand/news/section-update/{news}', 'MyBrandNewsSectionController@sectionUpdate')->name('mybrand.news.section-update');
        Route::delete('mybrand/news/section-delete/{news_details}', 'MyBrandNewsSectionController@sectionDelete')->name('mybrand.news.section-delete');

        Route::get('mybrand/{slug}/flipbook', 'FlipbookController@index')->name('mybrand.flipbook');
        Route::post('mybrand/flipbook/section2/store/{brand}', 'FlipbookController@section2Store')->name('mybrand.flipbook.section2.store');
        Route::post('mybrand/flipbook/section2-video/{flipbook}', 'FlipbookController@section2Slider')->name('mybrand.flipbook.section2.slider');
        Route::delete('mybrand/flipbook/section-delete/{flipbook}', 'FlipbookController@sectionDelete')->name('mybrand.flipbook.section-delete');

        Route::post('mybrand/flipbook/section3/store/{brand}', 'FlipbookController@section3Store')->name('mybrand.flipbook.section3.store');

        Route::post('/mybrand/settings/{brand}', 'BrandSettingsController@store')->name('mybrand.settings.store');
    });


});


