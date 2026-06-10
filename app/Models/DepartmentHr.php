<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DepartmentHr extends Model
{
    protected $table = 'department_hr';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'department_id',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
