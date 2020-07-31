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
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $quinn = User::get()[0];
            $client = new Client();

            try {
                $res = $client->request('POST', 'https://accounts.spotify.com/api/token',
                    ["headers" => [
                        "Authorization" => 'Basic ' . base64_encode(env('SpotClientID') . ':' . env('SpotClientSecret'))
                    ],
                        "form_params" => [
                            "grant_type" => "refresh_token",
                            'refresh_token' => $quinn->refreshToken
                        ]
                    ]
                );

                $body = json_decode($res->getBody());

                $access_token = $body->access_token;
                $quinn->authToken = $access_token;
                $quinn->save();
            } catch (GuzzleException $e) {
                return false;
            }

            return true;
        })->everyThirtyMinutes();

//        $schedule->call(function () {
//            $quinns_code = User::get()[0]->authToken;
//            $client = new Client();
//            try {
//                $res1 = $client->request('get', 'https://api.spotify.com/v1/me/player/currently-playing', ['headers' => [
//                    'Authorization' => 'Bearer ' . $quinns_code
//                ]]);
//            } catch (GuzzleException $e) {
//                return $e->getMessage();
//            }
//            try {
//                $res = $client->request('get', 'https://api.spotify.com/v1/me/player/recently-played',
//                    ['headers' => [
//                        'Authorization' => 'Bearer ' . $quinns_code
//                    ],
//                    ]
//                );
//            } catch (GuzzleException $e) {
//                return $e->getMessage();
//            }
//
//            return json_decode($res->getBody());
//        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
