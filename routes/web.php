<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{BannerController, CategoryController, FrontController, GeneralController, PcategoryController, PortfolioController, PostController, TagController};

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
Route::get('portfolio/{slug}', [FrontController::class, 'portfolioshow'])->name('portfolioshow');
Route::get('blog', [FrontController::class, 'blog'])->name('blog');
Route::get('blog/detail', [FrontController::class, 'blogshow'])->name('blogshow');

Auth::routes([
    'register' => false
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware('auth')->group(function () {

    Route::get('dashboard', [GeneralController::class, 'dashboard'])->name('admin.dashboard');

    // General settings
    Route::get('general-settings', [GeneralController::class, 'general'])->name('admin.general');
    Route::post('general-settings', [GeneralController::class, 'generalUpdate'])->name('admin.general.update');

    // About
    Route::get('about', [GeneralController::class, 'about'])->name('admin.about');
    Route::post('about', [GeneralController::class, 'aboutUpdate'])->name('about.update');

    // Manage Banner
    Route::get('banner', [BannerController::class, 'index'])->name('admin.banner');
    Route::get('banner/create', [BannerController::class, 'create'])->name('admin.banner.create');
    Route::post('banner/create', [BannerController::class, 'store'])->name('admin.banner.store');
    Route::get('banner/edit/{id}', [BannerController::class, 'edit'])->name('admin.banner.edit');
    Route::post('banner/edit/{id}', [BannerController::class, 'update'])->name('admin.banner.update');
    Route::delete('banner/destroy/{id}',[BannerController::class, 'destroy'])->name('admin.banner.destroy');

     // Manage Portfolio Categories
     Route::get('portfolio-categories', [PcategoryController::class, 'index'])->name('admin.pcategory');
     Route::post('portfolio-categories', [PcategoryController::class, 'store'])->name('admin.pcategory.store');
     Route::get('Portfolio-categories/edit/{id}', [PcategoryController::class, 'edit'])->name('admin.pcategory.edit');
     Route::post('Portfolio-categories/edit/{id}', [PcategoryController::class, 'update'])->name('admin.pcategory.update');
     Route::delete('Portfolio-categories/destroy/{id}',[PcategoryController::class, 'destroy'])->name('admin.pcategory.destroy');

     // Manage Portfolio
    Route::get('portfolio', [PortfolioController::class, 'index'])->name('admin.portfolio');
    Route::get('portfolio/create', [PortfolioController::class, 'create'])->name('admin.portfolio.create');
    Route::post('portfolio/create', [PortfolioController::class, 'store'])->name('admin.portfolio.store');
    Route::get('portfolio/edit/{id}', [PortfolioController::class, 'edit'])->name('admin.portfolio.edit');
    Route::post('portfolio/edit/{id}', [PortfolioController::class, 'update'])->name('admin.portfolio.update');
    Route::delete('portfolio/destroy/{id}',[PortfolioController::class, 'destroy'])->name('admin.portfolio.destroy');

     // Manage Categories
     Route::get('categories', [CategoryController::class, 'index'])->name('admin.category');
     Route::get('categories/create', [CategoryController::class, 'create'])->name('admin.category.create');
     Route::post('categories/create', [CategoryController::class, 'store'])->name('admin.category.store');
     Route::get('categories/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
     Route::post('categories/edit/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
     Route::delete('categories/destroy/{id}',[CategoryController::class, 'destroy'])->name('admin.category.destroy');

     // Manage Tags
     Route::get('tags', [TagController::class, 'index'])->name('admin.tag');
     Route::get('tags/create', [TagController::class, 'create'])->name('admin.tag.create');
     Route::post('tags/create', [TagController::class, 'store'])->name('admin.tag.store');
     Route::get('tags/edit/{id}', [TagController::class, 'edit'])->name('admin.tag.edit');
     Route::post('tags/edit/{id}', [TagController::class, 'update'])->name('admin.tag.update');
     Route::delete('tags/destroy/{id}',[TagController::class, 'destroy'])->name('admin.tag.destroy');

     // Manage Blog
    Route::get('post',[PostController::class, 'index'])->name('admin.post');

    Route::get('post/create',[PostController::class, 'create'])->name('admin.post.create');

    Route::post('post/create',[PostController::class, 'store'])->name('admin.post.store');

    Route::get('post/edit/{id}',[PostController::class, 'edit'])->name('admin.post.edit');

    Route::post('post/edit/{id}',[PostController::class, 'update'])->name('admin.post.update');

    Route::get('post/trash',[PostController::class, 'trash'])->name('admin.post.trash');

    Route::post('post/{id}/restore',[PostController::class, 'restore'])->name('admin.post.restore');

    Route::delete('post/trash/{id}',[PostController::class, 'destroy'])->name('admin.post.destroy');

    Route::delete('post/destroy/{id}',[PostController::class, 'deletePermanent'])->name('admin.post.deletePermanent');

});
