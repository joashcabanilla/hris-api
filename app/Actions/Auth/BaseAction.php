<?php

namespace App\Actions\Auth;

//Services
use App\Services\AuthService;

class BaseAction
{
    protected AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }
}
