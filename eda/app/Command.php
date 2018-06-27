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

    public function scopeCommandId($query,$id)
    {
        if($id){
            return $query->where('command_id', $id);
        }
    }

    public function scopeOrderId($query, $orderid)
    {
        if($orderid){
            return $query->where('cmd_order_id', $orderid);
        }
    }

    public function scopeResponseId($query, $responseid)
    {
        if($responseid){
            return $query->where('cmd_response_id', $responseid);
        }
    }

    public function scopeCommandType($query, $is_command)
    {
        if($is_command){
            return $query->where('is_command',$is_command);
        }
    }

    public function scopeIsActive($query)
    {
        return $query->where('status', 1);
    }

    public function order()
    {
        return $this->hasOne('App\Order', 'order_id', 'cmd_order_id');
    }

    public function response()
    {
        return $this->hasOne('App\Response', 'response_id', 'cmd_response_id');
    }
}
