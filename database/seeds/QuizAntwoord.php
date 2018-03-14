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
            ['letter' => "a", 'vraag_id' => 1, 'tekst' => "zeer licht en ik heb sproeten"],
            ['letter' => "b", 'vraag_id' => 1, 'tekst' => "licht"],
            ['letter' => "c", 'vraag_id' => 1, 'tekst' => "licht getint"],
            ['letter' => "d", 'vraag_id' => 1, 'tekst' => "getint "],
            ['letter' => "a", 'vraag_id' => 2, 'tekst' => "rossig of lichtblond"],
            ['letter' => "b", 'vraag_id' => 2, 'tekst' => "blond"],
            ['letter' => "c", 'vraag_id' => 2, 'tekst' => "donkerblond of bruin"],
            ['letter' => "d", 'vraag_id' => 2, 'tekst' => "donker"],
            ['letter' => "a", 'vraag_id' => 3, 'tekst' => "blauw"],
            ['letter' => "b", 'vraag_id' => 3, 'tekst' => "licht van kleur"],
            ['letter' => "c", 'vraag_id' => 3, 'tekst' => "donker van kleur"],
            ['letter' => "d", 'vraag_id' => 3, 'tekst' => "bruin"],
            ['letter' => "a", 'vraag_id' => 4, 'tekst' => "verbrand ik zeer snel"],
            ['letter' => "b", 'vraag_id' => 4, 'tekst' => "verbrand ik redelijk snel"],
            ['letter' => "c", 'vraag_id' => 4, 'tekst' => "verbrand ik zelden"],
            ['letter' => "d", 'vraag_id' => 4, 'tekst' => " verbrand ik bijna nooit "],
            ['letter' => "a", 'vraag_id' => 5, 'tekst' => "ben ik nog steeds niet bruin"],
            ['letter' => "b", 'vraag_id' => 5, 'tekst' => "word ik langzamerhand wat bruiner"],
            ['letter' => "c", 'vraag_id' => 5, 'tekst' => "ben ik al behoorlijk verkleurd"],
            ['letter' => "d", 'vraag_id' => 5, 'tekst' => "ben ik ontzettend bruin"]]
        ;
    DB::table('quizantwoorden')->insert($quizantwoorden);


    }
}
