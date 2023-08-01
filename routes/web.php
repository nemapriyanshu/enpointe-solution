<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth'])->group(function () {
    Route::get('customer/{id}',[HomeController::class,'customerDetail'])->name('customerDetail');
});
Route::post('withdrawn',[HomeController::class,'withdrawn'])->middleware('auth')->name('withdrawn');
Route::post('deposit',[HomeController::class,'deposit'])->middleware('auth')->name('deposit');
