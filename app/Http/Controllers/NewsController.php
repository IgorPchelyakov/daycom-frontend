<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index($url)
    {
        $SERVER_NEWS = 'https://sside.daycom.com.ua/api/news/';
        $SERVER_USERS = 'https://sside.daycom.com.ua/api/users/';

        $LOCAL_NEWS = 'http://localhost:4444/api/news/';
        $LOCAL_USERS = 'http://localhost:4444/api/users/';

        $LOCAL_BANNERS = 'http://localhost:4444/api/banners';
        $SERVER_BANNERS = 'https://sside.daycom.com.ua/api/banners';

        $rUrl = $SERVER_NEWS . $url;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $rUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        $userCh = null;

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
                $userId = $data['UserId'];
                $userUrl = $SERVER_USERS . $userId;
                $userCh = curl_init();
                curl_setopt($userCh, CURLOPT_URL, $userUrl);
                curl_setopt($userCh, CURLOPT_RETURNTRANSFER, 1);
                $userResponse = curl_exec($userCh);

                if ($userResponse) {
                    $userData = json_decode($userResponse, true);

                    if ($userData !== null) {
                        return view('news', ['data' => $data, 'userData' => $userData, 'dataBanners' => $dataBanners]);
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
        if ($userCh) {
            curl_close($userCh);
        }

        curl_close($bannersHandle);
    }
}
