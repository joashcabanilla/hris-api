<?php

namespace App\Services;
use Illuminate\Support\Facades\DB;

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

            if(isset($data->usertype)){
                $updateData["usertype_id"] = $data->usertype;
            }

            
            if(isset($data->middlename)){
                $updateData["middlename"] = $data->middlename;
            }

            if(isset($data->username)){
                $updateData["username"] = $data->username;
            }

            if(isset($data->password)){
                $updateData["password"] = $data->password;
            }

            if(isset($data->prefix)){
                $updateData["prefix"] = $data->prefix;
            }

            if(isset($data->suffix)){
                $updateData["suffix"] = $data->suffix == "None" ? null : $data->suffix;
            }
            
            $user->update($updateData);

            return $user;
        }
    }
    
    /**
     * get the list of prefix and suffix
     * @return array
     */
    public function getPrefixSuffixList(){
        $list = [];
        $prefix = DB::select("SHOW COLUMNS FROM users WHERE Field = 'prefix'");
        if (!empty($prefix)) {
            preg_match("/^enum\((.*)\)$/", $prefix[0]->Type, $matches);
            $list["prefix"] = str_getcsv($matches[1], ',', "'");
        }

        $suffix = DB::select("SHOW COLUMNS FROM users WHERE Field = 'suffix'");
        if (!empty($suffix)) {
            preg_match("/^enum\((.*)\)$/", $suffix[0]->Type, $matches);
            $list["suffix"] = str_getcsv($matches[1], ',', "'");
        }
        return $list;
    }
}