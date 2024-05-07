<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');

        if (empty($query)) {
            $metaData = [
                'title' => 'Пошук на сайті газети Дейком',
                'description' => 'Знаходьте найголовніші новини України та світу на сторінках газети Дейком. Ми висвітлюємо українські та міжнародні новини, серед яких: політика, бізнес, технології, наука, здоров\'я, мистецтво, спорт, та інші події з багатьої куточків світу.',
                'url' => 'https://daycom.com.ua/search',
            ];

            $data = [];

            return view('search', ['metaData' => $metaData, 'data' => $data, 'query' => $query]);
        }

        $metaData = [
            'title' => 'Пошук на сайті газети Дейком',
            'description' => 'Знаходьте найголовніші новини України та світу на сторінках газети Дейком. Ми висвітлюємо українські та міжнародні новини, серед яких: політика, бізнес, технології, наука, здоров\'я, мистецтво, спорт, та інші події з багатьої куточків світу.',
            'url' => 'https://daycom.com.ua/search?query=' . $query,
        ];

        $url = 'https://sside.daycom.com.ua/api/search?query=' . urlencode($query);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        if ($response) {
            $data = json_decode($response, true);
            if ($data !== null) {
                return view('search', ['query' => $query, 'metaData' => $metaData, 'data' => $data]);
            } else {
                echo "Ошибка при декодировании JSON.";
            }
        } else {
            echo "Не удалось получить JSON-ответ";
        }
    }
    public function podilskSearch(Request $request)
    {
        $query = $request->input('query');

        if (empty($query)) {
            $metaData = [
                'title' => 'Пошук на сайті газети Дейком',
                'description' => 'Знаходьте найголовніші новини України та світу на сторінках газети Дейком. Ми висвітлюємо українські та міжнародні новини, серед яких: політика, бізнес, технології, наука, здоров\'я, мистецтво, спорт, та інші події з багатьої куточків світу.',
                'url' => 'https://daycom.com.ua/podilsk/search',
                'name' => '',
            ];

            $city = [
                'name' => 'Подільськ',
                'name_link' => 'podilsk',
                'main_link' => 'podilsk.index',
                'news_line' => 'podilsk.line',
                'news_link' => 'podilsk.news',
    
            ];

            $data = [];

            return view(
                'city_search',
                [
                    'metaData' => $metaData,
                    'data' => $data,
                    'query' => $query,
                    'city' => $city,
                ]
            );
        }

        $metaData = [
            'title' => 'Пошук на сайті газети Дейком',
            'description' => 'Знаходьте найголовніші новини України та світу на сторінках газети Дейком. Ми висвітлюємо українські та міжнародні новини, серед яких: політика, бізнес, технології, наука, здоров\'я, мистецтво, спорт, та інші події з багатьої куточків світу.',
            'url' => 'https://daycom.com.ua/podilsk/search?query=' . $query,
        ];

        $city = [
            'name' => 'Подільськ',
            'name_link' => 'podilsk',
            'main_link' => 'podilsk.index',
            'news_line' => 'podilsk.line',
            'news_link' => 'podilsk.news',

        ];

        $url = 'https://sside.daycom.com.ua/api/podilsk/search?query=' . urlencode($query);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        if ($response) {
            $data = json_decode($response, true);
            if ($data !== null) {
                return view(
                    'city_search',
                    [
                        'metaData' => $metaData,
                        'data' => $data,
                        'query' => $query,
                        'city' => $city,
                    ]
                );
            } else {
                echo "Ошибка при декодировании JSON.";
            }
        } else {
            echo "Не удалось получить JSON-ответ";
        }
    }
    public function teplodarSearch(Request $request)
    {
        $query = $request->input('query');

        if (empty($query)) {
            $metaData = [
                'title' => 'Пошук на сайті газети Дейком',
                'description' => 'Знаходьте найголовніші новини України та світу на сторінках газети Дейком. Ми висвітлюємо українські та міжнародні новини, серед яких: політика, бізнес, технології, наука, здоров\'я, мистецтво, спорт, та інші події з багатьої куточків світу.',
                'url' => 'https://daycom.com.ua/teplodar/search',
            ];

            $city = [
                'name' => 'Теплодар',
                'name_link' => 'teplodar',
                'main_link' => 'teplodar.index',
                'news_line' => 'teplodar.line',
                'news_link' => 'teplodar.news',
            ];

            $data = [];

            return view(
                'city_search',
                [
                    'metaData' => $metaData,
                    'data' => $data,
                    'query' => $query,
                    'city' => $city,
                ]
            );
        }

        $metaData = [
            'title' => 'Пошук на сайті газети Дейком',
            'description' => 'Знаходьте найголовніші новини України та світу на сторінках газети Дейком. Ми висвітлюємо українські та міжнародні новини, серед яких: політика, бізнес, технології, наука, здоров\'я, мистецтво, спорт, та інші події з багатьої куточків світу.',
            'url' => 'https://daycom.com.ua/teplodar/search?query=' . $query,
        ];

        $city = [
            'name' => 'Теплодар',
            'name_link' => 'teplodar',
            'main_link' => 'teplodar.index',
            'news_line' => 'teplodar.line',
            'news_link' => 'teplodar.news',
        ];

        $url = 'https://sside.daycom.com.ua/api/teplodar/search?query=' . urlencode($query);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        if ($response) {
            $data = json_decode($response, true);
            if ($data !== null) {
                return view(
                    'city_search',
                    [
                        'metaData' => $metaData,
                        'data' => $data,
                        'query' => $query,
                        'city' => $city,
                    ]
                );
            } else {
                echo "Ошибка при декодировании JSON.";
            }
        } else {
            echo "Не удалось получить JSON-ответ";
        }
    }
}
