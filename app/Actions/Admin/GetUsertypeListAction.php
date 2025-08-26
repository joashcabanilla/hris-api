<?php

namespace App\Actions\Admin;

class GetUsertypeListAction extends BaseAction
{
    /**
     * @return object
     * Handles the update of user information.
     */
    public function handle() : object
    {
        $result["success"] = false;
        $usertypeList = $this->adminService->getUsertypeList();
        if($usertypeList){
            $result["success"] = true;
            $result["message"] = "Successfully fetched the user type list.";
            $result["data"] = $usertypeList;
        }
        return (object) $result;
    }
}