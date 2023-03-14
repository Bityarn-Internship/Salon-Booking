<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PositionsController;
use App\Http\Controllers\EmployeesController;

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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'root'])->name('root');

//Update User Details
Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');

// Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

//Language Translation
Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);

Route::controller(ServicesController::class)->group(function(){
    Route::get('/services', 'index');
    Route::get('/viewServices', 'viewServices');
    Route::get('/editService/{id}', 'edit');
    Route::get('/viewTrashedServices', 'viewTrashedServices');
    Route::post('/services', 'store');
    Route::post('/updateService/{id}', 'update');
    Route::get('/deleteService/{id}', 'destroy');
    Route::get('/restoreService/{id}', 'restoreService');
    Route::get('/restoreServices', 'restoreServices');
});


Route::controller(UsersController::class)->group(function(){

    Route::get('/client', 'registerClient');
});
Route::controller(PositionsController::class)->group(function(){
    Route::get('/positions', 'index');
    Route::post('/positions', 'store');
    Route::get('/viewPositions', 'viewPositions');
    Route::get('/editPosition/{id}', 'edit');
    Route::get('/viewTrashedPositions', 'viewTrashedPositions');
});
Route::controller(EmployeesController::class)->group(function(){
    Route::get('/employees', 'index');
    Route::post('/employees', 'store');
});
