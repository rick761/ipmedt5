<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Log;
use App\OntvangenSignaal;

class simuleerApi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'simuleerApi:all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        //
        /*$nieuwSignaal = new OntvangenSignaal;
        $nieuwSignaal->uv =  rand (  0 ,  11 );
        $nieuwSignaal->save();
        Log::info('a OntvangenSignaal has been created...');
        */
        $client = new \GuzzleHttp\Client();
        $request = new \GuzzleHttp\Psr7\Request('GET', 'http://localhost:8000/addSignaaltoDbEvent/testmessage');
        $promise = $client->sendAsync($request)->then(function ($response) {
            echo 'I completed! ' . $response->getBody();
        });
        $promise->wait();
    }
}
