<?php

use Illuminate\Database\Seeder;

class UserHistory extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $history = [
            [
                'user_id' => 1,
                'ontvangen_signaal_id' => 1
            ],
            [
                'user_id' => 1,
                'ontvangen_signaal_id' => 2
            ],
            [
                'user_id' => 1,
                'ontvangen_signaal_id' => 3
            ]
        ];

        DB::table('userhistory')->insert($history);


    }
}
