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
use App\Http\Controllers\BookedServicesController;
use App\Http\Controllers\PaypalPaymentController;
use App\Http\Controllers\MpesaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClientProfileController;
use App\Http\Controllers\ServiceCategoriesController;
use App\Http\Controllers\PasswordController;

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

Route::controller(UsersController::class)->group(function(){
    Route::get('/clients', 'index');
    Route::get('/login', 'login')->name('login');
    Route::post('/clients', 'store');
    Route::post('/login', 'processLogin');
});

Route::controller(EmployeesController::class)->group(function(){
    Route::get('/employees', 'index');
    Route::post('/employees', 'store');
});

//require client to be authenticated to access
Route::controller(UsersController::class)->group(function(){
    Route::get('/logout', 'logout');
    Route::post('/updateClient/{id}', 'update');
    Route::get('/editClient/{id}', 'edit');
});
Route::controller(ProfileController::class)->group(function(){
    Route::get('/userProfile', 'index');
    Route::post('/changeDetails/{id}', 'update');
    Route::post('/userProfile', 'changePassword')->name('changePassword');
});
Route::controller(ClientProfileController::class)->group(function(){
    Route::get('/clientProfile', 'index');
    Route::post('/changeDetails/{id}', 'update');
    Route::post('/clientProfile', 'changePassword')->name('changePassword');
});
Route::controller(PasswordController::class)->group(function(){
    Route::get('/forgotPassword','index');
    Route::post('/sendResetLink','sendResetLink');
    Route::get('/resetPassword/{token}','resetPassword')->name('resetPassword');
    Route::post('/passwordReset','passwordReset');
    Route::get('/resetSuccess','resetSuccess');

});

Route::controller(FeedbackController::class)->group(function(){
    Route::get('/feedback', 'index');
});

Route::controller(PaypalPaymentController::class)->group(function(){
    Route::post('/payment','pay');
    Route::get('/success','success');
    Route::get('/errorOccurred','errorOccurred');
    Route::get('/paypalConfirm','confirm');
});

Route::controller(MpesaController::class)->group(function(){
    Route::post('/mpesaPayment', 'index');
    Route::post('/completeMpesaPayment', 'completeMpesaPayment');
    Route::get('/mpesaConfirmation/{id}', 'mpesaConfirmation');
    Route::get('/paymentSuccess', 'paymentSuccess');
    Route::post('/checkTransaction', 'checkTransaction');
});

Route::controller(BookingsController::class)->group(function(){
    Route::get('/bookings', 'index');
    Route::post('/bookings', 'store');
    Route::post('/bookEmployee', 'bookEmployee');
    Route::get('/viewClientBookings/{id}', 'viewClientBookings');
});

Route::controller(EmployeeServicesController::class)->group(function(){
    Route::get('/bookEmployeeServices', 'index');
});

Route::controller(BookedServicesController::class)->group(function(){
    Route::get('/bookService/{id}', 'index');
    Route::post('/bookService', 'store');
    Route::get('/viewBookedServices', 'viewBookedServices');
    Route::get('/editBookedService/{id}', 'edit');
    Route::post('/updateBookedService/{id}', 'update');
    Route::get('/deleteBookedService/{id}', 'destroy');
    Route::get('/restoreBookedService/{id}', 'restoreBookedService');
    Route::get('/restoreBookedServices', 'restoreBookedServices');
});

Route::controller(PaymentsController::class)->group(function(){
    Route::get('/depositPayment', 'depositPayment');
    Route::get('/completePayment/{id}', 'completePayment');
    Route::post('/completeCashPayment', 'completeCashPayment');
    Route::get('/viewInvoice/{id}', 'viewInvoice');
    Route::get('/generateInvoice/{id}/generate', 'generateInvoice');
});

Route::controller(PaypalPaymentController::class)->group(function(){
    Route::post('/payment','pay');
    Route::get('/success','success');
    Route::get('/errorOccurred','errorOccurred');
    Route::get('/paypalConfirm','confirm');
    Route::get('/viewPaypalPayments','viewPaypalPayments');
});

Route::controller(MpesaController::class)->group(function(){
    Route::post('/mpesaPayment', 'index');
    Route::post('/completeMpesaPayment', 'completeMpesaPayment');
    Route::get('/mpesaConfirmation/{id}', 'mpesaConfirmation');
    Route::get('/paymentSuccess', 'paymentSuccess');
    Route::post('/checkTransaction', 'checkTransaction');
    Route::get('/viewMpesaPayments','viewMpesaPayments');
});

