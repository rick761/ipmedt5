<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Support\Facades\Auth;


class SignaalEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $timestamp;
    public $uv;



    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($timestamp,$uv)
    {
        //
        $this->timestamp = $timestamp;
        $this->uv = $uv;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        //event waar naar geluisterd wordt voor live updates
        return new Channel('channelSignaalEvent');
    }
}
