<?php

namespace App\Actions\Auth;

class FindAccountAction extends BaseAction
{
    /**
     * @return object
     * Handle find account in reset password
     */
    public function handle($request) : object
    {
        $user = $this->authService->findAccount($request->email);
        $result["user"] = $user;
        $result["success"] = $user ? true : false;
        $result["message"] = $user ? "Account successfully found." : "Account not found.";

        return (object) $result;
    }
}