//Using isEmployeeMiddleware for employee related roles only
Route::group([
    'middleware' => 'is_employee',
], function(){
    Route::controller(DashboardController::class)->group(function(){
        Route::get('/dashboard', 'index');

    });
    Route::controller(ServicesController::class)->group(function(){
        Route::get('/viewServices', 'viewServices');
        Route::get('/editService/{id}', 'edit');
        Route::post('/services', 'store');
        Route::post('/updateService/{id}', 'update');
        Route::get('/deleteService/{id}', 'destroy');
        Route::get('/restoreService/{id}', 'restoreService');
        Route::get('/restoreServices', 'restoreServices');
    });
    Route::controller(ServiceCategoriesController::class)->group(function(){
        Route::post('/serviceCategories', 'store');
        Route::get('/editServiceCategory/{id}', 'edit');
        Route::post('/updateServiceCategory/{id}', 'update');
        Route::get('/deleteServiceCategory/{id}','destroy');
        Route::get('/viewServiceCategories','viewServiceCategories');
        Route::get('/restoreServiceCategory/{id}','restoreServiceCategory');
        Route::get('/restoreServiceCategories','restoreServiceCategories');
    });

    Route::controller(FeedbackController::class)->group(function(){
        Route::get('/viewFeedback', 'viewFeedback');
        Route::get('/editFeedback/{id}', 'edit');
        Route::post('/feedback', 'store');
        Route::post('/updateFeedback/{id}', 'update');
        Route::get('/deleteFeedback/{id}', 'destroy');
        Route::get('/restoreFeedback/{id}', 'restoreFeedback');
        Route::get('/restoreFeedbacks', 'restoreFeedbacks');
    });

    Route::controller(PositionsController::class)->group(function(){
        Route::post('/positions', 'store');
        Route::get('/viewPositions', 'viewPositions');
        Route::get('/editPosition/{id}', 'edit');
        Route::post('/updatePosition/{id}', 'update');
        Route::get('/deletePosition/{id}', 'destroy');
        Route::get('/restorePosition/{id}', 'restorePosition');
        Route::get('/restorePositions', 'restorePositions');
    });

    Route::controller(EmployeesController::class)->group(function(){
        Route::post('/updateEmployee/{id}', 'update');
        Route::get('/deleteEmployee/{id}', 'destroy');
        Route::get('/restoreEmployee/{id}', 'restoreEmployee');
        Route::get('/restoreEmployees', 'restoreEmployees');
        Route::get('/viewEmployees', 'viewEmployees');
        Route::get('/editEmployee/{id}', 'edit');
    });

    Route::controller(BookingsController::class)->group(function(){
        Route::get('/viewBooking/{id}', 'viewBooking');
        Route::get('/viewBookings', 'viewBookings');
        Route::get('/editBooking/{id}', 'edit');
        Route::post('/updateBooking/{id}', 'update');
        Route::get('/deleteBooking/{id}', 'destroy');
        Route::get('/restoreBooking/{id}', 'restoreBooking');
        Route::get('/restoreBookings', 'restoreBookings');
        Route::get('/bookings/{id}', 'booking');
    });

    Route::controller(UsersController::class)->group(function(){
        Route::get('/deleteClient/{id}', 'destroy');
        Route::get('/restoreClient/{id}', 'restoreClient');
        Route::get('/restoreClients', 'restoreClients');
        Route::get('/viewClients', 'viewClients');
    });

    Route::controller(CompletedBookingsController::class)->group(function(){
        Route::get('/viewCompletedBookings', 'CompletedBookings');

    });

    Route::controller(EmployeeServicesController::class)->group(function(){
        Route::post('/employeeServices', 'store');
        Route::get('/viewEmployeeServices', 'viewEmployeeServices');
        Route::get('/editEmployeeService/{id}', 'edit');
        Route::get('/viewEmployeeServices', 'viewEmployeeServices');
        Route::post('/updateEmployeeService/{id}', 'update');
        Route::get('/deleteEmployeeService/{id}', 'destroy');
        Route::get('/restoreEmployeeService/{id}', 'restoreEmployeeService');
        Route::get('/restoreEmployeeServices', 'restoreEmployeeServices');
    });

    Route::controller(PaypalPaymentController::class)->group(function(){
        Route::get('/deletePaypalPayment/{id}','destroy');
        Route::get('/restorePaypalPayment/{id}','restorePaypalPayment');
        Route::get('/restorePaypalPayments','restorePaypalPayments');
        Route::get('/viewPaypalPayments','viewPaypalPayments');
    });

    Route::controller(MpesaController::class)->group(function(){
        Route::get('/deleteMpesaPayment/{id}','destroy');
        Route::get('/restoreMpesaPayment/{id}','restoreMpesaPayment');
        Route::get('/restoreMpesaPayments','restoreMpesaPayments');
        Route::get('/viewMpesaPayments','viewMpesaPayments');
    });
});
