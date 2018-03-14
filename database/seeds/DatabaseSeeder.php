<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call([
             Advies::class,
             AdviesZonnenbrand::class,
             OntvangenSignaal::class,
             QuizAntwoord::class,
             QuizVraag::class,
             User::class,
             UserHistory::class
         ]);
    }
}
