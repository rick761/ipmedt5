<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserHistory extends Model
{
    // gekoppeld aan ontvangensignalen en een user. een koppeltabel.
    protected $table = 'userhistory';
    public $timestamps = false;
	public $fillable = ['user_id','ontvangen_signaal_id'];
    public function User(){

        return $this->belongsTo('App\User');
    }

    public function OntvangenSignaal(){
        return $this->belongsTo('App\OntvangenSignaal');
    }

}
