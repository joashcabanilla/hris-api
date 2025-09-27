<?php

namespace App\Actions\Admin;

class GetEmploymentStatusListAction extends BaseAction
{
    /**
     * @return object
     */
    public function handle() : object
    {
        $result["success"] = false;
        $data = $this->adminService->getEmploymentStatusList();
        if($data){
            $result["success"] = true;
            $result["message"] = "Successfully fetched the employment status list.";
            $result["data"] = $data;
        }
        return (object) $result;
    }
}