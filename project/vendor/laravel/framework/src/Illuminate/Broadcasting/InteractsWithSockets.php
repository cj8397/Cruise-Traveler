<?php

namespace Illuminate\Broadcasting;

use Illuminate\Support\Facades\Broadcast;

trait InteractsWithSockets
{
    /**
     * The socket ID for the user that raised the event.
     *
     * @var string|null
     */
    public $socket;

    /**
     * Exclude the current user from receiving the broadcast.
     *
     * @return $this
     */
    public function exceptCurrentUser()
    {
        $this->socket = Broadcast::socket();

        return $this;
    }
}
