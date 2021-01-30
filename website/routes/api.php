<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API_Auth_Controller;
use App\Http\Controllers\ApiAppointmentsController;
use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\API\PrescriptionController;
use App\Http\Controllers\A_MedicineReminderController;
use App\Http\Controllers\API\PatientController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\AppointmentController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::POST('bookappointment/create', [AppointmentController::class, 'store']);
    Route::POST('myappointment', [AppointmentController::class, 'index']);
    Route::POST('patient', [PatientController::class, 'index']);
    Route::POST('patient/create', [PatientController::class, 'store']);
        
   // Route::POST('prescription/patient/view', [PrescriptionController::class, 'index']);
    Route::POST('prescription/patient/show', [A_PrescriptionController::class, 'show']);
    Route::POST('medicinereminder', [A_MedicineReminderController::class, 'store']);

});

Route::POST('loginapi', [AuthController::class, 'login']);
Route::POST('registration', [AuthController::class, 'registration']);
Route::POST('profile', [AuthController::class, 'profile']);

// homepage advertisement // done
// appointment booking dates availability (onClick() check) //need to work on mobile app
// prescription display //ok
// medicin reminder
