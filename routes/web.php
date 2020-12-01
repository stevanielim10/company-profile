<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{BannerController, FrontController, GeneralController};

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [FrontController::class, 'home'])->name('homepage');
Route::get('about-us', [FrontController::class, 'about'])->name('about');
Route::get('testimonials', [FrontController::class, 'testi'])->name('testi');
Route::get('services', [FrontController::class, 'service'])->name('service');
Route::get('portfolio', [FrontController::class, 'portfolio'])->name('portfolio');
Route::get('portfolio/detail', [FrontController::class, 'portfolioshow'])->name('portfolioshow');
Route::get('blog', [FrontController::class, 'blog'])->name('blog');
Route::get('blog/detail', [FrontController::class, 'blogshow'])->name('blogshow');

Auth::routes([
    'register' => false
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware('auth')->group(function () {

    Route::get('dashboard', [GeneralController::class, 'dashboard'])->name('dashboard');

    // General settings
    Route::get('general-settings', [GeneralController::class, 'general'])->name('general');
    Route::post('general-settings', [GeneralController::class, 'generalUpdate'])->name('general.update');

    // About
    Route::get('about', [GeneralController::class, 'about'])->name('about');
    Route::post('about', [GeneralController::class, 'aboutUpdate'])->name('about.update');

    // Manage Banner
    Route::get('banner', [BannerController::class, 'index'])->name('banner');
    Route::get('banner/create', [BannerController::class, 'create'])->name('banner.create');
    Route::post('banner/create', [BannerController::class, 'store'])->name('banner.store');
    Route::get('banner/edit/{id}', [BannerController::class, 'edit'])->name('banner.edit');
    Route::post('banner/edit/{id}', [BannerController::class, 'update'])->name('banner.update');
    Route::delete('banner/destroy/{id}',[BannerController::class, 'destroy'])->name('banner.destroy');
});
