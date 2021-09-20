<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WeatherController extends Controller
{
    public function weather()
    {
        try
        {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://api.hgbrasil.com/weather?key=4f48f53d");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

            $output = curl_exec($ch);
            curl_close($ch);  

            $json = json_decode($output, true);

            return response()->json([
                'city' => $json['results']['city'],
                'temp' => $json['results']['temp'],
                'description' => $json['results']['description']
            ], 200);
        }
        catch(\Exception $ex)
        {
            return response()->json(["error"=>$ex->getMessage() . ' on line: ' . $ex->getLine()], 500);
        }
    }
}
