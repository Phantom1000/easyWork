<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles() {
        return $this->belongsToMany('App\Role');
    }

    public function orders() {
        return $this->hasMany('App\Order')->orderBy('created_at', 'desc');
    }

    public function applications() {
        return $this->hasMany('App\Application', 'freelancer_id')->orderBy('created_at', 'desc');
    }

    public function empApplications() {
        return $this->hasManyThrough('App\Application', 'App\Order', 'employer_id', 'order_id')->orderBy('created_at', 'desc');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment', 'freelancer_id');
    }

    public function getRouteKeyName()
    {
        return 'name';
    }
}
