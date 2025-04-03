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
    //Route::get('/', [AuthController::class, 'index']); 元々入っていたコード。今回は下記のindexを定義しているので不要
    Route::get('/mypage', [UserController::class, 'mypage']);
    Route::get('/products', [ProductController::class, 'create']);
    Route::get('/details/{id}', [ProductController::class, 'show']);
});
/*
Route::middleware('auth')->group(function () {
    Route::get('/products', [ProductController::class, 'index'])->name('product.index');
});
*/
Route::get('/', [UserController::class, 'index']);
//Route::get('/mypage', [UserController::class, 'mypage'])->middleware('auth');

//Route::get('/products', [ProductController::class, 'create']);
Route::post('/products', [ProductController::class, 'store']);
//Route::get('/details',[ProductController::class, 'index']);
//Route::get('/details/{id}', [ProductController::class, 'show']); // 商品詳細 データ保存後定義する？
Route::get('/edit/{id}', [ProductController::class, 'edit']);
Route::get('/purchases/{id}', [PurchaseController::class, 'show']);
Route::post('/purchases/{id}', [PurchaseController::class, 'store']);
Route::patch('/edit/update', [ProductController::class, 'update']);
