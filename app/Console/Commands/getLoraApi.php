<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

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
        //
        var_dump('abc');
        //$request = \Illuminate\Http\Request::create('http://your-api.com', 'POST', ['param1' => 'value1', 'param2' => 'value2']);
    }
}
