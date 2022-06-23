<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory, SoftDeletes;

    public $fillable = ["emp_code", "first_name", "last_name", "middle_name", "position", "user_type", "company_id", "department_id"];
}
