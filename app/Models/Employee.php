<?php

namespace App\Models;

use App\Models\Company;
use App\Models\Department;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory, SoftDeletes;

    public $fillable = ["emp_code", "first_name", "last_name", "middle_name", "position", "company_id", "department_id"];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['fullname'];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function getFullnameAttribute()
    {
        return $this->last_name .", ".  $this->first_name . " " . substr($this->middle_name,0,1) . ".";
    }
}
