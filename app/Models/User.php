<?php

namespace App\Models\Access\User;

//use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Model
{
    use SoftDeletes, EntrustUserTrait;

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
     * The function to mutate first_name
     *
     * @param $value
     * @return string
     */
    public function setFirstNameAttribute($value)
    {
        return $this->attributes['first_name'] = ucwords(strtolower($value));
    }

    /**
     * The function to mutate last_name
     *
     * @param $value
     * @return string
     */
    public function setLastNameAttribute($value)
    {
        return $this->attributes['last_name'] = ucwords(strtolower($value));
    }
}
