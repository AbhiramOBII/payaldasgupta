<?php

use App\Http\Controllers\Admin\AuthController as AdminAuth;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\EnquiryController as AdminEnquiry;
use App\Http\Controllers\Admin\IndustryController as AdminIndustry;
use App\Http\Controllers\Admin\PostController as AdminPost;
use App\Http\Controllers\Admin\ServiceController as AdminService;
use App\Http\Controllers\Admin\SettingController as AdminSetting;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndustryController;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\LegalController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

// ── Public site ───────────────────────────────────────────────────────────
Route::get('/', [HomeController::class, 'index'])->name('home');

// About
Route::get('/about', [AboutController::class, 'index'])->name('about');

// Contact
Route::get('/contact',  [ContactController::class, 'show'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Services
Route::get('/services',              [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/{service:slug}', [ServiceController::class, 'show'])->name('services.show');

// Industries
Route::get('/industries',                [IndustryController::class, 'index'])->name('industries.index');
Route::get('/industries/{industry:slug}',[IndustryController::class, 'show'])->name('industries.show');

// Journal
Route::get('/journal',             [JournalController::class, 'index'])->name('journal.index');
Route::get('/journal/{post:slug}', [JournalController::class, 'show'])->name('journal.show');

// Legal
Route::get('/privacy-policy', [LegalController::class, 'privacy'])->name('privacy');
Route::get('/terms',          [LegalController::class, 'terms'])->name('terms');

// ── Admin ─────────────────────────────────────────────────────────────────
Route::prefix('admin')->name('admin.')->group(function () {

    // Guest-only
    Route::middleware('guest')->group(function () {
        Route::get('/login',  [AdminAuth::class, 'showLogin'])->name('login');
        Route::post('/login', [AdminAuth::class, 'login'])->name('login.post');
    });

    // Authenticated admin routes
    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [AdminDashboard::class, 'index'])->name('dashboard');
        Route::post('/logout',   [AdminAuth::class, 'logout'])->name('logout');

        // Services CRUD
        Route::resource('services', AdminService::class)->except(['show']);

        // Journal / Blog CRUD
        Route::resource('posts', AdminPost::class)->except(['show']);

        // Industries CRUD
        Route::resource('industries', AdminIndustry::class)->except(['show']);

        // Enquiries (read + status update + delete — no create/edit)
        Route::get('/enquiries',              [AdminEnquiry::class, 'index'])->name('enquiries.index');
        Route::get('/enquiries/{enquiry}',    [AdminEnquiry::class, 'show'])->name('enquiries.show');
        Route::patch('/enquiries/{enquiry}',  [AdminEnquiry::class, 'update'])->name('enquiries.update');
        Route::delete('/enquiries/{enquiry}', [AdminEnquiry::class, 'destroy'])->name('enquiries.destroy');

        // Settings
        Route::get('/settings',          [AdminSetting::class, 'index'])->name('settings.index');
        Route::put('/settings/site',     [AdminSetting::class, 'updateSite'])->name('settings.site');
        Route::put('/settings/legal',    [AdminSetting::class, 'updateLegal'])->name('settings.legal');
        Route::put('/settings/password', [AdminSetting::class, 'updatePassword'])->name('settings.password');
    });
});
