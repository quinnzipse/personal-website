<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>CRON Emulator</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<main id="app">
    <noscript>
        <h1>Please Enable JavaScript to Continue.</h1>
    </noscript>
    @if (env('APP_ENV') == 'local' && env('APP_DEBUG'))
        <ul id="list">
            <li>App Env: {{env('APP_ENV')}}</li>
            <li>Debug: {{env('APP_DEBUG')}}</li>
        </ul>
        <h1 style="color: #0d9829" id="status">RUNNING</h1>
        <h6>Errors: <span>0</span></h6>

        <div id="log"></div>
    @else
        <h2>This Page is not available in {{env('APP_ENV')}} with debug set to {{env('APP_DEBUG')}}!</h2>
    @endif
</main>
@if (env('APP_ENV') == 'local' && env('APP_DEBUG'))
    <script>
        const NOW_PLAYING_TIME = 10000;
        const REAUTH_TIME = 1800000;
        let errors = 0;

        (function () {
            setTimeout(getNowPlaying, NOW_PLAYING_TIME);
            setTimeout(reauth, REAUTH_TIME);

            let list = document.getElementById('list');
            list.innerHTML = list.innerHTML + `<li>fetchNowPlaying will execute every ${NOW_PLAYING_TIME}ms.</li><li>reauth will execute every ${REAUTH_TIME}ms.</li>`;
        })();

        async function getNowPlaying() {
            let log = document.getElementById('log');
            const request = await fetch('../spotify/get_currently_playing');
            log.innerHTML = log.innerHTML + `<p>Ran <strong>fetchNowPlaying</strong>. <span ${(request.ok ? '' : 'style="color: #ac0d0d"')}>HTTP ${request.status}</span></p>`;

            updateUI(request.ok);
            setTimeout(getNowPlaying, NOW_PLAYING_TIME);
        }

        async function reauth() {
            const request = await fetch('../spotify/reauth');
            let log = document.getElementById('log');
            log.innerHTML = log.innerHTML + `<p>Ran <strong>reauth</strong>. <span ${(request.ok ? '' : 'style="color: #ac0d0d"')}>HTTP ${request.status}</span></p>`;

            updateUI(request.ok);
            setTimeout(getNowPlaying, REAUTH_TIME);
        }

        function updateUI(isOK){
            let status = document.getElementById('status');
            if (isOK){
                status.innerText = 'RUNNING';
                status.style.color = '#0d9829';
            } else {
                errors++;
                status.innerText = 'FAILED';
                status.style.color = '#ac0d0d';
            }
            document.querySelector('h6 span').innerText = errors;
        }

    </script>
@endif
<style>
    p {
        margin: 5px;
    }
</style>
</body>
</html>
