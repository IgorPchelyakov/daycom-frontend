<?php

namespace App\Http\Controllers;

use App\Helpers\NewsApiHelper;
use Illuminate\Http\Request;


class OdesaNewsController extends Controller
{
    public function bilgorodDnistrovskyHome()
    {
        $metaData = [
            'title' => 'Головні новини міста Білгород-Дністровський, України та світу на сторінках DAYCOM',
            'description' => 'Головний сайт Білгород-Дністровського, головні новини Білгород-Дністровський, новини ТОП Білгород-Дністровський, новини новини бізнесу Білгород-Дністровський, стрічка новин Білгород-Дністровський, Думки Білгород-Дністровський, новини Білгород-Дністровський сьогодні, останні новини сьогодні Білгород-Дністровський, інформаційна агенція Білгород-Дністровський, інформація Білгород-Дністровський',
            'site' => 'Головні новини міста Білгород-Дністровський, України та світу на сторінках DAYCOM',
            'url' => 'https://daycom.com.ua/bilgorod-dnistrovsky',
            'keywords' => 'Головний сайт Білгород-Дністровського, головні новини Білгород-Дністровський, новини ТОП Білгород-Дністровський, новини новини бізнесу Білгород-Дністровський, стрічка новин Білгород-Дністровський, Думки Білгород-Дністровський, новини Білгород-Дністровський сьогодні, останні новини сьогодні Білгород-Дністровський, інформаційна агенція Білгород-Дністровський, інформація Білгород-Дністровський',
        ];

        $city = [
            'name' => 'Білгород-Дністровський',
            'name_link' => 'bilgorod',
            'main_link' => 'bilgorod.index',
            'news_line' => 'news.line',
            'news_link' => 'bilgorod.news',
        ];

        $url = env("SERVER_API_URL") . '/bilgorod-dnistrovsky/with-nn';
        $cityIsActiveUrl = env("SERVER_API_URL") . "/get-city-by-name/" . $city['name'];
        $data = NewsApiHelper::fetchDataFromApi($url);
        $cityIsActive = NewsApiHelper::fetchCityIsActive($cityIsActiveUrl);

        $isActive = $cityIsActive['city']['isActive'];

        if ($isActive === true) {
            $processedData = NewsApiHelper::processActiveCityNewsData($data, $city['name']);
            return view(
                'city_active_home',
                [
                    'data' => $processedData['newsData'],
                    'newsToday' => $processedData['filteredNewsToday'],
                    'feed' => $processedData['filteredFeed'],
                    'metaData' => $metaData,
                    'city' => $city
                ]
            );
        } else {
            $processedData = NewsApiHelper::processCityNewsData($data);
            return view('city_home', ['data' => $processedData, 'metaData' => $metaData, 'city' => $city]);
        }
    }
    public function chornomorskHome()
    {
        $metaData = [
            'title' => 'Головні новини міста Чорноморськ, України та світу на сторінках DAYCOM',
            'description' => 'Головний сайт Чорноморська, головні новини Чорноморськ, новини ТОП Чорноморськ, новини новини бізнесу Чорноморськ, стрічка новин Чорноморськ, Думки Чорноморськ, новини Чорноморськ сьогодні, останні новини сьогодні Чорноморськ, інформаційна агенція Чорноморськ, інформація Чорноморськ',
            'site' => 'Головні новини міста Чорноморськ, України та світу на сторінках DAYCOM',
            'url' => 'https://daycom.com.ua/сhornomorsk',
            'keywords' => 'Головний сайт Чорноморська, головні новини Чорноморськ, новини ТОП Чорноморськ, новини новини бізнесу Чорноморськ, стрічка новин Чорноморськ, Думки Чорноморськ, новини Чорноморськ сьогодні, останні новини сьогодні Чорноморськ, інформаційна агенція Чорноморськ, інформація Чорноморськ',
        ];


        $city = [
            'name' => 'Чорноморськ',
            'name_link' => 'chornomorsk',
            'main_link' => 'chornomorsk.index',
            'news_line' => 'news.line',
            'news_link' => 'chornomorsk.news',
        ];

        $url = env("SERVER_API_URL") . '/chornomorsk/with-nn';
        $cityIsActiveUrl = env("SERVER_API_URL") . "/get-city-by-name/" . $city['name'];
        $data = NewsApiHelper::fetchDataFromApi($url);
        $cityIsActive = NewsApiHelper::fetchCityIsActive($cityIsActiveUrl);

        $isActive = $cityIsActive['city']['isActive'];

        if ($isActive === true) {
            $processedData = NewsApiHelper::processActiveCityNewsData($data, $city['name']);
            return view(
                'city_active_home',
                [
                    'data' => $processedData['newsData'],
                    'newsToday' => $processedData['filteredNewsToday'],
                    'feed' => $processedData['filteredFeed'],
                    'metaData' => $metaData,
                    'city' => $city
                ]
            );
        } else {
            $processedData = NewsApiHelper::processCityNewsData($data);
            return view('city_home', ['data' => $processedData, 'metaData' => $metaData, 'city' => $city]);
        }
    }
    public function izmailHome()
    {
        $metaData = [
            'title' => 'Головні новини міста Ізмаїл, України та світу на сторінках DAYCOM',
            'description' => 'Головний сайт Ізмаїла, головні новини Ізмаїл, новини ТОП Ізмаїл, новини новини бізнесу Ізмаїл, стрічка новин Ізмаїл, Думки Ізмаїл, новини Ізмаїл сьогодні, останні новини сьогодні Ізмаїл,  Ізмаїлі,  Ізмаїл, інформаційна агенція Ізмаїл, інформація Ізмаїл',
            'site' => 'Головні новини міста Ізмаїл, України та світу на сторінках DAYCOM',
            'url' => 'https://daycom.com.ua/izmail',
            'keywords' => 'Головний сайт Ізмаїла, головні новини Ізмаїл, новини ТОП Ізмаїл, новини новини бізнесу Ізмаїл, стрічка новин Ізмаїл, Думки Ізмаїл, новини Ізмаїл сьогодні, останні новини сьогодні Ізмаїл,  Ізмаїлі,  Ізмаїл, інформаційна агенція Ізмаїл, інформація Ізмаїл',
        ];

        $city = [
            'name' => 'Ізмаїл',
            'name_link' => 'izmail',
            'main_link' => 'izmail.index',
            'news_line' => 'news.line',
            'news_link' => 'izmail.news',
        ];

        $url = env("SERVER_API_URL") . '/izmail/with-nn';
        $cityIsActiveUrl = env("SERVER_API_URL") . "/get-city-by-name/" . $city['name'];
        $data = NewsApiHelper::fetchDataFromApi($url);
        $cityIsActive = NewsApiHelper::fetchCityIsActive($cityIsActiveUrl);

        $isActive = $cityIsActive['city']['isActive'];

        if ($isActive === true) {
            $processedData = NewsApiHelper::processActiveCityNewsData($data, $city['name']);
            return view(
                'city_active_home',
                [
                    'data' => $processedData['newsData'],
                    'newsToday' => $processedData['filteredNewsToday'],
                    'feed' => $processedData['filteredFeed'],
                    'metaData' => $metaData,
                    'city' => $city
                ]
            );
        } else {
            $processedData = NewsApiHelper::processCityNewsData($data);
            return view('city_home', ['data' => $processedData, 'metaData' => $metaData, 'city' => $city]);
        }
    }
    public function kiliyaHome()
    {
        $metaData = [
            'title' => 'Головні новини міста Кілія, України та світу на сторінках DAYCOM',
            'description' => 'Головний сайт Кілії, головні новини Кілія, новини ТОП Кілія, новини новини бізнесу Кілія, стрічка новин Кілія, Думки Кілія, новини Кілія сьогодні, останні новини сьогодні Кілія, інформаційна агенція Кілія, інформація Кілія',
            'site' => 'Головні новини міста Кілія, України та світу на сторінках DAYCOM',
            'url' => 'https://daycom.com.ua/kiliya',
            'keywords' => 'Головний сайт Кілії, головні новини Кілія, новини ТОП Кілія, новини новини бізнесу Кілія, стрічка новин Кілія, Думки Кілія, новини Кілія сьогодні, останні новини сьогодні Кілія, інформаційна агенція Кілія, інформація Кілія',
        ];

        $city = [
            'name' => 'Кілія',
            'name_link' => 'kiliya',
            'main_link' => 'kiliya.index',
            'news_line' => 'news.line',
            'news_link' => 'kiliya.news',
        ];

        $url = env("SERVER_API_URL") . '/kiliya/with-nn';
        $cityIsActiveUrl = env("SERVER_API_URL") . "/get-city-by-name/" . $city['name'];
        $data = NewsApiHelper::fetchDataFromApi($url);
        $cityIsActive = NewsApiHelper::fetchCityIsActive($cityIsActiveUrl);

        $isActive = $cityIsActive['city']['isActive'];

        if ($isActive === true) {
            $processedData = NewsApiHelper::processActiveCityNewsData($data, $city['name']);
            return view(
                'city_active_home',
                [
                    'data' => $processedData['newsData'],
                    'newsToday' => $processedData['filteredNewsToday'],
                    'feed' => $processedData['filteredFeed'],
                    'metaData' => $metaData,
                    'city' => $city
                ]
            );
        } else {
            $processedData = NewsApiHelper::processCityNewsData($data);
            return view('city_home', ['data' => $processedData, 'metaData' => $metaData, 'city' => $city]);
        }
    }
    public function odesaHome()
    {
        $metaData = [
            'title' => 'Головні новини міста Одеса, України та світу на сторінках DAYCOM',
            'description' => 'Головний сайт Одеси, головні новини Одеса, новини ТОП Одеса, новини новини бізнесу Одеса, стрічка новин Одеса, Думки Одеса, новини Одеса сьогодні, останні новини сьогодні Одеса, інформаційна агенція Одеса, інформація Одеса',
            'site' => 'Головні новини міста Одеса, України та світу на сторінках DAYCOM',
            'url' => 'https://daycom.com.ua/odesa',
            'keywords' => 'Головний сайт Одеси, головні новини Одеса, новини ТОП Одеса, новини новини бізнесу Одеса, стрічка новин Одеса, Думки Одеса, новини Одеса сьогодні, останні новини сьогодні Одеса, інформаційна агенція Одеса, інформація Одеса',
        ];

        $city = [
            'name' => 'Одеса',
            'name_link' => 'odesa',
            'main_link' => 'odesa.index',
            'news_line' => 'news.line',
            'news_link' => 'odesa.news',
        ];

        $url = env("SERVER_API_URL") . '/odesa/with-nn';
        $cityIsActiveUrl = env("SERVER_API_URL") . "/get-city-by-name/" . $city['name'];
        $data = NewsApiHelper::fetchDataFromApi($url);
        $cityIsActive = NewsApiHelper::fetchCityIsActive($cityIsActiveUrl);

        $isActive = $cityIsActive['city']['isActive'];

        if ($isActive === true) {
            $processedData = NewsApiHelper::processActiveCityNewsData($data, $city['name']);
            return view(
                'city_active_home',
                [
                    'data' => $processedData['newsData'],
                    'newsToday' => $processedData['filteredNewsToday'],
                    'feed' => $processedData['filteredFeed'],
                    'metaData' => $metaData,
                    'city' => $city
                ]
            );
        } else {
            $processedData = NewsApiHelper::processCityNewsData($data);
            return view('city_home', ['data' => $processedData, 'metaData' => $metaData, 'city' => $city]);
        }
    }
    public function podilskHome()
    {
        $metaData = [
            'title' => 'Головні новини міста Подільськ, України та світу на сторінках DAYCOM',
            'description' => 'Головний сайт Подільська, головні новини Подільськ, новини ТОП Подільськ, новини новини бізнесу Подільськ, стрічка новин Подільськ, Думки Подільськ, новини Подільськ сьогодні, останні новини сьогодні Подільськ, інформаційна агенція Подільськ, інформація Подільськ',
            'site' => 'Головні новини міста Подільськ, України та світу на сторінках DAYCOM',
            'url' => 'https://daycom.com.ua/podilsk',
            'keywords' => 'Головний сайт Подільська, головні новини Подільськ, новини ТОП Подільськ, новини новини бізнесу Подільськ, стрічка новин Подільськ, Думки Подільськ, новини Подільськ сьогодні, останні новини сьогодні Подільськ, інформаційна агенція Подільськ, інформація Подільськ',
        ];

        $city = [
            'name' => 'Подільськ',
            'name_link' => 'podilsk',
            'main_link' => 'podilsk.index',
            'news_line' => 'podilsk.line',
            'news_link' => 'podilsk.news',
        ];

        $url = env("SERVER_API_URL") . '/podilsk/with-nn';
        $cityIsActiveUrl = env("SERVER_API_URL") . "/get-city-by-name/" . $city['name'];
        $data = NewsApiHelper::fetchDataFromApi($url);
        $cityIsActive = NewsApiHelper::fetchCityIsActive($cityIsActiveUrl);

        $isActive = $cityIsActive['city']['isActive'];

        if ($isActive === true) {
            $processedData = NewsApiHelper::processActiveCityNewsData($data, $city['name']);
            return view(
                'city_active_home',
                [
                    'data' => $processedData['newsData'],
                    'newsToday' => $processedData['filteredNewsToday'],
                    'feed' => $processedData['filteredFeed'],
                    'metaData' => $metaData,
                    'city' => $city
                ]
            );
        } else {
            $processedData = NewsApiHelper::processCityNewsData($data);
            return view('city_home', ['data' => $processedData, 'metaData' => $metaData, 'city' => $city]);
        }
    }
    public function teplodarHome()
    {
        $metaData = [
            'title' => 'Головні новини міста Теплодар, України та світу на сторінках газети Дейком',
            'description' => 'Головний сайт Теплодара, головні новини Теплодар, новини ТОП Теплодар, новини новини бізнесу Теплодар, стрічка новин Теплодар, Думки Теплодар, новини Теплодар сьогодні, останні новини сьогодні Теплодар, інформаційна агенція Теплодар, інформація Теплодар',
            'site' => 'Головні новини міста Теплодар, України та світу на сторінках газети Дейком',
            'url' => 'https://daycom.com.ua/teplodar',
            'keywords' => 'Головний сайт Теплодара, головні новини Теплодар, новини ТОП Теплодар, новини новини бізнесу Теплодар, стрічка новин Теплодар, Думки Теплодар, новини Теплодар сьогодні, останні новини сьогодні Теплодар, інформаційна агенція Теплодар, інформація Теплодар',
        ];

        $city = [
            'name' => 'Теплодар',
            'name_link' => 'teplodar',
            'main_link' => 'teplodar.index',
            'news_line' => 'teplodar.line',
            'news_link' => 'teplodar.news',
        ];

        $url = env("SERVER_API_URL") . '/teplodar/with-nn';
        $cityIsActiveUrl = env("SERVER_API_URL") . "/get-city-by-name/" . $city['name'];
        $data = NewsApiHelper::fetchDataFromApi($url);
        $cityIsActive = NewsApiHelper::fetchCityIsActive($cityIsActiveUrl);

        $isActive = $cityIsActive['city']['isActive'];

        if ($isActive === true) {
            $processedData = NewsApiHelper::processActiveCityNewsData($data, $city['name']);
            return view(
                'city_active_home',
                [
                    'data' => $processedData['newsData'],
                    'newsToday' => $processedData['filteredNewsToday'],
                    'feed' => $processedData['filteredFeed'],
                    'metaData' => $metaData,
                    'city' => $city
                ]
            );
        } else {
            $processedData = NewsApiHelper::processCityNewsData($data);
            return view('city_home', ['data' => $processedData, 'metaData' => $metaData, 'city' => $city]);
        }
    }
    public function youzhneHome()
    {
        $metaData = [
            'title' => 'Головні новини міста Южне, України та світу на сторінках DAYCOM',
            'description' => 'Головний сайт Южне, головні новини Южне, новини ТОП Южне, новини новини бізнесу Южне, стрічка новин Южне, Думки Южне, новини Южне сьогодні, останні новини сьогодні Южне, інформаційна агенція Южне, інформація Южне',
            'site' => 'Головні новини міста Южне, України та світу на сторінках DAYCOM',
            'url' => 'https://daycom.com.ua/youzhne',
            'keywords' => 'Головний сайт Южне, головні новини Южне, новини ТОП Южне, новини новини бізнесу Южне, стрічка новин Южне, Думки Южне, новини Южне сьогодні, останні новини сьогодні Южне, інформаційна агенція Южне, інформація Южне',
        ];
        $city = [
            'name' => 'Южне',
            'name_link' => 'youzhne',
            'main_link' => 'youzhne.index',
            'news_line' => 'news.line',
            'news_link' => 'youzhne.news',
        ];

        $url = env("SERVER_API_URL") . '/youzhne/with-nn';
        $cityIsActiveUrl = env("SERVER_API_URL") . "/get-city-by-name/" . $city['name'];
        $data = NewsApiHelper::fetchDataFromApi($url);
        $cityIsActive = NewsApiHelper::fetchCityIsActive($cityIsActiveUrl);

        $isActive = $cityIsActive['city']['isActive'];

        if ($isActive === true) {
            $processedData = NewsApiHelper::processActiveCityNewsData($data, $city['name']);
            return view(
                'city_active_home',
                [
                    'data' => $processedData['newsData'],
                    'newsToday' => $processedData['filteredNewsToday'],
                    'feed' => $processedData['filteredFeed'],
                    'metaData' => $metaData,
                    'city' => $city
                ]
            );
        } else {
            $processedData = NewsApiHelper::processCityNewsData($data);
            return view('city_home', ['data' => $processedData, 'metaData' => $metaData, 'city' => $city]);
        }
    }

