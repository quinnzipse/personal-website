<?php

namespace App\Console\Commands;

use App\Http\Controllers\SpotifyController;
use Illuminate\Console\Command;

class GetNowPlaying extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cronTask:GetNowPlaying';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update the Now Playing Song';

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
        return SpotifyController::fetchNowPlaying();
    }
}
