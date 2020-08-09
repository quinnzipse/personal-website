<?php

namespace App\Events;

use App\Song;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NewSong implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $song;
    public $wasQueued;

    /**
     * Create a new event instance.
     *
     * @param Song $song
     * @param bool $wasQueued
     */
    public function __construct(Song $song, bool $wasQueued)
    {
        $this->song = $song;
        $this->wasQueued = $wasQueued;
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

    public function broadcastAs(){
        return 'new-song';
    }
}
