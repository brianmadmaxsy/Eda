<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    protected $table = "responses";
    protected $fillable = ['cmd_order_id', 'cmd_response_text'];
}
