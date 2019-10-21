<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'order_id', 'freelancer_id', 'accept'
    ];

    public function order() {
        return $this->belongsTo('App\Order', 'order_id');
    }

    public function freelancer()
    {
        return $this->belongsTo('App\User', 'freelancer_id');
    }
}
