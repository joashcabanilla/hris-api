<?php

namespace App\Actions\Admin;

class GetCivilStatusListAction extends BaseAction
{
    /**
     * @return object
     */
    public function handle() : object
    {
        $result["success"] = false;
        $data = $this->adminService->getCivilStatusList();
        if($data){
            $result["success"] = true;
            $result["message"] = "Successfully fetched the civil status list.";
            $result["data"] = $data;
        }
        return (object) $result;
    }
}