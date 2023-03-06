<?php

use App\Http\Controllers\DemoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\logInController;
use App\Http\Controllers\logUpController;
use App\Http\Controllers\passwordController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\AddProductController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\OrderDetailsController;


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

Route::get('/', [DemoController::class, 'show'])->name('demo.show');

Route::get('/loginForm', [logInController::class, 'getLogIn']);
Route::post('/loginForm', [logInController::class, 'postLogIn']);

Route::get('/signupForm', [logUpController::class, 'getLogUp']);
Route::post('/signupForm', [logUpController::class, 'postLogUp']);

Route::get('/forgetPassword', [passwordController::class, 'getForgetPassword']);
Route::post('/forgetPassword', [passwordController::class, 'postForgetPassword']);

Route::get('homepage', [HomeController::class, 'getHome']);
Route::post('homepage', [HomeController::class, 'chooseVar']);

Route::get('cart', [CartController::class, 'getCart']);
Route::post('post-cart', [CartController::class, 'postCart'])->name('post-cart');

Route::get('checkout', [CheckOutController::class, 'getCheckOut']);
Route::post('checkout', [CheckOutController::class, 'postCheckOut']);

Route::get('products', [ProductsController::class, 'getProducts']);

Route::get('addproduct', [AddProductController::class, 'getAddProduct']);

Route::get('orders', [OrdersController::class, 'getOrders']);

Route::get('orderdetails', [OrderDetailsController::class, 'getOrderDetails']);

?>