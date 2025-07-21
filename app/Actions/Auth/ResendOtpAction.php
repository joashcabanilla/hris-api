<?php

namespace App\Actions\Auth;

class ResendOtpAction extends BaseAction
{
    /**
     * @return object
     * Handle the resend OTP action.
     */
    public function handle($request) : object
    {
        $result["success"] = false;
        $result["message"] = "test resend OTP";
        return (object) $result;
    }
}
