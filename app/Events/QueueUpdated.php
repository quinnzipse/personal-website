<?php

namespace App\Events;

use App\Song;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class QueueUpdated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $song;
    public $remove;

    /**
     * Create a new event instance.
     *
     * @param Song $song
     * @param bool $remove
     */
    public function __construct(Song $song, bool $remove)
    {
        $this->song = $song;
        $this->remove = $remove;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return ['quinns-music'];
    }

    public function broadcastAs()
    {
        return 'queue-updated';
    }
}
