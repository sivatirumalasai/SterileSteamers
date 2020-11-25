<?php

namespace Rennokki\Plans\Models;

use Illuminate\Database\Eloquent\Model;

class AppLicense extends Model
{
    protected $guarded = ['id'];

    public function features()
    {
        return $this->hasMany(config('plans.models.appLicenseFeatures'), 'license_id');
    }
    public function featureLimit($code){
        $limit_data=$this->hasMany(config('plans.models.appLicenseFeatures'),'license_id')->where('code',$code)->first();
        if ($limit_data){
            return $limit_data->limit;
        }
        return 0;
    }
    public function featureType($code){
        $limit_data=$this->hasMany(config('plans.models.appLicenseFeatures'),'license_id')->where('code',$code)->first();
        if ($limit_data){
            return $limit_data->type;
        }
        return null;
    }

}
