<?php

namespace App\Actions\Auth;

class ValidateOTP extends BaseAction
{
    /**
     * @return object
     * Handle the resend OTP action.
     */
    public function handle($request) : object
    {
        $result["success"] = false;
        $result["message"] = "test validate OTP";
        return (object) $result;
    }
}
