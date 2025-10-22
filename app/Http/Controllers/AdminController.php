<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Actions
use App\Actions\Admin\GetUsertypeListAction;
use App\Actions\Admin\GetUserListAction;
use App\Actions\Admin\GetEmployeeListAction;
use App\Actions\Admin\UpdateUserStatusAction;
use App\Actions\Admin\GetDepartmentListAction;
use App\Actions\Admin\GetPositionListAction;
use App\Actions\Admin\GetEmploymentStatusListAction;
use App\Actions\Admin\GetCivilStatusListAction;
use App\Actions\Admin\GetRegionListAction;
use App\Actions\Admin\GetProvinceListAction;
use App\Actions\Admin\GetCityListAction;
use App\Actions\Admin\GetBarangayListAction;

class AdminController extends Controller
{
    /**
     * GET METHODS 
     */
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

    public function getEmployeeList(Request $request, GetEmployeeListAction $getEmployeeListAction){
        $response = $getEmployeeListAction->handle($request->employeeId);
        return response()->json([
            "success" => $response->success,
            "message" => $response->message,
            "data" => $response->data
        ]);
    }

    public function getDepartmentList(getDepartmentListAction $getDepartmentListAction){
        $response = $getDepartmentListAction->handle();
        return response()->json([
            "success" => $response->success,
            "message" => $response->message,
            "data" => $response->data
        ]);
    }

    public function getPositionList(GetPositionListAction $getPositionListAction){
        $response = $getPositionListAction->handle();
        return response()->json([
            "success" => $response->success,
            "message" => $response->message,
            "data" => $response->data
        ]);
    }

    public function getEmploymentStatusList(GetEmploymentStatusListAction $getEmploymentStatusListAction){
        $response = $getEmploymentStatusListAction->handle();
        return response()->json([
            "success" => $response->success,
            "message" => $response->message,
            "data" => $response->data
        ]);
    }

    public function getCivilStatusList(GetCivilStatusListAction $getCivilStatusListAction){
        $response = $getCivilStatusListAction->handle();
        return response()->json([
            "success" => $response->success,
            "message" => $response->message,
            "data" => $response->data
        ]);
    }

    public function getRegionList(GetRegionListAction $getRegionList){
        $response = $getRegionList->handle();
        return response()->json([
            "success" => $response->success,
            "message" => $response->message,
            "data" => $response->data
        ]);
    }

    public function getProvinceList(GetProvinceListAction $getProvinceList){
        $response = $getProvinceList->handle();
        return response()->json([
            "success" => $response->success,
            "message" => $response->message,
            "data" => $response->data
        ]);
    }

    public function getCityList(GetCityListAction $getCityListAction){
        $response = $getCityListAction->handle();
        return response()->json([
            "success" => $response->success,
            "message" => $response->message,
            "data" => $response->data
        ]);
    }

    public function getBarangayList(GetBarangayListAction $getBarangayListAction){
        $response = $getBarangayListAction->handle();
        return response()->json([
            "success" => $response->success,
            "message" => $response->message,
            "data" => $response->data
        ]);
    }

    /**
     * POST METHODS
     */
    public function updateUserStatus(Request $request, UpdateUserStatusAction $updateUserStatusAction){
        $response = $updateUserStatusAction->handle($request->all());
        return response()->json([
            "success" => $response->success,
            "message" => $response->message
        ]);
    }
}
