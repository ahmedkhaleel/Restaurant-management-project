<?php

use App\Http\Controllers\Cashier\CashierController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Management\CategoryController;
use App\Http\Controllers\Management\MenuController;
use App\Http\Controllers\Management\TableController;
use App\Http\Controllers\ManagementController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/cashier', [CashierController::class, 'index'])->name('cashier.index');
Route::get('/cashier/getTables',[CashierController::class, 'getTables']);
Route::get('/management',[ManagementController::class,'index'])->name('management.index');
Route::resource('management/category',CategoryController::class);
Route::resource('management/menu',MenuController::class);
Route::resource('management/table',TableController::class);
