<?php

namespace App\Actions\Auth;

class VerifyEmailAction extends BaseAction
{
    /**
     * @return object
     * Handle the resend OTP action.
     */
    public function handle($request) : object
    {
        $result = $this->authService->validateOtp($request->id, $request->otp);
        if($result->success){
            $result->user->markEmailAsVerified();
        }
        
        return (object) $result;
    }
}
