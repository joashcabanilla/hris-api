<?php

namespace App\Actions\Auth;

class RefreshTokenAction extends BaseAction
{
    /**
     * @return object
     * Log out user
     */
    public function handle() : object
    {        
        $token = $this->authService->refreshToken();

        return (object) [
            "token" => $token,
            "success" => true,
            "message" => "Token refreshed successfully.",
        ];
    }
}
