<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Actions
use App\Actions\Admin\GetUsertypeListAction;
use App\Actions\Admin\GetUserListAction;

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
}
