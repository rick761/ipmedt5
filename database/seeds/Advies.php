<?php

use Illuminate\Database\Seeder;

class Advies extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adviezen = [
            ['huidtype'=>'1',   'categorie' => "geen",        'tekst' => 'u kunt ongestoord in de zon blijven' ],
            ['huidtype'=>'1',   'categorie' => "zwak",        'tekst' => 'u kunt 5 uur in de zon zitten' ],
            ['huidtype'=>'1',   'categorie' => "normaal",     'tekst' => 'u kunt 4 uur in de zon zitten' ],
            ['huidtype'=>'1',   'categorie' => "sterk",       'tekst' => 'u kunt 3 uur in de zon zitten' ],
            ['huidtype'=>'1',   'categorie' => "zeer sterk",  'tekst' => 'u kunt 2 uur in de zon zitten' ],
            ['huidtype'=>'1',   'categorie' => "gevaarlijk",  'tekst' => 'u kunt 1 uur in de zon zitten' ]];
            //huidtype 2

            //huidtype 3

            //huidtype 4


        ;
        DB::table('adviezen')->insert($adviezen);
    }
}
