<?php

namespace App\Actions\Auth;

class UpdateCredentialAction extends BaseAction
{
    /**
     * @return object
     * Handle the update user credential action.
     */
    public function handle($request) : object
    {
        $result["success"] = true;
        $result["message"] = "User credentials have been updated successfully.";
        $this->authService->updateCredentials($request->id, $request->username, $request->password);
        return (object) $result;
    }
}
