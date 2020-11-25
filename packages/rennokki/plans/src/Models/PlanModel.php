<?php

namespace Rennokki\Plans\Models;

use Illuminate\Database\Eloquent\Model;

class PlanModel extends Model
{
    protected $table = 'plans';
    protected $guarded = [];
    protected $casts = [
        'metadata' => 'object',
    ];
    public function cartDetails()
    {
        return $this->morphOne(config('plans.models.cartDetails'), 'model');
    }
    public function getMorphObjectAttribute()
    {
        return (new \ReflectionClass($this))->getShortName();
    }
    public function features()
    {
        return $this->hasMany(config('plans.models.feature'), 'plan_id');
    }
    public function featureLimit($code){
        $limit_data=$this->hasMany(config('plans.models.feature'),'plan_id')->where('code',$code)->first();
        if ($limit_data){
            return $limit_data->limit;
        }
        return 0;
    }
    public function featureType($code){
        $limit_data=$this->hasMany(config('plans.models.feature'),'plan_id')->where('code',$code)->first();
        if ($limit_data){
            return $limit_data->type;
        }
        return null;
    }
    public function commertialApps()
    {
        return $this->hasManyThrough(config('plans.models.appLicense'),config('plans.models.planCommertialApps'), 'plan_id','id','id','license_id');
    }
    public function commertialAppCode()
    {
        return $this->commertialApps()->first();
    }
}
