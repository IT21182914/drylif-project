<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Category;
use App\Models\Service;
use App\Models\Client;
use App\Models\Testimonial;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// API Routes for frontend data
Route::get('/categories', function () {
    return response()->json([
        'success' => true,
        'data' => Category::all()
    ]);
});

Route::get('/services', function () {
    return response()->json([
        'success' => true,
        'data' => Service::all()
    ]);
});

Route::get('/clients', function () {
    return response()->json([
        'success' => true,
        'data' => Client::all()
    ]);
});

Route::get('/testimonials', function () {
    return response()->json([
        'success' => true,
        'data' => Testimonial::all()
    ]);
});

// Health check endpoint
Route::get('/health', function () {
    return response()->json([
        'status' => 'healthy',
        'database' => 'connected',
        'timestamp' => now()
    ]);
});
