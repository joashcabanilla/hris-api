<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Hash;

/**
 * AUTH API ROUTES
 */
Route::prefix("auth")->group(
    function () {
        Route::post("login",[AuthController::class, "login"]);
    }
);