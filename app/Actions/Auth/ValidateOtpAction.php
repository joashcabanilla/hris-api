<?php

namespace App\Actions\Auth;

class ValidateOtpAction extends BaseAction
{
    /**
     * @return object
     * Handle the resend OTP action.
     */
    public function handle($request) : object
    {
        $result = $this->authService->validateOtp($request->id, $request->otp);
        return (object) $result;
    }
}
