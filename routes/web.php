<?php

use App\Http\Controllers\Admin\DashboardController;
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
Route::get('/userprofile',[DashboardController::class, 'test']);

// Route::get('/userprofile', function () {
//     return view('userprofile');
// });
#####group route with auth#######
Route::middleware(['auth'])->group(function(){
    Route::controller(DashboardController::class)->group( function(){
        // Route::get('/userprofile', 'test');
        // Route::get('/userprofile2', 'test2');
        // Route::get('/userprofile3', 'test3');
        // Route::get('/userprofile4', 'test4');
        Route::get('/admin/dashboard', 'test');
    });   
});

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
