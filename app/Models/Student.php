<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'id_number',
        'first_name',
        'last_name',
        'email',
    ];
}