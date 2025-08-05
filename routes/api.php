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
        //verify Email
        Route::post("verifyEmail", [AuthController::class, "verifyEmail"]);
        //Find Account
        Route::post("findAccount", [AuthController::class, "findAccount"]);
        //Validate OTP
        Route::post("validateOtp", [AuthController::class, "validateOtp"]);
        //Update User Credentials
        Route::patch("updateUserCredential", [AuthController::class, "updateUserCredential"]);
        //logout route
        Route::middleware("auth:api")->post("/logout", [AuthController::class, "logout"]);
    }
);