<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    const INCOME     = 1;
    const OUTCOME    = 0;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'status', 'amount', 'type', 'group_id'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * Get the Group that owns the Item.
     */
    public function group()
    {
        return $this->belongsTo('App\Group');
    }

    public function isPositive()
    {
        return (bool)$this->type ? self::INCOME : self::OUTCOME;
    }
}
