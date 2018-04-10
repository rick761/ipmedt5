<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\OntvangenSignaal;
use Log;
use GuzzleHttp;
use Carbon\Carbon;

class getLoraApi extends Command
{
    protected $signature = 'getLoraApi:all';
    protected $description = 'get the api values from the lora network';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {

		//connectie met het things network
        $client = new GuzzleHttp\Client();
        $res = $client->request('GET', 'https://athos_lora.data.thethingsnetwork.org/api/v2/query/athos_ttn_uno?last=1w', [
            'headers' => [
                'Authorization' => 'key ttn-account-v2.-001CbYaSyAUbTOaw2DmN47esqkdbQhDmPM3sAnw2aQ',
            ],
            'verify' => false,
        ]);
        $json_list = json_decode($res->getBody()); //  resultaat in json
        $laatste_call = $json_list[count($json_list)-1]; // 1 rij als resultaat
        if($laatste_call != null ) { // als het resultaat bestaat
            $date_time  = explode("T", $laatste_call->time);
            $date =  $date_time[0];
            $time =  $date_time[1];
            $jaar = explode("-", $date)[0];
            $maand = explode("-", $date)[1];
            $dag = explode("-", $date)[2];
            $uur = explode(":", $time)[0];;
            $minuut = explode(":", $time)[1];
            $seconde = intval(floatval(str_replace('Z','',explode(":", $time)[2])));
            //bovenstaande plaatst de timestamp van things network in een timestamp van laravel
            $final_date_time = Carbon::now();
            $final_date_time->setDate($jaar, $maand, $dag)->setTime($uur, $minuut, $seconde)->toDateTimeString();
            $final_date_time->addHours(2);

            //maken van correcte timestamp van things naar laravel

            //print_r($final_date_time);
            $zoekSignaal = OntvangenSignaal::where('created_at', '=', $final_date_time)->get();
            // kijk of er al een signaal bestaat met deze tijd

            if($zoekSignaal->count() == 0){ // als hij niet bestaat
                //bestaat niet
                $signaal = new OntvangenSignaal();

                $signaal->created_at = $final_date_time;
                $signaal->uv = $laatste_call->uv_straling;
                $signaal->save();
                //het opslaan van het nieuwe signaal
                $client = new \GuzzleHttp\Client();
               $res = $client->request('GET', 'http://localhost/addSignaaltoDbEvent/'.$signaal->created_at.'/'.$laatste_call->uv_straling);
                $res->getBody();
                echo 'http://localhost/addSignaaltoDbEvent/'.$signaal->created_at.'/'.$laatste_call->uv_straling;
                // het versturen naar de controller
            } else {
                //bestaat al
                echo 'laatste entry staat al in de db.';
            }
        }
     }
}
