<?php

namespace App\Services;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

//JWT Authentication
use Tymon\JWTAuth\Facades\JWTAuth;

//Mail
use App\Mail\SendOtpMail;

//Models
use App\Models\User;

class AuthService
{
    /**
     * Validate user credentials.
     *
     * @param string $username
     * @param string $password
     * @return object
     */  
    public function validateCredentials($username, $password) : object
    {
        $result["success"] = false; 
        
        $user = User::withTrashed()->where("username", $username)->orWhere("email",$username)->first();

        if(!$user){
            $result["message"] = "The username or email you entered is incorrect.";
            return (object) $result;
        }else{
            if($user->trashed()){
                $result["message"] = "Your account has been deactivated.";
                return (object) $result;
            }

            if($user->status == "locked"){
                $result["message"] = "Your account is locked. Please contact support.";
                return (object) $result;
            }
            
            $result["user"] = $user;
            if(Hash::check($password,$user->password)){
                if(!$user->hasVerifiedEmail()){
                    $result["redirect"] = "verify-email";
                }
                $result["success"] = true;
                $result["message"] = "Successfully logged in.";
                return (object) $result;
            }
            
            // If password is incorrect
            $result["message"] = "The password you entered is incorrect.";
            return (object) $result; 
        }
    }

    /**
     * Generate OTP.
     * @param User $user
     * @return string OTP
     */
    public function generateOtp($user) : string
    {
        $otp = rand(100000, 999999);
        $user->otp = $otp;
        $user->otp_expires_at = now()->addMinutes(2);
        $user->save();
        return (string) $otp;
    }

    /**
     * Send OTP to user.
     * @param User $user
     * @return void
     */
    public function sendEmailOtp($otp, $subject, $user) : void
    {
        Mail::to($user->email)->send(new SendOtpMail($otp, $subject, $user));
    }

    /**
     * Generate JWT token for user.
     * @param User $user
     * @return string
     */
    public function generateToken($user) : string
    {  
        return JWTAuth::fromUser($user);
    }

    /**
     * save last login and last ip address.
     * @param User $user
     * @param $lastLogin = timestamp
     * @param $lastIp = last ip address
     */
    public function saveLoginTimestamp($user, $lastIp) : void
    {
        $user->last_login_at = now();
        $user->last_login_ip = $lastIp;
        $user->save();
    }

    /**
     * locked user account.
     * @param id $userId
     */
    public function lockUserAccount($userId) : void
    {
        $user = User::find($userId);
        if($user){
            $user->status = "locked";
            $user->save();
        }
    }

    /**
     * Find User in UserModel.
     * @param id $id
     * @return User
     */
    public function getUser($id = null, $username = null, $email = null): User
    {
        if(!empty($id)){
            return User::find($id);
        }

        if(!empty($username)){
            return User::where("username",$username)->first();
        }

        if(!empty($email)){
            return User::where("email", $email)->first();
        }
    }
}