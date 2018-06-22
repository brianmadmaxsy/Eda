<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    protected $table = "responses";
    protected $primaryKey = 'response_id'
    protected $fillable = ['cmd_response_text'];
}
