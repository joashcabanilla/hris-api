<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeModel extends Model
{
    use HasFactory;

    protected $table = "employees";
    protected $fillable = [
        "employee_no",
        "user_id",
        "pbno",
        "memid",
        "birthdate",
        "gender",
        "civil_status",
        "citizenship",
        "contact_number",
        "region",
        "province",
        "city",
        "barangay",
        "address",
        "zip_code",
        "emergency_contact_name",
        "emergency_contact_number",
        "date_hired",
        "date_resigned",
        "tin",
        "sss",
        "philhealth"
    ];

    /**
     * get address attribute
     * automatically capitalized
     */
    public function getAddressAttribute($value){
        return ucwords($value);
    }
}
