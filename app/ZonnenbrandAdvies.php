<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ZonnenbrandAdvies extends Model
{
    protected $table = 'zonnenbrandadviezen';
    public function Advies(){
        return $this->hasOne('App\Advies');
    }
}
