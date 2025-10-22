<?php

namespace App\Actions\Admin;

class GetCityListAction extends BaseAction
{
    /**
     * @return object
     */
    public function handle() : object
    {
        $result["success"] = false;
        $data = $this->adminService->getCityList();
        if($data){
            $result["success"] = true;
            $result["message"] = "Successfully fetched the city list.";
            $result["data"] = $data;
        }
        return (object) $result;
    }
}