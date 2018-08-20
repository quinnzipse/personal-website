<?php

namespace App\Console;

use App\User;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Auth;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function (){
            //GET REQUEST/SQL SAVING
            $count = Count(User::get());
            $client = new Client();
            for($id=1;$id<=$count;$id++) {

                $currentuser = User::where('id', '=', $id)->get()[0];
                if($currentuser->refreshToken == null) continue;

                try {
                    $res = $client->request('POST', 'https://accounts.spotify.com/api/token',
                        ["headers" => [
                            "Authorization" => 'Basic ' . base64_encode(env('SpotClientID') . ':' . env('SpotClientSecret'))
                        ],
                            "form_params" => [
                                "grant_type" => "refresh_token",
                                'refresh_token' => $currentuser->refreshToken
                            ]
                        ]
                    );

                    $body = json_decode($res->getBody());
                    $access_token = $body->access_token;
                    $currentuser->authToken = $access_token;
                    $currentuser->save();
                } catch (GuzzleException $e) {

                }
            }
        })->everyThirtyMinutes();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
