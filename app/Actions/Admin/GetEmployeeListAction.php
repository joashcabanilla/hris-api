<?php

namespace App\Actions\Admin;

class GetEmployeeListAction extends BaseAction
{
    /**
     * @return object
     */
    public function handle() : object
    {
        $result["success"] = false;
        $employeeList = $this->adminService->getEmployeeList();
        if($employeeList){
            $result["success"] = true;
            $result["message"] = "Successfully fetched the employee list.";
            $result["data"] = $employeeList;
        }
        return (object) $result;
    }
}