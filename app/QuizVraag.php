<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuizVraag extends Model
{
    //vragen van de vragenlijst
    protected $table = 'quizvragen';
    public function QuizAntwoord(){
        return $this->hasMany('App\QuizAntwoord');
    }
}
