<?php

use App\Http\Controllers\AccuileController;
use App\Http\Controllers\DeletReservation;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\SallesControler;
use Illuminate\Support\Facades\Auth;
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
    
}); 


Route::resource('/',AccuileController::class);
Route::resource('Salles',SallesControler::class);
Route::resource('reservation',ReservationController::class);
Route::resource('historique',DeletReservation::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
