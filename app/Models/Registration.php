<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    protected $table = 'registrations';
    public $timestamps = false;

    protected $fillable = [
        'student_name',
        'programme',
        'intake',
        'email',
        'phone',
    ];
}
