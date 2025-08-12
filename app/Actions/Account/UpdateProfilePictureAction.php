<?php

namespace App\Actions\Account;

class UpdateProfilePictureAction extends BaseAction
{
    /**
     * @return object
     * Handle the update of the profile picture
     */
    public function handle($request) : object
    {
        $result["success"] = false;
        $result["message"] = "No file uploaded.";
        
        if($request->hasFile("profile")){
            $profile = file_get_contents($request->file("profile")->getRealPath());
            $updatedProfile = $this->accountService->updateProfilePicture($request->id, $profile);
            $result["profile"] = $updatedProfile;
            $result["success"] = true;
            $result["message"] = "Profile picture updated successfully.";
        }
        return (object) $result;
    }
}