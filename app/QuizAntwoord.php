<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuizAntwoord extends Model
{
    // antwoorden van de vragenlijst
    protected $table = 'quizantwoorden';
    public function QuizVraag(){
        return $this->hasOne('App\QuizVraag');
    }
}
