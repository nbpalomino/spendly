<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class User extends Model implements
    AuthenticatableContract,
    AuthorizableContract
{
    use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public function groups()
    {
        return $this->belongsToMany('App\Group', 'memberships')->wherePivot('status', 1);
    }

    /**
     * Return Group by Id
     *
     */
    public function getGroup($group_id)
    {
        return $this->groups->where('id', $group_id)->first();
    }

    /**
     * Return column from Groups
     *
     */
    public function getFromGroups($column)
    {
        return array_column($this->groups->toArray(), $column);
    }

    /**
     * Validates if Group belongs to User
     *
     */
    public function isValidGroup($group_id)
    {
        return !is_null($this->getGroup($group_id));
    }
}
