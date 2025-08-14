<?php

namespace App\Services;

//Models
use App\Models\User;

class AccountService
{
    /**
     * Update the profile picture of the user.
     * @param profile binary data of the profile picture
     * @return string base64 encode profile picture
     */
    public function updateProfilePicture($id, $profile) : string
    {
        $user = User::find($id);
        if($user){
            $user->update(["profile_picture" => $profile]);
            return $user->profile_picture;
        }
    }

    /**
     * update of user information. 
     * @param data Object data for update request.
     * @return User
     */
    public function updateUserInfo($data): User 
    {
        $user = User::find($data->id);
        if($user){
            $updateData = [
                "firstname" => $data->firstname,
                "lastname" => $data->lastname,
                "email" => $data->email,
            ];
            
            if(isset($data->middlename)){
                $updateData["middlename"] = $data->middlename;
            }

            if(isset($data->username)){
                $updateData["username"] = $data->username;
            }

            if(isset($data->password)){
                $updateData["password"] = $data->password;
            }
            
            $user->update($updateData);

            return $user;
        }
    }   
}