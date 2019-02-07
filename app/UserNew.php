<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserNew extends Model
{
    protected $table = 'users';

    public function assetrequest()
    {
        return $this->hasMany('App\AssetRequest');
    }
}
