<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\ProductsController;
use App\http\Controllers\SingleController;
use App\http\Controllers\LoginController;
use App\http\Controllers\CartController;
use App\http\Controllers\SignupController;
use App\http\Controllers\ContactController;
use App\http\Controllers\SearchController;
use App\http\Controllers\OrderController;
use App\Http\Middleware\AuthMiddleware;
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
Route::get('/',[ProductsController::class,'index'])->name('index');
Route::get('/category/{cat_id}', [ProductsController::class, 'category'])->name('category');
Route::get('/single/{id}', [SingleController::class, 'single'])->name('single');
Route::get('/signup', [SignupController::class, 'index'])->name('signup');
Route::post('/signupform', [SignupController::class, 'signup'])->name('signupform');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/loginform', [LoginController::class, 'login'])->name('loginform');
Route::post('/addtocart', [SingleController::class, 'addtocart'])->name('addtocart');
Route::post('/addcomment', [SingleController::class, 'addcomment'])->name('addcomment');
Route::post('/updatecomment', [SingleController::class, 'updatecomment'])->name('updatecomment');
Route::post('/deletecomment', [SingleController::class, 'deletecomment'])->name('deletecomment');
Route::post('/update_rating', [SingleController::class, 'update_rating'])->name('update_rating');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/addmessage', [ContactController::class, 'addmessage'])->name('addmessage');
Route::get('/search', [SearchController::class, 'index'])->name('search');
Route::post('/searchresult', [SearchController::class, 'searchresult'])->name('searchresult');
Route::middleware([App\Http\Middleware\AuthMiddleware::class])->group(function (){
Route::get('/cart',[CartController::class,'index'])->name('cart');
Route::post('/updateacart', [CartController::class, 'updateacart'])->name('updateacart');
Route::post('/deletefromcart', [CartController::class, 'deletefromcart'])->name('deletefromcart');
Route::post('/deleteallfromcart', [CartController::class, 'deleteallfromcart'])->name('deleteallfromcart');
Route::post('/checkout', [CartController::class, 'checkout'])->name('checkout');
Route::get('/orders', [OrderController::class, 'index'])->name('orders');
Route::get('/paymob', [OrderController::class, 'paymob'])->name('paymob');
Route::get('/status', [OrderController::class, 'status'])->name('status');
});



