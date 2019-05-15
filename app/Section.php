<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    public function mods()
    {
        return $this->hasMany('App\Mod');
    }
}
