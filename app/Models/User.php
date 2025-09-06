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
        "profile_picture",
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
     * get firstname, middlename, lastname attribute
     * automatically capitalized
     */
    public function getFirstnameAttribute($value){
        return ucwords($value);
    }

    public function getMiddlenameAttribute($value){
        return ucwords($value);
    }
    
    public function getLastnameAttribute($value){
        return ucwords($value);
    }

    /**
     * set firstname attribute
     * automatically capitalized firstname
     */
    public function setFirstnameAttribute($vaule)
    {
        $this->attributes["firstname"] = ucwords(strtolower($vaule));
    }

    /**
     * set middlename attribute
     * automatically capitalized middlename
     */
    public function setMiddlenameAttribute($vaule)
    {
        $this->attributes["middlename"] = ucwords(strtolower($vaule));
    }

    /**
     * set lastname attribute
     * automatically capitalized lastname
     */
    public function setLastnameAttribute($vaule)
    {
        $this->attributes["lastname"] = ucwords(strtolower($vaule));
    }

    /**
     * set password attribute
     * automatically hash/encrypt the password
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes["password"] = Hash::make($value);
    }

    /**
     * get profile_picture attribute
     * automatically convert binary data to base 64 image
     */
    public function getProfilePictureAttribute($value){
        if ($value) {
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mimeType = finfo_buffer($finfo, $value);
            finfo_close($finfo);
            return "data:" . $mimeType . ";base64," . base64_encode($value);
        }
        return null;
    }

}
