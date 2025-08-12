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
}