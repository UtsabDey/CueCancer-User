<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\UserController;


/*User Controller */
Route::get('registration', [UserController::class, 'registration']);
Route::post('registration/submit', [UserController::class, 'store']);
Route::get('login', [UserController::class, 'index']);
Route::post('login/submit', [UserController::class, 'login']);
Route::get('/search', [UserController::class, 'search']);
Route::get('/', [UserController::class, 'home']);


Route::get('/appointment', [UserController::class, 'appointment']);
Route::get('token/{id}', [UserController::class, 'token']);
/*User Controller */
Route::group(['middleware' => ['session']], function () {

    /*User Controller */
    Route::get('/logout', [UserController::class, 'logout']);
    Route::get('/booking', [UserController::class, 'checkout']);
    Route::post('/booking/submit', [UserController::class, 'confirmation']);
    Route::get('/booking/success', [UserController::class, 'success']);
    Route::get('prescription/{id}', [UserController::class, 'prescription']);
    Route::get('patient/dashboard', [UserController::class, 'dashboard']);
    Route::get('patient/profile', [UserController::class, 'profile']);
    Route::post('patient/profile/update', [UserController::class, 'update']);
    Route::get('patient/password', [UserController::class, 'password']);
    Route::Post('patient/password/update', [UserController::class, 'changePass']);


    /*Doctor Controller */
    Route::get('doctor/dashboard', [DoctorController::class, 'index']); 
    Route::get('doctor/appointment', [DoctorController::class, 'appointment']);
    Route::get('doctor/accept/{id}', [DoctorController::class, 'accept']);
    Route::get('doctor/pres/{id}', [DoctorController::class, 'prescription']);
    Route::post('doctor/pres/submit', [DoctorController::class, 'pressubmit']);
    Route::get('doctor/add/schedule', [DoctorController::class, 'addschedule']);
    Route::get('doctor/add', [DoctorController::class, 'add']);
    Route::get('doctor/patientlist', [DoctorController::class, 'mypatient']);
    Route::post('doctor/add/submit', [DoctorController::class, 'store']);
    Route::get('doctor/profile', [DoctorController::class, 'profile']);
    Route::post('doctor/profile/update', [DoctorController::class, 'update']);
    Route::get('doctor/password', [DoctorController::class, 'password']);
    Route::Post('doctor/password/update', [DoctorController::class, 'changePass']);
});

/* Clear Memory */
Route::get('/clear', function() {
    Artisan::call('cache:clear');
    Artisan::call('optimize');
    Artisan::call('route:cache');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('config:cache');
    return '<h1>Cache, Config, View cleared & optimized!</h1>';
});
