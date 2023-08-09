<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\SubCategoryController;
use App\Http\Controllers\Frontend\ClinteController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Routing\Router;
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
/////Frontend routes///////

// Route::get('/', function () {
//     return view('frontend.template');
// });

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
});

Route::controller(ClinteController::class)->group(function () {
    Route::get('/category/{id}/{slug}', 'categorypage')->name('category');
    Route::get('product-detail/{id}', 'singlepage')->name('singlepage');
    Route::get('customer-service', 'customerservice')->name('customerservice');
});

//////User routes////////
Route::middleware(['auth'])->group(function (){
    Route::controller(ClinteController::class)->group(function (){
    Route::get('/category/{id}/{slug}', 'categorypage')->name('category');
    Route::get('product-detail/{id}', 'singlepage')->name('singlepage');
    Route::get('add-to-cart', 'addtocart')->name('addtocart');
    Route::post('add-product-cart/{id}', 'addproductcart')->name('addproductcart');
    Route::get('shipping-address', 'shippingaddress')->name('shippingaddress');
    Route::post('add-shipping-address', 'Addshippingaddress')->name('addshippingaddress');
    Route::get('check-out', 'checkout')->name('checkout');
    Route::get('user-profile', 'userprofile')->name('userprofile');
    Route::get('user-profile/pending-order', 'pendingOrder')->name('pendingOrder');
    Route::get('user-profile/user-history', 'userHistory')->name('userHistory');
    Route::get('customer-service', 'customerservice')->name('customerservice');
    Route::get('remove-cart-item/{id}', 'removecart')->name('removecart');
});
});
//////Admin routes////////

Route::middleware(['auth'])->group(function () {

    Route::controller(DashboardController::class)->group(function () {
        // Route::get('userprofile', 'test');
        Route::get('/admin', 'index')->name('admindashboard');
            
    });

    Route::controller(CategoryController::class)->group(function () {
        Route::get('all-category', 'index')->name('allcategory');
        Route::get('add-category', 'addcategory')->name('addcategory');
        Route::get('store-category', 'storecategory')->name('storecategory');
        Route::get('edit-category/{id}', 'editcategory')->name('editcategory');
        Route::post('update-category', 'updatecategory')->name('updatecategory');
        Route::get('delete-category/{id}', 'deletecategory')->name('deletecategory');
    });

    Route::controller(SubCategoryController::class)->group(function () {
        Route::get('all-subCategory', 'index')->name('allsubcategory');
        Route::get('add-subCategory', 'addsubcategory')->name('addsubcategory');
        Route::post('store-subcategory', 'storesubcategory')->name('storesubcategory');
        Route::get('edit-subCategory/{id}', 'editsubcategory')->name('editsubcategory');
        Route::post('update-subCategory', 'updatesubcategory')->name('updatesubcategory');
        Route::get('delete-subCategory/{id}', 'deletesubcategory')->name('deletesubcategory');
    });

    Route::controller(ProductController::class)->group(function () {
        Route::get('all-product', 'index')->name('allproduct');
        Route::get('add-product', 'addproduct')->name('addproduct');
        Route::post('storeproduct', 'storeproduct')->name('storeproduct');
        Route::get('edit-Product-Img/{id}', 'editProductImg')->name('editProductImg');
        Route::post('updateproductimg', 'updateproductimg')->name('updateproductimg');
        Route::get('edit-product/{id}', 'editproduct')->name('editproduct');
        Route::post('updateproduct', 'updateproduct')->name('updateproduct');
        Route::get('delete-product/{id}', 'deleteproduct')->name('deleteproduct');
    });

    Route::controller(OrderController::class)->group(function () {
        Route::get('pending-order', 'PendingOrder')->name('pendingorder');
        Route::get('complete-order', 'CompleteOrder')->name('completeorder');
    });
});


////default Admin routes////////
// Route::get('/admin', function () {
//     return view('dashboard');  
// })->middleware(['auth', 'verified'])->name("admin");

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
