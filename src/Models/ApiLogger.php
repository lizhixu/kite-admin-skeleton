<?php

namespace iLzx\AdminStarter\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class ApiLogger extends Model
{
    use HasFactory;

    protected $table = 'kite_api_loggers';


    protected $fillable = [
        'api_url',
        'request_full_url',
        'request_method',
        'request_body',
        'request_header',
        'request_ip',
        'request_agent',
        'response_content',
        'response_status_code',
        'admin_id'
    ];

    protected $casts = [
        'request_header' => 'array',
        'request_body' => 'array',
        'response_content' => 'array',
    ];
}
