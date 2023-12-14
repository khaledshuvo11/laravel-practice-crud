<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'class_name',
        'roll_no',
        'reg_no',
        'result'
    ];
}
