<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Log;
use App\OntvangenSignaal;

class simuleerApi extends Command
{

    protected $signature = 'simuleerApi:all';

    protected $description = 'Command description';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        //
        /*
         * Deze comment is voor het testen bedoeld. ,huidig niet in gebruik
        */
        $client = new \GuzzleHttp\Client();
        $request = new \GuzzleHttp\Psr7\Request('GET', 'http://localhost:8000/addSignaaltoDbEvent/testmessage');
        $promise = $client->sendAsync($request)->then(function ($response) {
            echo 'I completed! ' . $response->getBody();
        });
        $promise->wait();
    }
}
