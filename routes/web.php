<?php

use App\Models\AboutUs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Public routes
Route::get('/', [App\Http\Controllers\guest\LandingController::class, 'index'])->name('home');

// Original routes from dimmaf project
Route::get('/test', function () {
    return 'Test route is working!';
});

// Blog routes
Route::get('blog/index/{state?}', [App\Http\Controllers\guest\BlogController::class, 'index'])->name('guest.blog.index');
Route::get('blog/show/{blog}', [App\Http\Controllers\guest\BlogController::class, 'show'])->name('guest.blog.show');

// About us
Route::get('aboutus', function () {
    $about = AboutUs::first();
    return view('aboutus', compact('about'));
})->name('aboutus');

// Contact
Route::post('contact/store', [App\Http\Controllers\guest\ContactController::class, 'store'])->name('guest.contact.store');

// What we do
Route::get('/whatdoweoffer/{whatDoWe:slug}', [App\Http\Controllers\guest\WhatDoWeOfferController::class, 'show'])->name('whatdoweoffer.show');
Route::get('/whatdoweoffers', [App\Http\Controllers\guest\WhatDoWeOfferController::class, 'index'])->name('whatdoweoffer.index');

// Test route
Route::get('/test', function () {
    return 'Test route is working!';
});

// Test language route
Route::get('/test-lang', function () {
    return 'Current language: ' . session('lang', 'not set');
});

// Test blog controller
Route::get('/test-blog/{state?}', [App\Http\Controllers\guest\BlogController::class, 'index']);

// Debug language route
Route::get('/debug-lang', function () {
    $lang = session('lang', 'not set');
    $state = \App\Models\State::find(11);
    $blog = \App\Models\Blog::where('state_id', 11)->first();
    
    return [
        'current_lang' => $lang,
        'state_name' => $state->name ?? 'not found',
        'blog_title_en' => $blog->title_en ?? 'not found',
        'blog_title_fa' => $blog->title_fa ?? 'not found',
        'blog_body_en_empty' => empty($blog->body_en),
        'blog_body_fa_empty' => empty($blog->body_fa),
    ];
});

// Debug view route
Route::get('/debug-view', function () {
    $lang = session('lang', 'not set');
    return view('debug', compact('lang'));
});

// Test UI route
Route::get('/ui-test', function () {
    return view('landing', [
        'states' => \App\Models\State::activeStates(),
        'faqs' => \App\Models\Faq::all(),
        'infoes' => \App\Models\Info::where([['title_en', '<>', null], ['body_en', '<>', null]])->get(),
    ]);
});

// About us page
Route::get('/aboutus', function () {
    $about = AboutUs::first();
    return view('panel.guest.aboutus.index', compact('about'));
})->name('aboutus');

// Language and cookie management
Route::get('/lang/{lang}', [App\Http\Controllers\General\cookieLanguageController::class, 'store'])->name('language.switch');

Route::get('/cookie-accept/{accept}', function ($accept) {
    $response = redirect()->back();
    if($accept == 'yes') {
        $response->withCookie(cookie('accept', 'yes', 60 * 24 * 365));
    }
    return $response;
})->name('cookie.accept');

// Authentication routes
require __DIR__.'/auth.php';

// Admin login route
Route::get('dimmaf-admin-login', function () {
    return view('auth.login');
})->name('admin.login');

