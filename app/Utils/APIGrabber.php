<?php

namespace App\Utils;

use Illuminate\Support\Facades\Http;

class APIGrabber
{
    function fetchAPI()
    {
        $api_key = 'ba471f7f944c032da0b194121b8b2d57';
        $opw_url = "api.openweathermap.org/data/2.5/forecast?&lat=33.4878&lon=48.3558&units=metric&appid=$api_key";

        $response = Http::get($opw_url);
        return json_decode($response, true);
    }
}
