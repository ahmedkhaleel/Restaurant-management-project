<?php

use App\Http\Controllers\Cashier\CashierController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Management\CategoryController;
use App\Http\Controllers\Management\MenuController;
use App\Http\Controllers\Management\TableController;
use App\Http\Controllers\Management\UserController;
use App\Http\Controllers\ManagementController;
use App\Http\Controllers\Report\ReportController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\VerifyAdmin;


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

Route::get('/', [HomeController::class,'index']);

Auth::routes(['register'=>false,'reset'=>false]);

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::middleware(['auth','VerifyAdmin'])->group(function (){
    //routes for management
    Route::get('/management',[ManagementController::class,'index'])->name('management.index');
    Route::resource('management/category',CategoryController::class);
    Route::resource('management/menu',MenuController::class);
    Route::resource('management/table',TableController::class);
    Route::resource('management/user',UserController::class);
// routes for report
    Route::get('/report',[ReportController::class,'index'])->name('report.index');
    Route::get('/report/show',[ReportController::class,'show'])->name('report.show');

//Export to Excel
    Route::get('/report/show/export',[ReportController::class,'export'])->name('report.export');

});
Route::middleware(['auth'])->group(function (){
    // routes for cashier
    Route::get('/cashier', [CashierController::class, 'index'])->name('cashier.index');
    Route::get('/cashier/getMenuByCategory/{category_id}',[CashierController::class, 'getMenuByCategory']);
    Route::post('/cashier/orderFood',[CashierController::class, 'orderFood']);
    Route::get('/cashier/getTables',[CashierController::class, 'getTables']);
    Route::post('/cashier/deleteSaleDetail',[CashierController::class,'deleteSaleDetail']);
    Route::post('/cashier/confirmOrderStatus',[CashierController::class,'confirmOrderStatus']);
    Route::post('/cashier/savePayment',[CashierController::class,'savePayment']);
    Route::get('/cashier/showReceipt/{saleId}',[CashierController::class,'showReceipt']);
    Route::get('/cashier/getSaleDetailsByTable/{table_id}',[CashierController::class, 'getSaleDetailsByTable']);


});
