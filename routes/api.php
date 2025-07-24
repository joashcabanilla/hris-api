<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Hash;

/**
 * AUTH API ROUTES
 */
Route::prefix("auth")->group(
    function () {
        //login route
        Route::post("login",[AuthController::class, "login"]);
        //locked user account route
        Route::post("lockeduser",[AuthController::class, "lockUserAccount"]);
        //Resend OTP
        Route::post("resendOTP", [AuthController::class, "resendOTP"]);
        //validate OTP
        Route::post("validateOTP", [AuthController::class, "validateOTP"]);
    }
);