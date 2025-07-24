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
        $result["message"] = "Failed to resend OTP. Please try again later.";

        $user = $this->authService->getUser($request->id);
        if($user){
            $otp = $this->authService->generateOtp($user);
            $this->authService->sendEmailOtp($otp, "Email Verification Code", $user);
            $result["success"] = true;
            $result["message"] = "OTP resent successfully. Please check your inbox.";
        }
        return (object) $result;
    }
}
