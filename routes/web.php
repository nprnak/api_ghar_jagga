<?php

use App\Http\Controllers\DocumentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/vision-mission', [PageController::class, 'visionMission'])->name('vision-mission');

Route::get('/services', [PageController::class, 'services'])->name('services.index');
Route::get('/services/{slug}', [PageController::class, 'serviceShow'])->name('services.show');

Route::get('/projects', [PageController::class, 'projects'])->name('projects.index');
Route::get('/projects/{slug}', [PageController::class, 'projectShow'])->name('projects.show');

Route::get('/team', [PageController::class, 'team'])->name('team');
Route::get('/testimonials', [PageController::class, 'testimonials'])->name('testimonials');

Route::get('/careers', [PageController::class, 'careers'])->name('careers.index');
Route::get('/careers/{slug}', [PageController::class, 'careerShow'])->name('careers.show');

Route::get('/news', [PageController::class, 'posts'])->name('news.index');
Route::get('/news/{slug}', [PageController::class, 'postShow'])->name('news.show');

Route::get('/gallery', [PageController::class, 'gallery'])->name('gallery');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

Route::get('/inquiry', [PageController::class, 'inquiry'])->name('inquiry');
Route::post('/inquiry', [InquiryController::class, 'store'])->name('inquiry.store');

Route::get('/documents', [PageController::class, 'documents'])->name('documents.index');
Route::get('/documents/{id}/download', [DocumentController::class, 'download'])->name('documents.download');
