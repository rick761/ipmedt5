<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserHistory extends Model
{
    //
    protected $table = 'userhistory';

    public function User(){

        return $this->belongsTo('App\User');
    }

    public function OntvangenSignaal(){
        return $this->belongsTo('App\OntvangenSignaal');
    }

}
