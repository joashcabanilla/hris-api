<?php

namespace App\Actions\Admin;

class GetBarangayListAction extends BaseAction
{
    /**
     * @return object
     */
    public function handle() : object
    {
        $result["success"] = false;
        $data = $this->adminService->getBarangayList();
        if($data){
            $result["success"] = true;
            $result["message"] = "Successfully fetched the barangay list.";
            $result["data"] = $data;
        }
        return (object) $result;
    }
}