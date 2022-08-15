<?php

use App\Http\Controllers\PostCurrencyController;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::get('/', function () {

    if(isset($_GET['action']) && isset($_GET["id"])){
        $message = \App\Models\Favourite::deleteCurrency($_GET["id"])? "Dodano": "Nie udało się dodać";
    }

    if(isset($_GET['action'])&& $_GET['action']=="deleteAll"){
        \App\Models\Favourite::deleteAll();
    }

    $postCurrency =  new PostCurrencyController();
    return $postCurrency->getViewCurrencyList();
});



Route::post('/', function () {
    \App\Models\Favourite::addCurrency($_POST["currancy"]);

    $postCurrency =  new PostCurrencyController();
    return $postCurrency->getViewCurrencyList();
});
