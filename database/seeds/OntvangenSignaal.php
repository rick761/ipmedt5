<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;


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
                'uv' => 0.01,
                'created_at' => Carbon::now()->subWeek()
            ],[
                'uv' => 0.1,
                'created_at' => Carbon::yesterday()
            ],[
                'uv' => 3.1,
                'created_at' => Carbon::now()
            ]];
        DB::table('ontvangensignalen')->insert($signal);
    }
}
