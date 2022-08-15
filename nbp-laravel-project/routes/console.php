<?php

use App\Http\Controllers\PostCurrencyController;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

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


Artisan::command('getCurrencyList', function () {
    $data = new PostCurrencyController;
    $result = $data->getCurrencyList();
    foreach ($result[0]["rates"] as $element){
        echo $element["currency"]." - ".$element["code"]." - ". $element["mid"] ."\n";
    }
})->purpose('Display an inspiring quote');
