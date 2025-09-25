<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $table = 'applications';
    protected $primaryKey = 'application_id';
    public $incrementing = false;
    protected $keyType = 'string';

    
    public $timestamps = false;

    protected $fillable = [
        'application_id',
        'applicant_name',
        'email',
        'programme',
        'intake',
        'status',
        'payment_status',
    ];
}
