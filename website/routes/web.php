<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SlotController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PasswordManagementController;
use App\Http\Controllers\FirebaseController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\MeetController;

Route::get('/', function () {
    return view('WELCOME');
});

Auth::routes();
Route::get('forgotpassword', [PasswordManagementController::class, 'forgotpassword'])->name('forgotpassword');
Route::get('changepassword', [PasswordManagementController::class, 'changepassword'])->name('changepassword');
Route::resource('passwordmgmt', PasswordManagementController::class);
Route::POST('resetpasswordemail', [PasswordManagementController::class, 'resetpasswordemail'])->name('resetpasswordemail');
Route::POST('verifyOTP', [PasswordManagementController::class, 'verifyOTP'])->name('verifyOTP');
    
  

Auth::routes();

Route::get('home', [HomeController::class, 'index'])->name('home');
Route::resource('patients', PatientController::class);
Route::group(['middleware' => ['auth']], function() {
    Route::get('home', [HomeController::class, 'index'])->name('home');
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('slots', SlotController::class);
    Route::resource('appointments', AppointmentController::class);

    Route::resource('prescription', PrescriptionController::class);
    Route::get('today', [AppointmentController::class, 'today'])->name('today');
    Route::get('all', [AppointmentController::class, 'all'])->name('all');
    Route::get('history', [AppointmentController::class, 'history'])->name('history');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('changepassword', [PasswordManagementController::class, 'changepassword'])->name('changepassword');
    Route::resource('passwordmgmt', PasswordManagementController::class);
    Route::resource('meet', MeetController::class);
    Route::POST('resetpassword', [PasswordManagementController::class, 'resetpassword'])->name('resetpassword');
    Route::get('phpfirebase_sdk', [FirebaseController::class, 'index'])->name('index');


    Route::resource('doctor', DoctorController::class);
    
    
    Route::POST('resetpassword', [PasswordManagementController::class, 'resetpassword'])->name('resetpassword');

    Route::get('test', [FirebaseController::class, 'index'])->name('index');
});
