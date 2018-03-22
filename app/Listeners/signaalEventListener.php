<?php

namespace App\Listeners;

use App\Events\SignaalEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class signaalEventListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  SignaalEvent  $event
     * @return void
     */
    public function handle(SignaalEvent $event)
    {
        //

    }
}
