<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function mods(){
        return $this->hasMany('App\Mod');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
