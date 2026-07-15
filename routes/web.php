<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BimController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{slug}', [ProjectController::class, 'show'])->name('projects.show');

Route::get('/about', [AboutController::class, 'index'])->name('about.index');

Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/{slug}', [ServiceController::class, 'show'])->name('services.show');

Route::get('/journal', [ArticleController::class, 'index'])->name('journal.index');
Route::get('/journal/{slug}', [ArticleController::class, 'show'])->name('journal.show');

Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'submit'])->middleware('throttle:5,1')->name('contact.submit');

Route::prefix('bim')->name('bim.')->group(function () {
    Route::get('/', [BimController::class, 'home'])->name('home');
    Route::get('/services', [BimController::class, 'services'])->name('services');
    Route::get('/services/{category}', [BimController::class, 'serviceCategory'])->name('services.category');
    Route::get('/contact', [BimController::class, 'contact'])->name('contact');
    Route::post('/contact', [BimController::class, 'submitContact'])->middleware('throttle:5,1')->name('contact.submit');
});