    public function bilgorodDnistrovskyLine()
    {
        $metaData = [
            'title' => 'Головні новини міста Білгород-Дністровський, України та світу на сторінках DAYCOM',
            'description' => 'Головний сайт Білгород-Дністровського, головні новини Білгород-Дністровський, новини ТОП Білгород-Дністровський, новини новини бізнесу Білгород-Дністровський, стрічка новин Білгород-Дністровський, Думки Білгород-Дністровський, новини Білгород-Дністровський сьогодні, останні новини сьогодні Білгород-Дністровський, інформаційна агенція Білгород-Дністровський, інформація Білгород-Дністровський',
            'site' => 'Головні новини міста Білгород-Дністровський, України та світу на сторінках DAYCOM',
            'url' => 'https://daycom.com.ua/bilgorod-dnistrovsky',
            'keywords' => 'Головний сайт Білгород-Дністровського, головні новини Білгород-Дністровський, новини ТОП Білгород-Дністровський, новини новини бізнесу Білгород-Дністровський, стрічка новин Білгород-Дністровський, Думки Білгород-Дністровський, новини Білгород-Дністровський сьогодні, останні новини сьогодні Білгород-Дністровський, інформаційна агенція Білгород-Дністровський, інформація Білгород-Дністровський',
        ];

        $city = [
            'name' => 'Білгород-Дністровський',
            'name_link' => 'bilgorod',
            'main_link' => 'bilgorod.index',
            'news_line' => 'news.line',
            'news_link' => 'bilgorod.news',
        ];

        $url = 'https://sside.daycom.com.ua/api/bilgorod-dnistrovsky/with-nn';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);

