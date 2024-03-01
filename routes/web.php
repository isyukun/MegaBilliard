<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CustomerController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');

/*Customer Family*/
Route::get('/customers', [CustomerController::class, 'index'])->name('customer.index');
Route::get('/customers/create', [CustomerController::class, 'create'])->name('customer.create');
Route::post('/customers', [CustomerController::class, 'store'])->name('customer.store');
Route::post('/customers/{id}/activate', [CustomerController::class, 'activate'])->name('customer.activate');
Route::post('/customers/{id}/deactivate', [CustomerController::class, 'deactivate'])->name('customer.deactivate');
Route::delete('/customers/{id}', [CustomerController::class, 'destroy'])->name('customer.destroy');

/*Billing Family*/
Route::get('/billing', [BillingController::class, 'index'])->name('billing.index');
Route::post('/tables/{id}/activate', [BillingController::class, 'activateTable'])->name('tables.activate');
Route::post('/tables/{id}/deactivate', [BillingController::class, 'deactivateTable'])->name('tables.deactivate');
Route::get('/billing', [BillingController::class, 'index'])->name('billing.index');
Route::post('/billing/{table}/stopout', [BillingController::class, 'stopOut'])->name('billing.stopout');
Route::post('/billing/{table}/disable', [BillingController::class, 'disable'])->name('billing.disable');
Route::post('/billing/{table}/enable', [BillingController::class, 'enable'])->name('billing.enable');
