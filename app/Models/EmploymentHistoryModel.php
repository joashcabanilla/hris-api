<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmploymentHistoryModel extends Model
{
    use HasFactory;

    protected $table = "employment_history";
    protected $fillable = [
        "employee_id",
        "user_id",
        "department_id",
        "position_id",
        "employment_status",
        "start_date",
        "end_date",
    ];
}
