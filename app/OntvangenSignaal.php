<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OntvangenSignaal extends Model
{
    // alle signalen die in de database staan
    protected $table = 'ontvangensignalen';

    public function UserHistorys(){
        return $this->hasMany('App\UserHistory');
    }
}
