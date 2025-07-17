<?php

namespace App\Actions\Auth;

class LoginAction extends BaseAction
{
    /**
     * @return object
     * Handle the login action.
     */
    public function handle($data) : object
    {
        $result = $this->authService->validateCredentials($data->username, $data->password);

        if($result->success){
            if(isset($result->redirect) == "verify-email"){
                $result->message = "Please verify your email to complete the login process.";
                $otp = $this->authService->generateOtp($result->user);
                $this->authService->sendEmailOtp($otp, "Email Verification Code", $result->user);
            }

            $result->token = $this->authService->generateToken($result->user);
        }
        
        return $result;
    }
}
