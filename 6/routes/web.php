<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\SnsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth'])->group(function() {
    Route::get('sns', [SnsController::class,'add']);
    Route::post('sns', [SnsController::class,'create']);
    Route::get('sns', [SnsController::class,'index']);
    Route::get('sns/delete', [SnsController::class,'delete']);
});
