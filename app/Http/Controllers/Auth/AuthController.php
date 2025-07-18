<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Form Request for validation
use App\Http\Requests\Auth\LoginRequest;

//Actions
use App\Actions\Auth\LoginAction;
use App\Actions\Auth\LockUserAccountAction;

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
        $response = $loginAction->handle((object) $data);
        return response()->json([
            "success" => $response->success,
            "message" => $response->message,
            "user" => $response->user ?? null,
            "token" => $response->token ?? null,
            "redirect" => $response->redirect ?? null
        ]);
    }

    public function lockUserAccount(Request $request, LockUserAccountAction $LockUserAccountAction)
    {
        $response = $LockUserAccountAction->handle($request);
        return response()->json([
            "success" => $response->success,
            "message" => $response->message
        ]);
    }
}