        if ($response) {
            $data = json_decode($response, true);

            if ($data !== null) {
                $categories = [
                    'Головне сьогодні' => 10,
                    'ТОП новини від Дейком' => 12,
                    'Стрічка новин' => 46,
                ];

                $sections = [
                    'Війна Росії проти України' => 5,
                    'Суспільство' => 10,
                    'Європа' => 10,
                    'Китай' => 2,
                    'Сполучені Штати' => 3,
                    'Економіка' => 10,
                    'Фінанси' => 10,
                    'Технології' => 10,
                    'Наука' => 4,
                    'Культура' => 10,
                    'Музика' => 10,
                    'Кіно' => 10,
                    'Спорт' => 4,
                    'Політика' => 10,
                    'Влада' => 10,
                    'Північна Америка' => 10,
                    'Південна Америка' => 10,
                    'Близький схід' => 5,
                    'Тихоокеанський регіон' => 5,
                    'Африка' => 5,
                    'Думка' => 10,
                    'Аналітика' => 10,
                ];

                $filteredCategories = [];
                $filteredSections = [];
                $filteredEconomicAndFinance = [];
                $filteredCultureMusicMovies = [];
                $filteredPoliticsAndPower = [];
                $filteredNorthAndSouthAmerica = [];
                $combinedData = [];

                $currentDate = new \DateTime('now', new \DateTimeZone('Europe/Kiev'));
                $currentDate->modify('+2 hour');

                foreach ($categories as $category => $count) {
                    $filteredCategories[$category] = array_filter($data, function ($item) use ($category, $currentDate) {
                        $itemDate = new \DateTime($item['publishedAt']);
                        return $item['block'] === $category && $itemDate <= $currentDate;
                    });

                    $filteredCategories[$category] = array_slice($filteredCategories[$category], 0, $count);
                }

                foreach ($sections as $section => $count) {
                    $filteredSections[$section] = array_filter($data, function ($item) use ($section, $currentDate) {
                        $itemDate = new \DateTime($item['publishedAt']);
                        return $item['section'] === $section && $itemDate <= $currentDate;
                    });

                    $filteredSections[$section] = array_slice($filteredSections[$section], 0, $count);
                }

                $filteredEconomicAndFinance = array_merge($filteredSections['Економіка'], $filteredSections['Фінанси']);

                usort($filteredEconomicAndFinance, function ($a, $b) {
                    return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
                });

                $filteredEconomicAndFinance = array_slice($filteredEconomicAndFinance, 0, 2);

                $filteredCultureMusicMovies = array_merge($filteredSections['Культура'], $filteredSections['Музика'], $filteredSections['Кіно']);

                usort($filteredCultureMusicMovies, function ($a, $b) {
                    return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
                });

                $filteredCultureMusicMovies = array_slice($filteredCultureMusicMovies, 0, 10);

                $filteredPoliticsAndPower = array_merge($filteredSections['Політика'], $filteredSections['Влада']);

                usort($filteredPoliticsAndPower, function ($a, $b) {
                    return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
                });

                $filteredPoliticsAndPower = array_slice($filteredPoliticsAndPower, 0, 5);

                $filteredNorthAndSouthAmerica = array_merge($filteredSections['Південна Америка'], $filteredSections['Північна Америка']);

                usort($filteredNorthAndSouthAmerica, function ($a, $b) {
                    return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
                });

                $filteredNorthAndSouthAmerica = array_slice($filteredNorthAndSouthAmerica, 0, 5);

                foreach ($categories as $category => $count) {
                    foreach ($filteredCategories[$category] as $item) {
                        $combinedData[$category][] = $item;
                    }
                }

                foreach ($sections as $section => $count) {
                    foreach ($filteredSections[$section] as $item) {
                        $combinedData[$section][] = $item;
                    }
                }

                $combinedData['Економіка та Фінанси'] = $filteredEconomicAndFinance;
                $combinedData['Культура, музика та кіно'] = $filteredCultureMusicMovies;
                $combinedData['Політика та Влада'] = $filteredPoliticsAndPower;
                $combinedData['Північна та Південна Америка'] = $filteredNorthAndSouthAmerica;

                return view('city_home', ['data' => $combinedData, 'metaData' => $metaData, 'city' => $city]);
            } else {
                echo "Ошибка при декодировании JSON.";
            }
        } else {
            echo "Не удалось получить JSON-ответ";
        }

