<?php

namespace App\Actions\Admin;

class GetUserListAction extends BaseAction
{
    /**
     * @return object
     * Handles the update of user information.
     */
    public function handle() : object
    {
        $result["success"] = false;
        $userList = $this->adminService->getUserList();
        if($userList ){
            $result["success"] = true;
            $result["message"] = "Successfully fetched the user list.";
            $result["data"] = $userList;
        }
        return (object) $result;
    }
}