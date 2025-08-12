<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Form Request for validation

//Actions
use App\Actions\Account\UpdateProfilePictureAction;

class AccountController extends Controller
{
    public function updateProfilePicture(Request $request, UpdateProfilePictureAction $UpdateProfilePictureAction)
    {
        $response = $UpdateProfilePictureAction->handle($request);
        return response()->json([
            "profile" => $response->profile,
            "success" => $response->success,
            "message" => $response->message
        ]);
    } 
}
