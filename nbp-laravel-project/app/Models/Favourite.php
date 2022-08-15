<?php

namespace App\Models;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Mockery\Exception;
use PhpParser\Error;

class Favourite
{
    public static function addCurrency(string $currency):bool{

        try {
            $currency = explode("|", $currency);

            $array = Cache::get('favourite') ?? [];

            if(Favourite::array_in_array($currency[0],$array)){
                throw new Exception("This Currency is already on your list");
            }

            $array[] = array(
                "code" => $currency[0] ?? "",
                "currency" => $currency[1] ?? "",
                "mid" => $currency[2] ?? ""
            );

            Cache::put('favourite', $array);

            return true;

        }catch(Exception $exception){
            Log::info($exception->getMessage());
            return false;
        }

    }

    static function array_in_array($arr_needle,$arr_haystack):bool{
        $retorno = false;

        foreach ($arr_haystack as $value) {
            if(in_array($arr_needle, $value)){
                $retorno = true;
            }
        }
        return $retorno;
    }


    static function deleteCurrency($key){
            $array = Cache::get('favourite');
            unset($array[$key]);
            Cache::put('favourite', $array);
            return (is_array($array)) ? array_values($array) : false;

    }

    static function deleteAll(){
        Cache::put('favourite', []);
        return true;
    }
}
