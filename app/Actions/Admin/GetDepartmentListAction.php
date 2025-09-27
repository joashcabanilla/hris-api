<?php

namespace App\Actions\Admin;

class GetDepartmentListAction extends BaseAction
{
    /**
     * @return object
     */
    public function handle() : object
    {
        $result["success"] = false;
        $departmentList = $this->adminService->getDepartmentList();
        if($departmentList){
            $result["success"] = true;
            $result["message"] = "Successfully fetched the department list.";
            $result["data"] = $departmentList;
        }
        return (object) $result;
    }
}