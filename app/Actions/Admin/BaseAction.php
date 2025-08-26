<?php

namespace App\Actions\Admin;

//Services
use App\Services\AdminService;

class BaseAction
{
    protected AdminService $adminService;

    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
    }
}
