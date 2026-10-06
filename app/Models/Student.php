<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;

#[fillable('nis', 'name', 'gender', 'major', 'class')]
#[table('students')]

class Student extends Model
{
    protected $table = 'students';

    protected $fillable = [
        'nis',
        'name',
        'gender',
        'major',
        'class'
    ];
}
