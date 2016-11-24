<?php

namespace App\Models;

//use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'username', 'email', 'password'
    ];

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $protected = [
        'id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setFirstNameAttribute($value){
        return $this->attributes['first_name'] = ucwords(strtolower($value));
    }

    public function setLastNameAttribute($value){
        return $this->attributes['last_name'] = ucwords(strtolower($value));
    }
}
