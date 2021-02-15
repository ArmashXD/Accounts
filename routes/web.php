<?php

use App\Http\Controllers\Account\AssetController;
use App\Http\Controllers\Account\EquityController;
use App\Http\Controllers\Account\ExpenseController;
use App\Http\Controllers\Account\IncomeController;
use App\Http\Controllers\Account\LiabilityController;
use App\Http\Controllers\RoleController;
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


Route::group(['prefix' => 'dashboard'], function () {
  Route::view('/','welcome')->name('home');
  Route::Resources([
      'users' => UserController::class,
      'roles' => RoleController::class,
  ]);
  Route::group(['prefix' => 'account'], function(){
      Route::Resources([
          'category' => CategoryController::class,
          'assets' => AssetController::class,
          'equity' => EquityController::class,
          'liabilities' => LiabilityController::class,
          'expenses' => ExpenseController::class,
          'income' => IncomeController::class,
      ]);
  });
});
