<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'title', 'description', 'employer_id', 'freelancer_id', 'accept'
    ];

    public function employer() {
        return $this->belongsTo('App\User', 'employer_id');
    }

    public function freelancer() {
        return $this->belongsTo('App\User', 'freelancer_id');
    }

    public function applications()
    {
        return $this->hasMany('App\Application');
    }

    public function scopeExchange($query)
    {
        $query->where('accept', false)->orderBy('created_at', 'desc');
    }
}
