<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CorporationController extends Controller
{
    public function corporate_section()
    {
        return view('corporate_section');
    }
    public function politics()
    {
        return view('politics');
    }
    public function legal_information()
    {
        return view('legal_information');
    }
    public function more_about_us()
    {
        return view('more_about_us');
    }

    public function about_us()
    {
        return view('about_us');
    }
    public function maps_ua()
    {
        return view('maps_ua');
    }
    public function advertising()
    {
        return view('advertising');
    }
    public function partnership()
    {
        return view('partnership');
    }
    public function work_with_us()
    {
        return view('work_with_us');
    }
    public function editorship()
    {
        $LOCAL_NEWS = 'http://localhost:4444/api/newsattr';
        $SERVER_NEWS = 'https://sside.daycom.com.ua/api/newsattr';
        // $url = 'https://sside.daycom.com.ua/api/authors';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $LOCAL_NEWS);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);

        if ($response) {
            $authors = json_decode($response, true);

            return view('editorship', ['authors' => $authors]);
        } else {
            echo "Не удалось получить JSON-ответ";
        }

        curl_close($ch);
    }
    public function subscription()
    {
        return view('subscription');
    }
    public function privacy_politics()
    {
        return view('privacy_politics');
    }
    public function editorial_politics()
    {
        return view('editorial_politics');
    }
    public function cookie_politics()
    {
        return view('cookie_politics');
    }
    public function service()
    {
        return view('service');
    }
    public function content()
    {
        return view('content');
    }
    public function terms_of_sale()
    {
        return view('terms_of_sale');
    }
    public function comments_section()
    {
        return view('comments_section');
    }
    public function presentation_for_readers()
    {
        return view('presentation_for_readers');
    }
}