        curl_close($ch);
    }
    public function chornomorskLine()
    {
        $metaData = [
            'title' => 'Головні новини міста Чорноморськ, України та світу на сторінках DAYCOM',
            'description' => 'Головний сайт Чорноморська, головні новини Чорноморськ, новини ТОП Чорноморськ, новини новини бізнесу Чорноморськ, стрічка новин Чорноморськ, Думки Чорноморськ, новини Чорноморськ сьогодні, останні новини сьогодні Чорноморськ, інформаційна агенція Чорноморськ, інформація Чорноморськ',
            'site' => 'Головні новини міста Чорноморськ, України та світу на сторінках DAYCOM',
            'url' => 'https://daycom.com.ua/сhornomorsk',
            'keywords' => 'Головний сайт Чорноморська, головні новини Чорноморськ, новини ТОП Чорноморськ, новини новини бізнесу Чорноморськ, стрічка новин Чорноморськ, Думки Чорноморськ, новини Чорноморськ сьогодні, останні новини сьогодні Чорноморськ, інформаційна агенція Чорноморськ, інформація Чорноморськ',
        ];


        $city = [
            'name' => 'Чорноморськ',
            'name_link' => 'chornomorsk',
            'main_link' => 'chornomorsk.index',
            'news_line' => 'news.line',
            'news_link' => 'chornomorsk.news',
        ];

        $url = 'https://sside.daycom.com.ua/api/chornomorsk/with-nn';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);

        if ($response) {
            $data = json_decode($response, true);

            if ($data !== null) {
                $categories = [
                    'Головне сьогодні' => 10,
                    'ТОП новини від Дейком' => 12,
                    'Стрічка новин' => 46,
                ];

                $sections = [
                    'Війна Росії проти України' => 5,
                    'Суспільство' => 10,
                    'Європа' => 10,
                    'Китай' => 2,
                    'Сполучені Штати' => 3,
                    'Економіка' => 10,
                    'Фінанси' => 10,
                    'Технології' => 10,
                    'Наука' => 4,
                    'Культура' => 10,
                    'Музика' => 10,
                    'Кіно' => 10,
                    'Спорт' => 4,
                    'Політика' => 10,
                    'Влада' => 10,
                    'Північна Америка' => 10,
                    'Південна Америка' => 10,
                    'Близький схід' => 5,
                    'Тихоокеанський регіон' => 5,
                    'Африка' => 5,
                    'Думка' => 10,
                    'Аналітика' => 10,
                ];

                $filteredCategories = [];
                $filteredSections = [];
                $filteredEconomicAndFinance = [];
                $filteredCultureMusicMovies = [];
                $filteredPoliticsAndPower = [];
                $filteredNorthAndSouthAmerica = [];
                $combinedData = [];

                $currentDate = new \DateTime('now', new \DateTimeZone('Europe/Kiev'));
                $currentDate->modify('+2 hour');

                foreach ($categories as $category => $count) {
                    $filteredCategories[$category] = array_filter($data, function ($item) use ($category, $currentDate) {
                        $itemDate = new \DateTime($item['publishedAt']);
                        return $item['block'] === $category && $itemDate <= $currentDate;
                    });

                    $filteredCategories[$category] = array_slice($filteredCategories[$category], 0, $count);
                }

                foreach ($sections as $section => $count) {
                    $filteredSections[$section] = array_filter($data, function ($item) use ($section, $currentDate) {
                        $itemDate = new \DateTime($item['publishedAt']);
                        return $item['section'] === $section && $itemDate <= $currentDate;
                    });

                    $filteredSections[$section] = array_slice($filteredSections[$section], 0, $count);
                }

                $filteredEconomicAndFinance = array_merge($filteredSections['Економіка'], $filteredSections['Фінанси']);

                usort($filteredEconomicAndFinance, function ($a, $b) {
                    return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
                });

                $filteredEconomicAndFinance = array_slice($filteredEconomicAndFinance, 0, 2);

                $filteredCultureMusicMovies = array_merge($filteredSections['Культура'], $filteredSections['Музика'], $filteredSections['Кіно']);

                usort($filteredCultureMusicMovies, function ($a, $b) {
                    return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
                });

                $filteredCultureMusicMovies = array_slice($filteredCultureMusicMovies, 0, 10);

                $filteredPoliticsAndPower = array_merge($filteredSections['Політика'], $filteredSections['Влада']);

                usort($filteredPoliticsAndPower, function ($a, $b) {
                    return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
                });

                $filteredPoliticsAndPower = array_slice($filteredPoliticsAndPower, 0, 5);

                $filteredNorthAndSouthAmerica = array_merge($filteredSections['Південна Америка'], $filteredSections['Північна Америка']);

                usort($filteredNorthAndSouthAmerica, function ($a, $b) {
                    return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
                });

                $filteredNorthAndSouthAmerica = array_slice($filteredNorthAndSouthAmerica, 0, 5);

                foreach ($categories as $category => $count) {
                    foreach ($filteredCategories[$category] as $item) {
                        $combinedData[$category][] = $item;
                    }
                }

                foreach ($sections as $section => $count) {
                    foreach ($filteredSections[$section] as $item) {
                        $combinedData[$section][] = $item;
                    }
                }

                $combinedData['Економіка та Фінанси'] = $filteredEconomicAndFinance;
                $combinedData['Культура, музика та кіно'] = $filteredCultureMusicMovies;
                $combinedData['Політика та Влада'] = $filteredPoliticsAndPower;
                $combinedData['Північна та Південна Америка'] = $filteredNorthAndSouthAmerica;

                return view('city_home', ['data' => $combinedData, 'metaData' => $metaData, 'city' => $city]);
            } else {
                echo "Ошибка при декодировании JSON.";
            }
        } else {
            echo "Не удалось получить JSON-ответ";
        }

        curl_close($ch);
    }
    public function izmailLine()
    {
        $metaData = [
            'title' => 'Головні новини міста Ізмаїл, України та світу на сторінках DAYCOM',
            'description' => 'Головний сайт Ізмаїла, головні новини Ізмаїл, новини ТОП Ізмаїл, новини новини бізнесу Ізмаїл, стрічка новин Ізмаїл, Думки Ізмаїл, новини Ізмаїл сьогодні, останні новини сьогодні Ізмаїл,  Ізмаїлі,  Ізмаїл, інформаційна агенція Ізмаїл, інформація Ізмаїл',
            'site' => 'Головні новини міста Ізмаїл, України та світу на сторінках DAYCOM',
            'url' => 'https://daycom.com.ua/izmail',
            'keywords' => 'Головний сайт Ізмаїла, головні новини Ізмаїл, новини ТОП Ізмаїл, новини новини бізнесу Ізмаїл, стрічка новин Ізмаїл, Думки Ізмаїл, новини Ізмаїл сьогодні, останні новини сьогодні Ізмаїл,  Ізмаїлі,  Ізмаїл, інформаційна агенція Ізмаїл, інформація Ізмаїл',
        ];

        $city = [
            'name' => 'Ізмаїл',
            'name_link' => 'izmail',
            'main_link' => 'izmail.index',
            'news_line' => 'news.line',
            'news_link' => 'izmail.news',
        ];

        $url = 'https://sside.daycom.com.ua/api/izmail/with-nn';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);

        if ($response) {
            $data = json_decode($response, true);

            if ($data !== null) {
                $categories = [
                    'Головне сьогодні' => 10,
                    'ТОП новини від Дейком' => 12,
                    'Стрічка новин' => 46,
                ];

                $sections = [
                    'Війна Росії проти України' => 5,
                    'Суспільство' => 10,
                    'Європа' => 10,
                    'Китай' => 2,
                    'Сполучені Штати' => 3,
                    'Економіка' => 10,
                    'Фінанси' => 10,
                    'Технології' => 10,
                    'Наука' => 4,
                    'Культура' => 10,
                    'Музика' => 10,
                    'Кіно' => 10,
                    'Спорт' => 4,
                    'Політика' => 10,
                    'Влада' => 10,
                    'Північна Америка' => 10,
                    'Південна Америка' => 10,
                    'Близький схід' => 5,
                    'Тихоокеанський регіон' => 5,
                    'Африка' => 5,
                    'Думка' => 10,
                    'Аналітика' => 10,
                ];

                $filteredCategories = [];
                $filteredSections = [];
                $filteredEconomicAndFinance = [];
                $filteredCultureMusicMovies = [];
                $filteredPoliticsAndPower = [];
                $filteredNorthAndSouthAmerica = [];
                $combinedData = [];

                $currentDate = new \DateTime('now', new \DateTimeZone('Europe/Kiev'));
                $currentDate->modify('+2 hour');

                foreach ($categories as $category => $count) {
                    $filteredCategories[$category] = array_filter($data, function ($item) use ($category, $currentDate) {
                        $itemDate = new \DateTime($item['publishedAt']);
                        return $item['block'] === $category && $itemDate <= $currentDate;
                    });

                    $filteredCategories[$category] = array_slice($filteredCategories[$category], 0, $count);
                }

                foreach ($sections as $section => $count) {
                    $filteredSections[$section] = array_filter($data, function ($item) use ($section, $currentDate) {
                        $itemDate = new \DateTime($item['publishedAt']);
                        return $item['section'] === $section && $itemDate <= $currentDate;
                    });

                    $filteredSections[$section] = array_slice($filteredSections[$section], 0, $count);
                }

                $filteredEconomicAndFinance = array_merge($filteredSections['Економіка'], $filteredSections['Фінанси']);

                usort($filteredEconomicAndFinance, function ($a, $b) {
                    return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
                });

                $filteredEconomicAndFinance = array_slice($filteredEconomicAndFinance, 0, 2);

                $filteredCultureMusicMovies = array_merge($filteredSections['Культура'], $filteredSections['Музика'], $filteredSections['Кіно']);

                usort($filteredCultureMusicMovies, function ($a, $b) {
                    return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
                });

                $filteredCultureMusicMovies = array_slice($filteredCultureMusicMovies, 0, 10);

                $filteredPoliticsAndPower = array_merge($filteredSections['Політика'], $filteredSections['Влада']);

                usort($filteredPoliticsAndPower, function ($a, $b) {
                    return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
                });

                $filteredPoliticsAndPower = array_slice($filteredPoliticsAndPower, 0, 5);

                $filteredNorthAndSouthAmerica = array_merge($filteredSections['Південна Америка'], $filteredSections['Північна Америка']);

                usort($filteredNorthAndSouthAmerica, function ($a, $b) {
                    return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
                });

                $filteredNorthAndSouthAmerica = array_slice($filteredNorthAndSouthAmerica, 0, 5);

                foreach ($categories as $category => $count) {
                    foreach ($filteredCategories[$category] as $item) {
                        $combinedData[$category][] = $item;
                    }
                }

                foreach ($sections as $section => $count) {
                    foreach ($filteredSections[$section] as $item) {
                        $combinedData[$section][] = $item;
                    }
                }

                $combinedData['Економіка та Фінанси'] = $filteredEconomicAndFinance;
                $combinedData['Культура, музика та кіно'] = $filteredCultureMusicMovies;
                $combinedData['Політика та Влада'] = $filteredPoliticsAndPower;
                $combinedData['Північна та Південна Америка'] = $filteredNorthAndSouthAmerica;

                return view('city_home', ['data' => $combinedData, 'metaData' => $metaData, 'city' => $city]);
            } else {
                echo "Ошибка при декодировании JSON.";
            }
        } else {
            echo "Не удалось получить JSON-ответ";
        }

        curl_close($ch);
    }
    public function kiliyaLine()
    {
        $metaData = [
            'title' => 'Головні новини міста Кілія, України та світу на сторінках DAYCOM',
            'description' => 'Головний сайт Кілії, головні новини Кілія, новини ТОП Кілія, новини новини бізнесу Кілія, стрічка новин Кілія, Думки Кілія, новини Кілія сьогодні, останні новини сьогодні Кілія, інформаційна агенція Кілія, інформація Кілія',
            'site' => 'Головні новини міста Кілія, України та світу на сторінках DAYCOM',
            'url' => 'https://daycom.com.ua/kiliya',
            'keywords' => 'Головний сайт Кілії, головні новини Кілія, новини ТОП Кілія, новини новини бізнесу Кілія, стрічка новин Кілія, Думки Кілія, новини Кілія сьогодні, останні новини сьогодні Кілія, інформаційна агенція Кілія, інформація Кілія',
        ];

        $city = [
            'name' => 'Кілія',
            'name_link' => 'kiliya',
            'main_link' => 'kiliya.index',
            'news_line' => 'news.line',
            'news_link' => 'kiliya.news',
        ];

        $url = 'https://sside.daycom.com.ua/api/kiliya/with-nn';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);

        if ($response) {
            $data = json_decode($response, true);

            if ($data !== null) {
                $categories = [
                    'Головне сьогодні' => 10,
                    'ТОП новини від Дейком' => 12,
                    'Стрічка новин' => 46,
                ];

                $sections = [
                    'Війна Росії проти України' => 5,
                    'Суспільство' => 10,
                    'Європа' => 10,
                    'Китай' => 2,
                    'Сполучені Штати' => 3,
                    'Економіка' => 10,
                    'Фінанси' => 10,
                    'Технології' => 10,
                    'Наука' => 4,
                    'Культура' => 10,
                    'Музика' => 10,
                    'Кіно' => 10,
                    'Спорт' => 4,
                    'Політика' => 10,
                    'Влада' => 10,
                    'Північна Америка' => 10,
                    'Південна Америка' => 10,
                    'Близький схід' => 5,
                    'Тихоокеанський регіон' => 5,
                    'Африка' => 5,
                    'Думка' => 10,
                    'Аналітика' => 10,
                ];

                $filteredCategories = [];
                $filteredSections = [];
                $filteredEconomicAndFinance = [];
                $filteredCultureMusicMovies = [];
                $filteredPoliticsAndPower = [];
                $filteredNorthAndSouthAmerica = [];
                $combinedData = [];

                $currentDate = new \DateTime('now', new \DateTimeZone('Europe/Kiev'));
                $currentDate->modify('+2 hour');

                foreach ($categories as $category => $count) {
                    $filteredCategories[$category] = array_filter($data, function ($item) use ($category, $currentDate) {
                        $itemDate = new \DateTime($item['publishedAt']);
                        return $item['block'] === $category && $itemDate <= $currentDate;
                    });

                    $filteredCategories[$category] = array_slice($filteredCategories[$category], 0, $count);
                }

                foreach ($sections as $section => $count) {
                    $filteredSections[$section] = array_filter($data, function ($item) use ($section, $currentDate) {
                        $itemDate = new \DateTime($item['publishedAt']);
                        return $item['section'] === $section && $itemDate <= $currentDate;
                    });

                    $filteredSections[$section] = array_slice($filteredSections[$section], 0, $count);
                }

                $filteredEconomicAndFinance = array_merge($filteredSections['Економіка'], $filteredSections['Фінанси']);

                usort($filteredEconomicAndFinance, function ($a, $b) {
                    return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
                });

                $filteredEconomicAndFinance = array_slice($filteredEconomicAndFinance, 0, 2);

                $filteredCultureMusicMovies = array_merge($filteredSections['Культура'], $filteredSections['Музика'], $filteredSections['Кіно']);

                usort($filteredCultureMusicMovies, function ($a, $b) {
                    return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
                });

                $filteredCultureMusicMovies = array_slice($filteredCultureMusicMovies, 0, 10);

                $filteredPoliticsAndPower = array_merge($filteredSections['Політика'], $filteredSections['Влада']);

                usort($filteredPoliticsAndPower, function ($a, $b) {
                    return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
                });

                $filteredPoliticsAndPower = array_slice($filteredPoliticsAndPower, 0, 5);

                $filteredNorthAndSouthAmerica = array_merge($filteredSections['Південна Америка'], $filteredSections['Північна Америка']);

                usort($filteredNorthAndSouthAmerica, function ($a, $b) {
                    return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
                });

                $filteredNorthAndSouthAmerica = array_slice($filteredNorthAndSouthAmerica, 0, 5);

                foreach ($categories as $category => $count) {
                    foreach ($filteredCategories[$category] as $item) {
                        $combinedData[$category][] = $item;
                    }
                }

                foreach ($sections as $section => $count) {
                    foreach ($filteredSections[$section] as $item) {
                        $combinedData[$section][] = $item;
                    }
                }

                $combinedData['Економіка та Фінанси'] = $filteredEconomicAndFinance;
                $combinedData['Культура, музика та кіно'] = $filteredCultureMusicMovies;
                $combinedData['Політика та Влада'] = $filteredPoliticsAndPower;
                $combinedData['Північна та Південна Америка'] = $filteredNorthAndSouthAmerica;

                return view('city_home', ['data' => $combinedData, 'metaData' => $metaData, 'city' => $city]);
            } else {
                echo "Ошибка при декодировании JSON.";
            }
        } else {
            echo "Не удалось получить JSON-ответ";
        }

        curl_close($ch);
    }
    public function odesaLine()
    {
        $metaData = [
            'title' => 'Головні новини міста Одеса, України та світу на сторінках DAYCOM',
            'description' => 'Головний сайт Одеси, головні новини Одеса, новини ТОП Одеса, новини новини бізнесу Одеса, стрічка новин Одеса, Думки Одеса, новини Одеса сьогодні, останні новини сьогодні Одеса, інформаційна агенція Одеса, інформація Одеса',
            'site' => 'Головні новини міста Одеса, України та світу на сторінках DAYCOM',
            'url' => 'https://daycom.com.ua/odesa',
            'keywords' => 'Головний сайт Одеси, головні новини Одеса, новини ТОП Одеса, новини новини бізнесу Одеса, стрічка новин Одеса, Думки Одеса, новини Одеса сьогодні, останні новини сьогодні Одеса, інформаційна агенція Одеса, інформація Одеса',
        ];

        $city = [
            'name' => 'Одеса',
            'name_link' => 'odesa',
            'main_link' => 'odesa.index',
            'news_line' => 'news.line',
            'news_link' => 'odesa.news',
        ];

        $url = 'https://sside.daycom.com.ua/api/odesa/with-nn';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);

        if ($response) {
            $data = json_decode($response, true);

            if ($data !== null) {
                $categories = [
                    'Головне сьогодні' => 10,
                    'ТОП новини від Дейком' => 12,
                    'Стрічка новин' => 46,
                ];

                $sections = [
                    'Війна Росії проти України' => 5,
                    'Суспільство' => 10,
                    'Європа' => 10,
                    'Китай' => 2,
                    'Сполучені Штати' => 3,
                    'Економіка' => 10,
                    'Фінанси' => 10,
                    'Технології' => 10,
                    'Наука' => 4,
                    'Культура' => 10,
                    'Музика' => 10,
                    'Кіно' => 10,
                    'Спорт' => 4,
                    'Політика' => 10,
                    'Влада' => 10,
                    'Північна Америка' => 10,
                    'Південна Америка' => 10,
                    'Близький схід' => 5,
                    'Тихоокеанський регіон' => 5,
                    'Африка' => 5,
                    'Думка' => 10,
                    'Аналітика' => 10,
                ];

                $filteredCategories = [];
                $filteredSections = [];
                $filteredEconomicAndFinance = [];
                $filteredCultureMusicMovies = [];
                $filteredPoliticsAndPower = [];
                $filteredNorthAndSouthAmerica = [];
                $combinedData = [];

                $currentDate = new \DateTime('now', new \DateTimeZone('Europe/Kiev'));
                $currentDate->modify('+2 hour');

                foreach ($categories as $category => $count) {
                    $filteredCategories[$category] = array_filter($data, function ($item) use ($category, $currentDate) {
                        $itemDate = new \DateTime($item['publishedAt']);
                        return $item['block'] === $category && $itemDate <= $currentDate;
                    });

                    $filteredCategories[$category] = array_slice($filteredCategories[$category], 0, $count);
                }

                foreach ($sections as $section => $count) {
                    $filteredSections[$section] = array_filter($data, function ($item) use ($section, $currentDate) {
                        $itemDate = new \DateTime($item['publishedAt']);
                        return $item['section'] === $section && $itemDate <= $currentDate;
                    });

                    $filteredSections[$section] = array_slice($filteredSections[$section], 0, $count);
                }

                $filteredEconomicAndFinance = array_merge($filteredSections['Економіка'], $filteredSections['Фінанси']);

                usort($filteredEconomicAndFinance, function ($a, $b) {
                    return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
                });

                $filteredEconomicAndFinance = array_slice($filteredEconomicAndFinance, 0, 2);

                $filteredCultureMusicMovies = array_merge($filteredSections['Культура'], $filteredSections['Музика'], $filteredSections['Кіно']);

                usort($filteredCultureMusicMovies, function ($a, $b) {
                    return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
                });

                $filteredCultureMusicMovies = array_slice($filteredCultureMusicMovies, 0, 10);

                $filteredPoliticsAndPower = array_merge($filteredSections['Політика'], $filteredSections['Влада']);

                usort($filteredPoliticsAndPower, function ($a, $b) {
                    return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
                });

                $filteredPoliticsAndPower = array_slice($filteredPoliticsAndPower, 0, 5);

                $filteredNorthAndSouthAmerica = array_merge($filteredSections['Південна Америка'], $filteredSections['Північна Америка']);

                usort($filteredNorthAndSouthAmerica, function ($a, $b) {
                    return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
                });

                $filteredNorthAndSouthAmerica = array_slice($filteredNorthAndSouthAmerica, 0, 5);

                foreach ($categories as $category => $count) {
                    foreach ($filteredCategories[$category] as $item) {
                        $combinedData[$category][] = $item;
                    }
                }

                foreach ($sections as $section => $count) {
                    foreach ($filteredSections[$section] as $item) {
                        $combinedData[$section][] = $item;
                    }
                }

                $combinedData['Економіка та Фінанси'] = $filteredEconomicAndFinance;
                $combinedData['Культура, музика та кіно'] = $filteredCultureMusicMovies;
                $combinedData['Політика та Влада'] = $filteredPoliticsAndPower;
                $combinedData['Північна та Південна Америка'] = $filteredNorthAndSouthAmerica;

                return view('city_home', ['data' => $combinedData, 'metaData' => $metaData, 'city' => $city]);
            } else {
                echo "Ошибка при декодировании JSON.";
            }
        } else {
            echo "Не удалось получить JSON-ответ";
        }

        curl_close($ch);
    }
    public function podilskLine()
    {
        $metaData = [
            'title' => 'Головні новини міста Подільськ, України та світу на сторінках DAYCOM',
            'description' => 'Головний сайт Подільська, головні новини Подільськ, новини ТОП Подільськ, новини новини бізнесу Подільськ, стрічка новин Подільськ, Думки Подільськ, новини Подільськ сьогодні, останні новини сьогодні Подільськ, інформаційна агенція Подільськ, інформація Подільськ',
            'site' => 'Головні новини міста Подільськ, України та світу на сторінках DAYCOM',
            'url' => 'https://daycom.com.ua/podilsk',
            'keywords' => 'Головний сайт Подільська, головні новини Подільськ, новини ТОП Подільськ, новини новини бізнесу Подільськ, стрічка новин Подільськ, Думки Подільськ, новини Подільськ сьогодні, останні новини сьогодні Подільськ, інформаційна агенція Подільськ, інформація Подільськ',
            'line_title' => 'Стрічка новин',
            'line_description' => 'Головні новини міста Подільськ в прямому ефірі, розслідування, думки, фотографії та відео журналістів з багатьох країн світу. Ми висвітлюємо українські та міжнародні новини, серед яких: політика, бізнес, технології, наука, здоров\'я, мистецтво, спорт, та інші події з багатьої куточків світу.'
        ];

        $city = [
            'name' => 'Подільськ',
            'name_link' => 'podilsk',
            'main_link' => 'podilsk.index',
            'news_line' => 'podilsk.line',
            'news_link' => 'podilsk.news',

        ];

        $url = 'https://sside.daycom.com.ua/api/podilsk/news';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);

        if ($response) {
            $data = json_decode($response, true);

            if ($data !== null) {

                // dd($data);

                return view('city_active_line_news', ['data' => $data, 'metaData' => $metaData, 'city' => $city]);
            } else {
                echo "Ошибка при декодировании JSON.";
            }
        } else {
            echo "Не удалось получить JSON-ответ";
        }

        curl_close($ch);
    }
    public function teplodarLine()
    {
        $metaData = [
            'title' => 'Головні новини міста Подільськ, України та світу на сторінках DAYCOM',
            'description' => 'Головний сайт Подільська, головні новини Подільськ, новини ТОП Подільськ, новини новини бізнесу Подільськ, стрічка новин Подільськ, Думки Подільськ, новини Подільськ сьогодні, останні новини сьогодні Подільськ, інформаційна агенція Подільськ, інформація Подільськ',
            'site' => 'Головні новини міста Подільськ, України та світу на сторінках DAYCOM',
            'url' => 'https://daycom.com.ua/teplodar',
            'keywords' => 'Головний сайт Подільська, головні новини Подільськ, новини ТОП Подільськ, новини новини бізнесу Подільськ, стрічка новин Подільськ, Думки Подільськ, новини Подільськ сьогодні, останні новини сьогодні Подільськ, інформаційна агенція Подільськ, інформація Подільськ',
            'line_title' => 'Стрічка новин',
            'line_description' => 'Головні новини міста Теплодар в прямому ефірі, розслідування, думки, фотографії та відео журналістів з багатьох країн світу. Ми висвітлюємо українські та міжнародні новини, серед яких: політика, бізнес, технології, наука, здоров\'я, мистецтво, спорт, та інші події з багатьої куточків світу.'
        ];

        $city = [
            'name' => 'Теплодар',
            'name_link' => 'teplodar',
            'main_link' => 'teplodar.index',
            'news_line' => 'teplodar.line',
            'news_link' => 'teplodar.news',

        ];

        $url = 'https://sside.daycom.com.ua/api/teplodar/news';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);

        if ($response) {
            $data = json_decode($response, true);

            if ($data !== null) {

                // dd($data);

                return view('city_active_line_news', ['data' => $data, 'metaData' => $metaData, 'city' => $city]);
            } else {
                echo "Ошибка при декодировании JSON.";
            }
        } else {
            echo "Не удалось получить JSON-ответ";
        }

        curl_close($ch);
    }
    public function youzhneLine()
    {
        $metaData = [
            'title' => 'Головні новини міста Южне, України та світу на сторінках DAYCOM',
            'description' => 'Головний сайт Южне, головні новини Южне, новини ТОП Южне, новини новини бізнесу Южне, стрічка новин Южне, Думки Южне, новини Южне сьогодні, останні новини сьогодні Южне, інформаційна агенція Южне, інформація Южне',
            'site' => 'Головні новини міста Южне, України та світу на сторінках DAYCOM',
            'url' => 'https://daycom.com.ua/youzhne',
            'keywords' => 'Головний сайт Южне, головні новини Южне, новини ТОП Южне, новини новини бізнесу Южне, стрічка новин Южне, Думки Южне, новини Южне сьогодні, останні новини сьогодні Южне, інформаційна агенція Южне, інформація Южне',
        ];
        $city = [
            'name' => 'Южне',
            'name_link' => 'youzhne',
            'main_link' => 'youzhne.index',
            'news_line' => 'news.line',
            'news_link' => 'youzhne.news',
        ];

        $url = 'https://sside.daycom.com.ua/api/youzhne/with-nn';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);

        if ($response) {
            $data = json_decode($response, true);

            if ($data !== null) {
                $categories = [
                    'Головне сьогодні' => 10,
                    'ТОП новини від Дейком' => 12,
                    'Стрічка новин' => 46,
                ];

                $sections = [
                    'Війна Росії проти України' => 5,
                    'Суспільство' => 10,
                    'Європа' => 10,
                    'Китай' => 2,
                    'Сполучені Штати' => 3,
                    'Економіка' => 10,
                    'Фінанси' => 10,
                    'Технології' => 10,
                    'Наука' => 4,
                    'Культура' => 10,
                    'Музика' => 10,
                    'Кіно' => 10,
                    'Спорт' => 4,
                    'Політика' => 10,
                    'Влада' => 10,
                    'Північна Америка' => 10,
                    'Південна Америка' => 10,
                    'Близький схід' => 5,
                    'Тихоокеанський регіон' => 5,
                    'Африка' => 5,
                    'Думка' => 10,
                    'Аналітика' => 10,
                ];

                $filteredCategories = [];
                $filteredSections = [];
                $filteredEconomicAndFinance = [];
                $filteredCultureMusicMovies = [];
                $filteredPoliticsAndPower = [];
                $filteredNorthAndSouthAmerica = [];
                $combinedData = [];

                $currentDate = new \DateTime('now', new \DateTimeZone('Europe/Kiev'));
                $currentDate->modify('+2 hour');

                foreach ($categories as $category => $count) {
                    $filteredCategories[$category] = array_filter($data, function ($item) use ($category, $currentDate) {
                        $itemDate = new \DateTime($item['publishedAt']);
                        return $item['block'] === $category && $itemDate <= $currentDate;
                    });

                    $filteredCategories[$category] = array_slice($filteredCategories[$category], 0, $count);
                }

                foreach ($sections as $section => $count) {
                    $filteredSections[$section] = array_filter($data, function ($item) use ($section, $currentDate) {
                        $itemDate = new \DateTime($item['publishedAt']);
                        return $item['section'] === $section && $itemDate <= $currentDate;
                    });

                    $filteredSections[$section] = array_slice($filteredSections[$section], 0, $count);
                }

                $filteredEconomicAndFinance = array_merge($filteredSections['Економіка'], $filteredSections['Фінанси']);

                usort($filteredEconomicAndFinance, function ($a, $b) {
                    return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
                });

                $filteredEconomicAndFinance = array_slice($filteredEconomicAndFinance, 0, 2);

                $filteredCultureMusicMovies = array_merge($filteredSections['Культура'], $filteredSections['Музика'], $filteredSections['Кіно']);

                usort($filteredCultureMusicMovies, function ($a, $b) {
                    return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
                });

                $filteredCultureMusicMovies = array_slice($filteredCultureMusicMovies, 0, 10);

                $filteredPoliticsAndPower = array_merge($filteredSections['Політика'], $filteredSections['Влада']);

                usort($filteredPoliticsAndPower, function ($a, $b) {
                    return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
                });

                $filteredPoliticsAndPower = array_slice($filteredPoliticsAndPower, 0, 5);

                $filteredNorthAndSouthAmerica = array_merge($filteredSections['Південна Америка'], $filteredSections['Північна Америка']);

                usort($filteredNorthAndSouthAmerica, function ($a, $b) {
                    return strtotime($b['publishedAt']) - strtotime($a['publishedAt']);
                });

                $filteredNorthAndSouthAmerica = array_slice($filteredNorthAndSouthAmerica, 0, 5);

                foreach ($categories as $category => $count) {
                    foreach ($filteredCategories[$category] as $item) {
                        $combinedData[$category][] = $item;
                    }
                }

                foreach ($sections as $section => $count) {
                    foreach ($filteredSections[$section] as $item) {
                        $combinedData[$section][] = $item;
                    }
                }

                $combinedData['Економіка та Фінанси'] = $filteredEconomicAndFinance;
                $combinedData['Культура, музика та кіно'] = $filteredCultureMusicMovies;
                $combinedData['Політика та Влада'] = $filteredPoliticsAndPower;
                $combinedData['Північна та Південна Америка'] = $filteredNorthAndSouthAmerica;

                return view('city_home', ['data' => $combinedData, 'metaData' => $metaData, 'city' => $city]);
            } else {
                echo "Ошибка при декодировании JSON.";
            }
        } else {
            echo "Не удалось получить JSON-ответ";
        }

        curl_close($ch);
    }

    public function bilgorodDnistrovskyNews($url)
    {
        $metaData = [
            'title' => 'Головні новини міста Білгород-Дністровський, України та світу на сторінках DAYCOM',
            'description' => 'Головний сайт Білгород-Дністровського, головні новини Білгород-Дністровський, новини ТОП Білгород-Дністровський, новини новини бізнесу Білгород-Дністровський, стрічка новин Білгород-Дністровський, Думки Білгород-Дністровський, новини Білгород-Дністровський сьогодні, останні новини сьогодні Білгород-Дністровський, інформаційна агенція Білгород-Дністровський, інформація Білгород-Дністровський',
            'site' => 'Головні новини міста Білгород-Дністровський, України та світу на сторінках DAYCOM',
            'url' => 'https://daycom.com.ua/bilgorod-dnistrovsky',
            'keywords' => 'Головний сайт Білгород-Дністровського, головні новини Білгород-Дністровський, новини ТОП Білгород-Дністровський, новини новини бізнесу Білгород-Дністровський, стрічка новин Білгород-Дністровський, Думки Білгород-Дністровський, новини Білгород-Дністровський сьогодні, останні новини сьогодні Білгород-Дністровський, інформаційна агенція Білгород-Дністровський, інформація Білгород-Дністровський',
        ];

        $city = [
            'name' => 'Білгород-Дністровський',
            'name_link' => 'bilgorod',
            'main_link' => 'bilgorod.index',
            'news_line' => 'news.line',
            'news_link' => 'bilgorod.news',
            // 'news_today' => 'news',
        ];

        $rUrl = 'https://sside.daycom.com.ua/api/bilgorod-dnistrovsky/news/' . $url;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $rUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);

        if ($response) {

            $data = json_decode($response, true);

            if ($data !== null) {
                $userId = $data['UserId'];
                $userUrl = 'https://sside.daycom.com.ua/api/users/' . $userId;
                $userCh = curl_init();
                curl_setopt($userCh, CURLOPT_URL, $userUrl);
                curl_setopt($userCh, CURLOPT_RETURNTRANSFER, 1);
                $userResponse = curl_exec($userCh);

                if ($userResponse) {
                    $userData = json_decode($userResponse, true);
                    if ($userData !== null) {
                        return view('news_city', ['data' => $data, 'userData' => $userData, 'city' => $city]);
                    } else {
                        echo "Помилка при декодуванні JSON.";
                    }
                } else {
                    echo "Не вдалося отримати JSON про користувача.";
                }
            } else {
                echo "Ошибка при декодировании JSON.";
            }
        } else {
            echo "Не удалось получить JSON-ответ";
        }

        curl_close($ch);
        curl_close($userCh);
    }
    public function chornomorskNews($url)
    {
        $metaData = [
            'title' => 'Головні новини міста Чорноморськ, України та світу на сторінках DAYCOM',
            'description' => 'Головний сайт Чорноморська, головні новини Чорноморськ, новини ТОП Чорноморськ, новини новини бізнесу Чорноморськ, стрічка новин Чорноморськ, Думки Чорноморськ, новини Чорноморськ сьогодні, останні новини сьогодні Чорноморськ, інформаційна агенція Чорноморськ, інформація Чорноморськ',
            'site' => 'Головні новини міста Чорноморськ, України та світу на сторінках DAYCOM',
            'url' => 'https://daycom.com.ua/сhornomorsk',
            'keywords' => 'Головний сайт Чорноморська, головні новини Чорноморськ, новини ТОП Чорноморськ, новини новини бізнесу Чорноморськ, стрічка новин Чорноморськ, Думки Чорноморськ, новини Чорноморськ сьогодні, останні новини сьогодні Чорноморськ, інформаційна агенція Чорноморськ, інформація Чорноморськ',
        ];


        $city = [
            'name' => 'Чорноморськ',
            'name_link' => 'chornomorsk',
            'main_link' => 'chornomorsk.index',
            'news_line' => 'news.line',
            'news_link' => 'chornomorsk.news',
        ];

        $rUrl = 'https://sside.daycom.com.ua/api/chornomorsk/news/' . $url;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $rUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);

        if ($response) {

            $data = json_decode($response, true);

            if ($data !== null) {
                $userId = $data['UserId'];
                $userUrl = 'https://sside.daycom.com.ua/api/users/' . $userId;
                $userCh = curl_init();
                curl_setopt($userCh, CURLOPT_URL, $userUrl);
                curl_setopt($userCh, CURLOPT_RETURNTRANSFER, 1);
                $userResponse = curl_exec($userCh);

                if ($userResponse) {
                    $userData = json_decode($userResponse, true);
                    if ($userData !== null) {
                        return view('news_city', ['data' => $data, 'userData' => $userData, 'city' => $city]);
                    } else {
                        echo "Помилка при декодуванні JSON.";
                    }
                } else {
                    echo "Не вдалося отримати JSON про користувача.";
                }
            } else {
                echo "Ошибка при декодировании JSON.";
            }
        } else {
            echo "Не удалось получить JSON-ответ";
        }

        curl_close($ch);
        curl_close($userCh);
    }
    public function izmailNews($url)
    {
        $metaData = [
            'title' => 'Головні новини міста Ізмаїл, України та світу на сторінках DAYCOM',
            'description' => 'Головний сайт Ізмаїла, головні новини Ізмаїл, новини ТОП Ізмаїл, новини новини бізнесу Ізмаїл, стрічка новин Ізмаїл, Думки Ізмаїл, новини Ізмаїл сьогодні, останні новини сьогодні Ізмаїл,  Ізмаїлі,  Ізмаїл, інформаційна агенція Ізмаїл, інформація Ізмаїл',
            'site' => 'Головні новини міста Ізмаїл, України та світу на сторінках DAYCOM',
            'url' => 'https://daycom.com.ua/izmail',
            'keywords' => 'Головний сайт Ізмаїла, головні новини Ізмаїл, новини ТОП Ізмаїл, новини новини бізнесу Ізмаїл, стрічка новин Ізмаїл, Думки Ізмаїл, новини Ізмаїл сьогодні, останні новини сьогодні Ізмаїл,  Ізмаїлі,  Ізмаїл, інформаційна агенція Ізмаїл, інформація Ізмаїл',
        ];

        $city = [
            'name' => 'Ізмаїл',
            'name_link' => 'izmail',
            'main_link' => 'izmail.index',
            'news_line' => 'news.line',
            'news_link' => 'izmail.news',
        ];

        $rUrl = 'https://sside.daycom.com.ua/api/izmail/news/' . $url;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $rUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);

        if ($response) {

            $data = json_decode($response, true);

            if ($data !== null) {
                $userId = $data['UserId'];
                $userUrl = 'https://sside.daycom.com.ua/api/users/' . $userId;
                $userCh = curl_init();
                curl_setopt($userCh, CURLOPT_URL, $userUrl);
                curl_setopt($userCh, CURLOPT_RETURNTRANSFER, 1);
                $userResponse = curl_exec($userCh);

                if ($userResponse) {
                    $userData = json_decode($userResponse, true);
                    if ($userData !== null) {
                        return view('news_city', ['data' => $data, 'userData' => $userData, 'city' => $city]);
                    } else {
                        echo "Помилка при декодуванні JSON.";
                    }
                } else {
                    echo "Не вдалося отримати JSON про користувача.";
                }
            } else {
                echo "Ошибка при декодировании JSON.";
            }
        } else {
            echo "Не удалось получить JSON-ответ";
        }

        curl_close($ch);
        curl_close($userCh);
    }
    public function kiliyaNews($url)
    {
        $metaData = [
            'title' => 'Головні новини міста Кілія, України та світу на сторінках DAYCOM',
            'description' => 'Головний сайт Кілії, головні новини Кілія, новини ТОП Кілія, новини новини бізнесу Кілія, стрічка новин Кілія, Думки Кілія, новини Кілія сьогодні, останні новини сьогодні Кілія, інформаційна агенція Кілія, інформація Кілія',
            'site' => 'Головні новини міста Кілія, України та світу на сторінках DAYCOM',
            'url' => 'https://daycom.com.ua/kiliya',
            'keywords' => 'Головний сайт Кілії, головні новини Кілія, новини ТОП Кілія, новини новини бізнесу Кілія, стрічка новин Кілія, Думки Кілія, новини Кілія сьогодні, останні новини сьогодні Кілія, інформаційна агенція Кілія, інформація Кілія',
        ];

        $city = [
            'name' => 'Кілія',
            'name_link' => 'kiliya',
            'main_link' => 'kiliya.index',
            'news_line' => 'news.line',
            'news_link' => 'kiliya.news',
        ];

        $rUrl = 'https://sside.daycom.com.ua/api/kiliya/news/' . $url;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $rUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);

        if ($response) {

            $data = json_decode($response, true);

            if ($data !== null) {
                $userId = $data['UserId'];
                $userUrl = 'https://sside.daycom.com.ua/api/users/' . $userId;
                $userCh = curl_init();
                curl_setopt($userCh, CURLOPT_URL, $userUrl);
                curl_setopt($userCh, CURLOPT_RETURNTRANSFER, 1);
                $userResponse = curl_exec($userCh);

                if ($userResponse) {
                    $userData = json_decode($userResponse, true);
                    if ($userData !== null) {
                        return view('news_city', ['data' => $data, 'userData' => $userData, 'city' => $city]);
                    } else {
                        echo "Помилка при декодуванні JSON.";
                    }
                } else {
                    echo "Не вдалося отримати JSON про користувача.";
                }
            } else {
                echo "Ошибка при декодировании JSON.";
            }
        } else {
            echo "Не удалось получить JSON-ответ";
        }

        curl_close($ch);
        curl_close($userCh);
    }
    public function odesaNews($url)
    {
        $metaData = [
            'title' => 'Головні новини міста Одеса, України та світу на сторінках DAYCOM',
            'description' => 'Головний сайт Одеси, головні новини Одеса, новини ТОП Одеса, новини новини бізнесу Одеса, стрічка новин Одеса, Думки Одеса, новини Одеса сьогодні, останні новини сьогодні Одеса, інформаційна агенція Одеса, інформація Одеса',
            'site' => 'Головні новини міста Одеса, України та світу на сторінках DAYCOM',
            'url' => 'https://daycom.com.ua/odesa',
            'keywords' => 'Головний сайт Одеси, головні новини Одеса, новини ТОП Одеса, новини новини бізнесу Одеса, стрічка новин Одеса, Думки Одеса, новини Одеса сьогодні, останні новини сьогодні Одеса, інформаційна агенція Одеса, інформація Одеса',
        ];

        $city = [
            'name' => 'Одеса',
            'name_link' => 'odesa',
            'main_link' => 'odesa.index',
            'news_line' => 'news.line',
            'news_link' => 'odesa.news',
        ];

        $rUrl = 'https://sside.daycom.com.ua/api/odesa/news/' . $url;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $rUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);

        if ($response) {

            $data = json_decode($response, true);

            if ($data !== null) {
                $userId = $data['UserId'];
                $userUrl = 'https://sside.daycom.com.ua/api/users/' . $userId;
                $userCh = curl_init();
                curl_setopt($userCh, CURLOPT_URL, $userUrl);
                curl_setopt($userCh, CURLOPT_RETURNTRANSFER, 1);
                $userResponse = curl_exec($userCh);

                if ($userResponse) {
                    $userData = json_decode($userResponse, true);
                    if ($userData !== null) {
                        return view('news_city', ['data' => $data, 'userData' => $userData, 'city' => $city]);
                    } else {
                        echo "Помилка при декодуванні JSON.";
                    }
                } else {
                    echo "Не вдалося отримати JSON про користувача.";
                }
            } else {
                echo "Ошибка при декодировании JSON.";
            }
        } else {
            echo "Не удалось получить JSON-ответ";
        }

        curl_close($ch);
        curl_close($userCh);
    }
    public function podilskNews($url)
    {
        $metaData = [
            'title' => 'Головні новини міста Подільськ, України та світу на сторінках DAYCOM',
            'description' => 'Головний сайт Подільська, головні новини Подільськ, новини ТОП Подільськ, новини новини бізнесу Подільськ, стрічка новин Подільськ, Думки Подільськ, новини Подільськ сьогодні, останні новини сьогодні Подільськ, інформаційна агенція Подільськ, інформація Подільськ',
            'site' => 'Головні новини міста Подільськ, України та світу на сторінках DAYCOM',
            'url' => 'https://daycom.com.ua/podilsk',
            'keywords' => 'Головний сайт Подільська, головні новини Подільськ, новини ТОП Подільськ, новини новини бізнесу Подільськ, стрічка новин Подільськ, Думки Подільськ, новини Подільськ сьогодні, останні новини сьогодні Подільськ, інформаційна агенція Подільськ, інформація Подільськ',
        ];

        $city = [
            'name' => 'Подільськ',
            'name_link' => 'podilsk',
            'main_link' => 'podilsk.index',
            'news_line' => 'podilsk.line',
            'news_link' => 'podilsk.news',

        ];

        $rUrl = 'https://sside.daycom.com.ua/api/podilsk/news/' . $url;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $rUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);

        if ($response) {

            $data = json_decode($response, true);

            if ($data !== null) {
                $userId = $data['UserId'];
                $userUrl = 'https://sside.daycom.com.ua/api/users/' . $userId;
                $userCh = curl_init();
                curl_setopt($userCh, CURLOPT_URL, $userUrl);
                curl_setopt($userCh, CURLOPT_RETURNTRANSFER, 1);
                $userResponse = curl_exec($userCh);

                if ($userResponse) {
                    $userData = json_decode($userResponse, true);
                    if ($userData !== null) {
                        return view('news_city', ['data' => $data, 'userData' => $userData, 'city' => $city]);
                    } else {
                        echo "Помилка при декодуванні JSON.";
                    }
                } else {
                    echo "Не вдалося отримати JSON про користувача.";
                }
            } else {
                echo "Ошибка при декодировании JSON.";
            }
        } else {
            echo "Не удалось получить JSON-ответ";
        }

        curl_close($ch);
        curl_close($userCh);
    }
    public function teplodarNews($url)
    {
        $metaData = [
            'title' => 'Головні ноивини міста Теплодар на сторінках газети Дейком',
            'description' => 'Головний сайт Теплодара, головні новини Теплодар, новини ТОП Теплодар, новини новини бізнесу Теплодар, стрічка новин Теплодар, новини Теплодар сьогодні, останні новини сьогодні Теплодар',
            'site' => 'Головні ноивини міста Теплодар на сторінках газети Дейком',
            'url' => 'https://daycom.com.ua/teplodar',
            'keywords' => 'Головний сайт Теплодара, головні новини Теплодар, новини ТОП Теплодар, новини новини бізнесу Теплодар, стрічка новин Теплодар, новини Теплодар сьогодні, останні новини сьогодні Теплодар',
        ];

        $city = [
            'name' => 'Теплодар',
            'name_link' => 'teplodar',
            'main_link' => 'teplodar.index',
            'news_line' => 'teplodar.line',
            'news_link' => 'teplodar.news',

        ];

        $rUrl = 'https://sside.daycom.com.ua/api/teplodar/news/' . $url;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $rUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);

        if ($response) {

            $data = json_decode($response, true);

            if ($data !== null) {
                $userId = $data['UserId'];
                $userUrl = 'https://sside.daycom.com.ua/api/users/' . $userId;
                $userCh = curl_init();
                curl_setopt($userCh, CURLOPT_URL, $userUrl);
                curl_setopt($userCh, CURLOPT_RETURNTRANSFER, 1);
                $userResponse = curl_exec($userCh);

                if ($userResponse) {
                    $userData = json_decode($userResponse, true);
                    if ($userData !== null) {
                        return view('news_city', ['data' => $data, 'userData' => $userData, 'city' => $city]);
                    } else {
                        echo "Помилка при декодуванні JSON.";
                    }
                } else {
                    echo "Не вдалося отримати JSON про користувача.";
                }
            } else {
                echo "Ошибка при декодировании JSON.";
            }
        } else {
            echo "Не удалось получить JSON-ответ";
        }

        curl_close($ch);
        curl_close($userCh);
    }
    public function youzhneNews($url)
    {
        $metaData = [
            'title' => 'Головні новини міста Южне, України та світу на сторінках DAYCOM',
            'description' => 'Головний сайт Южне, головні новини Южне, новини ТОП Южне, новини новини бізнесу Южне, стрічка новин Южне, Думки Южне, новини Южне сьогодні, останні новини сьогодні Южне, інформаційна агенція Южне, інформація Южне',
            'site' => 'Головні новини міста Южне, України та світу на сторінках DAYCOM',
            'url' => 'https://daycom.com.ua/youzhne',
            'keywords' => 'Головний сайт Южне, головні новини Южне, новини ТОП Южне, новини новини бізнесу Южне, стрічка новин Южне, Думки Южне, новини Южне сьогодні, останні новини сьогодні Южне, інформаційна агенція Южне, інформація Южне',
        ];
        $city = [
            'name' => 'Южне',
            'name_link' => 'youzhne',
            'main_link' => 'youzhne.index',
            'news_line' => 'news.line',
            'news_link' => 'youzhne.news',
        ];

        $rUrl = 'https://sside.daycom.com.ua/api/youzhne/news/' . $url;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $rUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);

        if ($response) {

            $data = json_decode($response, true);

            if ($data !== null) {
                $userId = $data['UserId'];
                $userUrl = 'https://sside.daycom.com.ua/api/users/' . $userId;
                $userCh = curl_init();
                curl_setopt($userCh, CURLOPT_URL, $userUrl);
                curl_setopt($userCh, CURLOPT_RETURNTRANSFER, 1);
                $userResponse = curl_exec($userCh);

                if ($userResponse) {
                    $userData = json_decode($userResponse, true);
                    if ($userData !== null) {
                        return view('news_city', ['data' => $data, 'userData' => $userData, 'city' => $city]);
                    } else {
                        echo "Помилка при декодуванні JSON.";
                    }
                } else {
                    echo "Не вдалося отримати JSON про користувача.";
                }
            } else {
                echo "Ошибка при декодировании JSON.";
            }
        } else {
            echo "Не удалось получить JSON-ответ";
        }

        curl_close($ch);
        curl_close($userCh);
    }
}
