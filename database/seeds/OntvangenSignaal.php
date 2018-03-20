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
                'uv' => 4,
                'created_at' => Carbon::now()->subWeek()
            ],[
                'uv' => 5,
                'created_at' => Carbon::yesterday()
            ],[
                'uv' => 6,
                'created_at' => Carbon::now()
            ]];
        DB::table('ontvangensignalen')->insert($signal);
    }
}
