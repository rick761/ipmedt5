<?php

use Illuminate\Database\Seeder;

class OntvangenSignaal extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $signal = [[
                'uv' => 10
            ],[
                'uv' => 20
            ],[
                'uv' => 30
            ]];
        DB::table('ontvangensignalen')->insert($signal);
    }
}
