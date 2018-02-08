<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    public $fillable = ['number','size','price','nfloor','img','nrooms','extra'];
    
    public function building()
    {
        return $this->belongsTo('App\Building','building_id');
    }
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
