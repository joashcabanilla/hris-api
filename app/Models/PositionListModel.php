<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PositionListModel extends Model
{
    use HasFactory;

    protected $table = "position_list";
    protected $fillable = [
        "position",
    ];
}
