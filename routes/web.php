<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return redirect()->route('admin');
});


// Admin Url Start
Route::group(['prefix' => 'admin'],function(){
    Route::get('/',[UserController::class,'index'])->name('admin');
    Route::group(['prefix' => 'users'],function(){
        Route::get('/add',[UserController::class,'create'])->name('adduser');
        Route::post('/save',[UserController::class,'store'])->name('saveuser');
        Route::get('/edit/{id}',[UserController::class,'edit']);
        Route::post('/edit/{id}',[UserController::class,'update']);
        Route::post('/delete/{id}',[UserController::class,'destroy']);
    });
});