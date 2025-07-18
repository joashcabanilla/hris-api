<?php

namespace App\Actions\Auth;

class LockUserAccountAction extends BaseAction
{
    /**
     * @return object
     * Handle the locked user account action.
     */
    public function handle($request) : object
    {
        $result["success"] = false;
        $result["message"] = "User account locked successfully.";

        if(isset($request->id)){
            $result["success"] = true;
            $this->authService->lockUserAccount($request->id);   
            return (object) $result;
        }
        
        $result["message"] = "User ID is required.";
        
        return (object) $result;
    }
}
