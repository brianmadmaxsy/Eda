<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "orders";
    protected $primaryKey = 'order_id';
    protected $fillable = ['cmd_order_text'];

    public function command()
    {
        return $this->belongsTo('App\Command');
    }
}
