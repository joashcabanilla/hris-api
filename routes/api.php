<?php

use Illuminate\Support\Facades\Route;

//controllers
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;

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
        Route::post("updateUserCredential", [AuthController::class, "updateUserCredential"]);
        //logout route
        Route::middleware("auth:api")->post("/logout", [AuthController::class, "logout"]);
         //refresh token route
        Route::post("/refreshToken", [AuthController::class, "refreshToken"]);
    }
);

/**
 * PROTECTED ROUTES
 */
Route::middleware("auth:api")->group(
    function () {
        Route::prefix("account")->group(
            function () {
                //get route
                Route::get("getPrefixSuffixList", [AccountController::class, "getPrefixSuffixList"]);

                //update user profile picture
                Route::post("updateProfilePicture", [AccountController::class, "updateProfilePicture"]);
                //update user information
                Route::post("updateUserInfo", [AccountController::class, "updateUserInfo"]);
            }
        );

        Route::prefix("admin")->group(
            function(){
                //get route
                Route::get("getUsertypeList", [AdminController::class, "getUsertypeList"]);
                Route::get("getUserList", [AdminController::class, "getUserList"]);
                Route::get("getEmployeeList", [AdminController::class, "getEmployeeList"]);
                Route::get("getDepartmentList", [AdminController::class, "getDepartmentList"]);
                Route::get("getPositionList", [AdminController::class, "getPositionList"]);
                Route::get("getEmploymentStatusList", [AdminController::class, "getEmploymentStatusList"]);
                Route::get("getCivilStatusList", [AdminController::class, "getCivilStatusList"]);
                Route::get("getRegionList", [AdminController::class, "getRegionList"]);
                Route::get("getProvinceList", [AdminController::class, "getProvinceList"]);
                Route::get("getCityList", [AdminController::class, "getCityList"]);
                Route::get("getBarangayList", [AdminController::class, "getBarangayList"]);
                //post route
                Route::post("updateUserStatus", [AdminController::class, "updateUserStatus"]);
            }
        );
    }
);
