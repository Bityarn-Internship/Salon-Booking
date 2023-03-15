<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PositionsController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\BookingsController;
use App\Http\Controllers\EmployeeServicesController;
use App\Http\Controllers\PaymentsController;

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

    Route::get('/clients', 'index');
    Route::get('/login', 'login');
    Route::post('/clients', 'store');
    Route::post('/login', 'processLogin');
    Route::get('/logout', 'logout');
    Route::post('/updateClient/{id}', 'update');
    Route::get('/deleteClient/{id}', 'destroy');
    Route::get('/restoreClient/{id}', 'restoreClient');
    Route::get('/restoreClients', 'restoreClients');
    Route::get('/client', 'index');
    Route::get('/viewClients', 'viewClients');
    Route::get('/editClient/{id}', 'edit');
    Route::get('/viewTrashedClients', 'viewTrashedClients');

});

Route::controller(PositionsController::class)->group(function(){
    Route::get('/positions', 'index');
    Route::post('/positions', 'store');
    Route::get('/viewPositions', 'viewPositions');
    Route::get('/editPosition/{id}', 'edit');
    Route::get('/viewTrashedPositions', 'viewTrashedPositions');
    Route::post('/updatePosition/{id}', 'update');
    Route::get('/deletePosition/{id}', 'destroy');
    Route::get('/restorePosition/{id}', 'restorePosition');
    Route::get('/restorePositions', 'restorePositions');
});

Route::controller(EmployeesController::class)->group(function(){
    Route::get('/employees', 'index');
    Route::post('/employees', 'store');
    Route::post('/updateEmployee/{id}', 'update');
    Route::get('/deleteEmployee/{id}', 'destroy');
    Route::get('/restoreEmployee/{id}', 'restoreEmployee');
    Route::get('/restoreEmployees', 'restoreEmployees');
    Route::get('/viewEmployees', 'viewEmployees');
    Route::get('/editEmployee/{id}', 'edit');
    Route::get('/viewTrashedEmployees', 'viewTrashedEmployees');
});
Route::controller(BookingsController::class)->group(function(){
    Route::get('/bookings', 'index');
    Route::post('/bookings', 'store');
    Route::post('/bookEmployee', 'bookEmployee');
    Route::get('/viewBookings', 'viewBookings');
    Route::get('/editBooking/{id}', 'edit');
    Route::post('/updateBooking/{id}', 'update');
    Route::get('/deleteBooking/{id}', 'destroy');
    Route::get('/restoreBooking/{id}', 'restoreBooking');
    Route::get('/restoreBookings', 'restoreBookings');
    Route::get('/viewTrashedBookings', 'viewTrashedBookings');
    Route::get('/bookings/{id}', 'booking');
});
Route::controller(EmployeeServicesController::class)->group(function(){
    Route::get('/bookEmployeeServices', 'index');
    Route::get('/employeeServices', 'assign');
    Route::post('/employeeServices', 'store');
    Route::get('/viewEmployeeServices', 'viewEmployeeServices');
    Route::get('/editEmployeeService/{id}', 'edit');
    Route::get('/viewTrashedEmployeeServices', 'viewTrashedEmployeeServices');
    Route::post('/updateEmployeeService/{id}', 'update');
    Route::get('/deleteEmployeeService/{id}', 'destroy');
    Route::get('/restoreEmployeeService/{id}', 'restoreEmployeeService');
    Route::get('/restoreEmployeeServices', 'restoreEmployeeServices');
});

Route::controller(PaymentsController::class)->group(function(){
    Route::get('/depositPayment', 'index');
});