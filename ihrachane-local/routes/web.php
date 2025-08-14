<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SocialController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\SubCategoryServiceController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

// Simple test route for debugging
Route::get('/test', function () {
    return response()->json([
        'status' => 'success',
        'message' => 'Laravel is working!',
        'timestamp' => now(),
        'environment' => app()->environment(),
        'database' => [
            'connection' => config('database.default'),
            'status' => 'checking...'
        ]
    ]);
});

Route::get('/', [SiteController::class, 'index'])->name('site.index');
Route::get('sourcing', [SiteController::class, 'sourcing'])->name('site.sourcing');
Route::get('shipping', [SiteController::class, 'shipping'])->name('site.shipping');
Route::get('shipping/{slug}', [SiteController::class, 'subCategoryShow'])->name('site.subCategoryShow');
Route::post('/contact', [SiteController::class, 'storeContact'])->name('contact.store');

Route::get('/dashboard', function () {
    return view('index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::resource('category', CategoryController::class);
    Route::resource('sub_category', SubCategoryController::class);
    Route::resource('sub_category_service', SubCategoryServiceController::class);
    Route::resource('service', ServiceController::class);
    Route::resource('testimonial', TestimonialController::class);
    Route::resource('client', ClientController::class);
    Route::resource('partner', PartnerController::class);
    Route::resource('company', CompanyController::class);
    Route::resource('social', SocialController::class);
    Route::resource('contacts', ContactController::class);
});

require __DIR__ . '/auth.php';
