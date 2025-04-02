<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;

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

Route::middleware('auth')->group(function () {
    Route::get('/', [AuthController::class, 'index']);
});
/*
Route::middleware('auth')->group(function () {
    Route::get('/products', [ProductController::class, 'index'])->name('product.index');
});
*/
Route::get('/', [UserController::class, 'index']);
Route::get('/mypage', [UserController::class, 'mypage'])->middleware('auth');

Route::get('/products', [ProductController::class, 'create']);
Route::post('/products', [ProductController::class, 'store']);
//Route::get('/details',[ProductController::class, 'index']);
Route::get('/details/{id}', [ProductController::class, 'show']); // 商品詳細 データ保存後定義する？
Route::get('/edit', [ProductController::class, 'edit']);
//Route::get('/purchase.confirm/{id}', [PurchaseController::class, 'index']);
Route::get('/purchases/{id}', [PurchaseController::class, 'show']);
Route::post('/purchases/{id}', [PurchaseController::class, 'store']);
Route::patch('/edit/update', [ProductController::class, 'update']);
