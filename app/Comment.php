<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];

    public function order()
    {
        return $this->belongsTo('App\Order');
    }

    public function freelancer()
    {
        return $this->belongsTo('App\User', 'freelancer_id');
    }
}
