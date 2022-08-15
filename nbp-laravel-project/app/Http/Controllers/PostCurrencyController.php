<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class PostCurrencyController extends Controller
{
    public function getCurrencyList(){

        $post = Http::get("https://api.nbp.pl/api/exchangerates/tables/A/?format=json");
        $result = json_decode($post,true);

        return view("currency",[
            "posts"=> $result[0]["rates"]
        ]);
    }

}
