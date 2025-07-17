<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsertypeModel extends Model
{
    use HasFactory;

    protected $table = "usertypes";
    protected $fillable = [
        "usertype"
    ];

    /**
     * Table Relationships
     */
    public function users(){
        return $this->hasMany(User::class);
    }
}

