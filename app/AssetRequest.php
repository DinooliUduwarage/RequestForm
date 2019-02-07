<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssetRequest extends Model
{
    protected $table = 'asset_requests';

    public function usernew()
    {
        return $this->belongsTo('App\UserNew');
    }
}
