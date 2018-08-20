@echo off
title Cron Emulator
:a
php artisan schedule:run
goto a