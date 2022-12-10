<?php

use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[VideoController::class,'index'])->name('index');
Route::get('/create',[VideoController::class,'create'])->name('upload');
Route::get('/show/{id}',[VideoController::class,'show'])->name('show');
Route::get('/edit/{id}',[VideoController::class,'edit'])->name('edit');
Route::post('/store',[VideoController::class,'store'])->name('store');
Route::put('/update/{id}',[VideoController::class,'update'])->name('update');
Route::delete('/delete/{id}',[VideoController::class,'destroy'])->name('destroy');
