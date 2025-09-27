<?php

namespace App\Actions\Admin;

class GetPositionListAction extends BaseAction
{
    /**
     * @return object
     */
    public function handle() : object
    {
        $result["success"] = false;
        $data = $this->adminService->getPositionList();
        if($data){
            $result["success"] = true;
            $result["message"] = "Successfully fetched the position list.";
            $result["data"] = $data;
        }
        return (object) $result;
    }
}