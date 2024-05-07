<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsTodayController extends Controller
{
    public function index()
    {
        $metaData = [
            'title' => 'Сьогоднішня газета',
            'description' => 'Щодня ми працюємо для наших читачів, шукаємо правду та допомагаємо отримувати головні новини в Україні та з багатьох країн світу.            ',
            'url' => 'https://daycom.com.ua/news-today',
        ];

        $SERVER_BANNERS = 'https://sside.daycom.com.ua/api/banners';
        $LOCAL_BANNERS = 'http://localhost:4444/api/banners';

        $bannersHandle = curl_init();
        curl_setopt($bannersHandle, CURLOPT_URL, $SERVER_BANNERS);
        curl_setopt($bannersHandle, CURLOPT_RETURNTRANSFER, 1);
        $responseBanners = curl_exec($bannersHandle);

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
        curl_close($bannersHandle);

        return view('news-today', ['metaData' => $metaData, 'dataBanners' => $dataBanners]);
    }
}
