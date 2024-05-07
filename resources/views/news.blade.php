@extends('layouts.news')
@section('news')
    @php
        $SERVER_POST = 'https://sside.daycom.com.ua/api/news-post';
        $LOCAL_POST = 'http://localhost:4444/api/news-post';

        $newsUrl = $SERVER_POST;
        $newsCh = curl_init();
        curl_setopt($newsCh, CURLOPT_URL, $newsUrl);
        curl_setopt($newsCh, CURLOPT_RETURNTRANSFER, 1);
        $newsResponse = curl_exec($newsCh);

        if ($newsResponse) {
            $newsData = json_decode($newsResponse, true);
            if ($newsData !== null) {
                $newsData;
            } else {
                echo 'Помилка при декодуванні данних';
            }
        } else {
            echo 'Помилка при отримані данних';
        }

        curl_close($newsCh);

        if (isset($data['topicId'])) {
            $topicId = $data['topicId'];

            if ($topicId !== null && $topicId !== '') {
                $topicUrl = "https://sside.daycom.com.ua/api/themes/{$topicId}/{$data['id']}";
                $topicCh = curl_init();
                curl_setopt($topicCh, CURLOPT_URL, $topicUrl);
                curl_setopt($topicCh, CURLOPT_RETURNTRANSFER, 1);
                $topicResponse = curl_exec($topicCh);

                if ($topicResponse) {
                    $topicData = json_decode($topicResponse, true);

                    if ($topicData !== null) {
                        $topicData;
                        $topicNameUrl = "https://sside.daycom.com.ua/api/theme/{$topicId}";
                        $topicNameCh = curl_init();
                        curl_setopt($topicNameCh, CURLOPT_URL, $topicNameUrl);
                        curl_setopt($topicNameCh, CURLOPT_RETURNTRANSFER, 1);
                        $topicNameResponse = curl_exec($topicNameCh);

                        if ($topicNameResponse) {
                            $topicNameData = json_decode($topicNameResponse, true);

                            if ($topicNameData !== null) {
                                $topicNameData;
                            } else {
                                echo 'Ошибка декодирования данных по названию темы';
                            }
                        } else {
                            echo 'Ошибка получения данных по названию темы';
                        }

                        curl_close($topicNameCh);
                    } else {
                        echo 'Ошибка декодирования данных по теме';
                    }
                } else {
                    echo 'Ошибка получения данных по теме';
                }

                curl_close($topicCh);
            }
        }
    @endphp
    @if (isset($data['topicId']) && $topicData !== null && $data['id'] == $topicNameData['first_news_id'])
        <div
            class="{{ $data['postType'] === 'Публікація Premium' ? 'content-preview__container' : '' }} {{ $data['postType'] === 'Публікація Premium black' || $data['postType'] === 'Публікація Premium white' ? 'content-preview-full__container' : '' }} mx-auto px-0">
            @if ($data['postType'] === 'Вільна публікація')
                {{-- Блок №1 Публікації --}}
                <div class="mb-2">
                    <div class="banner__container mx-auto border-top border-bottom py-1 text-center"
                        style="color: rgb(107 114 128); font-size: 12px; line-height: 12px; font-weight: 300;">
                        ОГОЛОШЕННЯ
                    </div>
                    @php
                        $blockType = 'Блок №1 Публікації';
                        $banner = $dataBanners[$blockType] ?? null;
                    @endphp
                    @if ($banner)
                        @php
                            $images = json_decode($banner['images']);
                            $headlines = json_decode($banner['headlines']);
                            $descriptions = json_decode($banner['descriptions']);
                            $advertiserLinks = json_decode($banner['advertiserLinks']);
                        @endphp
                        @if ($banner['bannerType'] === 'Слайд-шоу Flex L white')
                            <div class="banner__container mx-auto text-center position-relative"
                                style="background-color: #EBEBEB;">
                                <div class="second-banner__carousel pb-4 mb-4">
                                    <div id="carouselFirstBanner" class="carousel slide carousel-dark mx-auto"
                                        style="max-width: 1200px;">
                                        <div class="carousel-inner mx-auto" style="max-width: 1200px; width: 100%;">
                                            @foreach ($images as $key => $image)
                                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                                    <div class="d-md-none"
                                                        style="min-height: auto; background-color: #fff;">
                                                        <img style="max-width: 1200px; width: 100%; height: auto; object-fit: contain;"
                                                            src="{{ $image }}" class="d-block w-100"
                                                            alt="Banner Image">
                                                        <div class="position-relative" style="padding: 20px;">
                                                            <div class="text-start">
                                                                @if (isset($headlines[$key]))
                                                                    <h3
                                                                        style="font-weight: 500; font-size: 20px; line-height: 24px; color: black;">
                                                                        {{ $headlines[$key] }}</h3>
                                                                @endif
                                                                @if (isset($descriptions[$key]))
                                                                    <p
                                                                        style="font-size: 14px; line-height: 16px; color: black; margin-top: 10px;">
                                                                        {{ $descriptions[$key] }}</p>
                                                                @endif
                                                                @if (isset($advertiserLinks[$key]))
                                                                    <div class="">
                                                                        <a class="white-banner__link" target="_blank"
                                                                            href="{{ $advertiserLinks[$key] }}">Переглянути</a>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-none d-md-block">
                                                        <img style="max-width: 1200px; max-height: 600px; width: 100%; min-height: 600px; height: 100%; object-fit: cover;"
                                                            src="{{ $image }}" class="d-block w-100"
                                                            alt="Banner Image">
                                                        <div class="glassmorphism-parent position-absolute w-100 d-none d-md-block"
                                                            style="height: 110px; bottom: 0;">
                                                            <div class="d-md-flex align-items-center justify-content-between gap-4 w-100 h-100"
                                                                style="padding: 10px 30px; position: absolute; bottom: 0; max-width: 1200px; max-height: 110px;">
                                                                <div class="d-flex flex-column text-start">
                                                                    @if (isset($headlines[$key]))
                                                                        <h3 style="font-weight: 500; font-size: 20px; line-height: 24px; color: black;"
                                                                            class="w-100">
                                                                            {{ $headlines[$key] }}</h3>
                                                                    @endif
                                                                    @if (isset($descriptions[$key]))
                                                                        <p style="font-size: 14px; line-height: 16px; color: black; margin: 0;"
                                                                            class="w-100">
                                                                            {{ $descriptions[$key] }}</p>
                                                                    @endif
                                                                </div>
                                                                @if (isset($advertiserLinks[$key]))
                                                                    <div class="ml-auto text-start">
                                                                        <a class="white-banner__link" target="_blank"
                                                                            href="{{ $advertiserLinks[$key] }}">Переглянути</a>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @elseif ($banner['bannerType'] === 'Слайд-шоу Flex L black')
                                        <div class="banner__container mx-auto text-center position-relative"
                                            style="background-color: #EBEBEB;">
                                            <div class="second-banner__carousel pb-4 mb-4">
                                                <div id="carouselFirstBanner" class="carousel slide mx-auto"
                                                    style="max-width: 1200px;">
                                                    <div class="carousel-inner mx-auto"
                                                        style="max-width: 1200px; width: 100%;">
                                                        @foreach ($images as $key => $image)
                                                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                                                <div class="d-md-none"
                                                                    style="min-height: auto; background-color: #000;">
                                                                    <img style="max-width: 1200px; width: 100%; height: auto; object-fit: contain;"
                                                                        src="{{ $image }}" class="d-block w-100"
                                                                        alt="Banner Image">
                                                                    <div class="position-relative" style="padding: 20px;">
                                                                        <div class="text-start text-white">
                                                                            @if (isset($headlines[$key]))
                                                                                <h3
                                                                                    style="font-weight: 500; font-size: 20px; line-height: 24px;">
                                                                                    {{ $headlines[$key] }}</h3>
                                                                            @endif
                                                                            @if (isset($descriptions[$key]))
                                                                                <p
                                                                                    style="font-size: 14px; line-height: 16px; color: #fff; margin-top: 10px;">
                                                                                    {{ $descriptions[$key] }}</p>
                                                                            @endif
                                                                            @if (isset($advertiserLinks[$key]))
                                                                                <div class="">
                                                                                    <a class="black-banner__link"
                                                                                        target="_blank"
                                                                                        href="{{ $advertiserLinks[$key] }}">Переглянути</a>
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="d-none d-md-block"
                                                                    style="background-color: #000;">
                                                                    <img style="max-width: 1200px; max-height: 600px; width: 100%; min-height: 600px; height: 100%; object-fit: cover;"
                                                                        src="{{ $image }}" class="d-block w-100"
                                                                        alt="Banner Image">
                                                                    <div class="glassmorphism-b-parent position-absolute w-100 d-none d-md-block"
                                                                        style="height: 110px; bottom: 0;">
                                                                        <div class="d-md-flex align-items-center justify-content-between gap-4 w-100 h-100"
                                                                            style="padding: 10px 30px; position: absolute; bottom: 0; max-width: 1200px; max-height: 110px;">
                                                                            <div
                                                                                class="d-flex flex-column text-start text-white">
                                                                                @if (isset($headlines[$key]))
                                                                                    <h3 style="font-weight: 500; font-size: 20px; line-height: 24px;"
                                                                                        class="w-100">
                                                                                        {{ $headlines[$key] }}</h3>
                                                                                @endif
                                                                                @if (isset($descriptions[$key]))
                                                                                    <p style="font-size: 14px; line-height: 16px; color: #fff; margin: 0;"
                                                                                        class="w-100">
                                                                                        {{ $descriptions[$key] }}</p>
                                                                                @endif
                                                                            </div>
                                                                            @if (isset($advertiserLinks[$key]))
                                                                                <div class="ml-auto text-start">
                                                                                    <a class="black-banner__link"
                                                                                        target="_blank"
                                                                                        href="{{ $advertiserLinks[$key] }}">Переглянути</a>
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @elseif ($banner['bannerType'] === 'Повідомлення Flex М white')
                                                    <div class="banner__container mx-auto text-center position-relative"
                                                        style="background-color: #EBEBEB;">
                                                        <div class="second-banner__carousel pb-4 mb-4">
                                                            <div id="carouselFirstBanner"
                                                                class="carousel slide carousel-dark mx-auto">
                                                                <div class="carousel-inner mx-auto"
                                                                    style="max-width: 1920px; width: 100%;">
                                                                    @for ($i = 0; $i < count($images); $i += 2)
                                                                        @php
                                                                            $headlineIndex =
                                                                                ($i / 2) % count($headlines);
                                                                            $descriptionIndex =
                                                                                ($i / 2) % count($descriptions);
                                                                            $linkIndex =
                                                                                ($i / 2) % count($advertiserLinks);
                                                                            $headline = isset(
                                                                                $headlines[$headlineIndex],
                                                                            )
                                                                                ? $headlines[$headlineIndex]
                                                                                : '';
                                                                            $description = isset(
                                                                                $descriptions[$descriptionIndex],
                                                                            )
                                                                                ? $descriptions[$descriptionIndex]
                                                                                : '';
                                                                            $link = isset($advertiserLinks[$linkIndex])
                                                                                ? $advertiserLinks[$linkIndex]
                                                                                : '';
                                                                        @endphp
                                                                        <div
                                                                            class="carousel-item {{ $i == 0 ? 'active' : '' }}">
                                                                            <div
                                                                                class="d-md-flex align-items-center h-100 limiting-container">
                                                                                @if ($i < count($images))
                                                                                    <div class="text-center lim-img"
                                                                                        style="flex: 0 0 33.33%;">
                                                                                        <img class="img-size"
                                                                                            style="width: 100%; object-fit: cover; height: 100%;"
                                                                                            src="{{ $images[$i] }}"
                                                                                            alt="Banner Image">
                                                                                    </div>
                                                                                @endif
                                                                                <div class="d-flex flex-column justify-content-center text-md-start lim-content"
                                                                                    style="background-color: #fff; flex: 0 0 33.33%; height: 100%;">
                                                                                    <div class=""
                                                                                        style="flex-grow: 7; display: flex; flex-direction: column; justify-content: center;">
                                                                                        @if ($headline)
                                                                                            <h3
                                                                                                style="font-weight: 500; font-size: 20px; line-height: 24px; color: black;">
                                                                                                {{ $headline }}</h3>
                                                                                        @endif
                                                                                        @if ($description)
                                                                                            <p
                                                                                                style="font-size: 14px; line-height: 16px; color: black; margin-top: 10px;">
                                                                                                {{ $description }}</p>
                                                                                        @endif
                                                                                    </div>
                                                                                    @if ($link)
                                                                                        <div class=""
                                                                                            style="flex-grow: 3;">
                                                                                            <a class="white-banner__link"
                                                                                                target="_blank"
                                                                                                href="{{ $link }}">Переглянути</a>
                                                                                        </div>
                                                                                    @endif
                                                                                </div>
                                                                                @if ($i + 1 < count($images))
                                                                                    <div class="text-center lim-img"
                                                                                        style="flex: 0 0 33.33%;">
                                                                                        <img class="img-size"
                                                                                            style="width: 100%; object-fit: cover; height: 100%;"
                                                                                            src="{{ $images[$i + 1] }}"
                                                                                            alt="Banner Image">
                                                                                    </div>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    @endfor
                                                                </div>
                                                            @elseif ($banner['bannerType'] === 'Повідомлення Flex М black')
                                                                <div class="banner__container mx-auto text-center position-relative"
                                                                    style="background-color: #EBEBEB;">
                                                                    <div class="second-banner__carousel pb-4 mb-4">
                                                                        <div id="carouselFirstBanner"
                                                                            class="carousel slide carousel mx-auto">
                                                                            <div class="carousel-inner mx-auto"
                                                                                style="max-width: 1920px; width: 100%;">
                                                                                @for ($i = 0; $i < count($images); $i += 2)
                                                                                    @php
                                                                                        $headlineIndex =
                                                                                            ($i / 2) %
                                                                                            count($headlines);
                                                                                        $descriptionIndex =
                                                                                            ($i / 2) %
                                                                                            count($descriptions);
                                                                                        $linkIndex =
                                                                                            ($i / 2) %
                                                                                            count($advertiserLinks);
                                                                                        $headline = isset(
                                                                                            $headlines[$headlineIndex],
                                                                                        )
                                                                                            ? $headlines[$headlineIndex]
                                                                                            : '';
                                                                                        $description = isset(
                                                                                            $descriptions[
                                                                                                $descriptionIndex
                                                                                            ],
                                                                                        )
                                                                                            ? $descriptions[
                                                                                                $descriptionIndex
                                                                                            ]
                                                                                            : '';
                                                                                        $link = isset(
                                                                                            $advertiserLinks[
                                                                                                $linkIndex
                                                                                            ],
                                                                                        )
                                                                                            ? $advertiserLinks[
                                                                                                $linkIndex
                                                                                            ]
                                                                                            : '';
                                                                                    @endphp
                                                                                    <div
                                                                                        class="carousel-item {{ $i == 0 ? 'active' : '' }}">
                                                                                        <div
                                                                                            class="d-md-flex align-items-center h-100 limiting-container">
                                                                                            @if ($i < count($images))
                                                                                                <div class="text-center lim-img"
                                                                                                    style="flex: 0 0 33.33%;">
                                                                                                    <img class="img-size"
                                                                                                        style="width: 100%; object-fit: cover; height: 100%;"
                                                                                                        src="{{ $images[$i] }}"
                                                                                                        alt="Banner Image">
                                                                                                </div>
                                                                                            @endif
                                                                                            <div class="d-flex flex-column justify-content-center text-md-start lim-content"
                                                                                                style="background-color: #000; flex: 0 0 33.33%; height: 100%;">
                                                                                                <div class=""
                                                                                                    style="flex-grow: 7; display: flex; flex-direction: column; justify-content: center;">
                                                                                                    @if ($headline)
                                                                                                        <h3
                                                                                                            style="font-weight: 500; font-size: 20px; line-height: 24px; color: white;">
                                                                                                            {{ $headline }}
                                                                                                        </h3>
                                                                                                    @endif
                                                                                                    @if ($description)
                                                                                                        <p
                                                                                                            style="font-size: 14px; line-height: 16px; color: white; margin-top: 10px;">
                                                                                                            {{ $description }}
                                                                                                        </p>
                                                                                                    @endif
                                                                                                </div>
                                                                                                @if ($link)
                                                                                                    <div class=""
                                                                                                        style="flex-grow: 3;">
                                                                                                        <div
                                                                                                            class="">
                                                                                                            <a class="black-m-banner__link"
                                                                                                                target="_blank"
                                                                                                                href="{{ $link }}">Переглянути</a>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                @endif
                                                                                            </div>
                                                                                            @if ($i + 1 < count($images))
                                                                                                <div class="text-center lim-img"
                                                                                                    style="flex: 0 0 33.33%;">
                                                                                                    <img class="img-size"
                                                                                                        style="width: 100%; object-fit: cover; height: 100%;"
                                                                                                        src="{{ $images[$i + 1] }}"
                                                                                                        alt="Banner Image">
                                                                                                </div>
                                                                                            @endif
                                                                                        </div>
                                                                                    </div>
                                                                                @endfor
                                                                            </div>
                                                                        @else
                        @endif
                    @endif
                    @if ($banner)
                        @if ($banner['bannerType'] === 'Слайд-шоу Flex L white')
                            @if (count($images) > 1)
                                <div class="carousel-controls mx-auto h-100">
                                    <button class="carousel-control-prev banner-contol" type="button"
                                        data-bs-target="#carouselFirstBanner" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next banner-contol" type="button"
                                        data-bs-target="#carouselFirstBanner" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                    <div class="d-none d-md-block">
                                        <ol class="carousel-indicators" style="position: absolute; bottom: 100px;">
                                            @foreach ($images as $key => $image)
                                                <li style="list-style: none;" data-bs-target="#carouselFirstBanner"
                                                    data-bs-slide-to="{{ $key }}"
                                                    class="{{ $key == 0 ? 'active' : '' }}">
                                                </li>
                                            @endforeach
                                        </ol>
                                    </div>
                                </div>
                            @endif
                        @elseif ($banner['bannerType'] === 'Слайд-шоу Flex L black')
                            @if (count($images) > 1)
                                <div class="carousel-controls mx-auto h-100">
                                    <button class="carousel-control-prev banner-contol" type="button"
                                        data-bs-target="#carouselFirstBanner" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next banner-contol" type="button"
                                        data-bs-target="#carouselFirstBanner" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                    <div class="d-none d-md-block">
                                        <ol class="carousel-indicators" style="position: absolute; bottom: 100px;">
                                            @foreach ($images as $key => $image)
                                                <li style="list-style: none;" data-bs-target="#carouselFirstBanner"
                                                    data-bs-slide-to="{{ $key }}"
                                                    class="{{ $key == 0 ? 'active' : '' }}">
                                                </li>
                                            @endforeach
                                        </ol>
                                    </div>
                                </div>
                            @endif
                        @elseif ($banner['bannerType'] === 'Повідомлення Flex М white')
                            @if (count($images) > 2)
                                <div class="carousel-controls mx-auto h-100">
                                    <button class="carousel-control-prev banner-contol" type="button"
                                        data-bs-target="#carouselFirstBanner" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next banner-contol" type="button"
                                        data-bs-target="#carouselFirstBanner" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                    <div class="d-none d-md-block">
                                        <ol class="carousel-indicators" style="position: absolute; bottom: -10px;">
                                            @for ($i = 0; $i < count($images) / 2; $i++)
                                                <li style="list-style: none;" data-bs-target="#carouselFirstBanner"
                                                    data-bs-slide-to="{{ $i }}"
                                                    class="{{ $i == 0 ? 'active' : '' }}">
                                                </li>
                                            @endfor
                                        </ol>
                                    </div>
                                </div>
                            @endif
                        @elseif ($banner['bannerType'] === 'Повідомлення Flex М black')
                            @if (count($images) > 2)
                                <div class="carousel-controls mx-auto h-100">
                                    <button class="carousel-control-prev banner-contol" type="button"
                                        data-bs-target="#carouselFirstBanner" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next banner-contol" type="button"
                                        data-bs-target="#carouselFirstBanner" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                    <div class="d-none d-md-block">
                                        <ol class="carousel-indicators" style="position: absolute; bottom: -10px;">
                                            @for ($i = 0; $i < count($images) / 2; $i++)
                                                <li style="list-style: none;" data-bs-target="#carouselFirstBanner"
                                                    data-bs-slide-to="{{ $i }}"
                                                    class="{{ $i == 0 ? 'active' : '' }}">
                                                </li>
                                            @endfor
                                        </ol>
                                    </div>
                                </div>
                            @endif
                        @endif
                    @else
                    @endif
                </div>
        </div>
        </div>
        </div>
        <div class="content__container mx-auto pt-2" style="padding: 0 20px;">
            @if ($topicNameData['is_visible'] === true)
                <div class="theme">
                    <h2>{{ $topicNameData['name'] }}</h2>
                </div>
            @endif
            <h1 class="smoothie">{{ $data['title'] }}</h1>
            @if ($data['showDesc'] === true)
                <h2 class="border-bottom mb-3 pb-3">{{ $data['desc'] }}</h2>
            @endif
        </div>
        @if ($data['imageSize'] === true)
            <div class="content__container mx-auto" style="max-width: 600px;">
                <img class="img-fluid w-100 pb-1 object-fit-cover" style="min-height: 400px;"
                    src="{{ $data['mainImage'] }}" alt="{{ $data['mainImgDesc'] }}">
                <figcaption style="padding: 0 20px;">{{ $data['mainImgDesc'] . ' - ' . $data['mainImgAuthor'] }}
                </figcaption>
            </div>
        @else
            <div class="container px-0">
                <img class="img-fluid w-100 object-fit-cover" style="min-height: 400px;" src="{{ $data['mainImage'] }}"
                    alt="{{ $data['mainImgDesc'] }}">
                <figcaption style="padding: 0 20px;">{{ $data['mainImgDesc'] . ' - ' . $data['mainImgAuthor'] }}
                </figcaption>
            </div>
        @endif
    @elseif ($data['postType'] === 'Вільна публікація +')
        <div class="mb-2">
            <div class="banner__container mx-auto border-top border-bottom py-1 text-center"
                style="color: rgb(107 114 128); font-size: 12px; line-height: 12px; font-weight: 300;">
                ОГОЛОШЕННЯ
            </div>
            @php
                $blockType = 'Блок №1 Публікації';
                $banner = $dataBanners[$blockType] ?? null;
            @endphp
            @if ($banner)
                @php
                    $images = json_decode($banner['images']);
                    $headlines = json_decode($banner['headlines']);
                    $descriptions = json_decode($banner['descriptions']);
                    $advertiserLinks = json_decode($banner['advertiserLinks']);
                @endphp
                @if ($banner['bannerType'] === 'Слайд-шоу Flex L white')
                    <div class="banner__container mx-auto text-center position-relative"
                        style="background-color: #EBEBEB;">
                        <div class="second-banner__carousel pb-4 mb-4">
                            <div id="carouselFirstBanner" class="carousel slide carousel-dark mx-auto"
                                style="max-width: 1200px;">
                                <div class="carousel-inner mx-auto" style="max-width: 1200px; width: 100%;">
                                    @foreach ($images as $key => $image)
                                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                            <div class="d-md-none" style="min-height: auto; background-color: #fff;">
                                                <img style="max-width: 1200px; width: 100%; height: auto; object-fit: contain;"
                                                    src="{{ $image }}" class="d-block w-100" alt="Banner Image">
                                                <div class="position-relative" style="padding: 20px;">
                                                    <div class="text-start">
                                                        @if (isset($headlines[$key]))
                                                            <h3
                                                                style="font-weight: 500; font-size: 20px; line-height: 24px; color: black;">
                                                                {{ $headlines[$key] }}</h3>
                                                        @endif
                                                        @if (isset($descriptions[$key]))
                                                            <p
                                                                style="font-size: 14px; line-height: 16px; color: black; margin-top: 10px;">
                                                                {{ $descriptions[$key] }}</p>
                                                        @endif
                                                        @if (isset($advertiserLinks[$key]))
                                                            <div class="">
                                                                <a class="white-banner__link" target="_blank"
                                                                    href="{{ $advertiserLinks[$key] }}">Переглянути</a>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-none d-md-block">
                                                <img style="max-width: 1200px; max-height: 600px; width: 100%; min-height: 600px; height: 100%; object-fit: cover;"
                                                    src="{{ $image }}" class="d-block w-100" alt="Banner Image">
                                                <div class="glassmorphism-parent position-absolute w-100 d-none d-md-block"
                                                    style="height: 110px; bottom: 0;">
                                                    <div class="d-md-flex align-items-center justify-content-between gap-4 w-100 h-100"
                                                        style="padding: 10px 30px; position: absolute; bottom: 0; max-width: 1200px; max-height: 110px;">
                                                        <div class="d-flex flex-column text-start">
                                                            @if (isset($headlines[$key]))
                                                                <h3 style="font-weight: 500; font-size: 20px; line-height: 24px; color: black;"
                                                                    class="w-100">
                                                                    {{ $headlines[$key] }}</h3>
                                                            @endif
                                                            @if (isset($descriptions[$key]))
                                                                <p style="font-size: 14px; line-height: 16px; color: black; margin: 0;"
                                                                    class="w-100">
                                                                    {{ $descriptions[$key] }}</p>
                                                            @endif
                                                        </div>
                                                        @if (isset($advertiserLinks[$key]))
                                                            <div class="ml-auto text-start">
                                                                <a class="white-banner__link" target="_blank"
                                                                    href="{{ $advertiserLinks[$key] }}">Переглянути</a>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @elseif ($banner['bannerType'] === 'Слайд-шоу Flex L black')
                                <div class="banner__container mx-auto text-center position-relative"
                                    style="background-color: #EBEBEB;">
                                    <div class="second-banner__carousel pb-4 mb-4">
                                        <div id="carouselFirstBanner" class="carousel slide mx-auto"
                                            style="max-width: 1200px;">
                                            <div class="carousel-inner mx-auto" style="max-width: 1200px; width: 100%;">
                                                @foreach ($images as $key => $image)
                                                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                                        <div class="d-md-none"
                                                            style="min-height: auto; background-color: #000;">
                                                            <img style="max-width: 1200px; width: 100%; height: auto; object-fit: contain;"
                                                                src="{{ $image }}" class="d-block w-100"
                                                                alt="Banner Image">
                                                            <div class="position-relative" style="padding: 20px;">
                                                                <div class="text-start text-white">
                                                                    @if (isset($headlines[$key]))
                                                                        <h3
                                                                            style="font-weight: 500; font-size: 20px; line-height: 24px;">
                                                                            {{ $headlines[$key] }}</h3>
                                                                    @endif
                                                                    @if (isset($descriptions[$key]))
                                                                        <p
                                                                            style="font-size: 14px; line-height: 16px; color: #fff; margin-top: 10px;">
                                                                            {{ $descriptions[$key] }}</p>
                                                                    @endif
                                                                    @if (isset($advertiserLinks[$key]))
                                                                        <div class="">
                                                                            <a class="black-banner__link" target="_blank"
                                                                                href="{{ $advertiserLinks[$key] }}">Переглянути</a>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="d-none d-md-block" style="background-color: #000;">
                                                            <img style="max-width: 1200px; max-height: 600px; width: 100%; min-height: 600px; height: 100%; object-fit: cover;"
                                                                src="{{ $image }}" class="d-block w-100"
                                                                alt="Banner Image">
                                                            <div class="glassmorphism-b-parent position-absolute w-100 d-none d-md-block"
                                                                style="height: 110px; bottom: 0;">
                                                                <div class="d-md-flex align-items-center justify-content-between gap-4 w-100 h-100"
                                                                    style="padding: 10px 30px; position: absolute; bottom: 0; max-width: 1200px; max-height: 110px;">
                                                                    <div class="d-flex flex-column text-start text-white">
                                                                        @if (isset($headlines[$key]))
                                                                            <h3 style="font-weight: 500; font-size: 20px; line-height: 24px;"
                                                                                class="w-100">
                                                                                {{ $headlines[$key] }}</h3>
                                                                        @endif
                                                                        @if (isset($descriptions[$key]))
                                                                            <p style="font-size: 14px; line-height: 16px; color: #fff; margin: 0;"
                                                                                class="w-100">
                                                                                {{ $descriptions[$key] }}</p>
                                                                        @endif
                                                                    </div>
                                                                    @if (isset($advertiserLinks[$key]))
                                                                        <div class="ml-auto text-start">
                                                                            <a class="black-banner__link" target="_blank"
                                                                                href="{{ $advertiserLinks[$key] }}">Переглянути</a>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @elseif ($banner['bannerType'] === 'Повідомлення Flex М white')
                                            <div class="banner__container mx-auto text-center position-relative"
                                                style="background-color: #EBEBEB;">
                                                <div class="second-banner__carousel pb-4 mb-4">
                                                    <div id="carouselFirstBanner"
                                                        class="carousel slide carousel-dark mx-auto">
                                                        <div class="carousel-inner mx-auto"
                                                            style="max-width: 1920px; width: 100%;">
                                                            @for ($i = 0; $i < count($images); $i += 2)
                                                                @php
                                                                    $headlineIndex = ($i / 2) % count($headlines);
                                                                    $descriptionIndex = ($i / 2) % count($descriptions);
                                                                    $linkIndex = ($i / 2) % count($advertiserLinks);
                                                                    $headline = isset($headlines[$headlineIndex])
                                                                        ? $headlines[$headlineIndex]
                                                                        : '';
                                                                    $description = isset(
                                                                        $descriptions[$descriptionIndex],
                                                                    )
                                                                        ? $descriptions[$descriptionIndex]
                                                                        : '';
                                                                    $link = isset($advertiserLinks[$linkIndex])
                                                                        ? $advertiserLinks[$linkIndex]
                                                                        : '';
                                                                @endphp
                                                                <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
                                                                    <div
                                                                        class="d-md-flex align-items-center h-100 limiting-container">
                                                                        @if ($i < count($images))
                                                                            <div class="text-center lim-img"
                                                                                style="flex: 0 0 33.33%;">
                                                                                <img class="img-size"
                                                                                    style="width: 100%; object-fit: cover; height: 100%;"
                                                                                    src="{{ $images[$i] }}"
                                                                                    alt="Banner Image">
                                                                            </div>
                                                                        @endif
                                                                        <div class="d-flex flex-column justify-content-center text-md-start lim-content"
                                                                            style="background-color: #fff; flex: 0 0 33.33%; height: 100%;">
                                                                            <div class=""
                                                                                style="flex-grow: 7; display: flex; flex-direction: column; justify-content: center;">
                                                                                @if ($headline)
                                                                                    <h3
                                                                                        style="font-weight: 500; font-size: 20px; line-height: 24px; color: black;">
                                                                                        {{ $headline }}</h3>
                                                                                @endif
                                                                                @if ($description)
                                                                                    <p
                                                                                        style="font-size: 14px; line-height: 16px; color: black; margin-top: 10px;">
                                                                                        {{ $description }}</p>
                                                                                @endif
                                                                            </div>
                                                                            @if ($link)
                                                                                <div class="" style="flex-grow: 3;">
                                                                                    <a class="white-banner__link"
                                                                                        target="_blank"
                                                                                        href="{{ $link }}">Переглянути</a>
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                        @if ($i + 1 < count($images))
                                                                            <div class="text-center lim-img"
                                                                                style="flex: 0 0 33.33%;">
                                                                                <img class="img-size"
                                                                                    style="width: 100%; object-fit: cover; height: 100%;"
                                                                                    src="{{ $images[$i + 1] }}"
                                                                                    alt="Banner Image">
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            @endfor
                                                        </div>
                                                    @elseif ($banner['bannerType'] === 'Повідомлення Flex М black')
                                                        <div class="banner__container mx-auto text-center position-relative"
                                                            style="background-color: #EBEBEB;">
                                                            <div class="second-banner__carousel pb-4 mb-4">
                                                                <div id="carouselFirstBanner"
                                                                    class="carousel slide carousel mx-auto">
                                                                    <div class="carousel-inner mx-auto"
                                                                        style="max-width: 1920px; width: 100%;">
                                                                        @for ($i = 0; $i < count($images); $i += 2)
                                                                            @php
                                                                                $headlineIndex =
                                                                                    ($i / 2) % count($headlines);
                                                                                $descriptionIndex =
                                                                                    ($i / 2) % count($descriptions);
                                                                                $linkIndex =
                                                                                    ($i / 2) % count($advertiserLinks);
                                                                                $headline = isset(
                                                                                    $headlines[$headlineIndex],
                                                                                )
                                                                                    ? $headlines[$headlineIndex]
                                                                                    : '';
                                                                                $description = isset(
                                                                                    $descriptions[$descriptionIndex],
                                                                                )
                                                                                    ? $descriptions[$descriptionIndex]
                                                                                    : '';
                                                                                $link = isset(
                                                                                    $advertiserLinks[$linkIndex],
                                                                                )
                                                                                    ? $advertiserLinks[$linkIndex]
                                                                                    : '';
                                                                            @endphp
                                                                            <div
                                                                                class="carousel-item {{ $i == 0 ? 'active' : '' }}">
                                                                                <div
                                                                                    class="d-md-flex align-items-center h-100 limiting-container">
                                                                                    @if ($i < count($images))
                                                                                        <div class="text-center lim-img"
                                                                                            style="flex: 0 0 33.33%;">
                                                                                            <img class="img-size"
                                                                                                style="width: 100%; object-fit: cover; height: 100%;"
                                                                                                src="{{ $images[$i] }}"
                                                                                                alt="Banner Image">
                                                                                        </div>
                                                                                    @endif
                                                                                    <div class="d-flex flex-column justify-content-center text-md-start lim-content"
                                                                                        style="background-color: #000; flex: 0 0 33.33%; height: 100%;">
                                                                                        <div class=""
                                                                                            style="flex-grow: 7; display: flex; flex-direction: column; justify-content: center;">
                                                                                            @if ($headline)
                                                                                                <h3
                                                                                                    style="font-weight: 500; font-size: 20px; line-height: 24px; color: white;">
                                                                                                    {{ $headline }}
                                                                                                </h3>
                                                                                            @endif
                                                                                            @if ($description)
                                                                                                <p
                                                                                                    style="font-size: 14px; line-height: 16px; color: white; margin-top: 10px;">
                                                                                                    {{ $description }}
                                                                                                </p>
                                                                                            @endif
                                                                                        </div>
                                                                                        @if ($link)
                                                                                            <div class=""
                                                                                                style="flex-grow: 3;">
                                                                                                <div class="">
                                                                                                    <a class="black-m-banner__link"
                                                                                                        target="_blank"
                                                                                                        href="{{ $link }}">Переглянути</a>
                                                                                                </div>
                                                                                            </div>
                                                                                        @endif
                                                                                    </div>
                                                                                    @if ($i + 1 < count($images))
                                                                                        <div class="text-center lim-img"
                                                                                            style="flex: 0 0 33.33%;">
                                                                                            <img class="img-size"
                                                                                                style="width: 100%; object-fit: cover; height: 100%;"
                                                                                                src="{{ $images[$i + 1] }}"
                                                                                                alt="Banner Image">
                                                                                        </div>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                        @endfor
                                                                    </div>
                                                                @else
                @endif
            @endif
            @if ($banner)
                @if ($banner['bannerType'] === 'Слайд-шоу Flex L white')
                    @if (count($images) > 1)
                        <div class="carousel-controls mx-auto h-100">
                            <button class="carousel-control-prev banner-contol" type="button"
                                data-bs-target="#carouselFirstBanner" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next banner-contol" type="button"
                                data-bs-target="#carouselFirstBanner" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                            <div class="d-none d-md-block">
                                <ol class="carousel-indicators" style="position: absolute; bottom: 100px;">
                                    @foreach ($images as $key => $image)
                                        <li style="list-style: none;" data-bs-target="#carouselFirstBanner"
                                            data-bs-slide-to="{{ $key }}"
                                            class="{{ $key == 0 ? 'active' : '' }}">
                                        </li>
                                    @endforeach
                                </ol>
                            </div>
                        </div>
                    @endif
                @elseif ($banner['bannerType'] === 'Слайд-шоу Flex L black')
                    @if (count($images) > 1)
                        <div class="carousel-controls mx-auto h-100">
                            <button class="carousel-control-prev banner-contol" type="button"
                                data-bs-target="#carouselFirstBanner" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next banner-contol" type="button"
                                data-bs-target="#carouselFirstBanner" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                            <div class="d-none d-md-block">
                                <ol class="carousel-indicators" style="position: absolute; bottom: 100px;">
                                    @foreach ($images as $key => $image)
                                        <li style="list-style: none;" data-bs-target="#carouselFirstBanner"
                                            data-bs-slide-to="{{ $key }}"
                                            class="{{ $key == 0 ? 'active' : '' }}">
                                        </li>
                                    @endforeach
                                </ol>
                            </div>
                        </div>
                    @endif
                @elseif ($banner['bannerType'] === 'Повідомлення Flex М white')
                    @if (count($images) > 2)
                        <div class="carousel-controls mx-auto h-100">
                            <button class="carousel-control-prev banner-contol" type="button"
                                data-bs-target="#carouselFirstBanner" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next banner-contol" type="button"
                                data-bs-target="#carouselFirstBanner" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                            <div class="d-none d-md-block">
                                <ol class="carousel-indicators" style="position: absolute; bottom: -10px;">
                                    @for ($i = 0; $i < count($images) / 2; $i++)
                                        <li style="list-style: none;" data-bs-target="#carouselFirstBanner"
                                            data-bs-slide-to="{{ $i }}"
                                            class="{{ $i == 0 ? 'active' : '' }}">
                                        </li>
                                    @endfor
                                </ol>
                            </div>
                        </div>
                    @endif
                @elseif ($banner['bannerType'] === 'Повідомлення Flex М black')
                    @if (count($images) > 2)
                        <div class="carousel-controls mx-auto h-100">
                            <button class="carousel-control-prev banner-contol" type="button"
                                data-bs-target="#carouselFirstBanner" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next banner-contol" type="button"
                                data-bs-target="#carouselFirstBanner" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                            <div class="d-none d-md-block">
                                <ol class="carousel-indicators" style="position: absolute; bottom: -10px;">
                                    @for ($i = 0; $i < count($images) / 2; $i++)
                                        <li style="list-style: none;" data-bs-target="#carouselFirstBanner"
                                            data-bs-slide-to="{{ $i }}"
                                            class="{{ $i == 0 ? 'active' : '' }}">
                                        </li>
                                    @endfor
                                </ol>
                            </div>
                        </div>
                    @endif
                @endif
            @else
            @endif
        </div>
        <div class="content__container-plus mx-auto pt-2">
            @if ($topicNameData['is_visible'] === true)
                <div class="theme">
                    <h2>{{ $topicNameData['name'] }}</h2>
                </div>
            @endif
            <h1 class="border-bottom mb-3 pb-3 px-xl-0 text-center smoothie title-block">{{ $data['title'] }}</h1>
        </div>
        @if ($data['imageSize'] === true)
            <div class="content__container mx-auto">
                <img class="img-fluid w-100 pb-1 object-fit-cover" style="min-height: 400px;"
                    src="{{ $data['mainImage'] }}" alt="{{ $data['mainImgDesc'] }}">
                <div class="title-block" style="padding: 0 20px;">
                    <figcaption>{{ $data['mainImgDesc'] . ' - ' . $data['mainImgAuthor'] }}</figcaption>
                </div>
            </div>
        @else
            <div class="container px-0">
                <img class="img-fluid w-100 object-fit-cover" style="min-height: 400px;" src="{{ $data['mainImage'] }}"
                    alt="{{ $data['mainImgDesc'] }}">
                <div class="title-block" style="padding: 0 20px;">
                    <figcaption>{{ $data['mainImgDesc'] . ' - ' . $data['mainImgAuthor'] }}</figcaption>
                </div>
            </div>
        @endif
    @elseif ($data['postType'] === 'Публікація Premium')
        <img class="img-fluid object-fit-cover" src="{{ $data['mainImage'] }}" alt="{{ $data['mainImgDesc'] }}">
        <figcaption class="title-block">{{ $data['mainImgDesc'] . ' - ' . $data['mainImgAuthor'] }}</figcaption>
        <div class="title-container title-block">
            <div class="">
                @if ($topicNameData['is_visible'] === true)
                    <div class="premium-theme">
                        <h2>{{ $topicNameData['name'] }}</h2>
                    </div>
                @endif
                <h1 class="">{{ $data['title'] }}</h1>
                @if ($data['showDesc'] === true)
                    <h2 class="mb-3">{{ $data['desc'] }}</h2>
                @endif
            </div>
        </div>
    @elseif ($data['postType'] === 'Публікація Premium white')
        <div class="d-xl-flex border-bottom">
            <div
                class="pb-4 pb-xl-0 pt-4 pt-xl-0 col-xl-6 d-flex flex-column text-center items-center justify-content-center align-items-center text-black">
                @if ($topicNameData['is_visible'] === true)
                    <div class="premium-theme">
                        <h2>{{ $topicNameData['name'] }}</h2>
                    </div>
                @endif
                <h1 class="" style="max-width: 760px; padding: 0 20px;">{{ $data['title'] }}</h1>
                @if ($data['showDesc'] === true)
                    <h2 class="" style="max-width: 760px; padding: 0 20px;">{{ $data['desc'] }}</h2>
                @endif
            </div>
            <div class="col-xl-6">
                <img class="object-fit-cover" src="{{ $data['mainImage'] }}" alt="{{ $data['mainImgDesc'] }}">
            </div>
        </div>
        <figcaption class="title-block text-end">{{ $data['mainImgDesc'] . ' - ' . $data['mainImgAuthor'] }}
        </figcaption>
    @elseif ($data['postType'] === 'Публікація Premium black')
        <div class="d-xl-flex border-bottom" style="border-color: white;">
            <div
                class="pb-4 pb-xl-0 pt-4 pt-xl-0 col-xl-6 d-flex flex-column text-center items-center justify-content-center align-items-center text-white bg-black">
                @if ($topicNameData['is_visible'] === true)
                    <div class="premium-theme">
                        <h2>{{ $topicNameData['name'] }}</h2>
                    </div>
                @endif
                <h1 class="" style="max-width: 760px; padding: 0 20px;">{{ $data['title'] }}</h1>
                @if ($data['showDesc'] === true)
                    <h2 class="" style="max-width: 760px; padding: 0 20px;">{{ $data['desc'] }}</h2>
                @endif
            </div>
            <div class="col-xl-6">
                <img class="object-fit-cover" src="{{ $data['mainImage'] }}" alt="{{ $data['mainImgDesc'] }}">
            </div>
        </div>
        <figcaption class="title-block text-end">{{ $data['mainImgDesc'] . ' - ' . $data['mainImgAuthor'] }}
        </figcaption>
    @endif
    </div>
    <div class="container px-0 mb-4">
        <div class="wrapper__content mx-auto pb-4">
            <div class="content__container mx-auto mt-4">
                <div class="avatar__container pt-4" style="margin: 0 20px;">
                    <div class="d-flex gap-4 align-items-center">
                        <div class="avatar-container">
                            <img class="avatar" src="{{ $userData['avatarUrl'] }}"
                                alt="Фото {{ $userData['nickName'] }}">
                        </div>
                        <p class="user" style="font-size: 14px; line-height: 16px;">
                            {{ $userData['nickName'] }}
                        </p>
                    </div>
                </div>
                <div class="content mb-4" id="showMoreMainContent" style="max-height: 300px; overflow: hidden;">
                    {!! $data['content'] !!}
                </div>
                <div class="d-flex justify-content-center align-items-center">
                    <button class="btn show-more-btn" onclick="toggleMainContent()">ПОКАЗАТИ
                        БІЛЬШЕ</button>
                </div>
            </div>
        </div>
        <div class="content__container mx-auto mt-4">
            <div class="articles">
                @foreach ($topicData as $index => $article)
                    <div class="avatar__container pt-4" style="margin: 0 20px;">
                        <div class="d-flex gap-4 align-items-center">
                            <div class="avatar-container">
                                <img class="avatar" src="{{ $article['User']['avatarUrl'] }}"
                                    alt="Фото {{ $article['User']['nickName'] }}">
                            </div>
                            <div class="user" style="font-size: 14px; line-height: 16px;">
                                <div class="mb-1" style="color: #FECB04;">
                                    {{ \Carbon\Carbon::parse($article['publishedAt'])->subHours(3)->locale('uk')->diffForHumans() }}
                                </div>
                                <div class="">
                                    {{ $article['User']['nickName'] }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <article>
                        <div class="content mb-4" id="showMoreContent{{ $index }}"
                            style="max-height: 700px; overflow: hidden;">
                            <a href="{{ $article['url'] }}">
                                <h2>{{ $article['title'] }}</h2>
                            </a>
                            <img src="{{ $article['mainImage'] }}" alt="Главное изображение">
                            {!! $article['content'] !!}
                        </div>
                        <div class="d-flex justify-content-center align-items-center">
                            <button id="showMoreButton{{ $index }}" class="btn show-more-btn" onclick="toggleContent('{{ $index }}')">ПОКАЗАТИ
                                БІЛЬШЕ</button>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
        <div class="content__container mx-auto mt-4">
            <div class="content">
                @if ($data['showAuthor'] == true)
                    <h4>{{ $userData['nickName'] }} {{ $data['showAuthorDesc'] ? ' - ' . $userData['descUser'] : '' }}
                    </h4>
                @endif
                @php
                    $updatedDate = \Carbon\Carbon::parse($data['updatedAt']);
                    $createdDate = \Carbon\Carbon::parse($data['createdAt']);
                    $updatedDate = \Carbon\Carbon::parse($data['updatedAt']);
                @endphp
                <h4>
                    Цей матеріал опубліковано
                    {{ \Carbon\Carbon::parse($data['publishedAt'])->locale('uk')->isoFormat('D.MM.YYYY') }} року,
                    {{ $updatedDate->equalTo($createdDate) ? 'оновлення відсутні' : 'оновлення ' . $updatedDate->isoFormat('D.MM.YYYY') }},
                    розділ {{ $data['section'] }}, із заголовком: {{ $data['title'] }}. | <a class="under"
                        href="{{ route('news-today.index') }}">Сьогоднішня
                        газета</a> | <a class="under" href="{{ route('news.line') }}">Стрічка новин</a> | <a
                        class="under" href="#">Підпишіться</a>
                </h4>
            </div>
        </div>
    </div>
    {{-- Блок №2 Публікації --}}
    @if (
        $data['postType'] !== 'Публікація Premium' &&
            $data['postType'] !== 'Публікація Premium black' &&
            $data['postType'] !== 'Публікація Premium white')
        <div class="mb-2">
            <div class="banner__container mx-auto border-top border-bottom py-1 text-center"
                style="color: rgb(107 114 128); font-size: 12px; line-height: 12px; font-weight: 300;">
                ОГОЛОШЕННЯ
            </div>
            @php
                $blockType = 'Блок №2 Публікації';
                $banner = $dataBanners[$blockType] ?? null;
            @endphp
            @if ($banner)
                @php
                    $images = json_decode($banner['images']);
                    $headlines = json_decode($banner['headlines']);
                    $descriptions = json_decode($banner['descriptions']);
                    $advertiserLinks = json_decode($banner['advertiserLinks']);
                @endphp
                @if ($banner['bannerType'] === 'Слайд-шоу Flex L white')
                    <div class="banner__container mx-auto text-center position-relative"
                        style="background-color: #EBEBEB;">
                        <div class="second-banner__carousel pb-4 mb-4">
                            <div id="carouselSecondBanner" class="carousel slide carousel-dark mx-auto"
                                style="max-width: 1200px;">
                                <div class="carousel-inner mx-auto" style="max-width: 1200px; width: 100%;">
                                    @foreach ($images as $key => $image)
                                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                            <div class="d-md-none" style="min-height: auto; background-color: #fff;">
                                                <img style="max-width: 1200px; width: 100%; height: auto; object-fit: contain;"
                                                    src="{{ $image }}" class="d-block w-100" alt="Banner Image">
                                                <div class="position-relative" style="padding: 20px;">
                                                    <div class="text-start">
                                                        @if (isset($headlines[$key]))
                                                            <h3
                                                                style="font-weight: 500; font-size: 20px; line-height: 24px; color: black;">
                                                                {{ $headlines[$key] }}</h3>
                                                        @endif
                                                        @if (isset($descriptions[$key]))
                                                            <p
                                                                style="font-size: 14px; line-height: 16px; color: black; margin-top: 10px;">
                                                                {{ $descriptions[$key] }}</p>
                                                        @endif
                                                        @if (isset($advertiserLinks[$key]))
                                                            <div class="">
                                                                <a class="white-banner__link" target="_blank"
                                                                    href="{{ $advertiserLinks[$key] }}">Переглянути</a>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-none d-md-block">
                                                <img style="max-width: 1200px; max-height: 600px; width: 100%; min-height: 600px; height: 100%; object-fit: cover;"
                                                    src="{{ $image }}" class="d-block w-100" alt="Banner Image">
                                                <div class="glassmorphism-parent position-absolute w-100 d-none d-md-block"
                                                    style="height: 110px; bottom: 0;">
                                                    <div class="d-md-flex align-items-center justify-content-between gap-4 w-100 h-100"
                                                        style="padding: 10px 30px; position: absolute; bottom: 0; max-width: 1200px; max-height: 110px;">
                                                        <div class="d-flex flex-column text-start">
                                                            @if (isset($headlines[$key]))
                                                                <h3 style="font-weight: 500; font-size: 20px; line-height: 24px; color: black;"
                                                                    class="w-100">
                                                                    {{ $headlines[$key] }}</h3>
                                                            @endif
                                                            @if (isset($descriptions[$key]))
                                                                <p style="font-size: 14px; line-height: 16px; color: black; margin: 0;"
                                                                    class="w-100">
                                                                    {{ $descriptions[$key] }}</p>
                                                            @endif
                                                        </div>
                                                        @if (isset($advertiserLinks[$key]))
                                                            <div class="ml-auto text-start">
                                                                <a class="white-banner__link" target="_blank"
                                                                    href="{{ $advertiserLinks[$key] }}">Переглянути</a>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @elseif ($banner['bannerType'] === 'Слайд-шоу Flex L black')
                                <div class="banner__container mx-auto text-center position-relative"
                                    style="background-color: #EBEBEB;">
                                    <div class="second-banner__carousel pb-4 mb-4">
                                        <div id="carouselSecondBanner" class="carousel slide mx-auto"
                                            style="max-width: 1200px;">
                                            <div class="carousel-inner mx-auto" style="max-width: 1200px; width: 100%;">
                                                @foreach ($images as $key => $image)
                                                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                                        <div class="d-md-none"
                                                            style="min-height: auto; background-color: #000;">
                                                            <img style="max-width: 1200px; width: 100%; height: auto; object-fit: contain;"
                                                                src="{{ $image }}" class="d-block w-100"
                                                                alt="Banner Image">
                                                            <div class="position-relative" style="padding: 20px;">
                                                                <div class="text-start text-white">
                                                                    @if (isset($headlines[$key]))
                                                                        <h3
                                                                            style="font-weight: 500; font-size: 20px; line-height: 24px;">
                                                                            {{ $headlines[$key] }}</h3>
                                                                    @endif
                                                                    @if (isset($descriptions[$key]))
                                                                        <p
                                                                            style="font-size: 14px; line-height: 16px; color: #fff; margin-top: 10px;">
                                                                            {{ $descriptions[$key] }}</p>
                                                                    @endif
                                                                    @if (isset($advertiserLinks[$key]))
                                                                        <div class="">
                                                                            <a class="black-banner__link" target="_blank"
                                                                                href="{{ $advertiserLinks[$key] }}">Переглянути</a>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="d-none d-md-block" style="background-color: #000;">
                                                            <img style="max-width: 1200px; max-height: 600px; width: 100%; min-height: 600px; height: 100%; object-fit: cover;"
                                                                src="{{ $image }}" class="d-block w-100"
                                                                alt="Banner Image">
                                                            <div class="glassmorphism-b-parent position-absolute w-100 d-none d-md-block"
                                                                style="height: 110px; bottom: 0;">
                                                                <div class="d-md-flex align-items-center justify-content-between gap-4 w-100 h-100"
                                                                    style="padding: 10px 30px; position: absolute; bottom: 0; max-width: 1200px; max-height: 110px;">
                                                                    <div class="d-flex flex-column text-start text-white">
                                                                        @if (isset($headlines[$key]))
                                                                            <h3 style="font-weight: 500; font-size: 20px; line-height: 24px;"
                                                                                class="w-100">
                                                                                {{ $headlines[$key] }}</h3>
                                                                        @endif
                                                                        @if (isset($descriptions[$key]))
                                                                            <p style="font-size: 14px; line-height: 16px; color: #fff; margin: 0;"
                                                                                class="w-100">
                                                                                {{ $descriptions[$key] }}</p>
                                                                        @endif
                                                                    </div>
                                                                    @if (isset($advertiserLinks[$key]))
                                                                        <div class="ml-auto text-start">
                                                                            <a class="black-banner__link" target="_blank"
                                                                                href="{{ $advertiserLinks[$key] }}">Переглянути</a>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @elseif ($banner['bannerType'] === 'Повідомлення Flex М white')
                                            <div class="banner__container mx-auto text-center position-relative"
                                                style="background-color: #EBEBEB;">
                                                <div class="second-banner__carousel pb-4 mb-4">
                                                    <div id="carouselSecondBanner"
                                                        class="carousel slide carousel-dark mx-auto">
                                                        <div class="carousel-inner mx-auto"
                                                            style="max-width: 1920px; width: 100%;">
                                                            @for ($i = 0; $i < count($images); $i += 2)
                                                                @php
                                                                    $headlineIndex = ($i / 2) % count($headlines);
                                                                    $descriptionIndex = ($i / 2) % count($descriptions);
                                                                    $linkIndex = ($i / 2) % count($advertiserLinks);
                                                                    $headline = isset($headlines[$headlineIndex])
                                                                        ? $headlines[$headlineIndex]
                                                                        : '';
                                                                    $description = isset(
                                                                        $descriptions[$descriptionIndex],
                                                                    )
                                                                        ? $descriptions[$descriptionIndex]
                                                                        : '';
                                                                    $link = isset($advertiserLinks[$linkIndex])
                                                                        ? $advertiserLinks[$linkIndex]
                                                                        : '';
                                                                @endphp
                                                                <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
                                                                    <div
                                                                        class="d-md-flex align-items-center h-100 limiting-container">
                                                                        @if ($i < count($images))
                                                                            <div class="text-center lim-img"
                                                                                style="flex: 0 0 33.33%;">
                                                                                <img class="img-size"
                                                                                    style="width: 100%; object-fit: cover; height: 100%;"
                                                                                    src="{{ $images[$i] }}"
                                                                                    alt="Banner Image">
                                                                            </div>
                                                                        @endif
                                                                        <div class="d-flex flex-column justify-content-center text-md-start lim-content"
                                                                            style="background-color: #fff; flex: 0 0 33.33%; height: 100%;">
                                                                            <div class=""
                                                                                style="flex-grow: 7; display: flex; flex-direction: column; justify-content: center;">
                                                                                @if ($headline)
                                                                                    <h3
                                                                                        style="font-weight: 500; font-size: 20px; line-height: 24px; color: black;">
                                                                                        {{ $headline }}</h3>
                                                                                @endif
                                                                                @if ($description)
                                                                                    <p
                                                                                        style="font-size: 14px; line-height: 16px; color: black; margin-top: 10px;">
                                                                                        {{ $description }}</p>
                                                                                @endif
                                                                            </div>
                                                                            @if ($link)
                                                                                <div class="" style="flex-grow: 3;">
                                                                                    <a class="white-banner__link"
                                                                                        target="_blank"
                                                                                        href="{{ $link }}">Переглянути</a>
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                        @if ($i + 1 < count($images))
                                                                            <div class="text-center lim-img"
                                                                                style="flex: 0 0 33.33%;">
                                                                                <img class="img-size"
                                                                                    style="width: 100%; object-fit: cover; height: 100%;"
                                                                                    src="{{ $images[$i + 1] }}"
                                                                                    alt="Banner Image">
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            @endfor
                                                        </div>
                                                    @elseif ($banner['bannerType'] === 'Повідомлення Flex М black')
                                                        <div class="banner__container mx-auto text-center position-relative"
                                                            style="background-color: #EBEBEB;">
                                                            <div class="second-banner__carousel pb-4 mb-4">
                                                                <div id="carouselSecondBanner"
                                                                    class="carousel slide carousel mx-auto">
                                                                    <div class="carousel-inner mx-auto"
                                                                        style="max-width: 1920px; width: 100%;">
                                                                        @for ($i = 0; $i < count($images); $i += 2)
                                                                            @php
                                                                                $headlineIndex =
                                                                                    ($i / 2) % count($headlines);
                                                                                $descriptionIndex =
                                                                                    ($i / 2) % count($descriptions);
                                                                                $linkIndex =
                                                                                    ($i / 2) % count($advertiserLinks);
                                                                                $headline = isset(
                                                                                    $headlines[$headlineIndex],
                                                                                )
                                                                                    ? $headlines[$headlineIndex]
                                                                                    : '';
                                                                                $description = isset(
                                                                                    $descriptions[$descriptionIndex],
                                                                                )
                                                                                    ? $descriptions[$descriptionIndex]
                                                                                    : '';
                                                                                $link = isset(
                                                                                    $advertiserLinks[$linkIndex],
                                                                                )
                                                                                    ? $advertiserLinks[$linkIndex]
                                                                                    : '';
                                                                            @endphp
                                                                            <div
                                                                                class="carousel-item {{ $i == 0 ? 'active' : '' }}">
                                                                                <div
                                                                                    class="d-md-flex align-items-center h-100 limiting-container">
                                                                                    @if ($i < count($images))
                                                                                        <div class="text-center lim-img"
                                                                                            style="flex: 0 0 33.33%;">
                                                                                            <img class="img-size"
                                                                                                style="width: 100%; object-fit: cover; height: 100%;"
                                                                                                src="{{ $images[$i] }}"
                                                                                                alt="Banner Image">
                                                                                        </div>
                                                                                    @endif
                                                                                    <div class="d-flex flex-column justify-content-center text-md-start lim-content"
                                                                                        style="background-color: #000; flex: 0 0 33.33%; height: 100%;">
                                                                                        <div class=""
                                                                                            style="flex-grow: 7; display: flex; flex-direction: column; justify-content: center;">
                                                                                            @if ($headline)
                                                                                                <h3
                                                                                                    style="font-weight: 500; font-size: 20px; line-height: 24px; color: white;">
                                                                                                    {{ $headline }}
                                                                                                </h3>
                                                                                            @endif
                                                                                            @if ($description)
                                                                                                <p
                                                                                                    style="font-size: 14px; line-height: 16px; color: white; margin-top: 10px;">
                                                                                                    {{ $description }}
                                                                                                </p>
                                                                                            @endif
                                                                                        </div>
                                                                                        @if ($link)
                                                                                            <div class=""
                                                                                                style="flex-grow: 3;">
                                                                                                <div class="">
                                                                                                    <a class="black-m-banner__link"
                                                                                                        target="_blank"
                                                                                                        href="{{ $link }}">Переглянути</a>
                                                                                                </div>
                                                                                            </div>
                                                                                        @endif
                                                                                    </div>
                                                                                    @if ($i + 1 < count($images))
                                                                                        <div class="text-center lim-img"
                                                                                            style="flex: 0 0 33.33%;">
                                                                                            <img class="img-size"
                                                                                                style="width: 100%; object-fit: cover; height: 100%;"
                                                                                                src="{{ $images[$i + 1] }}"
                                                                                                alt="Banner Image">
                                                                                        </div>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                        @endfor
                                                                    </div>
                                                                @else
                @endif
            @endif
            @if ($banner)
                @if ($banner['bannerType'] === 'Слайд-шоу Flex L white')
                    @if (count($images) > 1)
                        <div class="carousel-controls mx-auto h-100">
                            <button class="carousel-control-prev banner-contol" type="button"
                                data-bs-target="#carouselSecondBanner" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next banner-contol" type="button"
                                data-bs-target="#carouselSecondBanner" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                            <div class="d-none d-md-block">
                                <ol class="carousel-indicators" style="position: absolute; bottom: 100px;">
                                    @foreach ($images as $key => $image)
                                        <li style="list-style: none;" data-bs-target="#carouselSecondBanner"
                                            data-bs-slide-to="{{ $key }}"
                                            class="{{ $key == 0 ? 'active' : '' }}">
                                        </li>
                                    @endforeach
                                </ol>
                            </div>
                        </div>
                    @endif
                @elseif ($banner['bannerType'] === 'Слайд-шоу Flex L black')
                    @if (count($images) > 1)
                        <div class="carousel-controls mx-auto h-100">
                            <button class="carousel-control-prev banner-contol" type="button"
                                data-bs-target="#carouselSecondBanner" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next banner-contol" type="button"
                                data-bs-target="#carouselSecondBanner" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                            <div class="d-none d-md-block">
                                <ol class="carousel-indicators" style="position: absolute; bottom: 100px;">
                                    @foreach ($images as $key => $image)
                                        <li style="list-style: none;" data-bs-target="#carouselSecondBanner"
                                            data-bs-slide-to="{{ $key }}"
                                            class="{{ $key == 0 ? 'active' : '' }}">
                                        </li>
                                    @endforeach
                                </ol>
                            </div>
                        </div>
                    @endif
                @elseif ($banner['bannerType'] === 'Повідомлення Flex М white')
                    @if (count($images) > 2)
                        <div class="carousel-controls mx-auto h-100">
                            <button class="carousel-control-prev banner-contol" type="button"
                                data-bs-target="#carouselSecondBanner" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next banner-contol" type="button"
                                data-bs-target="#carouselSecondBanner" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                            <div class="d-none d-md-block">
                                <ol class="carousel-indicators" style="position: absolute; bottom: -10px;">
                                    @for ($i = 0; $i < count($images) / 2; $i++)
                                        <li style="list-style: none;" data-bs-target="#carouselSecondBanner"
                                            data-bs-slide-to="{{ $i }}"
                                            class="{{ $i == 0 ? 'active' : '' }}">
                                        </li>
                                    @endfor
                                </ol>
                            </div>
                        </div>
                    @endif
                @elseif ($banner['bannerType'] === 'Повідомлення Flex М black')
                    @if (count($images) > 2)
                        <div class="carousel-controls mx-auto h-100">
                            <button class="carousel-control-prev banner-contol" type="button"
                                data-bs-target="#carouselSecondBanner" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next banner-contol" type="button"
                                data-bs-target="#carouselSecondBanner" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                            <div class="d-none d-md-block">
                                <ol class="carousel-indicators" style="position: absolute; bottom: -10px;">
                                    @for ($i = 0; $i < count($images) / 2; $i++)
                                        <li style="list-style: none;" data-bs-target="#carouselSecondBanner"
                                            data-bs-slide-to="{{ $i }}"
                                            class="{{ $i == 0 ? 'active' : '' }}">
                                        </li>
                                    @endfor
                                </ol>
                            </div>
                        </div>
                    @endif
                @endif
            @else
            @endif
        </div>
        </div>
        </div>
    @endif
@else
    <div
        class="{{ $data['postType'] === 'Публікація Premium' ? 'content-preview__container' : '' }} {{ $data['postType'] === 'Публікація Premium black' || $data['postType'] === 'Публікація Premium white' ? 'content-preview-full__container' : '' }} mx-auto px-0">
        @if ($data['postType'] === 'Вільна публікація')
            <div class="mb-2">
                <div class="banner__container mx-auto border-top border-bottom py-1 text-center"
                    style="color: rgb(107 114 128); font-size: 12px; line-height: 12px; font-weight: 300;">
                    ОГОЛОШЕННЯ
                </div>
                @php
                    $blockType = 'Блок №1 Публікації';
                    $banner = $dataBanners[$blockType] ?? null;
                @endphp
                @if ($banner)
                    @php
                        $images = json_decode($banner['images']);
                        $headlines = json_decode($banner['headlines']);
                        $descriptions = json_decode($banner['descriptions']);
                        $advertiserLinks = json_decode($banner['advertiserLinks']);
                    @endphp
                    @if ($banner['bannerType'] === 'Слайд-шоу Flex L white')
                        <div class="banner__container mx-auto text-center position-relative"
                            style="background-color: #EBEBEB;">
                            <div class="second-banner__carousel pb-4 mb-4">
                                <div id="carouselFirstBanner" class="carousel slide carousel-dark mx-auto"
                                    style="max-width: 1200px;">
                                    <div class="carousel-inner mx-auto" style="max-width: 1200px; width: 100%;">
                                        @foreach ($images as $key => $image)
                                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                                <div class="d-md-none" style="min-height: auto; background-color: #fff;">
                                                    <img style="max-width: 1200px; width: 100%; height: auto; object-fit: contain;"
                                                        src="{{ $image }}" class="d-block w-100"
                                                        alt="Banner Image">
                                                    <div class="position-relative" style="padding: 20px;">
                                                        <div class="text-start">
                                                            @if (isset($headlines[$key]))
                                                                <h3
                                                                    style="font-weight: 500; font-size: 20px; line-height: 24px; color: black;">
                                                                    {{ $headlines[$key] }}</h3>
                                                            @endif
                                                            @if (isset($descriptions[$key]))
                                                                <p
                                                                    style="font-size: 14px; line-height: 16px; color: black; margin-top: 10px;">
                                                                    {{ $descriptions[$key] }}</p>
                                                            @endif
                                                            @if (isset($advertiserLinks[$key]))
                                                                <div class="">
                                                                    <a class="white-banner__link" target="_blank"
                                                                        href="{{ $advertiserLinks[$key] }}">Переглянути</a>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-none d-md-block">
                                                    <img style="max-width: 1200px; max-height: 600px; width: 100%; min-height: 600px; height: 100%; object-fit: cover;"
                                                        src="{{ $image }}" class="d-block w-100"
                                                        alt="Banner Image">
                                                    <div class="glassmorphism-parent position-absolute w-100 d-none d-md-block"
                                                        style="height: 110px; bottom: 0;">
                                                        <div class="d-md-flex align-items-center justify-content-between gap-4 w-100 h-100"
                                                            style="padding: 10px 30px; position: absolute; bottom: 0; max-width: 1200px; max-height: 110px;">
                                                            <div class="d-flex flex-column text-start">
                                                                @if (isset($headlines[$key]))
                                                                    <h3 style="font-weight: 500; font-size: 20px; line-height: 24px; color: black;"
                                                                        class="w-100">
                                                                        {{ $headlines[$key] }}</h3>
                                                                @endif
                                                                @if (isset($descriptions[$key]))
                                                                    <p style="font-size: 14px; line-height: 16px; color: black; margin: 0;"
                                                                        class="w-100">
                                                                        {{ $descriptions[$key] }}</p>
                                                                @endif
                                                            </div>
                                                            @if (isset($advertiserLinks[$key]))
                                                                <div class="ml-auto text-start">
                                                                    <a class="white-banner__link" target="_blank"
                                                                        href="{{ $advertiserLinks[$key] }}">Переглянути</a>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @elseif ($banner['bannerType'] === 'Слайд-шоу Flex L black')
                                    <div class="banner__container mx-auto text-center position-relative"
                                        style="background-color: #EBEBEB;">
                                        <div class="second-banner__carousel pb-4 mb-4">
                                            <div id="carouselFirstBanner" class="carousel slide mx-auto"
                                                style="max-width: 1200px;">
                                                <div class="carousel-inner mx-auto"
                                                    style="max-width: 1200px; width: 100%;">
                                                    @foreach ($images as $key => $image)
                                                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                                            <div class="d-md-none"
                                                                style="min-height: auto; background-color: #000;">
                                                                <img style="max-width: 1200px; width: 100%; height: auto; object-fit: contain;"
                                                                    src="{{ $image }}" class="d-block w-100"
                                                                    alt="Banner Image">
                                                                <div class="position-relative" style="padding: 20px;">
                                                                    <div class="text-start text-white">
                                                                        @if (isset($headlines[$key]))
                                                                            <h3
                                                                                style="font-weight: 500; font-size: 20px; line-height: 24px;">
                                                                                {{ $headlines[$key] }}</h3>
                                                                        @endif
                                                                        @if (isset($descriptions[$key]))
                                                                            <p
                                                                                style="font-size: 14px; line-height: 16px; color: #fff; margin-top: 10px;">
                                                                                {{ $descriptions[$key] }}</p>
                                                                        @endif
                                                                        @if (isset($advertiserLinks[$key]))
                                                                            <div class="">
                                                                                <a class="black-banner__link"
                                                                                    target="_blank"
                                                                                    href="{{ $advertiserLinks[$key] }}">Переглянути</a>
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="d-none d-md-block"
                                                                style="background-color: #000;">
                                                                <img style="max-width: 1200px; max-height: 600px; width: 100%; min-height: 600px; height: 100%; object-fit: cover;"
                                                                    src="{{ $image }}" class="d-block w-100"
                                                                    alt="Banner Image">
                                                                <div class="glassmorphism-b-parent position-absolute w-100 d-none d-md-block"
                                                                    style="height: 110px; bottom: 0;">
                                                                    <div class="d-md-flex align-items-center justify-content-between gap-4 w-100 h-100"
                                                                        style="padding: 10px 30px; position: absolute; bottom: 0; max-width: 1200px; max-height: 110px;">
                                                                        <div
                                                                            class="d-flex flex-column text-start text-white">
                                                                            @if (isset($headlines[$key]))
                                                                                <h3 style="font-weight: 500; font-size: 20px; line-height: 24px;"
                                                                                    class="w-100">
                                                                                    {{ $headlines[$key] }}</h3>
                                                                            @endif
                                                                            @if (isset($descriptions[$key]))
                                                                                <p style="font-size: 14px; line-height: 16px; color: #fff; margin: 0;"
                                                                                    class="w-100">
                                                                                    {{ $descriptions[$key] }}</p>
                                                                            @endif
                                                                        </div>
                                                                        @if (isset($advertiserLinks[$key]))
                                                                            <div class="ml-auto text-start">
                                                                                <a class="black-banner__link"
                                                                                    target="_blank"
                                                                                    href="{{ $advertiserLinks[$key] }}">Переглянути</a>
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @elseif ($banner['bannerType'] === 'Повідомлення Flex М white')
                                                <div class="banner__container mx-auto text-center position-relative"
                                                    style="background-color: #EBEBEB;">
                                                    <div class="second-banner__carousel pb-4 mb-4">
                                                        <div id="carouselFirstBanner"
                                                            class="carousel slide carousel-dark mx-auto">
                                                            <div class="carousel-inner mx-auto"
                                                                style="max-width: 1920px; width: 100%;">
                                                                @for ($i = 0; $i < count($images); $i += 2)
                                                                    @php
                                                                        $headlineIndex = ($i / 2) % count($headlines);
                                                                        $descriptionIndex =
                                                                            ($i / 2) % count($descriptions);
                                                                        $linkIndex = ($i / 2) % count($advertiserLinks);
                                                                        $headline = isset($headlines[$headlineIndex])
                                                                            ? $headlines[$headlineIndex]
                                                                            : '';
                                                                        $description = isset(
                                                                            $descriptions[$descriptionIndex],
                                                                        )
                                                                            ? $descriptions[$descriptionIndex]
                                                                            : '';
                                                                        $link = isset($advertiserLinks[$linkIndex])
                                                                            ? $advertiserLinks[$linkIndex]
                                                                            : '';
                                                                    @endphp
                                                                    <div
                                                                        class="carousel-item {{ $i == 0 ? 'active' : '' }}">
                                                                        <div
                                                                            class="d-md-flex align-items-center h-100 limiting-container">
                                                                            @if ($i < count($images))
                                                                                <div class="text-center lim-img"
                                                                                    style="flex: 0 0 33.33%;">
                                                                                    <img class="img-size"
                                                                                        style="width: 100%; object-fit: cover; height: 100%;"
                                                                                        src="{{ $images[$i] }}"
                                                                                        alt="Banner Image">
                                                                                </div>
                                                                            @endif
                                                                            <div class="d-flex flex-column justify-content-center text-md-start lim-content"
                                                                                style="background-color: #fff; flex: 0 0 33.33%; height: 100%;">
                                                                                <div class=""
                                                                                    style="flex-grow: 7; display: flex; flex-direction: column; justify-content: center;">
                                                                                    @if ($headline)
                                                                                        <h3
                                                                                            style="font-weight: 500; font-size: 20px; line-height: 24px; color: black;">
                                                                                            {{ $headline }}</h3>
                                                                                    @endif
                                                                                    @if ($description)
                                                                                        <p
                                                                                            style="font-size: 14px; line-height: 16px; color: black; margin-top: 10px;">
                                                                                            {{ $description }}</p>
                                                                                    @endif
                                                                                </div>
                                                                                @if ($link)
                                                                                    <div class=""
                                                                                        style="flex-grow: 3;">
                                                                                        <a class="white-banner__link"
                                                                                            target="_blank"
                                                                                            href="{{ $link }}">Переглянути</a>
                                                                                    </div>
                                                                                @endif
                                                                            </div>
                                                                            @if ($i + 1 < count($images))
                                                                                <div class="text-center lim-img"
                                                                                    style="flex: 0 0 33.33%;">
                                                                                    <img class="img-size"
                                                                                        style="width: 100%; object-fit: cover; height: 100%;"
                                                                                        src="{{ $images[$i + 1] }}"
                                                                                        alt="Banner Image">
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                @endfor
                                                            </div>
                                                        @elseif ($banner['bannerType'] === 'Повідомлення Flex М black')
                                                            <div class="banner__container mx-auto text-center position-relative"
                                                                style="background-color: #EBEBEB;">
                                                                <div class="second-banner__carousel pb-4 mb-4">
                                                                    <div id="carouselFirstBanner"
                                                                        class="carousel slide carousel mx-auto">
                                                                        <div class="carousel-inner mx-auto"
                                                                            style="max-width: 1920px; width: 100%;">
                                                                            @for ($i = 0; $i < count($images); $i += 2)
                                                                                @php
                                                                                    $headlineIndex =
                                                                                        ($i / 2) % count($headlines);
                                                                                    $descriptionIndex =
                                                                                        ($i / 2) % count($descriptions);
                                                                                    $linkIndex =
                                                                                        ($i / 2) %
                                                                                        count($advertiserLinks);
                                                                                    $headline = isset(
                                                                                        $headlines[$headlineIndex],
                                                                                    )
                                                                                        ? $headlines[$headlineIndex]
                                                                                        : '';
                                                                                    $description = isset(
                                                                                        $descriptions[
                                                                                            $descriptionIndex
                                                                                        ],
                                                                                    )
                                                                                        ? $descriptions[
                                                                                            $descriptionIndex
                                                                                        ]
                                                                                        : '';
                                                                                    $link = isset(
                                                                                        $advertiserLinks[$linkIndex],
                                                                                    )
                                                                                        ? $advertiserLinks[$linkIndex]
                                                                                        : '';
                                                                                @endphp
                                                                                <div
                                                                                    class="carousel-item {{ $i == 0 ? 'active' : '' }}">
                                                                                    <div
                                                                                        class="d-md-flex align-items-center h-100 limiting-container">
                                                                                        @if ($i < count($images))
                                                                                            <div class="text-center lim-img"
                                                                                                style="flex: 0 0 33.33%;">
                                                                                                <img class="img-size"
                                                                                                    style="width: 100%; object-fit: cover; height: 100%;"
                                                                                                    src="{{ $images[$i] }}"
                                                                                                    alt="Banner Image">
                                                                                            </div>
                                                                                        @endif
                                                                                        <div class="d-flex flex-column justify-content-center text-md-start lim-content"
                                                                                            style="background-color: #000; flex: 0 0 33.33%; height: 100%;">
                                                                                            <div class=""
                                                                                                style="flex-grow: 7; display: flex; flex-direction: column; justify-content: center;">
                                                                                                @if ($headline)
                                                                                                    <h3
                                                                                                        style="font-weight: 500; font-size: 20px; line-height: 24px; color: white;">
                                                                                                        {{ $headline }}
                                                                                                    </h3>
                                                                                                @endif
                                                                                                @if ($description)
                                                                                                    <p
                                                                                                        style="font-size: 14px; line-height: 16px; color: white; margin-top: 10px;">
                                                                                                        {{ $description }}
                                                                                                    </p>
                                                                                                @endif
                                                                                            </div>
                                                                                            @if ($link)
                                                                                                <div class=""
                                                                                                    style="flex-grow: 3;">
                                                                                                    <div class="">
                                                                                                        <a class="black-m-banner__link"
                                                                                                            target="_blank"
                                                                                                            href="{{ $link }}">Переглянути</a>
                                                                                                    </div>
                                                                                                </div>
                                                                                            @endif
                                                                                        </div>
                                                                                        @if ($i + 1 < count($images))
                                                                                            <div class="text-center lim-img"
                                                                                                style="flex: 0 0 33.33%;">
                                                                                                <img class="img-size"
                                                                                                    style="width: 100%; object-fit: cover; height: 100%;"
                                                                                                    src="{{ $images[$i + 1] }}"
                                                                                                    alt="Banner Image">
                                                                                            </div>
                                                                                        @endif
                                                                                    </div>
                                                                                </div>
                                                                            @endfor
                                                                        </div>
                                                                    @else
                    @endif
                @endif
                @if ($banner)
                    @if ($banner['bannerType'] === 'Слайд-шоу Flex L white')
                        @if (count($images) > 1)
                            <div class="carousel-controls mx-auto h-100">
                                <button class="carousel-control-prev banner-contol" type="button"
                                    data-bs-target="#carouselFirstBanner" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next banner-contol" type="button"
                                    data-bs-target="#carouselFirstBanner" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                                <div class="d-none d-md-block">
                                    <ol class="carousel-indicators" style="position: absolute; bottom: 100px;">
                                        @foreach ($images as $key => $image)
                                            <li style="list-style: none;" data-bs-target="#carouselFirstBanner"
                                                data-bs-slide-to="{{ $key }}"
                                                class="{{ $key == 0 ? 'active' : '' }}">
                                            </li>
                                        @endforeach
                                    </ol>
                                </div>
                            </div>
                        @endif
                    @elseif ($banner['bannerType'] === 'Слайд-шоу Flex L black')
                        @if (count($images) > 1)
                            <div class="carousel-controls mx-auto h-100">
                                <button class="carousel-control-prev banner-contol" type="button"
                                    data-bs-target="#carouselFirstBanner" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next banner-contol" type="button"
                                    data-bs-target="#carouselFirstBanner" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                                <div class="d-none d-md-block">
                                    <ol class="carousel-indicators" style="position: absolute; bottom: 100px;">
                                        @foreach ($images as $key => $image)
                                            <li style="list-style: none;" data-bs-target="#carouselFirstBanner"
                                                data-bs-slide-to="{{ $key }}"
                                                class="{{ $key == 0 ? 'active' : '' }}">
                                            </li>
                                        @endforeach
                                    </ol>
                                </div>
                            </div>
                        @endif
                    @elseif ($banner['bannerType'] === 'Повідомлення Flex М white')
                        @if (count($images) > 2)
                            <div class="carousel-controls mx-auto h-100">
                                <button class="carousel-control-prev banner-contol" type="button"
                                    data-bs-target="#carouselFirstBanner" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next banner-contol" type="button"
                                    data-bs-target="#carouselFirstBanner" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                                <div class="d-none d-md-block">
                                    <ol class="carousel-indicators" style="position: absolute; bottom: -10px;">
                                        @for ($i = 0; $i < count($images) / 2; $i++)
                                            <li style="list-style: none;" data-bs-target="#carouselFirstBanner"
                                                data-bs-slide-to="{{ $i }}"
                                                class="{{ $i == 0 ? 'active' : '' }}">
                                            </li>
                                        @endfor
                                    </ol>
                                </div>
                            </div>
                        @endif
                    @elseif ($banner['bannerType'] === 'Повідомлення Flex М black')
                        @if (count($images) > 2)
                            <div class="carousel-controls mx-auto h-100">
                                <button class="carousel-control-prev banner-contol" type="button"
                                    data-bs-target="#carouselFirstBanner" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next banner-contol" type="button"
                                    data-bs-target="#carouselFirstBanner" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                                <div class="d-none d-md-block">
                                    <ol class="carousel-indicators" style="position: absolute; bottom: -10px;">
                                        @for ($i = 0; $i < count($images) / 2; $i++)
                                            <li style="list-style: none;" data-bs-target="#carouselFirstBanner"
                                                data-bs-slide-to="{{ $i }}"
                                                class="{{ $i == 0 ? 'active' : '' }}">
                                            </li>
                                        @endfor
                                    </ol>
                                </div>
                            </div>
                        @endif
                    @endif
                @else
                @endif
            </div>
    </div>
    </div>
    </div>
    <div class="content__container mx-auto pt-2" style="padding: 0 20px;">
        <h1 class="smoothie">{{ $data['title'] }}</h1>
        @if ($data['showDesc'] === true)
            <h2 class="border-bottom mb-3 pb-3">{{ $data['desc'] }}</h2>
        @endif
    </div>
    @if ($data['imageSize'] === true)
        <div class="content__container mx-auto" style="max-width: 600px;">
            <img class="img-fluid w-100 pb-1 object-fit-cover" style="min-height: 400px;"
                src="{{ $data['mainImage'] }}" alt="{{ $data['mainImgDesc'] }}">
            <figcaption style="padding: 0 20px;">{{ $data['mainImgDesc'] . ' - ' . $data['mainImgAuthor'] }}
            </figcaption>
        </div>
    @else
        <div class="container px-0">
            <img class="img-fluid w-100 object-fit-cover" style="min-height: 400px;" src="{{ $data['mainImage'] }}"
                alt="{{ $data['mainImgDesc'] }}">
            <figcaption style="padding: 0 20px;">{{ $data['mainImgDesc'] . ' - ' . $data['mainImgAuthor'] }}
            </figcaption>
        </div>
    @endif
@elseif ($data['postType'] === 'Вільна публікація +')
    <div class="mb-2">
        <div class="banner__container mx-auto border-top border-bottom py-1 text-center"
            style="color: rgb(107 114 128); font-size: 12px; line-height: 12px; font-weight: 300;">
            ОГОЛОШЕННЯ
        </div>
        @php
            $blockType = 'Блок №1 Публікації';
            $banner = $dataBanners[$blockType] ?? null;
        @endphp
        @if ($banner)
            @php
                $images = json_decode($banner['images']);
                $headlines = json_decode($banner['headlines']);
                $descriptions = json_decode($banner['descriptions']);
                $advertiserLinks = json_decode($banner['advertiserLinks']);
            @endphp
            @if ($banner['bannerType'] === 'Слайд-шоу Flex L white')
                <div class="banner__container mx-auto text-center position-relative" style="background-color: #EBEBEB;">
                    <div class="second-banner__carousel pb-4 mb-4">
                        <div id="carouselFirstBanner" class="carousel slide carousel-dark mx-auto"
                            style="max-width: 1200px;">
                            <div class="carousel-inner mx-auto" style="max-width: 1200px; width: 100%;">
                                @foreach ($images as $key => $image)
                                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                        <div class="d-md-none" style="min-height: auto; background-color: #fff;">
                                            <img style="max-width: 1200px; width: 100%; height: auto; object-fit: contain;"
                                                src="{{ $image }}" class="d-block w-100" alt="Banner Image">
                                            <div class="position-relative" style="padding: 20px;">
                                                <div class="text-start">
                                                    @if (isset($headlines[$key]))
                                                        <h3
                                                            style="font-weight: 500; font-size: 20px; line-height: 24px; color: black;">
                                                            {{ $headlines[$key] }}</h3>
                                                    @endif
                                                    @if (isset($descriptions[$key]))
                                                        <p
                                                            style="font-size: 14px; line-height: 16px; color: black; margin-top: 10px;">
                                                            {{ $descriptions[$key] }}</p>
                                                    @endif
                                                    @if (isset($advertiserLinks[$key]))
                                                        <div class="">
                                                            <a class="white-banner__link" target="_blank"
                                                                href="{{ $advertiserLinks[$key] }}">Переглянути</a>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-none d-md-block">
                                            <img style="max-width: 1200px; max-height: 600px; width: 100%; min-height: 600px; height: 100%; object-fit: cover;"
                                                src="{{ $image }}" class="d-block w-100" alt="Banner Image">
                                            <div class="glassmorphism-parent position-absolute w-100 d-none d-md-block"
                                                style="height: 110px; bottom: 0;">
                                                <div class="d-md-flex align-items-center justify-content-between gap-4 w-100 h-100"
                                                    style="padding: 10px 30px; position: absolute; bottom: 0; max-width: 1200px; max-height: 110px;">
                                                    <div class="d-flex flex-column text-start">
                                                        @if (isset($headlines[$key]))
                                                            <h3 style="font-weight: 500; font-size: 20px; line-height: 24px; color: black;"
                                                                class="w-100">
                                                                {{ $headlines[$key] }}</h3>
                                                        @endif
                                                        @if (isset($descriptions[$key]))
                                                            <p style="font-size: 14px; line-height: 16px; color: black; margin: 0;"
                                                                class="w-100">
                                                                {{ $descriptions[$key] }}</p>
                                                        @endif
                                                    </div>
                                                    @if (isset($advertiserLinks[$key]))
                                                        <div class="ml-auto text-start">
                                                            <a class="white-banner__link" target="_blank"
                                                                href="{{ $advertiserLinks[$key] }}">Переглянути</a>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @elseif ($banner['bannerType'] === 'Слайд-шоу Flex L black')
                            <div class="banner__container mx-auto text-center position-relative"
                                style="background-color: #EBEBEB;">
                                <div class="second-banner__carousel pb-4 mb-4">
                                    <div id="carouselFirstBanner" class="carousel slide mx-auto"
                                        style="max-width: 1200px;">
                                        <div class="carousel-inner mx-auto" style="max-width: 1200px; width: 100%;">
                                            @foreach ($images as $key => $image)
                                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                                    <div class="d-md-none"
                                                        style="min-height: auto; background-color: #000;">
                                                        <img style="max-width: 1200px; width: 100%; height: auto; object-fit: contain;"
                                                            src="{{ $image }}" class="d-block w-100"
                                                            alt="Banner Image">
                                                        <div class="position-relative" style="padding: 20px;">
                                                            <div class="text-start text-white">
                                                                @if (isset($headlines[$key]))
                                                                    <h3
                                                                        style="font-weight: 500; font-size: 20px; line-height: 24px;">
                                                                        {{ $headlines[$key] }}</h3>
                                                                @endif
                                                                @if (isset($descriptions[$key]))
                                                                    <p
                                                                        style="font-size: 14px; line-height: 16px; color: #fff; margin-top: 10px;">
                                                                        {{ $descriptions[$key] }}</p>
                                                                @endif
                                                                @if (isset($advertiserLinks[$key]))
                                                                    <div class="">
                                                                        <a class="black-banner__link" target="_blank"
                                                                            href="{{ $advertiserLinks[$key] }}">Переглянути</a>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-none d-md-block" style="background-color: #000;">
                                                        <img style="max-width: 1200px; max-height: 600px; width: 100%; min-height: 600px; height: 100%; object-fit: cover;"
                                                            src="{{ $image }}" class="d-block w-100"
                                                            alt="Banner Image">
                                                        <div class="glassmorphism-b-parent position-absolute w-100 d-none d-md-block"
                                                            style="height: 110px; bottom: 0;">
                                                            <div class="d-md-flex align-items-center justify-content-between gap-4 w-100 h-100"
                                                                style="padding: 10px 30px; position: absolute; bottom: 0; max-width: 1200px; max-height: 110px;">
                                                                <div class="d-flex flex-column text-start text-white">
                                                                    @if (isset($headlines[$key]))
                                                                        <h3 style="font-weight: 500; font-size: 20px; line-height: 24px;"
                                                                            class="w-100">
                                                                            {{ $headlines[$key] }}</h3>
                                                                    @endif
                                                                    @if (isset($descriptions[$key]))
                                                                        <p style="font-size: 14px; line-height: 16px; color: #fff; margin: 0;"
                                                                            class="w-100">
                                                                            {{ $descriptions[$key] }}</p>
                                                                    @endif
                                                                </div>
                                                                @if (isset($advertiserLinks[$key]))
                                                                    <div class="ml-auto text-start">
                                                                        <a class="black-banner__link" target="_blank"
                                                                            href="{{ $advertiserLinks[$key] }}">Переглянути</a>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @elseif ($banner['bannerType'] === 'Повідомлення Flex М white')
                                        <div class="banner__container mx-auto text-center position-relative"
                                            style="background-color: #EBEBEB;">
                                            <div class="second-banner__carousel pb-4 mb-4">
                                                <div id="carouselFirstBanner"
                                                    class="carousel slide carousel-dark mx-auto">
                                                    <div class="carousel-inner mx-auto"
                                                        style="max-width: 1920px; width: 100%;">
                                                        @for ($i = 0; $i < count($images); $i += 2)
                                                            @php
                                                                $headlineIndex = ($i / 2) % count($headlines);
                                                                $descriptionIndex = ($i / 2) % count($descriptions);
                                                                $linkIndex = ($i / 2) % count($advertiserLinks);
                                                                $headline = isset($headlines[$headlineIndex])
                                                                    ? $headlines[$headlineIndex]
                                                                    : '';
                                                                $description = isset($descriptions[$descriptionIndex])
                                                                    ? $descriptions[$descriptionIndex]
                                                                    : '';
                                                                $link = isset($advertiserLinks[$linkIndex])
                                                                    ? $advertiserLinks[$linkIndex]
                                                                    : '';
                                                            @endphp
                                                            <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
                                                                <div
                                                                    class="d-md-flex align-items-center h-100 limiting-container">
                                                                    @if ($i < count($images))
                                                                        <div class="text-center lim-img"
                                                                            style="flex: 0 0 33.33%;">
                                                                            <img class="img-size"
                                                                                style="width: 100%; object-fit: cover; height: 100%;"
                                                                                src="{{ $images[$i] }}"
                                                                                alt="Banner Image">
                                                                        </div>
                                                                    @endif
                                                                    <div class="d-flex flex-column justify-content-center text-md-start lim-content"
                                                                        style="background-color: #fff; flex: 0 0 33.33%; height: 100%;">
                                                                        <div class=""
                                                                            style="flex-grow: 7; display: flex; flex-direction: column; justify-content: center;">
                                                                            @if ($headline)
                                                                                <h3
                                                                                    style="font-weight: 500; font-size: 20px; line-height: 24px; color: black;">
                                                                                    {{ $headline }}</h3>
                                                                            @endif
                                                                            @if ($description)
                                                                                <p
                                                                                    style="font-size: 14px; line-height: 16px; color: black; margin-top: 10px;">
                                                                                    {{ $description }}</p>
                                                                            @endif
                                                                        </div>
                                                                        @if ($link)
                                                                            <div class="" style="flex-grow: 3;">
                                                                                <a class="white-banner__link"
                                                                                    target="_blank"
                                                                                    href="{{ $link }}">Переглянути</a>
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                    @if ($i + 1 < count($images))
                                                                        <div class="text-center lim-img"
                                                                            style="flex: 0 0 33.33%;">
                                                                            <img class="img-size"
                                                                                style="width: 100%; object-fit: cover; height: 100%;"
                                                                                src="{{ $images[$i + 1] }}"
                                                                                alt="Banner Image">
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        @endfor
                                                    </div>
                                                @elseif ($banner['bannerType'] === 'Повідомлення Flex М black')
                                                    <div class="banner__container mx-auto text-center position-relative"
                                                        style="background-color: #EBEBEB;">
                                                        <div class="second-banner__carousel pb-4 mb-4">
                                                            <div id="carouselFirstBanner"
                                                                class="carousel slide carousel mx-auto">
                                                                <div class="carousel-inner mx-auto"
                                                                    style="max-width: 1920px; width: 100%;">
                                                                    @for ($i = 0; $i < count($images); $i += 2)
                                                                        @php
                                                                            $headlineIndex =
                                                                                ($i / 2) % count($headlines);
                                                                            $descriptionIndex =
                                                                                ($i / 2) % count($descriptions);
                                                                            $linkIndex =
                                                                                ($i / 2) % count($advertiserLinks);
                                                                            $headline = isset(
                                                                                $headlines[$headlineIndex],
                                                                            )
                                                                                ? $headlines[$headlineIndex]
                                                                                : '';
                                                                            $description = isset(
                                                                                $descriptions[$descriptionIndex],
                                                                            )
                                                                                ? $descriptions[$descriptionIndex]
                                                                                : '';
                                                                            $link = isset($advertiserLinks[$linkIndex])
                                                                                ? $advertiserLinks[$linkIndex]
                                                                                : '';
                                                                        @endphp
                                                                        <div
                                                                            class="carousel-item {{ $i == 0 ? 'active' : '' }}">
                                                                            <div
                                                                                class="d-md-flex align-items-center h-100 limiting-container">
                                                                                @if ($i < count($images))
                                                                                    <div class="text-center lim-img"
                                                                                        style="flex: 0 0 33.33%;">
                                                                                        <img class="img-size"
                                                                                            style="width: 100%; object-fit: cover; height: 100%;"
                                                                                            src="{{ $images[$i] }}"
                                                                                            alt="Banner Image">
                                                                                    </div>
                                                                                @endif
                                                                                <div class="d-flex flex-column justify-content-center text-md-start lim-content"
                                                                                    style="background-color: #000; flex: 0 0 33.33%; height: 100%;">
                                                                                    <div class=""
                                                                                        style="flex-grow: 7; display: flex; flex-direction: column; justify-content: center;">
                                                                                        @if ($headline)
                                                                                            <h3
                                                                                                style="font-weight: 500; font-size: 20px; line-height: 24px; color: white;">
                                                                                                {{ $headline }}
                                                                                            </h3>
                                                                                        @endif
                                                                                        @if ($description)
                                                                                            <p
                                                                                                style="font-size: 14px; line-height: 16px; color: white; margin-top: 10px;">
                                                                                                {{ $description }}
                                                                                            </p>
                                                                                        @endif
                                                                                    </div>
                                                                                    @if ($link)
                                                                                        <div class=""
                                                                                            style="flex-grow: 3;">
                                                                                            <div class="">
                                                                                                <a class="black-m-banner__link"
                                                                                                    target="_blank"
                                                                                                    href="{{ $link }}">Переглянути</a>
                                                                                            </div>
                                                                                        </div>
                                                                                    @endif
                                                                                </div>
                                                                                @if ($i + 1 < count($images))
                                                                                    <div class="text-center lim-img"
                                                                                        style="flex: 0 0 33.33%;">
                                                                                        <img class="img-size"
                                                                                            style="width: 100%; object-fit: cover; height: 100%;"
                                                                                            src="{{ $images[$i + 1] }}"
                                                                                            alt="Banner Image">
                                                                                    </div>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    @endfor
                                                                </div>
                                                            @else
            @endif
        @endif
        @if ($banner)
            @if ($banner['bannerType'] === 'Слайд-шоу Flex L white')
                @if (count($images) > 1)
                    <div class="carousel-controls mx-auto h-100">
                        <button class="carousel-control-prev banner-contol" type="button"
                            data-bs-target="#carouselFirstBanner" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next banner-contol" type="button"
                            data-bs-target="#carouselFirstBanner" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                        <div class="d-none d-md-block">
                            <ol class="carousel-indicators" style="position: absolute; bottom: 100px;">
                                @foreach ($images as $key => $image)
                                    <li style="list-style: none;" data-bs-target="#carouselFirstBanner"
                                        data-bs-slide-to="{{ $key }}"
                                        class="{{ $key == 0 ? 'active' : '' }}">
                                    </li>
                                @endforeach
                            </ol>
                        </div>
                    </div>
                @endif
            @elseif ($banner['bannerType'] === 'Слайд-шоу Flex L black')
                @if (count($images) > 1)
                    <div class="carousel-controls mx-auto h-100">
                        <button class="carousel-control-prev banner-contol" type="button"
                            data-bs-target="#carouselFirstBanner" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next banner-contol" type="button"
                            data-bs-target="#carouselFirstBanner" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                        <div class="d-none d-md-block">
                            <ol class="carousel-indicators" style="position: absolute; bottom: 100px;">
                                @foreach ($images as $key => $image)
                                    <li style="list-style: none;" data-bs-target="#carouselFirstBanner"
                                        data-bs-slide-to="{{ $key }}"
                                        class="{{ $key == 0 ? 'active' : '' }}">
                                    </li>
                                @endforeach
                            </ol>
                        </div>
                    </div>
                @endif
            @elseif ($banner['bannerType'] === 'Повідомлення Flex М white')
                @if (count($images) > 2)
                    <div class="carousel-controls mx-auto h-100">
                        <button class="carousel-control-prev banner-contol" type="button"
                            data-bs-target="#carouselFirstBanner" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next banner-contol" type="button"
                            data-bs-target="#carouselFirstBanner" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                        <div class="d-none d-md-block">
                            <ol class="carousel-indicators" style="position: absolute; bottom: -10px;">
                                @for ($i = 0; $i < count($images) / 2; $i++)
                                    <li style="list-style: none;" data-bs-target="#carouselFirstBanner"
                                        data-bs-slide-to="{{ $i }}"
                                        class="{{ $i == 0 ? 'active' : '' }}">
                                    </li>
                                @endfor
                            </ol>
                        </div>
                    </div>
                @endif
            @elseif ($banner['bannerType'] === 'Повідомлення Flex М black')
                @if (count($images) > 2)
                    <div class="carousel-controls mx-auto h-100">
                        <button class="carousel-control-prev banner-contol" type="button"
                            data-bs-target="#carouselFirstBanner" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next banner-contol" type="button"
                            data-bs-target="#carouselFirstBanner" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                        <div class="d-none d-md-block">
                            <ol class="carousel-indicators" style="position: absolute; bottom: -10px;">
                                @for ($i = 0; $i < count($images) / 2; $i++)
                                    <li style="list-style: none;" data-bs-target="#carouselFirstBanner"
                                        data-bs-slide-to="{{ $i }}"
                                        class="{{ $i == 0 ? 'active' : '' }}">
                                    </li>
                                @endfor
                            </ol>
                        </div>
                    </div>
                @endif
            @endif
        @else
        @endif
    </div>
    </div>
    </div>
    </div>
    <div class="content__container-plus mx-auto pt-2">
        <h1 class="border-bottom mb-3 pb-3 px-xl-0 text-center smoothie title-block">{{ $data['title'] }}</h1>
    </div>
    @if ($data['imageSize'] === true)
        <div class="content__container mx-auto">
            <img class="img-fluid w-100 pb-1 object-fit-cover" style="min-height: 400px;"
                src="{{ $data['mainImage'] }}" alt="{{ $data['mainImgDesc'] }}">
            <div class="title-block" style="padding: 0 20px;">
                <figcaption>{{ $data['mainImgDesc'] . ' - ' . $data['mainImgAuthor'] }}</figcaption>
            </div>
        </div>
    @else
        <div class="container px-0">
            <img class="img-fluid w-100 object-fit-cover" style="min-height: 400px;" src="{{ $data['mainImage'] }}"
                alt="{{ $data['mainImgDesc'] }}">
            <div class="title-block" style="padding: 0 20px;">
                <figcaption>{{ $data['mainImgDesc'] . ' - ' . $data['mainImgAuthor'] }}</figcaption>
            </div>
        </div>
    @endif
@elseif ($data['postType'] === 'Публікація Premium')
    <img class="img-fluid object-fit-cover" src="{{ $data['mainImage'] }}" alt="{{ $data['mainImgDesc'] }}">
    <figcaption class="title-block">{{ $data['mainImgDesc'] . ' - ' . $data['mainImgAuthor'] }}</figcaption>
    <div class="title-container title-block">
        <div class="">
            <h1 class="">{{ $data['title'] }}</h1>
            @if ($data['showDesc'] === true)
                <h2 class="mb-3">{{ $data['desc'] }}</h2>
            @endif
        </div>
    </div>
@elseif ($data['postType'] === 'Публікація Premium white')
    <div class="d-xl-flex border-bottom">
        <div
            class="pb-4 pb-xl-0 pt-4 pt-xl-0 col-xl-6 d-flex flex-column text-center items-center justify-content-center align-items-center text-black">
            <h1 class="" style="max-width: 760px; padding: 0 20px;">{{ $data['title'] }}</h1>
            @if ($data['showDesc'] === true)
                <h2 class="" style="max-width: 760px; padding: 0 20px;">{{ $data['desc'] }}</h2>
            @endif
        </div>
        <div class="col-xl-6">
            <img class="object-fit-cover" src="{{ $data['mainImage'] }}" alt="{{ $data['mainImgDesc'] }}">
        </div>
    </div>
    <figcaption class="title-block text-end">{{ $data['mainImgDesc'] . ' - ' . $data['mainImgAuthor'] }}
    </figcaption>
@elseif ($data['postType'] === 'Публікація Premium black')
    <div class="d-xl-flex border-bottom" style="border-color: white;">
        <div
            class="pb-4 pb-xl-0 pt-4 pt-xl-0 col-xl-6 d-flex flex-column text-center items-center justify-content-center align-items-center text-white bg-black">
            <h1 class="" style="max-width: 760px; padding: 0 20px;">{{ $data['title'] }}</h1>
            @if ($data['showDesc'] === true)
                <h2 class="" style="max-width: 760px; padding: 0 20px;">{{ $data['desc'] }}</h2>
            @endif
        </div>
        <div class="col-xl-6">
            <img class="object-fit-cover" src="{{ $data['mainImage'] }}" alt="{{ $data['mainImgDesc'] }}">
        </div>
    </div>
    <figcaption class="title-block text-end">{{ $data['mainImgDesc'] . ' - ' . $data['mainImgAuthor'] }}
    </figcaption>
    @endif
    </div>
    <div class="container px-0 mb-4">
        <div class="content__container mx-auto mt-4">
            <div class="content">
                <div class="border-top">
                    {!! $data['content'] !!}
                </div>
            </div>
            <div class="content">
                @if ($data['showAuthor'] == true)
                    <h4>{{ $userData['nickName'] }}
                        {{ $data['showAuthorDesc'] ? ' - ' . $userData['descUser'] : '' }}
                    </h4>
                @endif
                @php
                    $updatedDate = \Carbon\Carbon::parse($data['updatedAt']);
                    $createdDate = \Carbon\Carbon::parse($data['createdAt']);
                    $updatedDate = \Carbon\Carbon::parse($data['updatedAt']);
                @endphp
                <h4>
                    Цей матеріал опубліковано
                    {{ \Carbon\Carbon::parse($data['publishedAt'])->locale('uk')->isoFormat('D.MM.YYYY') }} року,
                    {{ $updatedDate->equalTo($createdDate) ? 'оновлення відсутні' : 'оновлення ' . $updatedDate->isoFormat('D.MM.YYYY') }},
                    розділ {{ $data['section'] }}, із заголовком: {{ $data['title'] }}. | <a class="under"
                        href="{{ route('news-today.index') }}">Сьогоднішня
                        газета</a> | <a class="under" href="{{ route('news.line') }}">Стрічка новин</a> | <a
                        class="under" href="#">Підпишіться</a>
                </h4>
            </div>
        </div>
    </div>
    {{-- Блок №2 Публікації --}}
    @if (
        $data['postType'] !== 'Публікація Premium' &&
            $data['postType'] !== 'Публікація Premium black' &&
            $data['postType'] !== 'Публікація Premium white')
        <div class="mb-2">
            <div class="banner__container mx-auto border-top border-bottom py-1 text-center"
                style="color: rgb(107 114 128); font-size: 12px; line-height: 12px; font-weight: 300;">
                ОГОЛОШЕННЯ
            </div>
            @php
                $blockType = 'Блок №2 Публікації';
                $banner = $dataBanners[$blockType] ?? null;
            @endphp
            @if ($banner)
                @php
                    $images = json_decode($banner['images']);
                    $headlines = json_decode($banner['headlines']);
                    $descriptions = json_decode($banner['descriptions']);
                    $advertiserLinks = json_decode($banner['advertiserLinks']);
                @endphp
                @if ($banner['bannerType'] === 'Слайд-шоу Flex L white')
                    <div class="banner__container mx-auto text-center position-relative"
                        style="background-color: #EBEBEB;">
                        <div class="second-banner__carousel pb-4 mb-4">
                            <div id="carouselSecondBanner" class="carousel slide carousel-dark mx-auto"
                                style="max-width: 1200px;">
                                <div class="carousel-inner mx-auto" style="max-width: 1200px; width: 100%;">
                                    @foreach ($images as $key => $image)
                                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                            <div class="d-md-none" style="min-height: auto; background-color: #fff;">
                                                <img style="max-width: 1200px; width: 100%; height: auto; object-fit: contain;"
                                                    src="{{ $image }}" class="d-block w-100"
                                                    alt="Banner Image">
                                                <div class="position-relative" style="padding: 20px;">
                                                    <div class="text-start">
                                                        @if (isset($headlines[$key]))
                                                            <h3
                                                                style="font-weight: 500; font-size: 20px; line-height: 24px; color: black;">
                                                                {{ $headlines[$key] }}</h3>
                                                        @endif
                                                        @if (isset($descriptions[$key]))
                                                            <p
                                                                style="font-size: 14px; line-height: 16px; color: black; margin-top: 10px;">
                                                                {{ $descriptions[$key] }}</p>
                                                        @endif
                                                        @if (isset($advertiserLinks[$key]))
                                                            <div class="">
                                                                <a class="white-banner__link" target="_blank"
                                                                    href="{{ $advertiserLinks[$key] }}">Переглянути</a>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-none d-md-block">
                                                <img style="max-width: 1200px; max-height: 600px; width: 100%; min-height: 600px; height: 100%; object-fit: cover;"
                                                    src="{{ $image }}" class="d-block w-100"
                                                    alt="Banner Image">
                                                <div class="glassmorphism-parent position-absolute w-100 d-none d-md-block"
                                                    style="height: 110px; bottom: 0;">
                                                    <div class="d-md-flex align-items-center justify-content-between gap-4 w-100 h-100"
                                                        style="padding: 10px 30px; position: absolute; bottom: 0; max-width: 1200px; max-height: 110px;">
                                                        <div class="d-flex flex-column text-start">
                                                            @if (isset($headlines[$key]))
                                                                <h3 style="font-weight: 500; font-size: 20px; line-height: 24px; color: black;"
                                                                    class="w-100">
                                                                    {{ $headlines[$key] }}</h3>
                                                            @endif
                                                            @if (isset($descriptions[$key]))
                                                                <p style="font-size: 14px; line-height: 16px; color: black; margin: 0;"
                                                                    class="w-100">
                                                                    {{ $descriptions[$key] }}</p>
                                                            @endif
                                                        </div>
                                                        @if (isset($advertiserLinks[$key]))
                                                            <div class="ml-auto text-start">
                                                                <a class="white-banner__link" target="_blank"
                                                                    href="{{ $advertiserLinks[$key] }}">Переглянути</a>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @elseif ($banner['bannerType'] === 'Слайд-шоу Flex L black')
                                <div class="banner__container mx-auto text-center position-relative"
                                    style="background-color: #EBEBEB;">
                                    <div class="second-banner__carousel pb-4 mb-4">
                                        <div id="carouselSecondBanner" class="carousel slide mx-auto"
                                            style="max-width: 1200px;">
                                            <div class="carousel-inner mx-auto" style="max-width: 1200px; width: 100%;">
                                                @foreach ($images as $key => $image)
                                                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                                        <div class="d-md-none"
                                                            style="min-height: auto; background-color: #000;">
                                                            <img style="max-width: 1200px; width: 100%; height: auto; object-fit: contain;"
                                                                src="{{ $image }}" class="d-block w-100"
                                                                alt="Banner Image">
                                                            <div class="position-relative" style="padding: 20px;">
                                                                <div class="text-start text-white">
                                                                    @if (isset($headlines[$key]))
                                                                        <h3
                                                                            style="font-weight: 500; font-size: 20px; line-height: 24px;">
                                                                            {{ $headlines[$key] }}</h3>
                                                                    @endif
                                                                    @if (isset($descriptions[$key]))
                                                                        <p
                                                                            style="font-size: 14px; line-height: 16px; color: #fff; margin-top: 10px;">
                                                                            {{ $descriptions[$key] }}</p>
                                                                    @endif
                                                                    @if (isset($advertiserLinks[$key]))
                                                                        <div class="">
                                                                            <a class="black-banner__link"
                                                                                target="_blank"
                                                                                href="{{ $advertiserLinks[$key] }}">Переглянути</a>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="d-none d-md-block" style="background-color: #000;">
                                                            <img style="max-width: 1200px; max-height: 600px; width: 100%; min-height: 600px; height: 100%; object-fit: cover;"
                                                                src="{{ $image }}" class="d-block w-100"
                                                                alt="Banner Image">
                                                            <div class="glassmorphism-b-parent position-absolute w-100 d-none d-md-block"
                                                                style="height: 110px; bottom: 0;">
                                                                <div class="d-md-flex align-items-center justify-content-between gap-4 w-100 h-100"
                                                                    style="padding: 10px 30px; position: absolute; bottom: 0; max-width: 1200px; max-height: 110px;">
                                                                    <div class="d-flex flex-column text-start text-white">
                                                                        @if (isset($headlines[$key]))
                                                                            <h3 style="font-weight: 500; font-size: 20px; line-height: 24px;"
                                                                                class="w-100">
                                                                                {{ $headlines[$key] }}</h3>
                                                                        @endif
                                                                        @if (isset($descriptions[$key]))
                                                                            <p style="font-size: 14px; line-height: 16px; color: #fff; margin: 0;"
                                                                                class="w-100">
                                                                                {{ $descriptions[$key] }}</p>
                                                                        @endif
                                                                    </div>
                                                                    @if (isset($advertiserLinks[$key]))
                                                                        <div class="ml-auto text-start">
                                                                            <a class="black-banner__link"
                                                                                target="_blank"
                                                                                href="{{ $advertiserLinks[$key] }}">Переглянути</a>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @elseif ($banner['bannerType'] === 'Повідомлення Flex М white')
                                            <div class="banner__container mx-auto text-center position-relative"
                                                style="background-color: #EBEBEB;">
                                                <div class="second-banner__carousel pb-4 mb-4">
                                                    <div id="carouselSecondBanner"
                                                        class="carousel slide carousel-dark mx-auto">
                                                        <div class="carousel-inner mx-auto"
                                                            style="max-width: 1920px; width: 100%;">
                                                            @for ($i = 0; $i < count($images); $i += 2)
                                                                @php
                                                                    $headlineIndex = ($i / 2) % count($headlines);
                                                                    $descriptionIndex = ($i / 2) % count($descriptions);
                                                                    $linkIndex = ($i / 2) % count($advertiserLinks);
                                                                    $headline = isset($headlines[$headlineIndex])
                                                                        ? $headlines[$headlineIndex]
                                                                        : '';
                                                                    $description = isset(
                                                                        $descriptions[$descriptionIndex],
                                                                    )
                                                                        ? $descriptions[$descriptionIndex]
                                                                        : '';
                                                                    $link = isset($advertiserLinks[$linkIndex])
                                                                        ? $advertiserLinks[$linkIndex]
                                                                        : '';
                                                                @endphp
                                                                <div
                                                                    class="carousel-item {{ $i == 0 ? 'active' : '' }}">
                                                                    <div
                                                                        class="d-md-flex align-items-center h-100 limiting-container">
                                                                        @if ($i < count($images))
                                                                            <div class="text-center lim-img"
                                                                                style="flex: 0 0 33.33%;">
                                                                                <img class="img-size"
                                                                                    style="width: 100%; object-fit: cover; height: 100%;"
                                                                                    src="{{ $images[$i] }}"
                                                                                    alt="Banner Image">
                                                                            </div>
                                                                        @endif
                                                                        <div class="d-flex flex-column justify-content-center text-md-start lim-content"
                                                                            style="background-color: #fff; flex: 0 0 33.33%; height: 100%;">
                                                                            <div class=""
                                                                                style="flex-grow: 7; display: flex; flex-direction: column; justify-content: center;">
                                                                                @if ($headline)
                                                                                    <h3
                                                                                        style="font-weight: 500; font-size: 20px; line-height: 24px; color: black;">
                                                                                        {{ $headline }}</h3>
                                                                                @endif
                                                                                @if ($description)
                                                                                    <p
                                                                                        style="font-size: 14px; line-height: 16px; color: black; margin-top: 10px;">
                                                                                        {{ $description }}</p>
                                                                                @endif
                                                                            </div>
                                                                            @if ($link)
                                                                                <div class=""
                                                                                    style="flex-grow: 3;">
                                                                                    <a class="white-banner__link"
                                                                                        target="_blank"
                                                                                        href="{{ $link }}">Переглянути</a>
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                        @if ($i + 1 < count($images))
                                                                            <div class="text-center lim-img"
                                                                                style="flex: 0 0 33.33%;">
                                                                                <img class="img-size"
                                                                                    style="width: 100%; object-fit: cover; height: 100%;"
                                                                                    src="{{ $images[$i + 1] }}"
                                                                                    alt="Banner Image">
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            @endfor
                                                        </div>
                                                    @elseif ($banner['bannerType'] === 'Повідомлення Flex М black')
                                                        <div class="banner__container mx-auto text-center position-relative"
                                                            style="background-color: #EBEBEB;">
                                                            <div class="second-banner__carousel pb-4 mb-4">
                                                                <div id="carouselSecondBanner"
                                                                    class="carousel slide carousel mx-auto">
                                                                    <div class="carousel-inner mx-auto"
                                                                        style="max-width: 1920px; width: 100%;">
                                                                        @for ($i = 0; $i < count($images); $i += 2)
                                                                            @php
                                                                                $headlineIndex =
                                                                                    ($i / 2) % count($headlines);
                                                                                $descriptionIndex =
                                                                                    ($i / 2) % count($descriptions);
                                                                                $linkIndex =
                                                                                    ($i / 2) % count($advertiserLinks);
                                                                                $headline = isset(
                                                                                    $headlines[$headlineIndex],
                                                                                )
                                                                                    ? $headlines[$headlineIndex]
                                                                                    : '';
                                                                                $description = isset(
                                                                                    $descriptions[$descriptionIndex],
                                                                                )
                                                                                    ? $descriptions[$descriptionIndex]
                                                                                    : '';
                                                                                $link = isset(
                                                                                    $advertiserLinks[$linkIndex],
                                                                                )
                                                                                    ? $advertiserLinks[$linkIndex]
                                                                                    : '';
                                                                            @endphp
                                                                            <div
                                                                                class="carousel-item {{ $i == 0 ? 'active' : '' }}">
                                                                                <div
                                                                                    class="d-md-flex align-items-center h-100 limiting-container">
                                                                                    @if ($i < count($images))
                                                                                        <div class="text-center lim-img"
                                                                                            style="flex: 0 0 33.33%;">
                                                                                            <img class="img-size"
                                                                                                style="width: 100%; object-fit: cover; height: 100%;"
                                                                                                src="{{ $images[$i] }}"
                                                                                                alt="Banner Image">
                                                                                        </div>
                                                                                    @endif
                                                                                    <div class="d-flex flex-column justify-content-center text-md-start lim-content"
                                                                                        style="background-color: #000; flex: 0 0 33.33%; height: 100%;">
                                                                                        <div class=""
                                                                                            style="flex-grow: 7; display: flex; flex-direction: column; justify-content: center;">
                                                                                            @if ($headline)
                                                                                                <h3
                                                                                                    style="font-weight: 500; font-size: 20px; line-height: 24px; color: white;">
                                                                                                    {{ $headline }}
                                                                                                </h3>
                                                                                            @endif
                                                                                            @if ($description)
                                                                                                <p
                                                                                                    style="font-size: 14px; line-height: 16px; color: white; margin-top: 10px;">
                                                                                                    {{ $description }}
                                                                                                </p>
                                                                                            @endif
                                                                                        </div>
                                                                                        @if ($link)
                                                                                            <div class=""
                                                                                                style="flex-grow: 3;">
                                                                                                <div class="">
                                                                                                    <a class="black-m-banner__link"
                                                                                                        target="_blank"
                                                                                                        href="{{ $link }}">Переглянути</a>
                                                                                                </div>
                                                                                            </div>
                                                                                        @endif
                                                                                    </div>
                                                                                    @if ($i + 1 < count($images))
                                                                                        <div class="text-center lim-img"
                                                                                            style="flex: 0 0 33.33%;">
                                                                                            <img class="img-size"
                                                                                                style="width: 100%; object-fit: cover; height: 100%;"
                                                                                                src="{{ $images[$i + 1] }}"
                                                                                                alt="Banner Image">
                                                                                        </div>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                        @endfor
                                                                    </div>
                                                                @else
                @endif
            @endif
            @if ($banner)
                @if ($banner['bannerType'] === 'Слайд-шоу Flex L white')
                    @if (count($images) > 1)
                        <div class="carousel-controls mx-auto h-100">
                            <button class="carousel-control-prev banner-contol" type="button"
                                data-bs-target="#carouselSecondBanner" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next banner-contol" type="button"
                                data-bs-target="#carouselSecondBanner" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                            <div class="d-none d-md-block">
                                <ol class="carousel-indicators" style="position: absolute; bottom: 100px;">
                                    @foreach ($images as $key => $image)
                                        <li style="list-style: none;" data-bs-target="#carouselSecondBanner"
                                            data-bs-slide-to="{{ $key }}"
                                            class="{{ $key == 0 ? 'active' : '' }}">
                                        </li>
                                    @endforeach
                                </ol>
                            </div>
                        </div>
                    @endif
                @elseif ($banner['bannerType'] === 'Слайд-шоу Flex L black')
                    @if (count($images) > 1)
                        <div class="carousel-controls mx-auto h-100">
                            <button class="carousel-control-prev banner-contol" type="button"
                                data-bs-target="#carouselSecondBanner" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next banner-contol" type="button"
                                data-bs-target="#carouselSecondBanner" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                            <div class="d-none d-md-block">
                                <ol class="carousel-indicators" style="position: absolute; bottom: 100px;">
                                    @foreach ($images as $key => $image)
                                        <li style="list-style: none;" data-bs-target="#carouselSecondBanner"
                                            data-bs-slide-to="{{ $key }}"
                                            class="{{ $key == 0 ? 'active' : '' }}">
                                        </li>
                                    @endforeach
                                </ol>
                            </div>
                        </div>
                    @endif
                @elseif ($banner['bannerType'] === 'Повідомлення Flex М white')
                    @if (count($images) > 2)
                        <div class="carousel-controls mx-auto h-100">
                            <button class="carousel-control-prev banner-contol" type="button"
                                data-bs-target="#carouselSecondBanner" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next banner-contol" type="button"
                                data-bs-target="#carouselSecondBanner" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                            <div class="d-none d-md-block">
                                <ol class="carousel-indicators" style="position: absolute; bottom: -10px;">
                                    @for ($i = 0; $i < count($images) / 2; $i++)
                                        <li style="list-style: none;" data-bs-target="#carouselSecondBanner"
                                            data-bs-slide-to="{{ $i }}"
                                            class="{{ $i == 0 ? 'active' : '' }}">
                                        </li>
                                    @endfor
                                </ol>
                            </div>
                        </div>
                    @endif
                @elseif ($banner['bannerType'] === 'Повідомлення Flex М black')
                    @if (count($images) > 2)
                        <div class="carousel-controls mx-auto h-100">
                            <button class="carousel-control-prev banner-contol" type="button"
                                data-bs-target="#carouselSecondBanner" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next banner-contol" type="button"
                                data-bs-target="#carouselSecondBanner" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                            <div class="d-none d-md-block">
                                <ol class="carousel-indicators" style="position: absolute; bottom: -10px;">
                                    @for ($i = 0; $i < count($images) / 2; $i++)
                                        <li style="list-style: none;" data-bs-target="#carouselSecondBanner"
                                            data-bs-slide-to="{{ $i }}"
                                            class="{{ $i == 0 ? 'active' : '' }}">
                                        </li>
                                    @endfor
                                </ol>
                            </div>
                        </div>
                    @endif
                @endif
            @else
            @endif
        </div>
        </div>
        </div>
    @endif
    @endif
    @php
        function filterPosts($posts, $currentDate, $limit)
        {
            $filteredPosts = [];
            foreach ($posts as $post) {
                $postDate = new DateTime($post['publishedAt']);
                if ($postDate <= $currentDate && count($filteredPosts) < $limit) {
                    $filteredPosts[] = $post;
                }
            }
            return $filteredPosts;
        }

        $currentDate = new DateTime('now', new DateTimeZone('Europe/Kiev'));
        $currentDate->modify('+3 hour');

        $filteredWarPosts = filterPosts($newsData['warSectionPosts'], $currentDate, 3);
        $filteredEuropePosts = filterPosts($newsData['europePosts'], $currentDate, 3);
        $filteredSocietyPosts = filterPosts($newsData['societyPosts'], $currentDate, 3);
        $filteredFreeLinePosts = filterPosts($newsData['freeLinePosts'], $currentDate, 10);
    @endphp
    <div class="content-preview-mini__container mx-auto py-4" style="background-color: #2b2a2a; color: white;">
        <div class="container d-xl-flex px-xl-0" style="padding: 0 20px;">
            <div class="other-title border-r pe-xl-3">
                <p class="other-title">Війна Росії проти України</p>
                <div class="d-xl-flex gap-3 justify-content-between border-b pb-2 mb-2">
                    @foreach ($filteredWarPosts as $index => $post)
                        @if ($index < 3)
                            <article class="col">
                                <a href="{{ $post['url'] }}">
                                    <div>
                                        <img class="img-fluid w-100 h-100 object-fit-cover rounded mb-2"
                                            style="min-width: 100%;" src="{{ $post['mainImage'] }}"
                                            alt="{{ $post['mainImgDesc'] }}">
                                        <h2 class="other-title">{{ $post['title'] }}</h2>
                                    </div>
                                </a>
                            </article>
                        @endif
                    @endforeach
                </div>
                <p class="other-title">Європа</p>
                <div class="d-xl-flex gap-3 justify-content-between border-b pb-2 mb-2">
                    @foreach ($filteredEuropePosts as $index => $post)
                        @if ($index < 3)
                            <article class="col">
                                <a href="{{ $post['url'] }}">
                                    <div class="">
                                        <img class="img-fluid w-100 h-100 object-fit-cover rounded mb-2"
                                            src="{{ $post['mainImage'] }}" alt="{{ $post['mainImgDesc'] }}">
                                        <h2 class="other-title">{{ $post['title'] }}</h2>
                                    </div>
                                </a>
                            </article>
                        @endif
                    @endforeach
                </div>
                <p class="other-title">Суспільство</p>
                <div class="d-xl-flex gap-3 justify-content-between pb-2 mb-2">
                    @foreach ($filteredSocietyPosts as $index => $post)
                        @if ($index < 3)
                            <article class="col">
                                <a href="{{ $post['url'] }}">
                                    <div class="">
                                        <img class="img-fluid w-100 h-100 object-fit-cover rounded mb-2"
                                            src="{{ $post['mainImage'] }}" alt="{{ $post['mainImgDesc'] }}">
                                        <h2 class="other-title">{{ $post['title'] }}</h2>
                                    </div>
                                </a>
                            </article>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="px-xl-3 other-title">
                <div class="border-b pb-3 mb-3">
                    <a href="{{ route('news.line') }}" class="under">Стрічка новин</a>, останні публікацї
                </div>
                @foreach ($filteredFreeLinePosts as $index => $post)
                    @if ($index < 10)
                        <article class="mb-2 pb-2 mb-xl-3 pb-xl-3 {{ $index === 9 ? '' : ' border-b-other' }}">
                            <a href="{{ $post['url'] }}">
                                <div class="">
                                    <h2 class="other-title">{{ $post['title'] }}</h2>
                                </div>
                            </a>
                        </article>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection
