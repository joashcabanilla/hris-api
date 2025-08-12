<?php

namespace App\Actions\Account;

//Services
use App\Services\AccountService;

class BaseAction
{
    protected AccountService $accountService;

    public function __construct(AccountService $accountService)
    {
        $this->accountService = $accountService;
    }
}
