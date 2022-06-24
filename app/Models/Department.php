<?php

namespace App\Models;

use App\Models\User;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Department extends Model
{
    use HasFactory, SoftDeletes;
    use \Znck\Eloquent\Traits\BelongsToThrough;

    public $fillable = ["department_name", "user_id"];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function company()
    {
        return $this->belongsToThrough(Company::class, User::class);
    }

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
