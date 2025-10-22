<?php

namespace App\Actions\Admin;

class GetProvinceListAction extends BaseAction
{
    /**
     * @return object
     */
    public function handle() : object
    {
        $result["success"] = false;
        $data = $this->adminService->getProvinceList();
        if($data){
            $result["success"] = true;
            $result["message"] = "Successfully fetched the province list.";
            $result["data"] = $data;
        }
        return (object) $result;
    }
}