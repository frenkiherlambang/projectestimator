<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Spatie\Browsershot\Browsershot;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('testshot', function () {
    Browsershot::url('http://127.0.0.1:8000/')->setRemoteInstance('127.0.0.1/wd/hub', 4444)->noSandbox()->save(storage_path('app/public/test.png'));
})->purpose('Display an inspiring quote');
