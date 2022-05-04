<?php

use App\Http\Controllers\LogOutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManagementController;
use Illuminate\Auth\Events\Logout;

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

// ホーム
Route::get('/home', [ManagementController::class, 'index'])->middleware('auth');

// 検索
Route::get('/find', [ManagementController::class, 'find'])->middleware('auth');
Route::post('/find', [ManagementController::class, 'search']);

// 設定
Route::get('/setting', [ManagementController::class, 'setting'])->name('setting')->middleware('auth');
Route::post('/setting', [ManagementController::class, 'status_update']);

// 追加・更新・削除
Route::post('/create', [ManagementController::class, 'create'])->name('customer.create');
Route::post('/update', [ManagementController::class, 'update']);
Route::post('/delete', [ManagementController::class, 'delete']);


// ログアウト
Route::get('/logout', [LogOutController::class, 'logout']);

// ニューステータス
Route::post('/newsetting', [ManagementController::class, 'status_upsert']);




Route::get('/', function () {
    return view('welcome');
});



require __DIR__.'/auth.php';
