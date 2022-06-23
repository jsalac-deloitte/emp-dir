<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory, SoftSoftDeletesDeletes;

    public $fillable = ["emp_code", "first_name", "last_name", "middle_name", "position", "user_type", "company_id", "department_id"];
}
