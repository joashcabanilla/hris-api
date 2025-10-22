<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityModel extends Model
{
    use HasFactory;

    protected $table = "cities";
    protected $fillable = [
        "region_code",
        "province_code",
        "citymun_code",
        "name"
    ];
}
 