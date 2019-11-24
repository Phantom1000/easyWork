<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'title',
    ];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function scopeGetEmployer($query)
    {
        return $query->where('title', 'Работодатель')->first();
    }

    public function scopeGetFreelancer($query)
    {
        return $query->where('title', 'Фрилансер')->first();
    }
}
