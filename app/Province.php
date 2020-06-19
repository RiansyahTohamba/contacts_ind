<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    //
    public function regencies()
    {
    	return $this->hasMany('App/Regency');
    }
}
