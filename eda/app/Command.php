<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Command extends Model
{
    use SoftDeletes;
    protected $table = "commands";
    protected $primaryKey = 'command_id';
    protected $fillable = ['cmd_order_id', 'cmd_response_id', 'is_command', 'status'];
    protected $dates = ['deleted_at'];
}
