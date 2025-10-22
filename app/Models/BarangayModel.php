<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangayModel extends Model
{
    use HasFactory;

    protected $table = "barangay";
    protected $fillable = [
        "region_code",
        "province_code",
        "citymun_code",
        "brgy_code",
        "name"
    ];
}
 