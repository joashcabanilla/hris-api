<?php

namespace App\Actions\Admin;

class GetRegionList extends BaseAction
{
    /**
     * @return object
     */
    public function handle() : object
    {
        $result["success"] = false;
        $data = $this->adminService->getRegionList();
        if($data){
            $result["success"] = true;
            $result["message"] = "Successfully fetched the region list.";
            $result["data"] = $data;
        }
        return (object) $result;
    }
}