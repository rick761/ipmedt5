<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OntvangenSignaal extends Model
{
    //
    protected $table = 'ontvangensignalen';

    public function UserHistorys(){
        return $this->hasMany('App\UserHistory');
    }
}
