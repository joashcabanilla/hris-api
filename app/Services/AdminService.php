<?php

namespace App\Services;

//Models
use App\Models\UsertypeModel as UserType;
use App\Models\User;

class AdminService{
    /**
     * Get user type list
     * @param id primary key
     */
    public function getUsertypeList($id = null){
       return $id != null ? UserType::find($id) : UserType::get();
    }

    /**
     * Get user list.
     * @param withTrashed include soft deleted users
     */
    public function getUserList($withTrashed = true){
        $user = User::with(["usertype:id,usertype"])->select("id","usertype_id","firstname","middlename","lastname","email","status","deleted_at","last_login_at","last_login_ip");
        if($withTrashed){
           $user = $user->withTrashed()->get();
        }else{
            $user = $user->get();
        }
        return $user;
    }

    /**
     * Update user status
     * @param id user id.
     */
    public function updateUserStatus($id, $status){
        $user = User::withTrashed()->find($id);
        if (!$user) {
            return false;
        }

        if($status == "deactivate"){
            return (bool) $user->delete();
        }

        if($user->trashed()){
            $user->restore();
        }

        return $user->update(['status' => $status]);
    }
}