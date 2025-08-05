<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Form Request for validation
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\UpdateUserCredentialRequest;

//Actions
use App\Actions\Auth\LoginAction;
use App\Actions\Auth\LockUserAccountAction;
use App\Actions\Auth\ResendOtpAction;
use App\Actions\Auth\VerifyEmailAction;
use App\Actions\Auth\FindAccountAction;
use App\Actions\Auth\ValidateOtpAction;
use App\Actions\Auth\UpdateCredentialAction;
use App\Actions\Auth\LogoutAction;

class AuthController extends Controller
{
    /**
     * Handle the incoming request for user login.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginRequest $request, LoginAction $loginAction)
    {
        $data = $request->validated();
        $response = $loginAction->handle((object) $data, $request->ip());
        return response()->json([
            "success" => $response->success,
            "message" => $response->message,
            "user" => $response->user ?? null,
            "token" => $response->token ?? null,
            "redirect" => $response->redirect ?? null
        ]);
    }

    public function lockUserAccount(Request $request, LockUserAccountAction $lockUserAccountAction)
    {
        $response = $lockUserAccountAction->handle($request);
        return response()->json([
            "success" => $response->success,
            "message" => $response->message
        ]);
    }

    public function resendOTP(Request $request, ResendOtpAction $resendOtpAction){
        $response = $resendOtpAction->handle($request);
        return response()->json([
            "success" => $response->success,
            "message" => $response->message
        ]);
    }

    public function verifyEmail(Request $request, VerifyEmailAction $verifyEmailAction){
        $response = $verifyEmailAction->handle($request);
        return response()->json([
            "success" => $response->success,
            "message" => $response->message
        ]);
    }   

    public function findAccount(Request $request, FindAccountAction $findAccountAction){
        $response = $findAccountAction->handle($request);
        return response()->json([
            "success" => $response->success,
            "message" => $response->message,
            "user" => $response->user
        ]);
    }

    public function validateOtp(Request $request, ValidateOtpAction $validateOtpAction){
        $response = $validateOtpAction->handle($request);
        return response()->json([
            "success" => $response->success,
            "message" => $response->message,
        ]);
    }

    public function updateUserCredential(UpdateUserCredentialRequest $request, UpdateCredentialAction $updateCredentialAction){
        $request->validated();
        $response = $updateCredentialAction->handle((object) $request->all());
        return response()->json([
            "success" => $response->success,
            "message" => $response->message,
        ]);      
    }

    public function logout(LogoutAction $logoutAction){
        $response = $logoutAction->handle();
        return response()->json([
            "success" => $response->success,
            "message" => $response->message,
        ]); 
    }
}
