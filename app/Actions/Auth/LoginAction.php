<?php

namespace App\Actions\Auth;

class LoginAction extends BaseAction
{
    /**
     * @param $data = validated data from login form.
     * @param $ip = IP address.
     * @return object
     * Handle the login action.
     */
    public function handle($data, $ip) : object
    {
        $result = $this->authService->validateCredentials($data->username, $data->password);

        if($result->success){
            if(isset($result->redirect) == "verify-email"){
                $result->message = "Please verify your email to complete the login process.";
                $otp = $this->authService->generateOtp($result->user);
                $this->authService->sendEmailOtp($otp, "Verification Code", $result->user);
            }

            $this->authService->saveLoginTimestamp($result->user, $ip);
            $result->token = $this->authService->generateToken($result->user);
        }
        
        return $result;
    }
}
