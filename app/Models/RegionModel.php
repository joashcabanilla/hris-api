<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegionModel extends Model
{
    use HasFactory;

    protected $table = "regions";
    protected $fillable = [
        "region_code",
        "name"
    ];
}
