<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicPortfolioController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\EducationController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\MessageController;

// Public Portfolio Routes
Route::get('/', [PublicPortfolioController::class, 'index'])->name('portfolio.index');
Route::get('/download-cv', [PublicPortfolioController::class, 'downloadCv'])->name('portfolio.download-cv');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Admin Auth Routes
Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Protected Dashboard Routes
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // CRUD Resources
    Route::resource('projects', ProjectController::class);
    Route::resource('experiences', ExperienceController::class);
    Route::resource('education', EducationController::class);
    Route::resource('skills', SkillController::class);
    
    // Profile & CV Edit
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    
    // Messages Inbox
    Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
    Route::get('/messages/{message}', [MessageController::class, 'show'])->name('messages.show');
    Route::delete('/messages/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');
});
