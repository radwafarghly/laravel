<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    public $fillable = ['number','img','nfloors','nunits'];
    
    public function compound()
    {
        return $this->belongsTo('App\Compound','compound_id');
    }
    public function unit()
    {
        return $this->hasMany('App\Unit');
    }
}
