<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advies extends Model
{ //advies
    protected $table = 'adviezen';
    public function ZonnebrandAdvies(){
        return $this->hasMany('App\ZonnenbrandAdvies');
    }
}
