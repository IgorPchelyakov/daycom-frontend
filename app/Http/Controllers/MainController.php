<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $LOCAL_NEWS = "http://localhost:4444/api/main-page?feed=Загальнонаціональна стрічка";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $LOCAL_NEWS);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);

        if ($response) {
            $data = json_decode($response, true);
            dd($data);
            return view('main', ['data' => $data]);
        }


        curl_close($ch);
    }
}
