<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartmentListModel extends Model
{
    use HasFactory;

    protected $table = "department_list";
    protected $fillable = [
        "department",
    ];
}
