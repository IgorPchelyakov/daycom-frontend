<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LineNewsController extends Controller
{
    public function index()
    {
        $metaData = [
            'title' => 'Стрічка новин',
            'description' => 'Головні новини в прямому ефірі, розслідування, думки, фотографії та відео журналістів з багатьох країн світу. Ми висвітлюємо українські та міжнародні новини, серед яких: політика, бізнес, технології, наука, здоров\'я, мистецтво, спорт, та інші події з багатьої куточків світу.',
            'url' => 'https://daycom.com.ua/news',
        ];

        $LOCAL_NEWS = 'http://localhost:4444/api/newsattr';
        $SERVER_NEWS = 'https://sside.daycom.com.ua/api/newsattr';

        // $url = 'https://sside.daycom.com.ua/api/newsattr';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $SERVER_NEWS);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);

        $LOCAL_BANNERS = 'http://localhost:4444/api/banners';
        $SERVER_BANNERS = 'https://sside.daycom.com.ua/api/banners';

        $bannersHandle = curl_init();
        curl_setopt($bannersHandle, CURLOPT_URL, $SERVER_BANNERS);
        curl_setopt($bannersHandle, CURLOPT_RETURNTRANSFER, 1);
        $responseBanners = curl_exec($bannersHandle);

        if ($response) {
            $data = json_decode($response, true);

            if ($data !== null) {
                $dataBanners = [];
                if ($responseBanners !== null) {
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

                $currentDate = new \DateTime('now', new \DateTimeZone('Europe/Kiev'));
                $currentDate->modify('+3 hours');

                $filteredData = array_filter($data, function ($item) use ($currentDate) {
                    $publicationDate = new \DateTime($item['publishedAt']);
                    return $publicationDate <= $currentDate;
                });

                $filteredData = array_values($filteredData);
                $limitedData = array_slice($filteredData, 0, 100);

                return view('line_news', ['metaData' => $metaData, 'data' => $limitedData, 'dataBanners' => $dataBanners]);
            } else {
                echo "Ошибка при декодировании JSON.";
            }
        } else {
            echo "Не удалось получить JSON-ответ";
        }
        curl_close($ch);
    }
}
