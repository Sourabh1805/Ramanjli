<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API_Auth_Controller;
use App\Http\Controllers\ApiAppointmentsController;
use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\A_PrescriptionController;
use App\Http\Controllers\A_MedicineReminderController;
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
    Route::POST('bookappointment/create', [ApiAppointmentsController::class, 'store']);
    Route::POST('myappointment', [ApiAppointmentsController::class, 'index']);
});

Route::POST('loginapi', [API_Auth_Controller::class, 'login']);
Route::POST('registration', [API_Auth_Controller::class, 'registration']);
Route::POST('profile', [API_Auth_Controller::class, 'profile']);

Route::POST('advertisement', [AdvertisementController::class, 'index']);
Route::POST('advertisement/create', [AdvertisementController::class, 'store']);
Route::POST('prescription/patient/view', [A_PrescriptionController::class, 'index']);
Route::POST('prescription/patient/show', [A_PrescriptionController::class, 'show']);
Route::POST('medicinereminder', [A_MedicineReminderController::class, 'store']);

// homepage advertisement // done
// appointment booking dates availability (onClick() check) //need to work on mobile app
// prescription display //ok
// medicin reminder
