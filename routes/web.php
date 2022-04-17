<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManagementController;

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

Route::get('/home', [ManagementController::class, 'index']);
Route::post('/create', [ManagementController::class, 'create']);
Route::post('/update', [ManagementController::class, 'update']);
Route::post('/delete', [ManagementController::class, 'delete']);




Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('home');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
