<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SectionsController extends Controller
{
    public function usa()
    {
        $metaData = [
            'title' => 'Сполучені штати',
            'description' => 'Головні новини Сполучених Штатів, розслідування, думки, фотографії та відео журналістів. Ми висвітлюємо те, що відбуваєтсья в Сполучених Штатах та навколо них: політику, бізнес, технології, науку, мистецтво, спорт, та інші ключові події.',
            'url' => 'https://daycom.com.ua/usa',
        ];

        $LOCAL_NEWS = 'http://localhost:4444/api/section/usa';
        $SERVER_NEWS = 'https://sside.daycom.com.ua/api/section/usa';

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

                $currentDate = new \DateTime('now', new \DateTimeZone('Europe/Kiev'));
                $currentDate->modify('+3 hours');

                $filteredData = array_filter($data, function ($item) use ($currentDate) {
                    $publicationDate = new \DateTime($item['publishedAt']);
                    return $publicationDate <= $currentDate;
                });

                $filteredData = array_values($filteredData);
                $limitedData = array_slice($filteredData, 0, 100);

                return view('section_news', ['metaData' => $metaData, 'data' => $limitedData, 'dataBanners' => $dataBanners]);
            } else {
                echo "Ошибка при декодировании JSON.";
            }
        } else {
            echo "Не удалось получить JSON-ответ";
        }
        curl_close($ch);
        curl_close($bannersHandle);
    }
    public function vijna()
    {
        $metaData = [
            'title' => 'Війна Росії проти України',
            'description' => 'Головні новини війни Росії проти України в прямому ефірі, розслідування, думки, фотографії та відео журналістів з багатьох країн світу.',
            'url' => 'https://daycom.com.ua/vijna',
        ];

        $SERVER_BANNERS = 'https://sside.daycom.com.ua/api/banners';

        $url = 'https://sside.daycom.com.ua/api/section/vijna';
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

                $currentDate = new \DateTime('now', new \DateTimeZone('Europe/Kiev'));
                $currentDate->modify('+3 hours');

                $filteredData = array_filter($data, function ($item) use ($currentDate) {
                    $publicationDate = new \DateTime($item['publishedAt']);
                    return $publicationDate <= $currentDate;
                });

                $filteredData = array_values($filteredData);
                $limitedData = array_slice($filteredData, 0, 100);

                return view('section_news', ['metaData' => $metaData, 'data' => $limitedData, 'dataBanners' => $dataBanners]);
            } else {
                echo "Ошибка при декодировании JSON.";
            }
        } else {
            echo "Не удалось получить JSON-ответ";
        }
        curl_close($ch);
        curl_close($bannersHandle);
    }
    public function europe()
    {
        $metaData = [
            'title' => 'Європа',
            'description' => 'Головні новини Європи, розслідування, думки, фотографії та відео журналістів. Ми висвітлюємо те, що відбуваєтсья в Європі та навколо неї: політику, бізнес, технології, науку, мистецтво, спорт, та інші ключові події.',
            'url' => 'https://daycom.com.ua/europe',
        ];

        $SERVER_BANNERS = 'https://sside.daycom.com.ua/api/banners';

        $url = 'https://sside.daycom.com.ua/api/section/europe';
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

                $currentDate = new \DateTime('now', new \DateTimeZone('Europe/Kiev'));
                $currentDate->modify('+3 hours');

                $filteredData = array_filter($data, function ($item) use ($currentDate) {
                    $publicationDate = new \DateTime($item['publishedAt']);
                    return $publicationDate <= $currentDate;
                });

                $filteredData = array_values($filteredData);
                $limitedData = array_slice($filteredData, 0, 100);

                return view('section_news', ['metaData' => $metaData, 'data' => $limitedData, 'dataBanners' => $dataBanners]);
            } else {
                echo "Ошибка при декодировании JSON.";
            }
        } else {
            echo "Не удалось получить JSON-ответ";
        }
        curl_close($ch);
        curl_close($bannersHandle);
    }
    public function china()
    {
        $metaData = [
            'title' => 'Китай',
            'description' => 'Головні новини Китаю, розслідування, думки, фотографії та відео журналістів. Ми висвітлюємо те, що відбуваєтсья в Китаї та навколо нього: політику, бізнес, технології, науку, мистецтво, спорт, та інші ключові події.',
            'url' => 'https://daycom.com.ua/china',
        ];

        $SERVER_BANNERS = 'https://sside.daycom.com.ua/api/banners';

        $url = 'https://sside.daycom.com.ua/api/section/china';
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

                $currentDate = new \DateTime('now', new \DateTimeZone('Europe/Kiev'));
                $currentDate->modify('+3 hours');

                $filteredData = array_filter($data, function ($item) use ($currentDate) {
                    $publicationDate = new \DateTime($item['publishedAt']);
                    return $publicationDate <= $currentDate;
                });

                $filteredData = array_values($filteredData);
                $limitedData = array_slice($filteredData, 0, 100);

                return view('section_news', ['metaData' => $metaData, 'data' => $limitedData, 'dataBanners' => $dataBanners]);
            } else {
                echo "Ошибка при декодировании JSON.";
            }
        } else {
            echo "Не удалось получить JSON-ответ";
        }
        curl_close($ch);
        curl_close($bannersHandle);
    }
    public function suspilstvo()
    {
        $metaData = [
            'title' => 'Суспільство',
            'description' => 'Головні новини для суспільства України та світу в прямому ефірі, розслідування, думки, фотографії та відео журналістів з багатьох країн світу.',
            'url' => 'https://daycom.com.ua/suspilstvo',
        ];

        $SERVER_BANNERS = 'https://sside.daycom.com.ua/api/banners';

        $url = 'https://sside.daycom.com.ua/api/section/suspilstvo';
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

                $currentDate = new \DateTime('now', new \DateTimeZone('Europe/Kiev'));
                $currentDate->modify('+3 hours');

                $filteredData = array_filter($data, function ($item) use ($currentDate) {
                    $publicationDate = new \DateTime($item['publishedAt']);
                    return $publicationDate <= $currentDate;
                });

                $filteredData = array_values($filteredData);
                $limitedData = array_slice($filteredData, 0, 100);

                return view('section_news', ['metaData' => $metaData, 'data' => $limitedData, 'dataBanners' => $dataBanners]);
            } else {
                echo "Ошибка при декодировании JSON.";
            }
        } else {
            echo "Не удалось получить JSON-ответ";
        }
        curl_close($ch);
        curl_close($bannersHandle);
    }
    public function biznes()
    {
        $metaData = [
            'title' => 'Що відбувається в бізнесі',
            'description' => 'Головні новини та досягнення бізнесу України та світу в прямому ефірі, розслідування, думки, фотографії та відео журналістів з багатьох країн світу.',
            'url' => 'https://daycom.com.ua/biznes',
        ];

        $SERVER_BANNERS = 'https://sside.daycom.com.ua/api/banners';

        $url = 'https://sside.daycom.com.ua/api/section/biznes';
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

                $currentDate = new \DateTime('now', new \DateTimeZone('Europe/Kiev'));
                $currentDate->modify('+3 hours');

                $filteredData = array_filter($data, function ($item) use ($currentDate) {
                    $publicationDate = new \DateTime($item['publishedAt']);
                    return $publicationDate <= $currentDate;
                });

                $filteredData = array_values($filteredData);
                $limitedData = array_slice($filteredData, 0, 100);

                return view('section_news', ['metaData' => $metaData, 'data' => $limitedData, 'dataBanners' => $dataBanners]);
            } else {
                echo "Ошибка при декодировании JSON.";
            }
        } else {
            echo "Не удалось получить JSON-ответ";
        }
        curl_close($ch);
        curl_close($bannersHandle);
    }
    public function polityka()
    {
        $metaData = [
            'title' => 'Що відбувається в політиці',
            'description' => 'Головні новини та досягнення в політиці України та інших держав світу в прямому ефірі, розслідування, думки, фотографії та відео журналістів з багатьох країн світу.',
            'url' => 'https://daycom.com.ua/polityka',
        ];

        $SERVER_BANNERS = 'https://sside.daycom.com.ua/api/banners';

        $url = 'https://sside.daycom.com.ua/api/section/polityka';
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

                $currentDate = new \DateTime('now', new \DateTimeZone('Europe/Kiev'));
                $currentDate->modify('+3 hours');

                $filteredData = array_filter($data, function ($item) use ($currentDate) {
                    $publicationDate = new \DateTime($item['publishedAt']);
                    return $publicationDate <= $currentDate;
                });

                $filteredData = array_values($filteredData);
                $limitedData = array_slice($filteredData, 0, 100);

                return view('section_news', ['metaData' => $metaData, 'data' => $limitedData, 'dataBanners' => $dataBanners]);
            } else {
                echo "Ошибка при декодировании JSON.";
            }
        } else {
            echo "Не удалось получить JSON-ответ";
        }
        curl_close($ch);
        curl_close($bannersHandle);
    }
    public function ekonomika()
    {
        $metaData = [
            'title' => 'Новини економіки',
            'description' => 'Головні новини та досягнення в економіці України та світу в прямому ефірі, розслідування, думки, фотографії та відео журналістів з багатьох країн світу.',
            'url' => 'https://daycom.com.ua/ekonomika',
        ];

        $SERVER_BANNERS = 'https://sside.daycom.com.ua/api/banners';

        $url = 'https://sside.daycom.com.ua/api/section/ekonomika';
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

                $currentDate = new \DateTime('now', new \DateTimeZone('Europe/Kiev'));
                $currentDate->modify('+3 hours');

                $filteredData = array_filter($data, function ($item) use ($currentDate) {
                    $publicationDate = new \DateTime($item['publishedAt']);
                    return $publicationDate <= $currentDate;
                });

                $filteredData = array_values($filteredData);
                $limitedData = array_slice($filteredData, 0, 100);

                return view('section_news', ['metaData' => $metaData, 'data' => $limitedData, 'dataBanners' => $dataBanners]);
            } else {
                echo "Ошибка при декодировании JSON.";
            }
        } else {
            echo "Не удалось получить JSON-ответ";
        }
        curl_close($ch);
        curl_close($bannersHandle);
    }
    public function analityka()
    {
        $metaData = [
            'title' => 'Про що говорять аналітики',
            'description' => 'Найцікавіша аналітика в України та світі в прямому ефірі, розслідування, думки, фотографії та відео журналістів з багатьох країн світу.',
            'url' => 'https://daycom.com.ua/analityka',
        ];

        $SERVER_BANNERS = 'https://sside.daycom.com.ua/api/banners';

        $url = 'https://sside.daycom.com.ua/api/section/analityka';
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

                $currentDate = new \DateTime('now', new \DateTimeZone('Europe/Kiev'));
                $currentDate->modify('+3 hours');

                $filteredData = array_filter($data, function ($item) use ($currentDate) {
                    $publicationDate = new \DateTime($item['publishedAt']);
                    return $publicationDate <= $currentDate;
                });

                $filteredData = array_values($filteredData);
                $limitedData = array_slice($filteredData, 0, 100);

                return view('section_news', ['metaData' => $metaData, 'data' => $limitedData, 'dataBanners' => $dataBanners]);
            } else {
                echo "Ошибка при декодировании JSON.";
            }
        } else {
            echo "Не удалось получить JSON-ответ";
        }
        curl_close($ch);
        curl_close($bannersHandle);
    }
    public function technologies()
    {
        $metaData = [
            'title' => 'Технологічний розвиток',
            'description' => 'Головні новини та досягнення в технологіях України та світу в прямому ефірі, розслідування, думки, фотографії та відео журналістів з багатьох країн світу.',
            'url' => 'https://daycom.com.ua/technologies',
        ];

        $SERVER_BANNERS = 'https://sside.daycom.com.ua/api/banners';

        $url = 'https://sside.daycom.com.ua/api/section/technologies';
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

                $currentDate = new \DateTime('now', new \DateTimeZone('Europe/Kiev'));
                $currentDate->modify('+3 hours');

                $filteredData = array_filter($data, function ($item) use ($currentDate) {
                    $publicationDate = new \DateTime($item['publishedAt']);
                    return $publicationDate <= $currentDate;
                });

                $filteredData = array_values($filteredData);
                $limitedData = array_slice($filteredData, 0, 100);

                return view('section_news', ['metaData' => $metaData, 'data' => $limitedData, 'dataBanners' => $dataBanners]);
            } else {
                echo "Ошибка при декодировании JSON.";
            }
        } else {
            echo "Не удалось получить JSON-ответ";
        }
        curl_close($ch);
        curl_close($bannersHandle);
    }
    public function nauka()
    {
        $metaData = [
            'title' => 'Новини науки',
            'description' => 'Головні новини та досягнення в науці України та світу в прямому ефірі, розслідування, думки, фотографії та відео журналістів з багатьох країн світу.',
            'url' => 'https://daycom.com.ua/nauka',
        ];

        $SERVER_BANNERS = 'https://sside.daycom.com.ua/api/banners';

        $url = 'https://sside.daycom.com.ua/api/section/nauka';
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

                $currentDate = new \DateTime('now', new \DateTimeZone('Europe/Kiev'));
                $currentDate->modify('+3 hours');

                $filteredData = array_filter($data, function ($item) use ($currentDate) {
                    $publicationDate = new \DateTime($item['publishedAt']);
                    return $publicationDate <= $currentDate;
                });

                $filteredData = array_values($filteredData);
                $limitedData = array_slice($filteredData, 0, 100);

                return view('section_news', ['metaData' => $metaData, 'data' => $limitedData, 'dataBanners' => $dataBanners]);
            } else {
                echo "Ошибка при декодировании JSON.";
            }
        } else {
            echo "Не удалось получить JSON-ответ";
        }
        curl_close($ch);
        curl_close($bannersHandle);
    }
    public function kultura()
    {
        $metaData = [
            'title' => 'Новини культури',
            'description' => 'Головні новини культури України та світу в прямому ефірі, розслідування, думки, фотографії та відео журналістів з багатьох країн світу.',
            'url' => 'https://daycom.com.ua/kultura',
        ];

        $SERVER_BANNERS = 'https://sside.daycom.com.ua/api/banners';

        $url = 'https://sside.daycom.com.ua/api/section/kultura';
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

                $currentDate = new \DateTime('now', new \DateTimeZone('Europe/Kiev'));
                $currentDate->modify('+3 hours');

                $filteredData = array_filter($data, function ($item) use ($currentDate) {
                    $publicationDate = new \DateTime($item['publishedAt']);
                    return $publicationDate <= $currentDate;
                });

                $filteredData = array_values($filteredData);
                $limitedData = array_slice($filteredData, 0, 100);

                return view('section_news', ['metaData' => $metaData, 'data' => $limitedData, 'dataBanners' => $dataBanners]);
            } else {
                echo "Ошибка при декодировании JSON.";
            }
        } else {
            echo "Не удалось получить JSON-ответ";
        }
        curl_close($ch);
        curl_close($bannersHandle);
    }
    public function ekolohiia()
    {
        $metaData = [
            'title' => 'Екологія',
            'description' => 'Головні новини екології України та світу в прямому ефірі, розслідування, думки, фотографії та відео журналістів з багатьох країн світу.',
            'url' => 'https://daycom.com.ua/ekolohiia',
        ];

        $SERVER_BANNERS = 'https://sside.daycom.com.ua/api/banners';

        $url = 'https://sside.daycom.com.ua/api/section/ekolohiia';
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

                $currentDate = new \DateTime('now', new \DateTimeZone('Europe/Kiev'));
                $currentDate->modify('+3 hours');

                $filteredData = array_filter($data, function ($item) use ($currentDate) {
                    $publicationDate = new \DateTime($item['publishedAt']);
                    return $publicationDate <= $currentDate;
                });

                $filteredData = array_values($filteredData);
                $limitedData = array_slice($filteredData, 0, 100);

                return view('section_news', ['metaData' => $metaData, 'data' => $limitedData, 'dataBanners' => $dataBanners]);
            } else {
                echo "Ошибка при декодировании JSON.";
            }
        } else {
            echo "Не удалось получить JSON-ответ";
        }
        curl_close($ch);
        curl_close($bannersHandle);
    }
    public function finance()
    {
        $metaData = [
            'title' => 'Новини фінансів',
            'description' => 'Головні новини та досягнення на фінансових ринках України та світу в прямому ефірі, розслідування, думки, фотографії та відео журналістів з багатьох країн світу.',
            'url' => 'https://daycom.com.ua/finance',
        ];

        $SERVER_BANNERS = 'https://sside.daycom.com.ua/api/banners';

        $url = 'https://sside.daycom.com.ua/api/section/finance';
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

                $currentDate = new \DateTime('now', new \DateTimeZone('Europe/Kiev'));
                $currentDate->modify('+3 hours');

                $filteredData = array_filter($data, function ($item) use ($currentDate) {
                    $publicationDate = new \DateTime($item['publishedAt']);
                    return $publicationDate <= $currentDate;
                });

                $filteredData = array_values($filteredData);
                $limitedData = array_slice($filteredData, 0, 100);

                return view('section_news', ['metaData' => $metaData, 'data' => $limitedData, 'dataBanners' => $dataBanners]);
            } else {
                echo "Ошибка при декодировании JSON.";
            }
        } else {
            echo "Не удалось получить JSON-ответ";
        }
        curl_close($ch);
        curl_close($bannersHandle);
    }
    public function vlada()
    {
        $metaData = [
            'title' => 'Що відбувається у владі',
            'description' => 'Головні новини та досягнення влади України та інших держав світу в прямому ефірі, розслідування, думки, фотографії та відео журналістів з багатьох країн світу.',
            'url' => 'https://daycom.com.ua/vlada',
        ];

        $SERVER_BANNERS = 'https://sside.daycom.com.ua/api/banners';

        $url = 'https://sside.daycom.com.ua/api/section/vlada';
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

                $currentDate = new \DateTime('now', new \DateTimeZone('Europe/Kiev'));
                $currentDate->modify('+3 hours');

                $filteredData = array_filter($data, function ($item) use ($currentDate) {
                    $publicationDate = new \DateTime($item['publishedAt']);
                    return $publicationDate <= $currentDate;
                });

                $filteredData = array_values($filteredData);
                $limitedData = array_slice($filteredData, 0, 100);

                return view('section_news', ['metaData' => $metaData, 'data' => $limitedData, 'dataBanners' => $dataBanners]);
            } else {
                echo "Ошибка при декодировании JSON.";
            }
        } else {
            echo "Не удалось получить JSON-ответ";
        }
        curl_close($ch);
        curl_close($bannersHandle);
    }
    public function sport()
    {
        $metaData = [
            'title' => 'Новини спорту',
            'description' => 'Головні новини та досягнення в спорті України та світу в прямому ефірі, розслідування, думки, фотографії та відео журналістів з багатьох країн світу.',
            'url' => 'https://daycom.com.ua/sport',
        ];

        $SERVER_BANNERS = 'https://sside.daycom.com.ua/api/banners';

        $url = 'https://sside.daycom.com.ua/api/section/sport';
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

                $currentDate = new \DateTime('now', new \DateTimeZone('Europe/Kiev'));
                $currentDate->modify('+3 hours');

                $filteredData = array_filter($data, function ($item) use ($currentDate) {
                    $publicationDate = new \DateTime($item['publishedAt']);
                    return $publicationDate <= $currentDate;
                });

                $filteredData = array_values($filteredData);
                $limitedData = array_slice($filteredData, 0, 100);

                return view('section_news', ['metaData' => $metaData, 'data' => $limitedData, 'dataBanners' => $dataBanners]);
            } else {
                echo "Ошибка при декодировании JSON.";
            }
        } else {
            echo "Не удалось получить JSON-ответ";
        }
        curl_close($ch);
        curl_close($bannersHandle);
    }
    public function history()
    {
        $metaData = [
            'title' => 'Історія',
            'description' => 'Згадаємо історію нашого життя та минулого.',
            'url' => 'https://daycom.com.ua/history',
        ];

        $SERVER_BANNERS = 'https://sside.daycom.com.ua/api/banners';

        $url = 'https://sside.daycom.com.ua/api/section/history';
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

                $currentDate = new \DateTime('now', new \DateTimeZone('Europe/Kiev'));
                $currentDate->modify('+3 hours');

                $filteredData = array_filter($data, function ($item) use ($currentDate) {
                    $publicationDate = new \DateTime($item['publishedAt']);
                    return $publicationDate <= $currentDate;
                });

                $filteredData = array_values($filteredData);
                $limitedData = array_slice($filteredData, 0, 100);

                return view('section_news', ['metaData' => $metaData, 'data' => $limitedData, 'dataBanners' => $dataBanners]);
            } else {
                echo "Ошибка при декодировании JSON.";
            }
        } else {
            echo "Не удалось получить JSON-ответ";
        }
        curl_close($ch);
        curl_close($bannersHandle);
    }
    public function pryhody()
    {
        $metaData = [
            'title' => 'Пригоди навколо нас',
            'description' => 'Головні пригоди в Україні та світі в прямому ефірі, розслідування, думки, фотографії та відео журналістів з багатьох країн світу.',
            'url' => 'https://daycom.com.ua/pryhody',
        ];

        $SERVER_BANNERS = 'https://sside.daycom.com.ua/api/banners';

        $url = 'https://sside.daycom.com.ua/api/section/pryhody';
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

                $currentDate = new \DateTime('now', new \DateTimeZone('Europe/Kiev'));
                $currentDate->modify('+3 hours');

                $filteredData = array_filter($data, function ($item) use ($currentDate) {
                    $publicationDate = new \DateTime($item['publishedAt']);
                    return $publicationDate <= $currentDate;
                });

                $filteredData = array_values($filteredData);
                $limitedData = array_slice($filteredData, 0, 100);

                return view('section_news', ['metaData' => $metaData, 'data' => $limitedData, 'dataBanners' => $dataBanners]);
            } else {
                echo "Ошибка при декодировании JSON.";
            }
        } else {
            echo "Не удалось получить JSON-ответ";
        }
        curl_close($ch);
        curl_close($bannersHandle);
    }
    public function musick()
    {
        $metaData = [
            'title' => 'Новини музики',
            'description' => 'Головні новини та досягнення в музиці України та світу в прямому ефірі, розслідування, думки, фотографії та відео журналістів з багатьох країн світу.',
            'url' => 'https://daycom.com.ua/musick',
        ];

        $SERVER_BANNERS = 'https://sside.daycom.com.ua/api/banners';

        $url = 'https://sside.daycom.com.ua/api/section/musick';
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

                $currentDate = new \DateTime('now', new \DateTimeZone('Europe/Kiev'));
                $currentDate->modify('+3 hours');

                $filteredData = array_filter($data, function ($item) use ($currentDate) {
                    $publicationDate = new \DateTime($item['publishedAt']);
                    return $publicationDate <= $currentDate;
                });

                $filteredData = array_values($filteredData);
                $limitedData = array_slice($filteredData, 0, 100);

                return view('section_news', ['metaData' => $metaData, 'data' => $limitedData, 'dataBanners' => $dataBanners]);
            } else {
                echo "Ошибка при декодировании JSON.";
            }
        } else {
            echo "Не удалось получить JSON-ответ";
        }
        curl_close($ch);
        curl_close($bannersHandle);
    }
    public function fashion()
    {
        $metaData = [
            'title' => 'Новини моди',
            'description' => 'Головні новини та досягнення моди України та світу в прямому ефірі, розслідування, думки, фотографії та відео журналістів з багатьох країн світу.',
            'url' => 'https://daycom.com.ua/fashion',
        ];

        $SERVER_BANNERS = 'https://sside.daycom.com.ua/api/banners';

        $url = 'https://sside.daycom.com.ua/api/section/fashion';
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

                $currentDate = new \DateTime('now', new \DateTimeZone('Europe/Kiev'));
                $currentDate->modify('+3 hours');

                $filteredData = array_filter($data, function ($item) use ($currentDate) {
                    $publicationDate = new \DateTime($item['publishedAt']);
                    return $publicationDate <= $currentDate;
                });

                $filteredData = array_values($filteredData);
                $limitedData = array_slice($filteredData, 0, 100);

                return view('section_news', ['metaData' => $metaData, 'data' => $limitedData, 'dataBanners' => $dataBanners]);
            } else {
                echo "Ошибка при декодировании JSON.";
            }
        } else {
            echo "Не удалось получить JSON-ответ";
        }
        curl_close($ch);
        curl_close($bannersHandle);
    }
    public function kino()
    {
        $metaData = [
            'title' => 'Новини кіно',
            'description' => 'Головні новини та досягнення кіномистецтва України та світу в прямому ефірі, розслідування, думки, фотографії та відео журналістів з багатьох країн світу.',
            'url' => 'https://daycom.com.ua/kino',
        ];

        $SERVER_BANNERS = 'https://sside.daycom.com.ua/api/banners';

        $url = 'https://sside.daycom.com.ua/api/section/kino';
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

                $currentDate = new \DateTime('now', new \DateTimeZone('Europe/Kiev'));
                $currentDate->modify('+3 hours');

                $filteredData = array_filter($data, function ($item) use ($currentDate) {
                    $publicationDate = new \DateTime($item['publishedAt']);
                    return $publicationDate <= $currentDate;
                });

                $filteredData = array_values($filteredData);
                $limitedData = array_slice($filteredData, 0, 100);

                return view('section_news', ['metaData' => $metaData, 'data' => $limitedData, 'dataBanners' => $dataBanners]);
            } else {
                echo "Ошибка при декодировании JSON.";
            }
        } else {
            echo "Не удалось получить JSON-ответ";
        }
        curl_close($ch);
        curl_close($bannersHandle);
    }
    public function interviu()
    {
        $metaData = [
            'title' => 'Найцікавіші інтерв\'ю',
            'description' => 'Найцікавіші інтерв\'ю з України та світу в прямому ефірі, розслідування, думки, фотографії та відео журналістів з багатьох країн світу.',
            'url' => 'https://daycom.com.ua/interviu',
        ];

        $SERVER_BANNERS = 'https://sside.daycom.com.ua/api/banners';

        $url = 'https://sside.daycom.com.ua/api/section/interviu';
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

                $currentDate = new \DateTime('now', new \DateTimeZone('Europe/Kiev'));
                $currentDate->modify('+3 hours');

                $filteredData = array_filter($data, function ($item) use ($currentDate) {
                    $publicationDate = new \DateTime($item['publishedAt']);
                    return $publicationDate <= $currentDate;
                });

                $filteredData = array_values($filteredData);
                $limitedData = array_slice($filteredData, 0, 100);

                return view('section_news', ['metaData' => $metaData, 'data' => $limitedData, 'dataBanners' => $dataBanners]);
            } else {
                echo "Ошибка при декодировании JSON.";
            }
        } else {
            echo "Не удалось получить JSON-ответ";
        }
        curl_close($ch);
        curl_close($bannersHandle);
    }
    public function dumky()
    {
        $metaData = [
            'title' => 'Сьогоднішня думка',
            'description' => 'Головні думки в України та світі в прямому ефірі, розслідування, думки, фотографії та відео журналістів з багатьох країн світу.',
            'url' => 'https://daycom.com.ua/dumky',
        ];

        $SERVER_BANNERS = 'https://sside.daycom.com.ua/api/banners';

        $url = 'https://sside.daycom.com.ua/api/section/dumky';
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

                $currentDate = new \DateTime('now', new \DateTimeZone('Europe/Kiev'));
                $currentDate->modify('+3 hours');

                $filteredData = array_filter($data, function ($item) use ($currentDate) {
                    $publicationDate = new \DateTime($item['publishedAt']);
                    return $publicationDate <= $currentDate;
                });

                $filteredData = array_values($filteredData);
                $limitedData = array_slice($filteredData, 0, 100);

                return view('section_news', ['metaData' => $metaData, 'data' => $limitedData, 'dataBanners' => $dataBanners]);
            } else {
                echo "Ошибка при декодировании JSON.";
            }
        } else {
            echo "Не удалось получить JSON-ответ";
        }
        curl_close($ch);
        curl_close($bannersHandle);
    }
    public function auto()
    {
        $metaData = [
            'title' => 'Світ авто',
            'description' => 'Головні новини та досягнення рикків авто з уьосго світу в прямому ефірі, розслідування, думки, фотографії та відео журналістів з багатьох країн світу.',
            'url' => 'https://daycom.com.ua/auto',
        ];

        $SERVER_BANNERS = 'https://sside.daycom.com.ua/api/banners';

        $url = 'https://sside.daycom.com.ua/api/section/auto';
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

                $currentDate = new \DateTime('now', new \DateTimeZone('Europe/Kiev'));
                $currentDate->modify('+3 hours');

                $filteredData = array_filter($data, function ($item) use ($currentDate) {
                    $publicationDate = new \DateTime($item['publishedAt']);
                    return $publicationDate <= $currentDate;
                });

                $filteredData = array_values($filteredData);
                $limitedData = array_slice($filteredData, 0, 100);

                return view('section_news', ['metaData' => $metaData, 'data' => $limitedData, 'dataBanners' => $dataBanners]);
            } else {
                echo "Ошибка при декодировании JSON.";
            }
        } else {
            echo "Не удалось получить JSON-ответ";
        }
        curl_close($ch);
        curl_close($bannersHandle);
    }
    public function ihry()
    {
        $metaData = [
            'title' => 'Світ Ігор',
            'description' => 'Головні новини ігрового світу в прямому ефірі, розслідування, думки, фотографії та відео журналістів з багатьох країн світу.',
            'url' => 'https://daycom.com.ua/ihry',
        ];

        $SERVER_BANNERS = 'https://sside.daycom.com.ua/api/banners';

        $url = 'https://sside.daycom.com.ua/api/section/ihry';
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

                $currentDate = new \DateTime('now', new \DateTimeZone('Europe/Kiev'));
                $currentDate->modify('+3 hours');

                $filteredData = array_filter($data, function ($item) use ($currentDate) {
                    $publicationDate = new \DateTime($item['publishedAt']);
                    return $publicationDate <= $currentDate;
                });

                $filteredData = array_values($filteredData);
                $limitedData = array_slice($filteredData, 0, 100);

                return view('section_news', ['metaData' => $metaData, 'data' => $limitedData, 'dataBanners' => $dataBanners]);
            } else {
                echo "Ошибка при декодировании JSON.";
            }
        } else {
            echo "Не удалось получить JSON-ответ";
        }
        curl_close($ch);
        curl_close($bannersHandle);
    }
    public function education()
    {
        $metaData = [
            'title' => 'Освіта та навчання',
            'description' => 'Головні новини освіти України та світу в прямому ефірі, розслідування, думки, фотографії та відео журналістів з багатьох країн світу.',
            'url' => 'https://daycom.com.ua/education',
        ];

        $SERVER_BANNERS = 'https://sside.daycom.com.ua/api/banners';

        $url = 'https://sside.daycom.com.ua/api/section/education';
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

                $currentDate = new \DateTime('now', new \DateTimeZone('Europe/Kiev'));
                $currentDate->modify('+3 hours');

                $filteredData = array_filter($data, function ($item) use ($currentDate) {
                    $publicationDate = new \DateTime($item['publishedAt']);
                    return $publicationDate <= $currentDate;
                });

                $filteredData = array_values($filteredData);
                $limitedData = array_slice($filteredData, 0, 100);

                return view('section_news', ['metaData' => $metaData, 'data' => $limitedData, 'dataBanners' => $dataBanners]);
            } else {
                echo "Ошибка при декодировании JSON.";
            }
        } else {
            echo "Не удалось получить JSON-ответ";
        }
        curl_close($ch);
        curl_close($bannersHandle);
    }
    public function kulinariia()
    {
        $metaData = [
            'title' => 'Кулінарні новини',
            'description' => 'Головні новини кулінарії України та світу в прямому ефірі, розслідування, думки, фотографії та відео журналістів з багатьох країн світу.',
            'url' => 'https://daycom.com.ua/kulinariia',
        ];

        $SERVER_BANNERS = 'https://sside.daycom.com.ua/api/banners';

        $url = 'https://sside.daycom.com.ua/api/section/kulinariia';
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

                $currentDate = new \DateTime('now', new \DateTimeZone('Europe/Kiev'));
                $currentDate->modify('+3 hours');

                $filteredData = array_filter($data, function ($item) use ($currentDate) {
                    $publicationDate = new \DateTime($item['publishedAt']);
                    return $publicationDate <= $currentDate;
                });

                $filteredData = array_values($filteredData);
                $limitedData = array_slice($filteredData, 0, 100);

                return view('section_news', ['metaData' => $metaData, 'data' => $limitedData, 'dataBanners' => $dataBanners]);
            } else {
                echo "Ошибка при декодировании JSON.";
            }
        } else {
            echo "Не удалось получить JSON-ответ";
        }
        curl_close($ch);
        curl_close($bannersHandle);
    }
    public function health()
    {
        $metaData = [
            'title' => 'Новини медицини',
            'description' => 'Головні новини здорового способу життя в Україні та світі в прямому ефірі, розслідування, думки, фотографії та відео журналістів з багатьох країн світу.',
            'url' => 'https://daycom.com.ua/health',
        ];

        $SERVER_BANNERS = 'https://sside.daycom.com.ua/api/banners';

        $url = 'https://sside.daycom.com.ua/api/section/health';
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

                $currentDate = new \DateTime('now', new \DateTimeZone('Europe/Kiev'));
                $currentDate->modify('+3 hours');

                $filteredData = array_filter($data, function ($item) use ($currentDate) {
                    $publicationDate = new \DateTime($item['publishedAt']);
                    return $publicationDate <= $currentDate;
                });

                $filteredData = array_values($filteredData);
                $limitedData = array_slice($filteredData, 0, 100);

                return view('section_news', ['metaData' => $metaData, 'data' => $limitedData, 'dataBanners' => $dataBanners]);
            } else {
                echo "Ошибка при декодировании JSON.";
            }
        } else {
            echo "Не удалось получить JSON-ответ";
        }
        curl_close($ch);
        curl_close($bannersHandle);
    }
    public function parenting()
    {
        $metaData = [
            'title' => 'Виховання дітей',
            'description' => 'Головні новини виховання дітей в Україні та світі в прямому ефірі, розслідування, думки, фотографії та відео журналістів з багатьох країн світу.',
            'url' => 'https://daycom.com.ua/parenting',
        ];

        $SERVER_BANNERS = 'https://sside.daycom.com.ua/api/banners';

        $url = 'https://sside.daycom.com.ua/api/section/parenting';
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

                $currentDate = new \DateTime('now', new \DateTimeZone('Europe/Kiev'));
                $currentDate->modify('+3 hours');

                $filteredData = array_filter($data, function ($item) use ($currentDate) {
                    $publicationDate = new \DateTime($item['publishedAt']);
                    return $publicationDate <= $currentDate;
                });

                $filteredData = array_values($filteredData);
                $limitedData = array_slice($filteredData, 0, 100);

                return view('section_news', ['metaData' => $metaData, 'data' => $limitedData, 'dataBanners' => $dataBanners]);
            } else {
                echo "Ошибка при декодировании JSON.";
            }
        } else {
            echo "Не удалось получить JSON-ответ";
        }
        curl_close($ch);
        curl_close($bannersHandle);
    }
    public function real_estate()
    {
        $metaData = [
            'title' => 'Нерухомість',
            'description' => 'Головні новини нерухомості в Україні та світі в прямому ефірі, розслідування, думки, фотографії та відео журналістів з багатьох країн світу.',
            'url' => 'https://daycom.com.ua/real-estate',
        ];

        $SERVER_BANNERS = 'https://sside.daycom.com.ua/api/banners';

        $url = 'https://sside.daycom.com.ua/api/section/real-estate';
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

                $currentDate = new \DateTime('now', new \DateTimeZone('Europe/Kiev'));
                $currentDate->modify('+3 hours');

                $filteredData = array_filter($data, function ($item) use ($currentDate) {
                    $publicationDate = new \DateTime($item['publishedAt']);
                    return $publicationDate <= $currentDate;
                });

                $filteredData = array_values($filteredData);
                $limitedData = array_slice($filteredData, 0, 100);

                return view('section_news', ['metaData' => $metaData, 'data' => $limitedData, 'dataBanners' => $dataBanners]);
            } else {
                echo "Ошибка при декодировании JSON.";
            }
        } else {
            echo "Не удалось получить JSON-ответ";
        }
        curl_close($ch);
        curl_close($bannersHandle);
    }
    public function traveling()
    {
        $metaData = [
            'title' => 'Подорожі',
            'description' => 'Головні новини подорожей в Україні та світі в прямому ефірі, розслідування, думки, фотографії та відео журналістів з багатьох країн світу.',
            'url' => 'https://daycom.com.ua/traveling',
        ];

        $SERVER_BANNERS = 'https://sside.daycom.com.ua/api/banners';

        $url = 'https://sside.daycom.com.ua/api/section/traveling';
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

                $currentDate = new \DateTime('now', new \DateTimeZone('Europe/Kiev'));
                $currentDate->modify('+3 hours');

                $filteredData = array_filter($data, function ($item) use ($currentDate) {
                    $publicationDate = new \DateTime($item['publishedAt']);
                    return $publicationDate <= $currentDate;
                });

                $filteredData = array_values($filteredData);
                $limitedData = array_slice($filteredData, 0, 100);

                return view('section_news', ['metaData' => $metaData, 'data' => $limitedData, 'dataBanners' => $dataBanners]);
            } else {
                echo "Ошибка при декодировании JSON.";
            }
        } else {
            echo "Не удалось получить JSON-ответ";
        }
        curl_close($ch);
        curl_close($bannersHandle);
    }
    public function svitovi_novyny()
    {
        $metaData = [
            'title' => 'Світові новини',
            'description' => 'Головні новини світу, розслідування, думки, фотографії та відео журналістів з багатьох країн світу. Ми висвітлюємо міжнародні новини, серед яких: політика, бізнес, технології, наука, мистецтво, спорт, та інші події з багатьох куточків світу.',
            'url' => 'https://daycom.com.ua/svitovi-novyny',
        ];

        $SERVER_BANNERS = 'https://sside.daycom.com.ua/api/banners';

        $url = 'https://sside.daycom.com.ua/api/section/svitovi-novyny';
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

                $currentDate = new \DateTime('now', new \DateTimeZone('Europe/Kiev'));
                $currentDate->modify('+3 hours');

                $filteredData = array_filter($data, function ($item) use ($currentDate) {
                    $publicationDate = new \DateTime($item['publishedAt']);
                    return $publicationDate <= $currentDate;
                });

                $filteredData = array_values($filteredData);
                $limitedData = array_slice($filteredData, 0, 100);

                return view('section_news', ['metaData' => $metaData, 'data' => $limitedData, 'dataBanners' => $dataBanners]);
            } else {
                echo "Ошибка при декодировании JSON.";
            }
        } else {
            echo "Не удалось получить JSON-ответ";
        }
        curl_close($ch);
        curl_close($bannersHandle);
    }
    public function north_america()
    {
        $metaData = [
            'title' => 'Північна Америка',
            'description' => 'Головні новини Північнної Америки, розслідування, думки, фотографії та відео журналістів. Ми висвітлюємо те, що відбуваєтсья в Північнній Америці та навколо неї: політику, бізнес, технології, науку, мистецтво, спорт, та інші ключові події.',
            'url' => 'https://daycom.com.ua/north-america',
        ];

        $SERVER_BANNERS = 'https://sside.daycom.com.ua/api/banners';

        $url = 'https://sside.daycom.com.ua/api/section/north-america';
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

                $currentDate = new \DateTime('now', new \DateTimeZone('Europe/Kiev'));
                $currentDate->modify('+3 hours');

                $filteredData = array_filter($data, function ($item) use ($currentDate) {
                    $publicationDate = new \DateTime($item['publishedAt']);
                    return $publicationDate <= $currentDate;
                });

                $filteredData = array_values($filteredData);
                $limitedData = array_slice($filteredData, 0, 100);

                return view('section_news', ['metaData' => $metaData, 'data' => $limitedData, 'dataBanners' => $dataBanners]);
            } else {
                echo "Ошибка при декодировании JSON.";
            }
        } else {
            echo "Не удалось получить JSON-ответ";
        }
        curl_close($ch);
        curl_close($bannersHandle);
    }
    public function south_america()
    {
        $metaData = [
            'title' => 'Південна Америка',
            'description' => 'Головні новини Північнної Америки, розслідування, думки, фотографії та відео журналістів. Ми висвітлюємо те, що відбуваєтсья в Північнній Америці та навколо неї: політику, бізнес, технології, науку, мистецтво, спорт, та інші ключові події.',
            'url' => 'https://daycom.com.ua/south-america',
        ];

        $SERVER_BANNERS = 'https://sside.daycom.com.ua/api/banners';

        $url = 'https://sside.daycom.com.ua/api/section/south-america';
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

                $currentDate = new \DateTime('now', new \DateTimeZone('Europe/Kiev'));
                $currentDate->modify('+3 hours');

                $filteredData = array_filter($data, function ($item) use ($currentDate) {
                    $publicationDate = new \DateTime($item['publishedAt']);
                    return $publicationDate <= $currentDate;
                });

                $filteredData = array_values($filteredData);
                $limitedData = array_slice($filteredData, 0, 100);

                return view('section_news', ['metaData' => $metaData, 'data' => $limitedData, 'dataBanners' => $dataBanners]);
            } else {
                echo "Ошибка при декодировании JSON.";
            }
        } else {
            echo "Не удалось получить JSON-ответ";
        }
        curl_close($ch);
        curl_close($bannersHandle);
    }
    public function middle_east()
    {
        $metaData = [
            'title' => 'Близький схід',
            'description' => 'Головні новини Близького Сходу, розслідування, думки, фотографії та відео журналістів. Ми висвітлюємо те, що відбуваєтсья на Близькому Сході та навколо нього: політику, бізнес, технології, науку, мистецтво, спорт, та інші ключові події.',
            'url' => 'https://daycom.com.ua/middle-east',
        ];

        $SERVER_BANNERS = 'https://sside.daycom.com.ua/api/banners';

        $url = 'https://sside.daycom.com.ua/api/section/middle-east';
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

                $currentDate = new \DateTime('now', new \DateTimeZone('Europe/Kiev'));
                $currentDate->modify('+3 hours');

                $filteredData = array_filter($data, function ($item) use ($currentDate) {
                    $publicationDate = new \DateTime($item['publishedAt']);
                    return $publicationDate <= $currentDate;
                });

                $filteredData = array_values($filteredData);
                $limitedData = array_slice($filteredData, 0, 100);

                return view('section_news', ['metaData' => $metaData, 'data' => $limitedData, 'dataBanners' => $dataBanners]);
            } else {
                echo "Ошибка при декодировании JSON.";
            }
        } else {
            echo "Не удалось получить JSON-ответ";
        }
        curl_close($ch);
        curl_close($bannersHandle);
    }
    public function pacific_region()
    {
        $metaData = [
            'title' => 'Тихоокеанський регіон',
            'description' => 'Головні новини Тихоокенського регіону, розслідування, думки, фотографії та відео журналістів. Ми висвітлюємо те, що відбуваєтсья в Тихоокенському регіоні та навколо нього: політику, бізнес, технології, науку, мистецтво, спорт, та інші ключові події.',
            'url' => 'https://daycom.com.ua/pacific-region',
        ];

        $SERVER_BANNERS = 'https://sside.daycom.com.ua/api/banners';

        $url = 'https://sside.daycom.com.ua/api/section/pacific-region';
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

                $currentDate = new \DateTime('now', new \DateTimeZone('Europe/Kiev'));
                $currentDate->modify('+3 hours');

                $filteredData = array_filter($data, function ($item) use ($currentDate) {
                    $publicationDate = new \DateTime($item['publishedAt']);
                    return $publicationDate <= $currentDate;
                });

                $filteredData = array_values($filteredData);
                $limitedData = array_slice($filteredData, 0, 100);

                return view('section_news', ['metaData' => $metaData, 'data' => $limitedData, 'dataBanners' => $dataBanners]);
            } else {
                echo "Ошибка при декодировании JSON.";
            }
        } else {
            echo "Не удалось получить JSON-ответ";
        }
        curl_close($ch);
        curl_close($bannersHandle);
    }
    public function africa()
    {
        $metaData = [
            'title' => 'Африка',
            'description' => 'Головні новини Африки, розслідування, думки, фотографії та відео журналістів. Ми висвітлюємо те, що відбуваєтсья в Африці та навколо неї: політику, бізнес, технології, науку, мистецтво, спорт, та інші ключові події.',
            'url' => 'https://daycom.com.ua/africa',
        ];

        $SERVER_BANNERS = 'https://sside.daycom.com.ua/api/banners';

        $url = 'https://sside.daycom.com.ua/api/section/africa';
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

                $currentDate = new \DateTime('now', new \DateTimeZone('Europe/Kiev'));
                $currentDate->modify('+3 hours');

                $filteredData = array_filter($data, function ($item) use ($currentDate) {
                    $publicationDate = new \DateTime($item['publishedAt']);
                    return $publicationDate <= $currentDate;
                });

                $filteredData = array_values($filteredData);
                $limitedData = array_slice($filteredData, 0, 100);

                return view('section_news', ['metaData' => $metaData, 'data' => $limitedData, 'dataBanners' => $dataBanners]);
            } else {
                echo "Ошибка при декодировании JSON.";
            }
        } else {
            echo "Не удалось получить JSON-ответ";
        }
        curl_close($ch);
        curl_close($bannersHandle);
    }
    public function pres_reliz()
    {
        $metaData = [
            'title' => 'Прес-релізи',
            'description' => 'Головні прес-релізи в Україні в прямому ефірі.',
            'url' => 'https://daycom.com.ua/pres-reliz',
        ];

        $SERVER_BANNERS = 'https://sside.daycom.com.ua/api/banners';

        $url = 'https://sside.daycom.com.ua/api/section/pres-reliz';
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

                $currentDate = new \DateTime('now', new \DateTimeZone('Europe/Kiev'));
                $currentDate->modify('+3 hours');

                $filteredData = array_filter($data, function ($item) use ($currentDate) {
                    $publicationDate = new \DateTime($item['publishedAt']);
                    return $publicationDate <= $currentDate;
                });

                $filteredData = array_values($filteredData);
                $limitedData = array_slice($filteredData, 0, 100);

                return view('section_news', ['metaData' => $metaData, 'data' => $limitedData, 'dataBanners' => $dataBanners]);
            } else {
                echo "Ошибка при декодировании JSON.";
            }
        } else {
            echo "Не удалось получить JSON-ответ";
        }
        curl_close($ch);
        curl_close($bannersHandle);
    }
    public function ofitsijno()
    {
        $metaData = [
            'title' => 'Офіційні повідомлення',
            'description' => 'Головні офіційні повідомлення в Україні в прямому ефірі.',
            'url' => 'https://daycom.com.ua/ofitsijno',
        ];

        $SERVER_BANNERS = 'https://sside.daycom.com.ua/api/banners';

        $url = 'https://sside.daycom.com.ua/api/section/ofitsijno';
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

                $currentDate = new \DateTime('now', new \DateTimeZone('Europe/Kiev'));
                $currentDate->modify('+3 hours');

                $filteredData = array_filter($data, function ($item) use ($currentDate) {
                    $publicationDate = new \DateTime($item['publishedAt']);
                    return $publicationDate <= $currentDate;
                });

                $filteredData = array_values($filteredData);
                $limitedData = array_slice($filteredData, 0, 100);

                return view('section_news', ['metaData' => $metaData, 'data' => $limitedData, 'dataBanners' => $dataBanners]);
            } else {
                echo "Ошибка при декодировании JSON.";
            }
        } else {
            echo "Не удалось получить JSON-ответ";
        }
        curl_close($ch);
        curl_close($bannersHandle);
    }
    public function novyny_biznesu()
    {
        $metaData = [
            'title' => 'Новини бізнесу',
            'description' => 'Головні новини бізнесу в Україні в прямому ефірі.',
            'url' => 'https://daycom.com.ua/novyny-biznesu',
        ];

        $SERVER_BANNERS = 'https://sside.daycom.com.ua/api/banners';

        $url = 'https://sside.daycom.com.ua/api/section/novyny-biznesu';
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

                $currentDate = new \DateTime('now', new \DateTimeZone('Europe/Kiev'));
                $currentDate->modify('+3 hours');

                $filteredData = array_filter($data, function ($item) use ($currentDate) {
                    $publicationDate = new \DateTime($item['publishedAt']);
                    return $publicationDate <= $currentDate;
                });

                $filteredData = array_values($filteredData);
                $limitedData = array_slice($filteredData, 0, 100);

                return view('section_news', ['metaData' => $metaData, 'data' => $limitedData, 'dataBanners' => $dataBanners]);
            } else {
                echo "Ошибка при декодировании JSON.";
            }
        } else {
            echo "Не удалось получить JSON-ответ";
        }
        curl_close($ch);
        curl_close($bannersHandle);
    }
    public function politychni_novyny()
    {
        $metaData = [
            'title' => 'Політичні новини',
            'description' => 'Головні політичні новини в Україні в прямому ефірі.',
            'url' => 'https://daycom.com.ua/politychni-novyny',
        ];

        $SERVER_BANNERS = 'https://sside.daycom.com.ua/api/banners';

        $url = 'https://sside.daycom.com.ua/api/section/politychni-novyny';
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

                $currentDate = new \DateTime('now', new \DateTimeZone('Europe/Kiev'));
                $currentDate->modify('+3 hours');

                $filteredData = array_filter($data, function ($item) use ($currentDate) {
                    $publicationDate = new \DateTime($item['publishedAt']);
                    return $publicationDate <= $currentDate;
                });

                $filteredData = array_values($filteredData);
                $limitedData = array_slice($filteredData, 0, 100);

                return view('section_news', ['metaData' => $metaData, 'data' => $limitedData, 'dataBanners' => $dataBanners]);
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
