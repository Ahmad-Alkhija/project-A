<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ListProductController;
use App\Http\Controllers\productGalleryController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\CategoryUserController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\ProductViewController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderAddController;
use App\Http\Controllers\OrderListController;











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
Route::get('/', function () {
    return view('masterUser');
});
Route::resource('/categoryUser', CategoryUserController::class);
Route::resource('/productView', ProductViewController::class);
Route::resource('/card', CardController::class);
Route::resource('/productGallery', ProductGalleryController::class);
Route::resource('/order', OrderController::class);
Route::resource('/home', HomeController::class);







Route::post('auth/save',[MainController::class,'save'])->name('auth.save');
Route::post('auth/check',[MainController::class,'check'])->name('auth.check');
Route::get('auth/logout',[MainController::class,'logout'])->name('auth.logout');

Route::group(['middleware'=>['AuthLogin']],function(){
    Route::get('auth/register',[MainController::class,'register'])->name('auth.register');
    Route::get('auth/login',[MainController::class,'login'])->name('auth.login');
    Route::get('master',[MainController::class,'master'])->name('master');
    Route::resource('/category', CategoryController::class);
    Route::resource('/subCategory', SubCategoryController::class);
    Route::resource('/product', ProductController::class);
    Route::resource('/listProduct', ListProductController::class);
    Route::resource('/offer', OfferController::class);
    Route::resource('/orderAdd', OrderAddController::class);
    Route::resource('/orderList', OrderListController::class);


});
