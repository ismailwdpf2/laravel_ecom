<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\SubCategoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/userprofile', [DashboardController::class, 'test']);

Route::get('/userprofile', function () {
    return view('userprofile');
});
#####group route with auth#######
Route::middleware(['auth'])->group(function () {

    Route::controller(DashboardController::class)->group(function () {
        Route::get('userprofile', 'test');
        Route::get('admindashboard', 'index')->name('admindashboard');
    });
    Route::controller(CategoryController::class)->group(function () {
        Route::get('all-category', 'index')->name('allcategory');
        Route::get('add-category', 'addcategory')->name('addcategory');
        Route::get('store-category', 'storecategory')->name('storecategory');
    });


    Route::controller(SubCategoryController::class)->group(function () {
        Route::get('all-subCategory', 'index')->name('allsubcategory');
        Route::get('add-subCategory', 'addsubcategory')->name('addsubcategory');
    });
    Route::controller(ProductController::class)->group(function () {
        Route::get('all-product', 'index')->name('allproduct');
        Route::get('add-product', 'AddProduct')->name('addproduct');
    });
    Route::controller(OrderController::class)->group(function () {
        Route::get('pending-order', 'PendingOrder')->name('pendingorder');
        Route::get('complete-order', 'CompleteOrder')->name('completeorder');
    });
});

Route::get('/', function () {
    return view('welcome');
});


Route::get('/admin', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name("admin");



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
