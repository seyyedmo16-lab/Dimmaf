<?php

use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\FaqController;
use App\Http\Controllers\Api\StateController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Public API routes
Route::prefix('v1')->group(function () {
    
    // Public blog routes
    Route::get('/blogs', [BlogController::class, 'index']);
    Route::get('/blogs/{blog}', [BlogController::class, 'show']);
    
    // Public FAQ routes
    Route::get('/faqs', [FaqController::class, 'index']);
    Route::get('/faqs/{faq}', [FaqController::class, 'show']);
    
    // Public state routes
    Route::get('/states', [StateController::class, 'index']);
    Route::get('/states/active', [StateController::class, 'active']);
    Route::get('/states/{state}', [StateController::class, 'show']);
    
    // Public contact form
    Route::post('/contacts', [ContactController::class, 'store']);
    Route::get('/contacts/create', [ContactController::class, 'create']);
    
    // Public info routes
    Route::get('/info', function () {
        return response()->json([
            'success' => true,
            'data' => \App\Models\Info::all(),
            'message' => 'Information pages retrieved successfully'
        ]);
    });
    
    Route::get('/about-us', function () {
        return response()->json([
            'success' => true,
            'data' => \App\Models\AboutUs::first(),
            'message' => 'About us information retrieved successfully'
        ]);
    });
    
    Route::get('/what-we-do', function () {
        return response()->json([
            'success' => true,
            'data' => \App\Models\WhatDoWe::all(),
            'message' => 'What we do information retrieved successfully'
        ]);
    });
    
    Route::get('/what-we-do/{whatDoWe:slug}', function (\App\Models\WhatDoWe $whatDoWe) {
        return response()->json([
            'success' => true,
            'data' => $whatDoWe,
            'message' => 'What we do item retrieved successfully'
        ]);
    });
});

// Protected API routes (Admin only)
Route::prefix('v1/admin')->middleware(['auth:sanctum', 'admin'])->group(function () {
    
    // Blog management
    Route::apiResource('blogs', BlogController::class);
    Route::get('/blogs/{blog}/edit', [BlogController::class, 'edit']);
    
    // Contact management
    Route::apiResource('contacts', ContactController::class);
    Route::get('/contacts/history', [ContactController::class, 'history']);
    
    // FAQ management
    Route::apiResource('faqs', FaqController::class);
    
    // State management
    Route::apiResource('states', StateController::class)->except(['store', 'destroy']);
    
    // Info management
    Route::get('/info', function () {
        return response()->json([
            'success' => true,
            'data' => \App\Models\Info::all(),
            'message' => 'Information pages retrieved successfully'
        ]);
    });
    
    Route::put('/info/{info}', function (\App\Http\Requests\InfoUpdateRequest $request, \App\Models\Info $info) {
        $info->update($request->validated());
        
        return response()->json([
            'success' => true,
            'data' => $info,
            'message' => 'Information page updated successfully'
        ]);
    });
    
    // About Us management
    Route::get('/about-us', function () {
        return response()->json([
            'success' => true,
            'data' => \App\Models\AboutUs::first(),
            'message' => 'About us information retrieved successfully'
        ]);
    });
    
    Route::put('/about-us', function (\App\Http\Requests\AboutUsUpdateRequest $request) {
        $aboutUs = \App\Models\AboutUs::firstOrCreate(['id' => 1]);
        $aboutUs->update($request->validated());
        
        return response()->json([
            'success' => true,
            'data' => $aboutUs,
            'message' => 'About us information updated successfully'
        ]);
    });
    
    // What We Do management
    Route::get('/what-we-do', function () {
        return response()->json([
            'success' => true,
            'data' => \App\Models\WhatDoWe::all(),
            'message' => 'What we do information retrieved successfully'
        ]);
    });
    
    Route::put('/what-we-do/{whatDoWe}', function (\App\Http\Requests\WhatDoWeUpdateRequest $request, \App\Models\WhatDoWe $whatDoWe) {
        $whatDoWe->update($request->validated());
        
        return response()->json([
            'success' => true,
            'data' => $whatDoWe,
            'message' => 'What we do item updated successfully'
        ]);
    });
});

// User authentication routes
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return response()->json([
        'success' => true,
        'data' => $request->user(),
        'message' => 'User retrieved successfully'
    ]);
});

// Health check route
Route::get('/health', function () {
    return response()->json([
        'success' => true,
        'data' => [
            'status' => 'healthy',
            'timestamp' => now()->toISOString(),
            'version' => '1.0.0'
        ],
        'message' => 'API is healthy'
    ]);
});
