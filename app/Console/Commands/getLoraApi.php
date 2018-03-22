<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\OntvangenSignaal;
use Log;
use GuzzleHttp;
use Carbon\Carbon;

class getLoraApi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'getLoraApi:all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'get the api values from the lora network';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {


        $client = new GuzzleHttp\Client();
        $res = $client->request('GET', 'https://athos_lora.data.thethingsnetwork.org/api/v2/query/athos_ttn_uno?last=1w', [
            'headers' => [
                'Authorization' => 'key ttn-account-v2.-001CbYaSyAUbTOaw2DmN47esqkdbQhDmPM3sAnw2aQ',
            ],
            'verify' => false,
        ]);
        $json_list = json_decode($res->getBody());
        $laatste_call = $json_list[count($json_list)-1];
        if($laatste_call != null ) {
            $date_time  = explode("T", $laatste_call->time);
            $date =  $date_time[0];
            $time =  $date_time[1];
            $jaar = explode("-", $date)[0];
            $maand = explode("-", $date)[1];
            $dag = explode("-", $date)[2];
            $uur = explode(":", $time)[0];;
            $minuut = explode(":", $time)[1];
            $seconde = intval(floatval(str_replace('Z','',explode(":", $time)[2])));

            $final_date_time = Carbon::now();
            $final_date_time->setDate($jaar, $maand, $dag)->setTime($uur, $minuut, $seconde)->toDateTimeString();

            //print_r($final_date_time);
            $zoekSignaal = OntvangenSignaal::where('created_at', '=', $final_date_time)->get();


            if($zoekSignaal->count() == 0){
                //bestaat niet
                $signaal = new OntvangenSignaal();
                $signaal->created_at = $final_date_time;
                $signaal->uv = $laatste_call->uv_straling;
                $signaal->save();
                //pingping to HTML
                $client = new \GuzzleHttp\Client();
               $res = $client->request('GET', 'http://localhost:8000/addSignaaltoDbEvent/'.$signaal->created_at.'/'.$laatste_call->uv_straling);
                $res->getBody();
                echo 'http://localhost:8000/addSignaaltoDbEvent/'.$signaal->created_at.'/'.$laatste_call->uv_straling;


                //$request = new \GuzzleHttp\Psr7\Request('GET', 'http://localhost:8000/addSignaaltoDbEvent/'.$signaal->created_at.'/'.$laatste_call->uv_straling);
                //$promise = $client->sendAsync($request)->then(function ($response) {
                 //   echo 'I completed! ' . $response->getBody();
                //});
                //$promise->wait();

            } else {
                //bestaat
                echo 'laatste entry staat al in de db.';
            }

        }

        //check of bestaat



     }
}
