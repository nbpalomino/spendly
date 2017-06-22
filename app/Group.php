<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'status'
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['total'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [

    ];

    public function users()
    {
        return $this->belongsToMany('App\User', 'memberships')->wherePivot('status', 1);
    }

    public function items()
    {
        return $this->hasMany('App\Item');
    }

    public function getTotalAttribute($value)
    {
        return $this->items->reduce(function($total, Item $item) {
            if($item->isPositive()) {
                $total += $item->amount;
            } else {
                $total -= $item->amount;
            }
            return number_format($total, 2);
        });
    }
}
