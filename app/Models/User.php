<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\SoftDeletes;

//JWT Authentication
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "usertype_id",
        "firstname",
        "middlename",
        "lastname",
        "email",
        "email_verified_at",
        "otp",
        "otp_expires_at",
        "username",
        "password",
        "last_login_at",
        "last_login_ip",
        "login_attempts",   
        "status"
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        "password",
        "otp",
        "otp_expires_at",
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * JWT Authentication 
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * method that allows to attach custom data to the JWT payload
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * Table Relationships
     */
    public function usertype()
    {
        return $this->belongsTo(UserTypeModel::class);
    }

    /**
     * set password attribute
     * automatically hash/encrypt the password
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes["password"] = Hash::make($value);
    }
}
