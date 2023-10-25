<?php

use App\Models\Customer;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PaymentController;

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

Route::get('/', ProdukController::class . '@list_produk')->name('index')->middleware('auth');
Route::get('/detail-produk/{id}', ProdukController::class . '@detail_produk')->name('detail_produk');

// Registrasi
Route::get('/register', CustomerController::class . '@showRegistrationForm')->name('register');
Route::post('/register',CustomerController::class . '@register');

// Login
Route::get('/login', CustomerController::class . '@showLoginForm')->name('login');
Route::post('/login', CustomerController::class . '@authenticate');
Route::post('/logout', CustomerController::class . '@logout')->name('logout');

Route::get('/checkout/{id}', CheckoutController::class . '@checkout_produk')->name('checkout_produk');
Route::post('/checkout', CheckoutController::class . '@checkout_proses')->name('checkout_proses');
Route::get('/profile', CheckoutController::class . '@showUserProfile')->name('profile');
Route::get('/count-checkouts', CheckoutController::class . '@countCheckoutsByUser')->name('countCheckoutsByUser');

// Payment
Route::get('/payment', PaymentController::class . '@payment')->name('payment');
Route::post('/payment', PaymentController::class . '@proses_payment')->name('proses_payment');

// Admin
Route::get('/admin', AdminController::class . '@halaman_admin')->name('index-admin');
Route::get('/admin/add-produk', AdminController::class . '@form_add_produk')->name('admin-add-produk');
Route::post('/admin/add-produk', AdminController::class . '@proses_add_produk')->name('admin-proses-produk');