<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommunicationLog extends Model
{
    protected $table = 'communication_logs';
    public $timestamps = false; 

    protected $fillable = [
        'application_id',
        'action',
        'template',
        'sent_to',
        'sent_at',
    ];
}
