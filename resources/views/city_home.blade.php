@extends('layouts.city_main')
@section('city_home')
    @php
        $SERVER_BANNERS = 'https://sside.daycom.com.ua/api/banners';
        $bannersCh = curl_init();
        curl_setopt($bannersCh, CURLOPT_URL, $SERVER_BANNERS);
        curl_setopt($bannersCh, CURLOPT_RETURNTRANSFER, 1);
        $responseBanners = curl_exec($bannersCh);

        if ($responseBanners === false) {
            echo 'Ошибка при получении данных';
            curl_close($bannersCh);
            return;
        }

        $dataBanners = [];
        $allBanners = json_decode($responseBanners, true);

        if ($allBanners === null) {
            echo 'Ошибка при декодировании данных';
            curl_close($bannersCh);
            return;
        }

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

        curl_close($bannersCh);
    @endphp

    <div class="mb-3">
        <div class="banner__container mx-auto border-top border-bottom py-1 text-center"
            style="color: rgb(107 114 128); font-size: 12px; line-height: 12px; font-weight: 300;">
            ОГОЛОШЕННЯ
        </div>
        @php
            $blockType = 'Блок №1 Головна сторінка';
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
                        <div id="carouselSecondBanner" class="carousel slide carousel-dark mx-auto" style="max-width: 1200px;">
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
                                                <div id="carouselSecondBanner" class="carousel slide carousel-dark mx-auto">
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
                                                                                                {{ $headline }}</h3>
                                                                                        @endif
                                                                                        @if ($description)
                                                                                            <p
                                                                                                style="font-size: 14px; line-height: 16px; color: white; margin-top: 10px;">
                                                                                                {{ $description }}</p>
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
                                    <li style="list-style: none;" data-bs-target="#carouselFirstBanner"
                                        data-bs-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}">
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
                                        data-bs-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}">
                                    </li>
                                @endforeach
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
                                        data-bs-slide-to="{{ $i }}" class="{{ $i == 0 ? 'active' : '' }}">
                                    </li>
                                @endfor
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
                                        data-bs-slide-to="{{ $i }}" class="{{ $i == 0 ? 'active' : '' }}">
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
    <div class="container px-0">
        <div class="main-today__block border-bottom pb-4 mb-2 border-black">
            <div class="d-xl-flex gap-4 mt-4 border-bottom pb-4 mb-4">
                <div class="w-100 main-td">
                    <div class="mb-2">
                        <p>Головне сьогодні</p>
                    </div>
                    <div class="">
                        @foreach ($data['Головне сьогодні'] as $key => $item)
                            @if ($key >= 1 && $key <= 2)
                                <article class="{{ $key === 2 ? ' mb-0' : 'border-bottom pb-1 mb-2' }}">
                                    <a
                                        href="{{ $item['feed'] === 'Загальнонаціональна стрічка' ? route('news.index', ['url' => $item['url']]) : route($city['news_link'], ['url' => $item['url']]) }}">
                                        <div class="">
                                            <h2 class="">{{ $item['title'] }}</h2>
                                            <p class="text-gray-600">{{ $item['desc'] }}</p>
                                        </div>
                                    </a>
                                </article>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="main-bi w-100 xl-border-end xl-pe-4">
                    @foreach ($data['Головне сьогодні'] as $key => $item)
                        @if ($key === 0)
                            <article class="">
                                <a
                                    href="{{ $item['feed'] === 'Загальнонаціональна стрічка' ? route('news.index', ['url' => $item['url']]) : route($city['news_link'], ['url' => $item['url']]) }}">
                                    <div class="">
                                        <img class="img-fluid xl-rounded w-100 img-min-400 object-fit-cover"
                                            src="{{ $item['mainImage'] }}" alt="{{ $item['mainImgDesc'] }}">
                                        <p class="text-end text-gray-600 xl-id">{{ $item['mainImgAuthor'] }}</p>
                                    </div>
                                    <div class="xl-mb-4-px-4">
                                        <h2>{{ $item['title'] }}</h2>
                                        <p>{{ $item['desc'] }}</p>
                                    </div>
                                </a>
                            </article>
                        @endif
                    @endforeach
                </div>
                <div class="main-fi w-100">
                    @foreach ($data['Головне сьогодні'] as $key => $item)
                        @if ($key >= 3 && $key <= 5)
                            @if ($key === 3)
                                <article class="border-bottom pb-1 mb-2">
                                    <a
                                        href="{{ $item['feed'] === 'Загальнонаціональна стрічка' ? route('news.index', ['url' => $item['url']]) : route($city['news_link'], ['url' => $item['url']]) }}">
                                        <div class="">
                                            <img class="img-fluid rounded" src="{{ $item['mainImage'] }}"
                                                alt="mainImgDesc">
                                            <p class="text-end text-gray-600">{{ $item['mainImgAuthor'] }}</p>
                                        </div>
                                        <h2 class="">{{ $item['title'] }}</h2>
                                    </a>
                                </article>
                            @endif
                            @if ($key > 3)
                                <article class="{{ $key === 5 ? ' mb-0' : 'border-bottom pb-1 mb-2' }}">
                                    <a
                                        href="{{ $item['feed'] === 'Загальнонаціональна стрічка' ? route('news.index', ['url' => $item['url']]) : route($city['news_link'], ['url' => $item['url']]) }}">
                                        <h2 class="">{{ $item['title'] }}</h2>
                                    </a>
                                </article>
                            @endif
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="d-xl-flex">
                @foreach ($data['Головне сьогодні'] as $key => $item)
                    @if ($key >= 6)
                        <article class="{{ $loop->last ? 'col px-4' : 'col px-4 xl-border-end' }}">
                            <a
                                href="{{ $item['feed'] === 'Загальнонаціональна стрічка' ? route('news.index', ['url' => $item['url']]) : route($city['news_link'], ['url' => $item['url']]) }}">
                                <h2 class="{{ $loop->last ? '' : 'xl-mb-2-pb-2' }}">{{ $item['title'] }}</h2>
                            </a>
                        </article>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="top-news__carousel pb-4 mb-4 border-bottom border-black">
            <p class="text-center mb-2">Новини, які можуть Вас зацікавити</p>
            <div id="carousel" class="carousel slide carousel-dark d-none d-xl-block">
                <div class="carousel-inner" style="min-height: 320px;">
                    @for ($i = 0; $i < count($data['ТОП новини від Дейком']); $i += 4)
                        <div class="carousel-item{{ $i === 0 ? ' active' : '' }}">
                            <div class="row">
                                @for ($j = $i; $j < min($i + 4, count($data['ТОП новини від Дейком'])); $j++)
                                    <div class="col-md-3">
                                        <article>
                                            <a
                                                href="{{ $data['ТОП новини від Дейком'][$j]['feed'] === 'Загальнонаціональна стрічка'
                                                    ? route('homepage.index') . '/news/' . $data['ТОП новини від Дейком'][$j]['url']
                                                    : route($city['news_link'], ['url' => $data['ТОП новини від Дейком'][$j]['url']]) }}">
                                                <div class="mb-4" style="height: 190px;">
                                                    <img class="img-fluid rounded h-100 object-fit-cover"
                                                        src="{{ $data['ТОП новини від Дейком'][$j]['mainImage'] }}"
                                                        alt="{{ $data['ТОП новини від Дейком'][$j]['mainImage'] }}">
                                                </div>
                                                <h2 class="px-2">{{ $data['ТОП новини від Дейком'][$j]['title'] }}</h2>
                                            </a>
                                        </article>
                                    </div>
                                @endfor
                            </div>
                        </div>
                    @endfor
                </div>
                <div class="carousel-indicators pb-2" style="transform: translateY(40px)">
                    @for ($i = 0; $i < count($data['ТОП новини від Дейком']); $i += 4)
                        <button type="button" data-bs-target="#carousel" data-bs-slide-to="{{ $i / 4 }}"
                            class="{{ $i === 0 ? 'active' : '' }}" aria-current="{{ $i === 0 ? 'true' : 'false' }}"
                            aria-label="Slide {{ $i / 4 }}"></button>
                    @endfor
                </div>
            </div>
            <div id="carouselOneSlide" class="carousel slide carousel-dark d-xl-none">
                <div class="carousel-inner" style="min-height: 320px;">
                    @for ($i = 0; $i < count($data['ТОП новини від Дейком']); $i++)
                        <div class="carousel-item{{ $i === 0 ? ' active' : '' }}">
                            <div class="row">
                                <div class="col-md-12">
                                    <article>
                                        <a
                                            href="{{ $data['ТОП новини від Дейком'][$i]['feed'] === 'Загальнонаціональна стрічка'
                                                ? route('homepage.index') . '/news/' . $data['ТОП новини від Дейком'][$i]['url']
                                                : route($city['news_link'], ['url' => $data['ТОП новини від Дейком'][$i]['url']]) }}">
                                            <div class="mb-4" style="">
                                                <img class="img-fluid xl-rounded w-100 h-100 object-fit-cover"
                                                    style="min-height: 400px; max-height: 500px;"
                                                    src="{{ $data['ТОП новини від Дейком'][$i]['mainImage'] }}"
                                                    alt="{{ $data['ТОП новини від Дейком'][$i]['mainImage'] }}">
                                            </div>
                                            <h2 class="px-4">{{ $data['ТОП новини від Дейком'][$i]['title'] }}</h2>
                                        </a>
                                    </article>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
                <div class="carousel-indicators pb-2" style="transform: translateY(40px)">
                    @for ($i = 0; $i < count($data['ТОП новини від Дейком']); $i++)
                        <button type="button" data-bs-target="#carouselOneSlide" data-bs-slide-to="{{ $i }}"
                            class="{{ $i === 0 ? 'active' : '' }}" aria-current="{{ $i === 0 ? 'true' : 'false' }}"
                            aria-label="Slide {{ $i }}"></button>
                    @endfor
                </div>
            </div>
        </div>
    </div>
    <div class="mb-3">
        <div class="banner__container mx-auto border-top border-bottom py-1 text-center"
            style="color: rgb(107 114 128); font-size: 12px; line-height: 12px; font-weight: 300;">
            ОГОЛОШЕННЯ
        </div>
        @php
            $blockType = 'Блок №2 Головна сторінка';
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
                                                                                                {{ $headline }}</h3>
                                                                                        @endif
                                                                                        @if ($description)
                                                                                            <p
                                                                                                style="font-size: 14px; line-height: 16px; color: white; margin-top: 10px;">
                                                                                                {{ $description }}</p>
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
                                        data-bs-slide-to="{{ $i }}" class="{{ $i == 0 ? 'active' : '' }}">
                                    </li>
                                @endfor
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
                                        data-bs-slide-to="{{ $i }}" class="{{ $i == 0 ? 'active' : '' }}">
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
    <div class="container px-0">
        <div class="sections-news__block d-xl-flex">
            <div class="col-xl-8 pe-xl-2">
                <div class="war-news__block mb-4">
                    <div class="mb-4 img-rel">
                        <p class="block-title">Війна Росії проти України</p>
                        @foreach ($data['Війна Росії проти України'] as $key => $item)
                            @if ($key <= 1)
                                <article>
                                    <a class=""
                                        href="{{ $item['feed'] === 'Загальнонаціональна стрічка' ? route('news.index', ['url' => $item['url']]) : route($city['news_link'], ['url' => $item['url']]) }}">
                                        @if ($key === 0)
                                            <div class="img-abs">
                                                <img class="img-fluid w-100 h-100 xl-rounded object-fit-cover xl-w-biimg"
                                                    src="{{ $item['mainImage'] }}" alt="{{ $item['mainImgDesc'] }}">
                                                <p class="text-end text-gray-600 xl-id">{{ $item['mainImgAuthor'] }}</p>
                                            </div>
                                        @endif
                                        <div class="{{ $key === 0 ? 'border-bottom mb-3' : '' }} xl-mb-4-px-4 xl-w-bi">
                                            <h2 class="">{{ $item['title'] }}</h2>
                                            <p class="text-gray-600">{{ $item['desc'] }}</p>
                                        </div>
                                    </a>
                                </article>
                            @endif
                        @endforeach
                    </div>
                    <div class="xl-border-top border-bottom py-xl-3 px-0">
                        @foreach ($data['Війна Росії проти України'] as $key => $item)
                            @if ($key === 2)
                                <article class="">
                                    <a
                                        href="{{ $item['feed'] === 'Загальнонаціональна стрічка' ? route('news.index', ['url' => $item['url']]) : route($city['news_link'], ['url' => $item['url']]) }}">
                                        <div class="d-xl-flex gap-3">
                                            <div class="xl-block-w mb-4 mb-xl-0">
                                                <h2 class="mb-2 mb-xl-0">{{ $item['title'] }}</h2>
                                                <p class="text-gray-600 mb-0">{{ $item['desc'] }}</p>
                                            </div>
                                            <div class="d-xl-flex gap-3 b-fig-w pb-2 pb-xl-0">
                                                <img class="pb-1 pb-xl-0 img-fluid w-100 h-100 xl-rounded object-fit-cover xl-w-warimg"
                                                    src="{{ $item['mainImage'] }}" alt="{{ $item['mainImgDesc'] }}">
                                                <div class="text-end px-4 px-xl-0">
                                                    <p className="text-gray-600">
                                                        {{ $item['mainImgDesc'] }} {{ $item['mainImgAuthor'] }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </article>
                            @endif
                        @endforeach
                    </div>
                    <div class="block-title border-bottom border-black py-3 me-xl-1 ms-xl-1 d-xl-flex">
                        @foreach ($data['Війна Росії проти України'] as $key => $item)
                            @if ($key >= 3 && $key <= 4)
                                <article class="col-xl-6 {{ $key === 3 ? 'pe-xl-3 xl-border-end' : 'xl-ps-3' }}">
                                    <a
                                        href="{{ $item['feed'] === 'Загальнонаціональна стрічка' ? route('news.index', ['url' => $item['url']]) : route($city['news_link'], ['url' => $item['url']]) }}">
                                        <div class="{{ $key === 3 ? 'pb-border' : '' }}">
                                            <h2>{{ $item['title'] }}</h2>
                                            <p class="text-gray-600 mb-0">{{ $item['desc'] }}</p>
                                        </div>
                                    </a>
                                </article>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="soecity__block mb-4">
                    <div class="img-rel border-bottom">
                        <p class="block-title">Суспільство</p>
                        @foreach ($data['Суспільство'] as $key => $item)
                            @if ($key <= 1)
                                <article class="">
                                    <a class=""
                                        href="{{ $item['feed'] === 'Загальнонаціональна стрічка' ? route('news.index', ['url' => $item['url']]) : route($city['news_link'], ['url' => $item['url']]) }}">
                                        @if ($key === 0)
                                            <div class="img-abs">
                                                <img class="img-fluid w-100 h-100 xl-rounded object-fit-cover xl-w-biimg"
                                                    src="{{ $item['mainImage'] }}" alt="{{ $item['mainImgDesc'] }}">
                                                <p class="text-end text-gray-600 xl-id">{{ $item['mainImgAuthor'] }}</p>
                                            </div>
                                        @endif
                                        <div
                                            class="{{ $key === 0 ? 'border-bottom mb-3 xl-mb-4-px-4' : 'block-title' }} xl-w-bi">
                                            <h2 class="">{{ $item['title'] }}</h2>
                                            <p class="text-gray-600">{{ $item['desc'] }}</p>
                                        </div>
                                    </a>
                                </article>
                            @endif
                        @endforeach
                    </div>
                    <div class="block-title border-bottom border-black py-3 me-xl-1 ms-xl-1 d-xl-flex">
                        @foreach ($data['Суспільство'] as $key => $item)
                            @if ($key >= 3 && $key <= 4)
                                <article class="col-xl-6 {{ $key === 3 ? 'pe-xl-3 xl-border-end' : 'xl-ps-3' }}">
                                    <a
                                        href="{{ $item['feed'] === 'Загальнонаціональна стрічка' ? route('news.index', ['url' => $item['url']]) : route($city['news_link'], ['url' => $item['url']]) }}">
                                        <div class="{{ $key === 3 ? 'pb-border' : '' }}">
                                            <h2>{{ $item['title'] }}</h2>
                                            <p class="text-gray-600 mb-0">{{ $item['desc'] }}</p>
                                        </div>
                                    </a>
                                </article>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="europe__block">
                    <div class="position-relative mb-2">
                        <p class="block-title">Європа</p>
                        @foreach ($data['Європа'] as $key => $item)
                            @if ($key <= 1)
                                <article class="">
                                    <a class=""
                                        href="{{ $item['feed'] === 'Загальнонаціональна стрічка' ? route('news.index', ['url' => $item['url']]) : route($city['news_link'], ['url' => $item['url']]) }}">
                                        @if ($key === 0)
                                            <div class="img-abs">
                                                <img class="img-fluid w-100 h-100 xl-rounded object-fit-cover xl-w-biimg"
                                                    src="{{ $item['mainImage'] }}" alt="{{ $item['mainImgDesc'] }}">
                                                <p class="text-end text-gray-600 xl-id">{{ $item['mainImgAuthor'] }}</p>
                                            </div>
                                        @endif
                                        <div
                                            class="{{ $key === 0 ? 'border-bottom mb-3 xl-mb-4-px-4' : 'block-title' }} xl-w-bi">
                                            <h2 class="">{{ $item['title'] }}</h2>
                                            <p class="text-gray-600">{{ $item['desc'] }}</p>
                                        </div>
                                    </a>
                                </article>
                            @endif
                        @endforeach
                    </div>
                    <div class="europe__carousel pb-4 mb-4 border-bottom border-black">
                        <div id="carouselEurope" class="carousel slide carousel-dark block-title">
                            <div class="carousel-inner">
                                @for ($i = 2; $i < count($data['Європа']); $i++)
                                    <div class="carousel-item{{ $i === 2 ? ' active' : '' }} border rounded p-3">
                                        <article>
                                            <a
                                                href="{{ $data['Європа'][$i]['feed'] === 'Загальнонаціональна стрічка'
                                                    ? route('homepage.index') . '/news/' . $data['Європа'][$i]['url']
                                                    : route($city['news_link'], ['url' => $data['Європа'][$i]['url']]) }}">
                                                <div class="d-xl-flex align-items-center gap-4">
                                                    <div class="title-cont-sm-slide">
                                                        <h2>{{ $data['Європа'][$i]['title'] }}</h2>
                                                        <p class="text-gray-600">{{ $data['Європа'][$i]['desc'] }}</p>
                                                    </div>
                                                    <div class="mb-4 img-cont-sm-slide">
                                                        <img class="img-fluid rounded object-fit-cover img-sm-slide"
                                                            src="{{ $data['Європа'][$i]['mainImage'] }}"
                                                            alt="{{ $data['Європа'][$i]['mainImgDesc'] }}">
                                                    </div>
                                                </div>
                                            </a>
                                        </article>
                                    </div>
                                @endfor
                            </div>
                            <div class="carousel-indicators pb-2" style="transform: translateY(20px)">
                                @for ($i = 2; $i < count($data['Європа']); $i++)
                                    <button type="button" data-bs-target="#carouselEurope"
                                        data-bs-slide-to="{{ $i - 2 }}" class="{{ $i === 2 ? 'active' : '' }}"
                                        aria-current="{{ $i === 2 ? 'true' : 'false' }}"
                                        aria-label="Slide {{ $i - 2 }}"></button>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
                <div class="china__block mb-4 border-bottom border-black">
                    <div class="mb-4 img-rel">
                        <p class="block-title"></p>
                        @foreach ($data['Китай'] as $key => $item)
                            @if ($key <= 1)
                                <article>
                                    <a class=""
                                        href="{{ $item['feed'] === 'Загальнонаціональна стрічка' ? route('news.index', ['url' => $item['url']]) : route($city['news_link'], ['url' => $item['url']]) }}">
                                        @if ($key === 0)
                                            <div class="img-abs">
                                                <img class="img-fluid w-100 h-100 xl-rounded object-fit-cover xl-w-biimg"
                                                    src="{{ $item['mainImage'] }}" alt="{{ $item['mainImgDesc'] }}">
                                                <p class="text-end text-gray-600 xl-id">{{ $item['mainImgAuthor'] }}</p>
                                            </div>
                                        @endif
                                        <div
                                            class="{{ $key === 0 ? 'border-bottom mb-3  xl-mb-4-px-4' : 'block-title' }} xl-w-bi">
                                            <h2 class="">{{ $item['title'] }}</h2>
                                            <p class="text-gray-600">{{ $item['desc'] }}</p>
                                        </div>
                                    </a>
                                </article>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="usa__block mb-4 border-bottom border-black">
                    <div class="mb-4 img-rel">
                        <p class="block-title">Сполучені Штати</p>
                        @foreach ($data['Сполучені Штати'] as $key => $item)
                            @if ($key <= 1)
                                <article>
                                    <a class=""
                                        href="{{ $item['feed'] === 'Загальнонаціональна стрічка' ? route('news.index', ['url' => $item['url']]) : route($city['news_link'], ['url' => $item['url']]) }}">
                                        @if ($key === 0)
                                            <div class="img-abs">
                                                <img class="img-fluid w-100 h-100 xl-rounded object-fit-cover xl-w-biimg"
                                                    src="{{ $item['mainImage'] }}" alt="{{ $item['mainImgDesc'] }}">
                                                <p class="text-end text-gray-600 xl-id">{{ $item['mainImgAuthor'] }}</p>
                                            </div>
                                        @endif
                                        <div class="{{ $key === 0 ? 'border-bottom mb-3' : '' }} xl-mb-4-px-4 xl-w-bi">
                                            <h2 class="">{{ $item['title'] }}</h2>
                                            <p class="text-gray-600">{{ $item['desc'] }}</p>
                                        </div>
                                    </a>
                                </article>
                            @endif
                        @endforeach
                    </div>
                    <div class="xl-border-top py-xl-3 px-0">
                        @foreach ($data['Сполучені Штати'] as $key => $item)
                            @if ($key === 2)
                                <article class="">
                                    <a
                                        href="{{ $item['feed'] === 'Загальнонаціональна стрічка' ? route('news.index', ['url' => $item['url']]) : route($city['news_link'], ['url' => $item['url']]) }}">
                                        <div class="d-xl-flex gap-3">
                                            <div class="xl-block-w mb-4 mb-xl-0">
                                                <h2 class="mb-2 mb-xl-0">{{ $item['title'] }}</h2>
                                                <p class="text-gray-600 mb-0">{{ $item['desc'] }}</p>
                                            </div>
                                            <div class="d-xl-flex gap-3 b-fig-w pb-2 pb-xl-0">
                                                <img class="pb-1 pb-xl-0 img-fluid w-100 h-100 xl-rounded object-fit-cover xl-w-warimg"
                                                    src="{{ $item['mainImage'] }}" alt="{{ $item['mainImgDesc'] }}">
                                                <div class="text-end px-4 px-xl-0">
                                                    <p className="text-gray-600">
                                                        {{ $item['mainImgDesc'] }} {{ $item['mainImgAuthor'] }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </article>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="economic__block mb-4 border-bottom border-black">
                    <div class="mb-4 img-rel">
                        <p class="block-title">Економіка та Фінанси</p>
                        @foreach ($data['Економіка та Фінанси'] as $key => $item)
                            @if ($key <= 1)
                                <article>
                                    <a class=""
                                        href="{{ $item['feed'] === 'Загальнонаціональна стрічка' ? route('news.index', ['url' => $item['url']]) : route($city['news_link'], ['url' => $item['url']]) }}">
                                        @if ($key === 0)
                                            <div class="img-abs">
                                                <img class="img-fluid w-100 h-100 xl-rounded object-fit-cover xl-w-biimg"
                                                    src="{{ $item['mainImage'] }}" alt="{{ $item['mainImgDesc'] }}">
                                                <p class="text-end text-gray-600 xl-id">{{ $item['mainImgAuthor'] }}</p>
                                            </div>
                                        @endif
                                        <div
                                            class="{{ $key === 0 ? 'border-bottom mb-3  xl-mb-4-px-4' : 'block-title' }} xl-w-bi">
                                            <h2 class="">{{ $item['title'] }}</h2>
                                            <p class="text-gray-600">{{ $item['desc'] }}</p>
                                        </div>
                                    </a>
                                </article>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="technologies__block">
                    <div class="position-relative mb-2">
                        <p class="block-title">Технології</p>
                        @foreach ($data['Технології'] as $key => $item)
                            @if ($key <= 1)
                                <article class="">
                                    <a class=""
                                        href="{{ $item['feed'] === 'Загальнонаціональна стрічка' ? route('news.index', ['url' => $item['url']]) : route($city['news_link'], ['url' => $item['url']]) }}">
                                        @if ($key === 0)
                                            <div class="img-abs">
                                                <img class="img-fluid w-100 h-100 xl-rounded object-fit-cover xl-w-biimg"
                                                    src="{{ $item['mainImage'] }}" alt="{{ $item['mainImgDesc'] }}">
                                                <p class="text-end text-gray-600 xl-id">{{ $item['mainImgAuthor'] }}</p>
                                            </div>
                                        @endif
                                        <div
                                            class="{{ $key === 0 ? 'border-bottom mb-3 xl-mb-4-px-4' : 'block-title' }} xl-w-bi">
                                            <h2 class="">{{ $item['title'] }}</h2>
                                            <p class="text-gray-600">{{ $item['desc'] }}</p>
                                        </div>
                                    </a>
                                </article>
                            @endif
                        @endforeach
                    </div>
                    <div class="technologies__carousel pb-4 mb-4">
                        <div id="carouselTechnologies" class="carousel slide carousel-dark block-title">
                            <div class="carousel-inner">
                                @for ($i = 2; $i < count($data['Технології']); $i++)
                                    <div class="carousel-item{{ $i === 2 ? ' active' : '' }} border rounded p-3">
                                        <article>
                                            <a
                                                href="{{ $data['Технології'][$i]['feed'] === 'Загальнонаціональна стрічка'
                                                    ? route('homepage.index') . '/news/' . $data['Технології'][$i]['url']
                                                    : route($city['news_link'], ['url' => $data['Технології'][$i]['url']]) }}">
                                                <div class="d-xl-flex align-items-center gap-4">
                                                    <div class="title-cont-sm-slide">
                                                        <h2>{{ $data['Технології'][$i]['title'] }}</h2>
                                                        <p class="text-gray-600">{{ $data['Технології'][$i]['desc'] }}
                                                        </p>
                                                    </div>
                                                    <div class="mb-4 img-cont-sm-slide">
                                                        <img class="img-fluid rounded object-fit-cover img-sm-slide"
                                                            src="{{ $data['Технології'][$i]['mainImage'] }}"
                                                            alt="{{ $data['Технології'][$i]['mainImgDesc'] }}">
                                                    </div>
                                                </div>
                                            </a>
                                        </article>
                                    </div>
                                @endfor
                            </div>
                            <div class="carousel-indicators pb-2" style="transform: translateY(20px)">
                                @for ($i = 2; $i < count($data['Технології']); $i++)
                                    <button type="button" data-bs-target="#carouselTechnologies"
                                        data-bs-slide-to="{{ $i - 2 }}" class="{{ $i === 2 ? 'active' : '' }}"
                                        aria-current="{{ $i === 2 ? 'true' : 'false' }}"
                                        aria-label="Slide {{ $i - 2 }}"></button>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 ps-xl-2 mb-4 xl-border-start">
                <div class="d-flex mb-2 block-title"
                    style="color: #5a5a5a; text-decoration: underline; text-decoration-color: #5a5a5a;">
                    <p class="border-end pe-3 me-3">
                        <a href="#" style="">Стрічка новин</a>
                    </p>
                    <p>
                        <a href="#">Сьогоднішня Газета</a>
                    </p>
                </div>
                <div class="line-news__block block-title">
                    @foreach ($data['Стрічка новин'] as $key => $item)
                        @if ($key < 5)
                            <article class="border-bottom pb-1 mb-2 px-xl-2 {{ $key === 4 ? 'border-black' : '' }}">
                                <a
                                    href="{{ $item['feed'] === 'Загальнонаціональна стрічка' ? route('news.index', ['url' => $item['url']]) : route($city['news_link'], ['url' => $item['url']]) }}">
                                    @if ($key === 0)
                                        <div class="">
                                            <img class="img-fluid rounded w-100 h-100" src="{{ $item['mainImage'] }}"
                                                alt="{{ $item['mainImgDesc'] }}">
                                            <p class="text-end text-gray-600">{{ $item['mainImgAuthor'] }}</p>
                                        </div>
                                    @endif
                                    <h2>{{ $item['title'] }}</h2>
                                    <p class="text-gray-600">{{ $item['desc'] }}</p>
                                    <p>{{ \Carbon\Carbon::parse($item['publishedAt'])->locale('uk')->isoFormat('D MMMM YYYY') }}
                                    </p>
                                </a>
                            </article>
                        @endif
                    @endforeach
                </div>
                <div class="line-news__carousel pb-4 mb-4 border-bottom border-black block-title">
                    <p class="mb-2">Думка</p>
                    <div id="carouselSec" class="carousel slide carousel-dark">
                        <div class="carousel-inner" style="min-height: 250px;">
                            @for ($i = 0; $i < count($data['Думка']); $i += 2)
                                <div class="carousel-item{{ $i === 0 ? ' active' : '' }}">
                                    <div class="row">
                                        @for ($j = $i; $j < min($i + 2, count($data['Думка'])); $j++)
                                            <div class="col-md-6">
                                                <article>
                                                    <a
                                                        href="{{ $data['Думка'][$j]['feed'] === 'Загальнонаціональна стрічка'
                                                            ? route('homepage.index') . '/news/' . $data['Думка'][$j]['url']
                                                            : route($city['news_link'], ['url' => $data['Думка'][$j]['url']]) }}">
                                                        <div class="mb-2" style="height: 110px;">
                                                            <img class="img-fluid rounded w-100 h-100 object-fit-cover"
                                                                src="{{ $data['Думка'][$j]['mainImage'] }}"
                                                                alt="{{ $data['Думка'][$j]['mainImage'] }}">
                                                        </div>
                                                        <h2 class="px-1 fs-6">{{ $data['Думка'][$j]['title'] }}</h2>
                                                    </a>
                                                </article>
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                            @endfor
                        </div>
                        <div class="carousel-indicators pb-2" style="transform: translateY(40px)">
                            @for ($i = 0; $i < count($data['Думка']); $i += 2)
                                <button type="button" data-bs-target="#carouselSec"
                                    data-bs-slide-to="{{ $i / 2 }}" class="{{ $i === 0 ? 'active' : '' }}"
                                    aria-current="{{ $i === 0 ? 'true' : 'false' }}"
                                    aria-label="Slide {{ $i / 2 }}"></button>
                            @endfor
                        </div>
                    </div>
                </div>
                <div class="line-news__block mb-4 block-title">
                    @foreach ($data['Стрічка новин'] as $key => $item)
                        @if ($key >= 5 && $key <= 9)
                            <article class="border-bottom pb-1 mb-2 px-xl-2 {{ $key === 9 ? 'border-black' : '' }}">
                                <a
                                    href="{{ $item['feed'] === 'Загальнонаціональна стрічка' ? route('news.index', ['url' => $item['url']]) : route($city['news_link'], ['url' => $item['url']]) }}">
                                    <div class="d-flex gap-2">
                                        <div class="w-100">
                                            <h2>{{ $item['title'] }}</h2>
                                            <p>{{ \Carbon\Carbon::parse($item['publishedAt'])->locale('uk')->isoFormat('D MMMM YYYY') }}
                                            </p>
                                        </div>
                                        <div class="" style="max-width: 80px; max-height: 80px">
                                            <img class="img-fluid rounded w-100 h-100 object-fit-cover"
                                                src="{{ $item['mainImage'] }}" alt="{{ $item['mainImgDesc'] }}">
                                        </div>
                                    </div>
                                </a>
                            </article>
                        @endif
                    @endforeach
                </div>
                <div class="line-news__block mb-4 block-title">
                    @foreach ($data['Стрічка новин'] as $key => $item)
                        @if ($key >= 10 && $key <= 14)
                            <article class="border-bottom pb-1 mb-2 px-xl-2">
                                <a
                                    href="{{ $item['feed'] === 'Загальнонаціональна стрічка' ? route('news.index', ['url' => $item['url']]) : route($city['news_link'], ['url' => $item['url']]) }}">
                                    @if ($key === 10)
                                        <div class="">
                                            <img class="img-fluid rounded w-100" src="{{ $item['mainImage'] }}"
                                                alt="{{ $item['mainImgDesc'] }}">
                                            <p class="text-end text-gray-600">{{ $item['mainImgAuthor'] }}</p>
                                        </div>
                                    @endif
                                    <h2>{{ $item['title'] }}</h2>
                                    <p class="text-gray-600">{{ $item['desc'] }}</p>
                                    <p>{{ \Carbon\Carbon::parse($item['publishedAt'])->locale('uk')->isoFormat('D MMMM YYYY') }}
                                    </p>
                                </a>
                            </article>
                        @endif
                    @endforeach
                </div>
                <div class="line-news__block block-title">
                    @foreach ($data['Стрічка новин'] as $key => $item)
                        @if ($key >= 15 && $key <= 19)
                            <article class="border-bottom pb-1 mb-2 px-xl-2 {{ $key === 19 ? 'border-black' : '' }}">
                                <a
                                    href="{{ $item['feed'] === 'Загальнонаціональна стрічка' ? route('news.index', ['url' => $item['url']]) : route($city['news_link'], ['url' => $item['url']]) }}">
                                    @if ($key === 15)
                                        <div class="">
                                            <img class="img-fluid rounded w-100 h-100" src="{{ $item['mainImage'] }}"
                                                alt="{{ $item['mainImgDesc'] }}">
                                            <p class="text-end text-gray-600">{{ $item['mainImgAuthor'] }}</p>
                                        </div>
                                    @endif
                                    <h2>{{ $item['title'] }}</h2>
                                    <p>{{ \Carbon\Carbon::parse($item['publishedAt'])->locale('uk')->isoFormat('D MMMM YYYY') }}
                                    </p>
                                </a>
                            </article>
                        @endif
                    @endforeach
                </div>
                <div class="line-news__carousel pb-4 mb-4 block-title">
                    <p class="mb-2">Аналітика</p>
                    <div id="carouselAnalitics" class="carousel slide carousel-dark">
                        <div class="carousel-inner" style="min-height: 250px;">
                            @for ($i = 0; $i < count($data['Аналітика']); $i += 2)
                                <div class="carousel-item{{ $i === 0 ? ' active' : '' }}">
                                    <div class="row">
                                        @for ($j = $i; $j < min($i + 2, count($data['Аналітика'])); $j++)
                                            <div class="col-md-6">
                                                <article>
                                                    <a
                                                        href="{{ $data['Аналітика'][$j]['feed'] === 'Загальнонаціональна стрічка'
                                                            ? route('homepage.index') . '/news/' . $data['Аналітика'][$j]['url']
                                                            : route($city['news_link'], ['url' => $data['Аналітика'][$j]['url']]) }}">
                                                        <div class="mb-2" style="height: 110px;">
                                                            <img class="img-fluid rounded w-100 h-100 object-fit-cover"
                                                                src="{{ $data['Аналітика'][$j]['mainImage'] }}"
                                                                alt="{{ $data['Аналітика'][$j]['mainImage'] }}">
                                                        </div>
                                                        <h2 class="px-1 fs-6">{{ $data['Аналітика'][$j]['title'] }}</h2>
                                                    </a>
                                                </article>
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                            @endfor
                        </div>
                        <div class="carousel-indicators pb-2" style="transform: translateY(40px)">
                            @for ($i = 0; $i < count($data['Аналітика']); $i += 2)
                                <button type="button" data-bs-target="#carouselAnalitics"
                                    data-bs-slide-to="{{ $i / 2 }}" class="{{ $i === 0 ? 'active' : '' }}"
                                    aria-current="{{ $i === 0 ? 'true' : 'false' }}"
                                    aria-label="Slide {{ $i / 2 }}"></button>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-3">
        <div class="banner__container mx-auto border-top border-bottom py-1 text-center"
            style="color: rgb(107 114 128); font-size: 12px; line-height: 12px; font-weight: 300;">
            ОГОЛОШЕННЯ
        </div>
        @php
            $blockType = 'Блок №3 Головна сторінка';
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
                                                                                                {{ $headline }}</h3>
                                                                                        @endif
                                                                                        @if ($description)
                                                                                            <p
                                                                                                style="font-size: 14px; line-height: 16px; color: white; margin-top: 10px;">
                                                                                                {{ $description }}</p>
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
            @endif
        @else
        @endif
    </div>
    </div>
    </div>
    </div>
    <div class="container px-0">
        <div class="line-news__block border-top border-bottom border-black py-3 mb-4">
            <div class="d-xl-flex">
                @foreach ($data['Стрічка новин'] as $key => $item)
                    @if ($key >= 20 && $key <= 23)
                        <article class="{{ $key === 23 ? 'col px-4' : 'col px-4 xl-border-end' }}">
                            <a
                                href="{{ $item['feed'] === 'Загальнонаціональна стрічка' ? route('news.index', ['url' => $item['url']]) : route($city['news_link'], ['url' => $item['url']]) }}">
                                <h2 class="{{ $key === 23 ? '' : 'xl-mb-2-pb-2' }}">{{ $item['title'] }}</h2>
                                <p>{{ \Carbon\Carbon::parse($item['publishedAt'])->locale('uk')->isoFormat('D MMMM YYYY') }}
                                </p>
                            </a>
                        </article>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="sections-news__block d-xl-flex">
            <div class="col-xl-8 pe-xl-2">
                <div class="sience__block mb-4">
                    <div class="img-rel border-bottom">
                        <p class="block-title">Наука</p>
                        @foreach ($data['Наука'] as $key => $item)
                            @if ($key <= 1)
                                <article class="">
                                    <a class=""
                                        href="{{ $item['feed'] === 'Загальнонаціональна стрічка' ? route('news.index', ['url' => $item['url']]) : route($city['news_link'], ['url' => $item['url']]) }}">
                                        @if ($key === 0)
                                            <div class="img-abs">
                                                <img class="img-fluid w-100 h-100 xl-rounded object-fit-cover xl-w-biimg"
                                                    src="{{ $item['mainImage'] }}" alt="{{ $item['mainImgDesc'] }}">
                                                <p class="text-end text-gray-600 xl-id">{{ $item['mainImgAuthor'] }}</p>
                                            </div>
                                        @endif
                                        <div
                                            class="{{ $key === 0 ? 'border-bottom mb-3 xl-mb-4-px-4' : 'block-title' }} xl-w-bi">
                                            <h2 class="">{{ $item['title'] }}</h2>
                                            <p class="text-gray-600">{{ $item['desc'] }}</p>
                                        </div>
                                    </a>
                                </article>
                            @endif
                        @endforeach
                    </div>
                    <div class="block-title py-3 me-xl-1 ms-xl-1 d-xl-flex">
                        @foreach ($data['Наука'] as $key => $item)
                            @if ($key >= 2 && $key <= 3)
                                <article class="col-xl-6 {{ $key === 2 ? 'pe-xl-3 xl-border-end' : 'xl-ps-3' }}">
                                    <a
                                        href="{{ $item['feed'] === 'Загальнонаціональна стрічка' ? route('news.index', ['url' => $item['url']]) : route($city['news_link'], ['url' => $item['url']]) }}">
                                        <div class="{{ $key === 2 ? 'pb-border' : '' }}">
                                            <h2>{{ $item['title'] }}</h2>
                                            <p class="text-gray-600 mb-0">{{ $item['desc'] }}</p>
                                        </div>
                                    </a>
                                </article>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-xl-4 ps-xl-2 mb-4 xl-border-start">
                <div class="line-news__block mb-4 block-title">
                    @foreach ($data['Стрічка новин'] as $key => $item)
                        @if ($key >= 24 && $key <= 27)
                            <article class="pb-1 mb-2 px-xl-2 {{ $key === 27 ? '' : 'border-bottom' }}">
                                <a
                                    href="{{ $item['feed'] === 'Загальнонаціональна стрічка' ? route('news.index', ['url' => $item['url']]) : route($city['news_link'], ['url' => $item['url']]) }}">
                                    <div class="d-flex gap-2">
                                        <div class="w-100">
                                            <h2>{{ $item['title'] }}</h2>
                                            <p>{{ \Carbon\Carbon::parse($item['publishedAt'])->locale('uk')->isoFormat('D MMMM YYYY') }}
                                            </p>
                                        </div>
                                        <div class="" style="max-width: 80px; max-height: 80px">
                                            <img class="img-fluid rounded w-100 h-100 object-fit-cover"
                                                src="{{ $item['mainImage'] }}" alt="{{ $item['mainImgDesc'] }}">
                                        </div>
                                    </div>
                                </a>
                            </article>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <div class="line-news__block border-top border-bottom border-black py-3 mb-4">
            <div class="d-xl-flex">
                @foreach ($data['Стрічка новин'] as $key => $item)
                    @if ($key >= 28 && $key <= 31)
                        <article class="{{ $key === 31 ? 'col px-4' : 'col px-4 xl-border-end' }}">
                            <a
                                href="{{ $item['feed'] === 'Загальнонаціональна стрічка' ? route('news.index', ['url' => $item['url']]) : route($city['news_link'], ['url' => $item['url']]) }}">
                                <h2 class="{{ $key === 31 ? '' : 'xl-mb-2-pb-2' }}">{{ $item['title'] }}</h2>
                                <p>{{ \Carbon\Carbon::parse($item['publishedAt'])->locale('uk')->isoFormat('D MMMM YYYY') }}
                                </p>
                            </a>
                        </article>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <div class="mb-3">
        <div class="banner__container mx-auto border-top border-bottom py-1 text-center"
            style="color: rgb(107 114 128); font-size: 12px; line-height: 12px; font-weight: 300;">
            ОГОЛОШЕННЯ
        </div>
        @php
            $blockType = 'Блок №4 Головна сторінка';
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
                                                                                                {{ $headline }}</h3>
                                                                                        @endif
                                                                                        @if ($description)
                                                                                            <p
                                                                                                style="font-size: 14px; line-height: 16px; color: white; margin-top: 10px;">
                                                                                                {{ $description }}</p>
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
            @endif
        @else
        @endif
    </div>
    </div>
    </div>
    </div>
    <div class="container px-0">
        <div class="sections-news__block d-xl-flex">
            <div class="col-xl-8 pe-xl-2">
                <div class="culture__block">
                    <div class="position-relative mb-2">
                        <p class="block-title">Культура, музика та кіно</p>
                        @foreach ($data['Культура, музика та кіно'] as $key => $item)
                            @if ($key <= 1)
                                <article class="">
                                    <a class=""
                                        href="{{ $item['feed'] === 'Загальнонаціональна стрічка' ? route('news.index', ['url' => $item['url']]) : route($city['news_link'], ['url' => $item['url']]) }}">
                                        @if ($key === 0)
                                            <div class="img-abs">
                                                <img class="img-fluid w-100 h-100 xl-rounded object-fit-cover xl-w-biimg"
                                                    src="{{ $item['mainImage'] }}" alt="{{ $item['mainImgDesc'] }}">
                                                <p class="text-end text-gray-600 xl-id">{{ $item['mainImgAuthor'] }}</p>
                                            </div>
                                        @endif
                                        <div
                                            class="{{ $key === 0 ? 'border-bottom mb-3 xl-mb-4-px-4' : 'block-title' }} xl-w-bi">
                                            <h2 class="">{{ $item['title'] }}</h2>
                                            <p class="text-gray-600">{{ $item['desc'] }}</p>
                                        </div>
                                    </a>
                                </article>
                            @endif
                        @endforeach
                    </div>
                    <div class="culture__carousel pb-4 mb-4">
                        <div id="carouselCulture" class="carousel slide carousel-dark block-title">
                            <div class="carousel-inner">
                                @for ($i = 2; $i < count($data['Культура, музика та кіно']); $i++)
                                    <div class="carousel-item{{ $i === 2 ? ' active' : '' }} border rounded p-3">
                                        <article>
                                            <a
                                                href="{{ $data['Культура, музика та кіно'][$i]['feed'] === 'Загальнонаціональна стрічка'
                                                    ? route('homepage.index') . '/news/' . $data['Культура, музика та кіно'][$i]['url']
                                                    : route($city['news_link'], ['url' => $data['Культура, музика та кіно'][$i]['url']]) }}">
                                                <div class="d-xl-flex align-items-center gap-4">
                                                    <div class="title-cont-sm-slide">
                                                        <h2>{{ $data['Культура, музика та кіно'][$i]['title'] }}</h2>
                                                        <p class="text-gray-600">
                                                            {{ $data['Культура, музика та кіно'][$i]['desc'] }}</p>
                                                    </div>
                                                    <div class="mb-4 img-cont-sm-slide">
                                                        <img class="img-fluid rounded object-fit-cover img-sm-slide"
                                                            src="{{ $data['Культура, музика та кіно'][$i]['mainImage'] }}"
                                                            alt="{{ $data['Культура, музика та кіно'][$i]['mainImgDesc'] }}">
                                                    </div>
                                                </div>
                                            </a>
                                        </article>
                                    </div>
                                @endfor
                            </div>
                            <div class="carousel-indicators pb-2" style="transform: translateY(20px)">
                                @for ($i = 2; $i < count($data['Культура, музика та кіно']); $i++)
                                    <button type="button" data-bs-target="#carouselCulture"
                                        data-bs-slide-to="{{ $i - 2 }}"
                                        class="{{ $i === 2 ? 'active' : '' }}"
                                        aria-current="{{ $i === 2 ? 'true' : 'false' }}"
                                        aria-label="Slide {{ $i - 2 }}"></button>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 ps-xl-2 mb-4 xl-border-start">
                <div class="line-news__block block-title">
                    @foreach ($data['Стрічка новин'] as $key => $item)
                        @if ($key >= 32 && $key <= 34)
                            <article class="pb-1 mb-2 px-xl-2 {{ $key === 34 ? '' : 'border-bottom' }}">
                                <a
                                    href="{{ $item['feed'] === 'Загальнонаціональна стрічка' ? route('news.index', ['url' => $item['url']]) : route($city['news_link'], ['url' => $item['url']]) }}">
                                    @if ($key === 32)
                                        <div class="">
                                            <img class="img-fluid rounded" src="{{ $item['mainImage'] }}"
                                                alt="{{ $item['mainImgDesc'] }}">
                                            <p class="text-end text-gray-600">{{ $item['mainImgAuthor'] }}</p>
                                        </div>
                                    @endif
                                    <h2>{{ $item['title'] }}</h2>
                                    <p>{{ \Carbon\Carbon::parse($item['publishedAt'])->locale('uk')->isoFormat('D MMMM YYYY') }}
                                    </p>
                                </a>
                            </article>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <div class="line-news__block border-top border-bottom border-black pt-3 mb-4">
            <div class="line-news__block mb-4 block-title">
                <div class="row">
                    @foreach ($data['Стрічка новин'] as $key => $item)
                        @if ($key >= 35 && $key <= 40)
                            <article class="col-xl-4 pb-1 mb-2">
                                <a
                                    href="{{ $item['feed'] === 'Загальнонаціональна стрічка' ? route('news.index', ['url' => $item['url']]) : route($city['news_link'], ['url' => $item['url']]) }}">
                                    <div class="d-flex gap-2">
                                        <div class="w-100">
                                            <h2>{{ $item['title'] }}</h2>
                                            <p>{{ \Carbon\Carbon::parse($item['publishedAt'])->locale('uk')->isoFormat('D MMMM YYYY') }}
                                            </p>
                                        </div>
                                        <div class="" style="max-width: 80px; max-height: 80px">
                                            <img class="img-fluid rounded w-100 h-100 object-fit-cover"
                                                src="{{ $item['mainImage'] }}" alt="{{ $item['mainImgDesc'] }}">
                                        </div>
                                    </div>
                                </a>
                            </article>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <div class="sections-news__block d-xl-flex">
            <div class="col-xl-8 pe-xl-2">
                <div class="sience__block mb-4">
                    <div class="img-rel border-bottom">
                        <p class="block-title">Спорт</p>
                        @foreach ($data['Спорт'] as $key => $item)
                            @if ($key <= 1)
                                <article class="">
                                    <a class=""
                                        href="{{ $item['feed'] === 'Загальнонаціональна стрічка' ? route('news.index', ['url' => $item['url']]) : route($city['news_link'], ['url' => $item['url']]) }}">
                                        @if ($key === 0)
                                            <div class="img-abs">
                                                <img class="img-fluid w-100 h-100 xl-rounded object-fit-cover xl-w-biimg"
                                                    src="{{ $item['mainImage'] }}" alt="{{ $item['mainImgDesc'] }}">
                                                <p class="text-end text-gray-600 xl-id">{{ $item['mainImgAuthor'] }}</p>
                                            </div>
                                        @endif
                                        <div
                                            class="{{ $key === 0 ? 'border-bottom mb-3 xl-mb-4-px-4' : 'block-title' }} xl-w-bi">
                                            <h2 class="">{{ $item['title'] }}</h2>
                                            <p class="text-gray-600">{{ $item['desc'] }}</p>
                                        </div>
                                    </a>
                                </article>
                            @endif
                        @endforeach
                    </div>
                    <div class="block-title py-3 me-xl-1 ms-xl-1 d-xl-flex">
                        @foreach ($data['Спорт'] as $key => $item)
                            @if ($key >= 2 && $key <= 3)
                                <article class="col-xl-6 {{ $key === 2 ? 'pe-xl-3 xl-border-end' : 'xl-ps-3' }}">
                                    <a
                                        href="{{ $item['feed'] === 'Загальнонаціональна стрічка' ? route('news.index', ['url' => $item['url']]) : route($city['news_link'], ['url' => $item['url']]) }}">
                                        <div class="{{ $key === 2 ? 'pb-border' : '' }}">
                                            <h2>{{ $item['title'] }}</h2>
                                            <p class="text-gray-600 mb-0">{{ $item['desc'] }}</p>
                                        </div>
                                    </a>
                                </article>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-xl-4 ps-xl-2 mb-4 xl-border-start">
                <div class="line-news__block mb-4 block-title">
                    @foreach ($data['Стрічка новин'] as $key => $item)
                        @if ($key >= 41 && $key <= 45)
                            <article class="pb-1 mb-2 px-xl-2 {{ $key === 45 ? '' : 'border-bottom' }}">
                                <a
                                    href="{{ $item['feed'] === 'Загальнонаціональна стрічка' ? route('news.index', ['url' => $item['url']]) : route($city['news_link'], ['url' => $item['url']]) }}">
                                    <div class="d-flex gap-2">
                                        <div class="w-100">
                                            <h2>{{ $item['title'] }}</h2>
                                            <p>{{ \Carbon\Carbon::parse($item['publishedAt'])->locale('uk')->isoFormat('D MMMM YYYY') }}
                                            </p>
                                        </div>
                                        <div class="" style="max-width: 80px; max-height: 80px">
                                            <img class="img-fluid rounded w-100 h-100 object-fit-cover"
                                                src="{{ $item['mainImage'] }}" alt="{{ $item['mainImgDesc'] }}">
                                        </div>
                                    </div>
                                </a>
                            </article>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="mb-3">
        <div class="banner__container mx-auto border-top border-bottom py-1 text-center"
            style="color: rgb(107 114 128); font-size: 12px; line-height: 12px; font-weight: 300;">
            ОГОЛОШЕННЯ
        </div>
        @php
            $blockType = 'Блок №5 Головна сторінка';
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
                                                                                                {{ $headline }}</h3>
                                                                                        @endif
                                                                                        @if ($description)
                                                                                            <p
                                                                                                style="font-size: 14px; line-height: 16px; color: white; margin-top: 10px;">
                                                                                                {{ $description }}</p>
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
            @endif
        @else
        @endif
    </div>
    </div>
    </div>
    </div>
    <div class="container px-0">
        <div class="sections-fivecard__block border-top border-black py-3">
            <div class="power__block border-bottom mb-3">
                <p class="block-title">Політика та Влада</p>
                <div class="d-xl-flex">
                    @foreach ($data['Політика та Влада'] as $key => $item)
                        <article
                            class="col-xl px-0 px-xl-3 {{ $key === 0 ? 'ps-0' : '' }} {{ $key === 4 ? 'pe-0' : '' }}">
                            <a
                                href="{{ $item['feed'] === 'Загальнонаціональна стрічка' ? route('news.index', ['url' => $item['url']]) : route($city['news_link'], ['url' => $item['url']]) }}">
                                <div>
                                    <img class="mb-2 img-fluid w-100 h-100 xl-rounded object-fit-cover fivecard-img"
                                        src="{{ $item['mainImage'] }}" alt="{{ $item['mainImgDesc'] }}">
                                    <h2 class="block-title">{{ $item['title'] }}</h2>
                                </div>
                            </a>
                        </article>
                    @endforeach
                </div>
            </div>
            <div class="america__block border-bottom mb-3">
                <p class="block-title">Північна та Південна Америка</p>
                <div class="d-xl-flex">
                    @foreach ($data['Північна та Південна Америка'] as $key => $item)
                        <article
                            class="col-xl px-0 px-xl-3 {{ $key === 0 ? 'ps-0' : '' }} {{ $key === 4 ? 'pe-0' : '' }}">
                            <a
                                href="{{ $item['feed'] === 'Загальнонаціональна стрічка' ? route('news.index', ['url' => $item['url']]) : route($city['news_link'], ['url' => $item['url']]) }}">
                                <div>
                                    <img class="mb-2 img-fluid w-100 h-100 xl-rounded object-fit-cover fivecard-img"
                                        src="{{ $item['mainImage'] }}" alt="{{ $item['mainImgDesc'] }}">
                                    <h2 class="block-title">{{ $item['title'] }}</h2>
                                </div>
                            </a>
                        </article>
                    @endforeach
                </div>
            </div>
            <div class="middle__block border-bottom mb-3">
                <p class="block-title">Близький схід</p>
                <div class="d-xl-flex">
                    @foreach ($data['Близький схід'] as $key => $item)
                        <article
                            class="col-xl px-0 px-xl-3 {{ $key === 0 ? 'ps-0' : '' }} {{ $key === 4 ? 'pe-0' : '' }}">
                            <a
                                href="{{ $item['feed'] === 'Загальнонаціональна стрічка' ? route('news.index', ['url' => $item['url']]) : route($city['news_link'], ['url' => $item['url']]) }}">
                                <div>
                                    <img class="mb-2 img-fluid w-100 h-100 xl-rounded object-fit-cover fivecard-img"
                                        src="{{ $item['mainImage'] }}" alt="{{ $item['mainImgDesc'] }}">
                                    <h2 class="block-title">{{ $item['title'] }}</h2>
                                </div>
                            </a>
                        </article>
                    @endforeach
                </div>
            </div>
            <div class="pacific__block border-bottom mb-3">
                <p class="block-title">Тихоокеанський регіон</p>
                <div class="d-xl-flex">
                    @foreach ($data['Тихоокеанський регіон'] as $key => $item)
                        <article
                            class="col-xl px-0 px-xl-3 {{ $key === 0 ? 'ps-0' : '' }} {{ $key === 4 ? 'pe-0' : '' }}">
                            <a
                                href="{{ $item['feed'] === 'Загальнонаціональна стрічка' ? route('news.index', ['url' => $item['url']]) : route($city['news_link'], ['url' => $item['url']]) }}">
                                <div>
                                    <img class="mb-2 img-fluid w-100 h-100 xl-rounded object-fit-cover fivecard-img"
                                        src="{{ $item['mainImage'] }}" alt="{{ $item['mainImgDesc'] }}">
                                    <h2 class="block-title">{{ $item['title'] }}</h2>
                                </div>
                            </a>
                        </article>
                    @endforeach
                </div>
            </div>
            <div class="africa__block">
                <p class="block-title">Африка</p>
                <div class="d-xl-flex">
                    @foreach ($data['Африка'] as $key => $item)
                        <article
                            class="col-xl px-0 px-xl-3 {{ $key === 0 ? 'ps-0' : '' }} {{ $key === 4 ? 'pe-0' : '' }}">
                            <a
                                href="{{ $item['feed'] === 'Загальнонаціональна стрічка' ? route('news.index', ['url' => $item['url']]) : route($city['news_link'], ['url' => $item['url']]) }}">
                                <div>
                                    <img class="mb-2 img-fluid w-100 h-100 xl-rounded object-fit-cover fivecard-img"
                                        src="{{ $item['mainImage'] }}" alt="{{ $item['mainImgDesc'] }}">
                                    <h2 class="block-title">{{ $item['title'] }}</h2>
                                </div>
                            </a>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
