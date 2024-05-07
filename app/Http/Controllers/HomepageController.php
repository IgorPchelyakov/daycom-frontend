<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HomepageController extends Controller
{
    public function index()
    {

        $SERVER_NEWS = 'https://sside.daycom.com.ua/api/newsattr';
        $LOCAL_NEWS = 'http://localhost:4444/api/newsattr/';

        $LOCAL_BANNERS = 'http://localhost:4444/api/banners';
        $SERVER_BANNERS = 'https://sside.daycom.com.ua/api/banners';

        $url = $SERVER_NEWS;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);

        $bannersHandle = curl_init();
        curl_setopt($bannersHandle, CURLOPT_URL, $SERVER_BANNERS);
        curl_setopt($bannersHandle, CURLOPT_RETURNTRANSFER, 1);
        $responseBanners = curl_exec($bannersHandle);

        if ($response) {
            $data = json_decode($response, true);

            if ($data !== null) {
                $dataBanners = [];
                if ($responseBanners) {
                    $dataBanners = [];
                    if ($responseBanners) {
                        $allBanners = json_decode($responseBanners, true);

                        $groupedBanners = [];
                        foreach ($allBanners as $banner) {
                            $startDate = strtotime($banner['startDate'] . ' -3 hour');
                            $endDate = strtotime($banner['endDate'] . ' -3 hour');
                            $currentTime = time();

                            if ($currentTime < $startDate || $currentTime > $endDate) {
                                continue;
                            }

                            $blockTypes = json_decode($banner['blockTypes'], true);
                            foreach ($blockTypes as $blockType) {
                                $groupedBanners[$blockType][] = $banner;
                            }
                        }

                        foreach ($groupedBanners as $blockType => $banners) {
                            $randomBanner = $banners[array_rand($banners)];
                            $dataBanners[$blockType] = $randomBanner;
                        }
                    }
                }

                $categories = [
                    'Головне сьогодні' => 10,
                    'ТОП новини від Дейком' => 12,
                    'Стрічка новин' => 46,
                    'Заголовок газети 24 години' => 20,
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
                $currentDate->modify('+3 hour');

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

                return view('home', ['data' => $combinedData, 'dataBanners' => $dataBanners]);
            } else {
                echo "Ошибка при декодировании JSON.";
            }
        } else {
            echo "Не удалось получить JSON-ответ";
        }

        curl_close($ch);
        curl_close($bannersHandle);
    }

}
