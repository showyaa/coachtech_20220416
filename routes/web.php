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

Route::get('/home', [ManagementController::class, 'customer']);
Route::get('/home', [ManagementController::class, 'index']);

Route::get('/find', [ManagementController::class, 'find']);
Route::post('/find', [ManagementController::class, 'search']);

Route::get('/setting', [ManagementController::class, 'setting'])->name('setting');
Route::post('/setting', [ManagementController::class, 'status_update']);

Route::post('/create', [ManagementController::class, 'create'])->name('customer.create');
Route::post('/update', [ManagementController::class, 'update']);
Route::post('/delete', [ManagementController::class, 'delete']);



Route::get('/logout', [LogOutController::class, 'logout']);




Route::get('/', function () {
    return view('welcome');
});



require __DIR__.'/auth.php';
