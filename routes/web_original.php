<?php

use App\Models\AboutUs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
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

// admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    // Route::get('index' , function () {return view('panel.admin.dashboard');})->name('dashboard');
    Route::get('index', 'admin\ContactController@index')->name('dashboard');

    // profile 
    Route::get('profile/index', 'admin\ProfileController@index')->name('admin.profile.index');
    Route::post('profile/verify', 'admin\ProfileController@verify')->name('admin.profile.verify');
    Route::post('profile/update', 'admin\ProfileController@update')->name('admin.profile.update');

    // contact 
    Route::get('contact/index', 'admin\ContactController@index')->name('admin.contact.index');
    Route::get('contact/history', 'admin\ContactController@history')->name('admin.contact.history');
    Route::get('contact/{contact}', 'admin\ContactController@show')->name('admin.contact.show');
    Route::put('contact/update/{contact}', 'admin\ContactController@update')->name('admin.contact.update');

    // FAQ
    Route::get('FAQ/index', 'admin\FaqController@index')->name('admin.faq.index');
    Route::get('FAQ/create', 'admin\FaqController@create')->name('admin.faq.create');
    Route::post('FAQ/store', 'admin\FaqController@store')->name('admin.faq.store');
    Route::get('FAQ/edit/{faq}', 'admin\FaqController@edit')->name('admin.faq.edit');
    Route::put('FAQ/update/{faq}', 'admin\FaqController@update')->name('admin.faq.update');
    Route::get('FAQ/destroy/{faq}', 'admin\FaqController@destroy')->name('admin.faq.delete');

    // state
    Route::get('state/index', 'admin\StateController@index')->name('admin.state.index');
    Route::get('state/edit/{state}', 'admin\StateController@edit')->name('admin.state.edit');
    Route::put('state/update/{state}', 'admin\StateController@update')->name('admin.state.update');

    // Blog
    Route::get('blog/index', 'admin\BlogController@index')->name('admin.blog.index');
    Route::get('blog/create', 'admin\BlogController@create')->name('admin.blog.create');
    Route::post('blog/store', 'admin\BlogController@store')->name('admin.blog.store');
    Route::get('blog/edit/{blog}', 'admin\BlogController@edit')->name('admin.blog.edit');
    Route::get('blog/{blog}', 'admin\BlogController@show')->name('admin.blog.show');
    Route::put('blog/update/{blog}', 'admin\BlogController@update')->name('admin.blog.update');

    // store uploded image
    Route::post('/ckeditor/upload', 'admin\CKEditorController@upload')->name('admin.ckeditor.image-upload');


    // category
    Route::get('category/index', 'admin\CategoryController@index')->name('admin.category.index');
    Route::get('category/edit', 'admin\CategoryController@edit')->name('admin.category.edit');
    
    // Info Tab
    Route::get('info/index', 'admin\InfoController@index')->name('admin.info.index');
    Route::get('info/edit/{info}', 'admin\InfoController@edit')->name('admin.info.edit');
    Route::put('info/update/{info}', 'admin\InfoController@update')->name('admin.info.update');

    // WhatDOWe
    Route::get('what-do/index', 'admin\WhatDoWeController@index')->name('admin.whatDo.index');
    Route::get('what-do/edit/{whatDoWe}', 'admin\WhatDoWeController@edit')->name('admin.whatDo.edit');
    Route::put('what-do/edit/{whatDoWe}', 'admin\WhatDoWeController@update')->name('admin.whatDo.update');

    // About Us
    Route::get('about-us', 'admin\AboutUsController@show')->name('admin.aboutUs.show');
    Route::put('about-us', 'admin\AboutUsController@update')->name('admin.aboutUs.update');
    

});

// home
Route::get('/', 'guest\LandingController@index')->name('home');

// Test route
Route::get('/test', function () {
    return 'Test route is working!';
});

//whatWeDoOffer
Route::get('/whatdoweoffer/{whatDoWe:slug}', 'guest\WhatDoWeOfferController@show')->name('whatdoweoffer.show');
Route::get('/whatdoweoffers', 'guest\WhatDoWeOfferController@index')->name('whatdoweoffer.index');

// blog
Route::get('blog/index/{state?}', 'guest\BlogController@index')->name('guest.blog.index');
Route::get('blog/show/{blog}', 'guest\BlogController@show')->name('guest.blog.show');

Route::get('aboutus', function () {
    return view('panel.guest.aboutus.index')->with(['about'=>AboutUs::find(1)]);
})->name('aboutus');

// contact
Route::post('contact/store', 'guest\ContactController@store')->name('guest.contact.store');

// set lang cookie
Route::get('lang/{lang}', 'General\cookieLanguageController@store')->name('guest.cookie.store');
Route::get('cookieAccept/{accept}', 'General\cookieAcceptController@store')->name('guest.cookie.accept');

// auth
Auth::routes();
Auth::routes(['register' => false]);
Route::get('dimmaf-admin-login', 'Auth\LoginController@showLoginForm');
