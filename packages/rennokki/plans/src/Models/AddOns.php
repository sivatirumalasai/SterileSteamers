<?php

namespace Rennokki\Plans\Models;

use Illuminate\Database\Eloquent\Model;

class AddOns extends Model
{
    protected $table="add_ons";
    protected $guarded=['id'];
    public function cartDetails()
    {
        return $this->morphOne(config('plans.models.cartDetails'), 'model');
    }
    public function getMorphObjectAttribute()
    {
        return (new \ReflectionClass($this))->getShortName();
    }

}
