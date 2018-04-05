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
            ['huidtype'=> 1, 'zonkracht' => 1, 'categorie' => "vrijwel geen", 'tekst' => 'u kunt 1 uur onbeschermd zonnen' , 'minuten' => 60],
            ['huidtype'=> 1, 'zonkracht' => 2, 'categorie' => "vrijwel geen", 'tekst' => 'u kunt 30 minuten onbeschermd zonnen' , 'minuten' => 30],
            ['huidtype'=> 1, 'zonkracht' => 3, 'categorie' => "zwak", 'tekst' => 'u kunt 20 minuten onbeschermd zonnen' , 'minuten' => 20],
            ['huidtype'=> 1, 'zonkracht' => 4, 'categorie' => "Zwak", 'tekst' => 'u kunt een kwartier onbeschermd zonnen' , 'minuten' => 15],
            ['huidtype'=> 1, 'zonkracht' => 5, 'categorie' => "matig", 'tekst' => 'u kunt 12 minuten onbeschermd zonnen' , 'minuten' => 12],
            ['huidtype'=> 1, 'zonkracht' => 6, 'categorie' => "sterk", 'tekst' => 'u kunt 10 minuten onbeschermd zonnen' , 'minuten' => 10],
            ['huidtype'=> 1, 'zonkracht' => 7, 'categorie' => "zeer sterk", 'tekst' => 'u kunt 8 minuten onbeschermd zonnen' , 'minuten' => 8],
            ['huidtype'=> 1, 'zonkracht' => 8, 'categorie' => "zeer sterk", 'tekst' => 'u kunt 7 minuten onbeschermd zonnen' , 'minuten' => 7],

            ['huidtype'=> 2, 'zonkracht' => 1, 'categorie' => "Vrijwel geen", 'tekst' => 'u kunt anderhalf uur onbeschermd zonnen' , 'minuten' => 100],
            ['huidtype'=> 2, 'zonkracht' => 2, 'categorie' => "Vrijwel geen", 'tekst' => 'u kunt 50 minuten onbeschermd zonnen' , 'minuten' => 50],
            ['huidtype'=> 2, 'zonkracht' => 3, 'categorie' => "Zwak", 'tekst' => 'u kunt 33 minuten onbeschermd zonnen' , 'minuten' => 33],
            ['huidtype'=> 2, 'zonkracht' => 4, 'categorie' => "Zwak", 'tekst' => 'u kunt 25 minuten onbeschermd zonnen' , 'minuten' => 25],
            ['huidtype'=> 2, 'zonkracht' => 5, 'categorie' => "matig", 'tekst' => 'u kunt 20 minuten onbeschermd zonnen' , 'minuten' => 20],
            ['huidtype'=> 2, 'zonkracht' => 6, 'categorie' => "sterk", 'tekst' => 'u kunt 17 minuten onbeschermd zonnen' , 'minuten' => 17],
            ['huidtype'=> 2, 'zonkracht' => 7, 'categorie' => "zeer sterk", 'tekst' => 'u kunt 14 minuten onbeschermd zonnen' , 'minuten' => 14],
            ['huidtype'=> 2, 'zonkracht' => 8, 'categorie' => "zeer sterk", 'tekst' => 'u kunt 12 minuten onbeschermd zonnen' , 'minuten' => 12],


            ['huidtype'=> 3, 'zonkracht' => 1, 'categorie' => "Vrijwel geen", 'tekst' => 'u kunt 3 uur onbeschermd zonnen' , 'minuten' => 200],
            ['huidtype'=> 3, 'zonkracht' => 2, 'categorie' => "Vrijwel geen", 'tekst' => 'u kunt anderhalf uur onbeschermd zonnen' , 'minuten' => 100],
            ['huidtype'=> 3, 'zonkracht' => 3, 'categorie' => "Zwak", 'tekst' => 'u kunt een uur onbeschermd zonnen' , 'minuten' => 60],
            ['huidtype'=> 3, 'zonkracht' => 4, 'categorie' => "Zwak", 'tekst' => 'u kunt 50 minuten onbeschermd zonnen' , 'minuten' => 50],
            ['huidtype'=> 3, 'zonkracht' => 5, 'categorie' => "matig", 'tekst' => 'u kunt 40 minuten onbeschermd zonnen', 'minuten' => 40],
            ['huidtype'=> 3, 'zonkracht' => 6, 'categorie' => "sterk", 'tekst' => 'u kunt 33 minuten onbeschermd zonnen', 'minuten' => 33],
            ['huidtype'=> 3, 'zonkracht' => 7, 'categorie' => "zeer sterk", 'tekst' => 'u kunt 28 minuten onbeschermd zonnen', 'minuten' => 28],
            ['huidtype'=> 3, 'zonkracht' => 8, 'categorie' => "zeer sterk", 'tekst' => 'u kunt 14 minuten onbeschermd zonnen' , 'minuten' => 14],


            ['huidtype'=> 4, 'zonkracht' => 1, 'categorie' => "Vrijwel geen", 'tekst' => 'u kunt 5 uur onbeschermd zonnen', 'minuten' => 300],
            ['huidtype'=> 4, 'zonkracht' => 2, 'categorie' => "Vrijwel geen", 'tekst' => 'u kunt 2 en een halfuur onbeschermd zonnen', 'minuten' => 150],
            ['huidtype'=> 4, 'zonkracht' => 3, 'categorie' => "Zwak", 'tekst' => 'u kunt anderhalf uur onbeschermd zonnen', 'minuten' => 100],
            ['huidtype'=> 4, 'zonkracht' => 4, 'categorie' => "Zwak", 'tekst' => 'u kunt een uur en een kwartier onbeschermd zonnen', 'minuten' => 75],
            ['huidtype'=> 4, 'zonkracht' => 5, 'categorie' => "matig", 'tekst' => 'u kunt een uur onbeschermd zonnen', 'minuten' => 60],
            ['huidtype'=> 4, 'zonkracht' => 6, 'categorie' => "sterk", 'tekst' => 'u kunt 50 minuten onbeschermd zonnen', 'minuten' => 50],
            ['huidtype'=> 4, 'zonkracht' => 7, 'categorie' => "zeer sterk", 'tekst' => 'u kunt 42 minuten onbeschermd zonnen', 'minuten' => 42],
            ['huidtype'=> 4, 'zonkracht' => 8, 'categorie' => "zeer sterk", 'tekst' => 'u kunt 37 minuten onbeschermd zonnen' , 'minuten' => 37]
        ];
        DB::table('adviezen')->insert($adviezen);
    }
}