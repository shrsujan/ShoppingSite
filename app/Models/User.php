<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use SoftDeletes, EntrustUserTrait {
        SoftDeletes::restore insteadof EntrustUserTrait;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password'
    ];

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'deleted_at'
    ];

    /**
     * The function to mutate name
     *
     * @param $value
     * @return string
     */
    public function setNameAttribute($value)
    {
        return $this->attributes['name'] = ucwords(strtolower($value));
    }
}