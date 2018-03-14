<?php

use Illuminate\Database\Seeder;

class QuizVraag extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $vragen= [[
                'vraag' => "Na een winter zonder zon(nebank) is jouw natuurlijke huiskleur:"
            ],
            [
                'vraag' => "Mijn haarkleur is:"
            ],
            [
                'vraag' => "Mijn ogen zijn:"
            ],
            [
                'vraag' => "Als ik in de zon zit dan:"
            ],
            [
                'vraag' => "Na een paar zonnige dagen:"
            ]];
        DB::table('quizvragen')->insert($vragen);
    }
}
