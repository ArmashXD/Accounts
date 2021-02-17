<?php

use App\Http\Controllers\Account\AssetController;
use App\Http\Controllers\Account\EquityController;
use App\Http\Controllers\Account\ExpenseController;
use App\Http\Controllers\Account\IncomeController;
use App\Http\Controllers\Account\LiabilityController;
use\App\Http\Controllers\MainCategoryController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TaxController;
use App\Http\Controllers\UnitController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
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
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['auth']], function () {
  Route::view('/','welcome')->name('index');
  Route::Resources([
      'users' => UserController::class,
      'roles' => RoleController::class,
      'main-category' => MainCategoryController::class,
      'suppliers' => SupplierController::class,
      'taxes' => TaxController::class
  ]);
  Route::group(['prefix' => 'account'], function(){
      Route::Resources([
          'category' => CategoryController::class,
          'assets' => AssetController::class,
          'equity' => EquityController::class,
          'liabilities' => LiabilityController::class,
          'expenses' => ExpenseController::class,
          'income' => IncomeController::class,
          'units' => UnitController::class,
          'products' => ProductController::class
      ]);
  });
});
