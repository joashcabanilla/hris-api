<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Actions
use App\Actions\Admin\GetUsertypeListAction;
use App\Actions\Admin\GetUserListAction;
use App\Actions\Admin\UpdateUserStatusAction;

class AdminController extends Controller
{
    public function getUsertypeList(GetUsertypeListAction $getUsertypeListAction){
       $response = $getUsertypeListAction->handle();
        return response()->json([
            "success" => $response->success,
            "message" => $response->message,
            "data" => $response->data
        ]);
    }

    public function getUserList(GetUserListAction $getUserListAction){
        $response = $getUserListAction->handle();
        return response()->json([
            "success" => $response->success,
            "message" => $response->message,
            "data" => $response->data
        ]);
    }

    public function updateUserStatus(Request $request, UpdateUserStatusAction $updateUserStatusAction){
        $response = $updateUserStatusAction->handle($request->all());
        return response()->json([
            "success" => $response->success,
            "message" => $response->message
        ]);
    }
}
