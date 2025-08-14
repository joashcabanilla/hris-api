<?php

namespace App\Actions\Account;

class UpdateUserInfoAction extends BaseAction
{
    /**
     * @return object
     * Handles the update of user information.
     */
    public function handle($data) : object
    {
        $result["success"] = false;
        $user = $this->accountService->updateUserInfo($data);
        if($user){
            $result["success"] = true;
            $result["message"] = "Account information has been successfully updated.";
            $result["user"] = $user;
        }
        return (object) $result;
    }
}