// Admin routes (protected)
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    
    // Dashboard
    Route::get('/dashboard', [App\Http\Controllers\admin\ContactController::class, 'index'])->name('dashboard');
    
    // Profile management
    Route::get('profile/index', [App\Http\Controllers\admin\ProfileController::class, 'index'])->name('profile.index');
    Route::post('profile/verify', [App\Http\Controllers\admin\ProfileController::class, 'verify'])->name('profile.verify');
    Route::post('profile/update', [App\Http\Controllers\admin\ProfileController::class, 'update'])->name('profile.update');
    
    // Contact management
    Route::get('contact/index', [App\Http\Controllers\admin\ContactController::class, 'index'])->name('contact.index');
    Route::get('contact/history', [App\Http\Controllers\admin\ContactController::class, 'history'])->name('contact.history');
    Route::get('contact/{contact}', [App\Http\Controllers\admin\ContactController::class, 'show'])->name('contact.show');
    Route::put('contact/update/{contact}', [App\Http\Controllers\admin\ContactController::class, 'update'])->name('contact.update');
    
    // FAQ management
    Route::get('FAQ/index', [App\Http\Controllers\admin\FaqController::class, 'index'])->name('faq.index');
    Route::get('FAQ/create', [App\Http\Controllers\admin\FaqController::class, 'create'])->name('faq.create');
    Route::post('FAQ/store', [App\Http\Controllers\admin\FaqController::class, 'store'])->name('faq.store');
    Route::get('FAQ/edit/{faq}', [App\Http\Controllers\admin\FaqController::class, 'edit'])->name('faq.edit');
    Route::put('FAQ/update/{faq}', [App\Http\Controllers\admin\FaqController::class, 'update'])->name('faq.update');
    Route::get('FAQ/destroy/{faq}', [App\Http\Controllers\admin\FaqController::class, 'destroy'])->name('faq.delete');
    
    // State management
    Route::get('state/index', [App\Http\Controllers\admin\StateController::class, 'index'])->name('state.index');
    Route::get('state/edit/{state}', [App\Http\Controllers\admin\StateController::class, 'edit'])->name('state.edit');
    Route::put('state/update/{state}', [App\Http\Controllers\admin\StateController::class, 'update'])->name('state.update');
    
    // Blog management
    Route::get('blog/index', [App\Http\Controllers\admin\BlogController::class, 'index'])->name('blog.index');
    Route::get('blog/create', [App\Http\Controllers\admin\BlogController::class, 'create'])->name('blog.create');
    Route::post('blog/store', [App\Http\Controllers\admin\BlogController::class, 'store'])->name('blog.store');
    Route::get('blog/edit/{blog}', [App\Http\Controllers\admin\BlogController::class, 'edit'])->name('blog.edit');
    Route::get('blog/{blog}', [App\Http\Controllers\admin\BlogController::class, 'show'])->name('blog.show');
    Route::put('blog/update/{blog}', [App\Http\Controllers\admin\BlogController::class, 'update'])->name('blog.update');
    
    // Category management
    Route::get('category/index', [App\Http\Controllers\admin\CategoryController::class, 'index'])->name('category.index');
    Route::get('category/edit', [App\Http\Controllers\admin\CategoryController::class, 'edit'])->name('category.edit');
    
    // Info management
    Route::get('info/index', [App\Http\Controllers\admin\InfoController::class, 'index'])->name('info.index');
    Route::get('info/edit/{info}', [App\Http\Controllers\admin\InfoController::class, 'edit'])->name('info.edit');
    Route::put('info/update/{info}', [App\Http\Controllers\admin\InfoController::class, 'update'])->name('info.update');
    
    // WhatDoWe management
    Route::get('what-do/index', [App\Http\Controllers\admin\WhatDoWeController::class, 'index'])->name('whatDo.index');
    Route::get('what-do/edit/{whatDoWe}', [App\Http\Controllers\admin\WhatDoWeController::class, 'edit'])->name('whatDo.edit');
    Route::put('what-do/edit/{whatDoWe}', [App\Http\Controllers\admin\WhatDoWeController::class, 'update'])->name('whatDo.update');
    
    // About Us management
    Route::get('about-us', [App\Http\Controllers\admin\AboutUsController::class, 'show'])->name('aboutUs.show');
    Route::put('about-us', [App\Http\Controllers\admin\AboutUsController::class, 'update'])->name('aboutUs.update');
    
    // CKEditor upload
    Route::post('/ckeditor/upload', [App\Http\Controllers\admin\CKEditorController::class, 'upload'])->name('ckeditor.image-upload');
});

// API documentation route (if needed)
Route::get('/api/docs', function () {
    return view('api.docs');
})->name('api.docs');
