<?php

namespace App\Actions\Auth;

class LogoutAction extends BaseAction
{
    /**
     * @return object
     * Log out user
     */
    public function handle() : object
    {        
        $this->authService->logout();
        return (object) [
            "success" => true,
            "message" => "User logged out successfully."
        ];
    }
}
