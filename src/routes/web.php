<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProductController;


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
Route::get('/', [MemberController::class, 'index']);
Route::post('/register', [MemberController::class, 'store']);
Route::get('/products', [ProductController::class, 'create']);
Route::post('/products',[ProductController::class, 'store']);
Route::get('/details',[ProductController::class, 'index']);
//Route::get('/products/{id}', [ProductController::class, 'show'])->name('product.show'); // 商品詳細 データ保存後定義する