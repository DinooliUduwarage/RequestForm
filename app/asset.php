<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class asset extends Model
{
    protected $fillable = [
         'brandName',
         'price', 
         'warrantyStatus',
         'assetStatus',
         'availability',
         'expireDate',
         'department_id',
         
    ];

    public function department()
    {
        return $this->belongsTo('App\department');
    }

    public function component()
    {
        return $this->hasOne('App\component');
    }

    public function ups()
    {
        return $this->hasOne('App\ups');
    }

    public function other()
    {
        return $this->hasOne('App\other');
    }

    public function computer()
    {
        return $this->hasOne('App\computer');
    }

    public function breakdown()
    {
        return $this->hasOne('App\breakdown');
    }

    public function temporaryAsset()
    {

        return $this->hasOne('App\temporaryAsset');
    }

    public function dicardAsset()
    {
        return $this->hasOne('App\discardAsset');
    }

    public function transferHistory()
    {
        return $this->hasMany('App\transferHistory');
    }

     public function assetRequest()
    {
        return $this->hasMany('App\assetRequest');
    }

}
