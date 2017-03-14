<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username', 'dob', 'provider', 'provider_id', 'role', 'avatar', 'avatar_original', 'country_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = [
        'dob'
    ];

    public function isAdmin(){
        return $this->role == "admin" ? true : false;
    }

    public function messages(){
        return $this->hasMany(Message::class);
    }

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function country(){
        return $this->hasOne(Country::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }
}