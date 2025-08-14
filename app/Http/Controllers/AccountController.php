<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Form Request for validation
use App\Http\Requests\Account\UpdateUserInfoRequest;

//Actions
use App\Actions\Account\UpdateProfilePictureAction;
use App\Actions\Account\UpdateUserInfoAction;

class AccountController extends Controller
{
    public function updateProfilePicture(Request $request, UpdateProfilePictureAction $updateProfilePictureAction)
    {
        $response = $updateProfilePictureAction->handle($request);
        return response()->json([
            "profile" => $response->profile,
            "success" => $response->success,
            "message" => $response->message
        ]);
    } 

    public function UpdateUserInfo(UpdateUserInfoRequest $request, UpdateUserInfoAction $updateUserInfoAction){
        $data = $request->validated();
        $response = $updateUserInfoAction->handle((object) $data);

        return response()->json([
            "user" => $response->user ?? null,
            "success" => $response->success,
            "message" => $response->message
        ]);
    }
}
