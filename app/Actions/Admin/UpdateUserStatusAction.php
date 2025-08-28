<?php

namespace App\Actions\Admin;

class UpdateUserStatusAction extends BaseAction
{
    /**
     * @return object
     * Handles the update of user information.
     */
    public function handle($data) : object
    {
        $data = (object) $data;
        $result["success"] = false;
        $result["message"] = "Failed to update user status.";
        
        $response = $this->adminService->updateUserStatus($data->id, $data->status);

        if($response){
            $result["success"] = true;
            $result["message"] = "User status updated successfully.";
        }

        return (object) $result;
    }
}