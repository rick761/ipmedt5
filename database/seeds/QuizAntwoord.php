<?php

use Illuminate\Database\Seeder;

class QuizAntwoord extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $quizantwoorden = [
            ['letter' => "a", 'quiz_vraag_id' => 1, 'tekst' => "zeer licht en ik heb sproeten"],
            ['letter' => "b", 'quiz_vraag_id' => 1, 'tekst' => "licht"],
            ['letter' => "c", 'quiz_vraag_id' => 1, 'tekst' => "licht getint"],
            ['letter' => "d", 'quiz_vraag_id' => 1, 'tekst' => "getint "],
            ['letter' => "a", 'quiz_vraag_id' => 2, 'tekst' => "rossig of lichtblond"],
            ['letter' => "b", 'quiz_vraag_id' => 2, 'tekst' => "blond"],
            ['letter' => "c", 'quiz_vraag_id' => 2, 'tekst' => "donkerblond of bruin"],
            ['letter' => "d", 'quiz_vraag_id' => 2, 'tekst' => "donker"],
            ['letter' => "a", 'quiz_vraag_id' => 3, 'tekst' => "blauw"],
            ['letter' => "b", 'quiz_vraag_id' => 3, 'tekst' => "licht van kleur"],
            ['letter' => "c", 'quiz_vraag_id' => 3, 'tekst' => "donker van kleur"],
            ['letter' => "d", 'quiz_vraag_id' => 3, 'tekst' => "bruin"],
            ['letter' => "a", 'quiz_vraag_id' => 4, 'tekst' => "verbrand ik zeer snel"],
            ['letter' => "b", 'quiz_vraag_id' => 4, 'tekst' => "verbrand ik redelijk snel"],
            ['letter' => "c", 'quiz_vraag_id' => 4, 'tekst' => "verbrand ik zelden"],
            ['letter' => "d", 'quiz_vraag_id' => 4, 'tekst' => " verbrand ik bijna nooit "],
            ['letter' => "a", 'quiz_vraag_id' => 5, 'tekst' => "ben ik nog steeds niet bruin"],
            ['letter' => "b", 'quiz_vraag_id' => 5, 'tekst' => "word ik langzamerhand wat bruiner"],
            ['letter' => "c", 'quiz_vraag_id' => 5, 'tekst' => "ben ik al behoorlijk verkleurd"],
            ['letter' => "d", 'quiz_vraag_id' => 5, 'tekst' => "ben ik ontzettend bruin"]]
        ;
    DB::table('quizantwoorden')->insert($quizantwoorden);


    }
}
