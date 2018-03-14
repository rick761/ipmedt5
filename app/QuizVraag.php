<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuizVraag extends Model
{
    //
    protected $table = 'quizvragen';
    public function QuizAntwoord(){
        return $this->hasMany('App\QuizAntwoord');
    }
}
