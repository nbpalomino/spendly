<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    const POSITIVE = 1;
    const NEGATIVE = 0;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type', 'group_id', 'item_id'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [

    ];

    public function item()
    {
        return $this->belongsTo('App\Item');
    }

    public function group()
    {
        return $this->belongsTo('App\Group');
    }

    public function isPositive()
    {
        return (bool)$this->type ? Balance::POSITIVE : Balance::NEGATIVE;
    }

    /**
     * Scope a query to findByItem.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFindByItem($query, $item_id)
    {
        return $query->where('item_id', '=', $item_id);
    }
}
