<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\Admin\InquiryController as AdminInquiryController;
use App\Http\Controllers\Admin\PropertyController as AdminPropertyController;
use App\Http\Controllers\Admin\SettingController as AdminSettingController;
use App\Http\Controllers\Admin\SiteImageController as AdminSiteImageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\PropertySubmissionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Frontend Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');

// Properties
Route::get('/properties', [PropertyController::class, 'index'])->name('properties.index');
Route::get('/properties/{slug}', [PropertyController::class, 'show'])->name('properties.show');

// Gallery (Replaced Blog & News per user requirement)
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');

// Static / Content Pages
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

// User Property Listing
Route::get('/post-property', [PropertySubmissionController::class, 'create'])->name('post-property.create');
Route::post('/post-property', [PropertySubmissionController::class, 'store'])->name('post-property.store');

// Inquiries & Leads
Route::post('/inquiries', [InquiryController::class, 'store'])->name('inquiries.store');

// Client Authentication
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Admin Portal Routes
|--------------------------------------------------------------------------
| When visiting /admin: redirects to /admin/login if not logged in.
*/
Route::prefix('admin')->name('admin.')->group(function () {
    // Root /admin redirect
    Route::get('/', function () {
        if (Auth::check() && Auth::user()->isAdmin()) {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('admin.login');
    });

    // Admin Auth
    Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login.post');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

    // Protected Admin Routes
    Route::middleware(['admin'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Site Images Manager (Critical requirement: manage all images from admin)
        Route::get('/site-images', [AdminSiteImageController::class, 'index'])->name('site-images.index');
        Route::post('/site-images/{id}', [AdminSiteImageController::class, 'update'])->name('site-images.update');

        // Properties Management
        Route::resource('properties', AdminPropertyController::class);
        Route::post('/properties/{id}/toggle-featured', [AdminPropertyController::class, 'toggleFeatured'])->name('properties.toggle-featured');

        // Gallery Management
        Route::get('/gallery', [AdminGalleryController::class, 'index'])->name('gallery.index');
        Route::post('/gallery', [AdminGalleryController::class, 'store'])->name('gallery.store');
        Route::delete('/gallery/{id}', [AdminGalleryController::class, 'destroy'])->name('gallery.destroy');

        // Inquiries Management
        Route::get('/inquiries', [AdminInquiryController::class, 'index'])->name('inquiries.index');
        Route::patch('/inquiries/{id}/status', [AdminInquiryController::class, 'updateStatus'])->name('inquiries.status');
        Route::delete('/inquiries/{id}', [AdminInquiryController::class, 'destroy'])->name('inquiries.destroy');

        // Theme Colors & Site Settings
        Route::get('/settings', [AdminSettingController::class, 'index'])->name('settings.index');
        Route::post('/settings', [AdminSettingController::class, 'update'])->name('settings.update');
    });
});
