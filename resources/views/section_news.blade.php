@extends('layouts.line_news')
@section('section_news')
    {{-- Блок №1 Розділи --}}
    <div class="mb-3">
        <div class="banner__container mx-auto border-top border-bottom py-1 text-center"
            style="color: rgb(107 114 128); font-size: 12px; line-height: 12px; font-weight: 300;">
            ОГОЛОШЕННЯ
        </div>
        @php
            $blockType = 'Блок №1 Розділи';
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
                        <div id="carouselFirstBanner" class="carousel slide carousel-dark mx-auto" style="max-width: 1200px;">
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
                                                    <div class="d-flex flex-column text-start w-100">
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
                                    <div id="carouselFirstBanner" class="carousel slide mx-auto" style="max-width: 1200px;">
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
                                                                <div class="d-flex flex-column text-start text-white w-100">
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
                                                <div id="carouselFirstBanner" class="carousel slide carousel-dark mx-auto">
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
                                        data-bs-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}">
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
                                        data-bs-slide-to="{{ $i }}" class="{{ $i == 0 ? 'active' : '' }}">
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
    <div class="container px-xl-0">
        <div class="my-3 pb-3 border-bottom border-black">
            <h1>{{ $metaData['title'] }}</h1>
            <p>{{ $metaData['description'] }}</p>
        </div>
        <div class="articles d-xl-flex gap-3 border-bottom pb-3 mb-3">
            <div class="block-2 border-e pe-xl-3 bb-sm mb-3 mb-xl-0">
                @foreach ($data as $key => $item)
                    @if ($key < 1)
                        <article>
                            <a href="{{ route('news.index', ['url' => $item['url']]) }}" class="bb-sm">
                                <img class="mb-2 img-fluid w-100 h-100 rounded object-fit-cover"
                                    src="{{ $item['mainImage'] }}" alt="{{ $item['mainImgDesc'] }}">
                                <h2>{{ $item['title'] }}</h2>
                                <p>{{ $item['desc'] }}</p>
                                <div>
                                    <p>
                                        <time>{{ \Carbon\Carbon::parse($item['publishedAt'])->locale('uk')->isoFormat('D MMMM YYYY') }}</time>
                                    </p>
                                </div>
                            </a>
                        </article>
                    @endif
                @endforeach
            </div>
            <div class="block-1">
                @foreach ($data as $key => $item)
                    @if ($key >= 1 && $key <= 2)
                        <article>
                            <a href="{{ route('news.index', ['url' => $item['url']]) }}">
                                <div
                                    class="{{ $key === 1 ? 'border-bottom mb-3' : '' }} {{ $key === 2 ? 'bb-sm mb-3 mb-xl-0' : '' }}">
                                    @if ($key === 1)
                                        <img class="mb-2 img-fluid w-100 h-100 rounded object-fit-cover"
                                            src="{{ $item['mainImage'] }}" alt="{{ $item['mainImgDesc'] }}">
                                    @endif
                                    <h2>{{ $item['title'] }}</h2>
                                    <p>{{ $item['desc'] }}</p>
                                    <div>
                                        <p>
                                            <time>{{ \Carbon\Carbon::parse($item['publishedAt'])->locale('uk')->isoFormat('D MMMM YYYY') }}</time>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </article>
                    @endif
                @endforeach
            </div>
            <div class="block-3 border-s ps-xl-3">
                @foreach ($data as $key => $item)
                    @if ($key >= 3 && $key <= 5)
                        <article>
                            <a href="{{ route('news.index', ['url' => $item['url']]) }}">
                                <div class="{{ $key < 5 ? 'border-bottom mb-3' : '' }}">
                                    <h2>{{ $item['title'] }}</h2>
                                    <p>{{ $item['desc'] }}</p>
                                    <div>
                                        <p>
                                            <time>{{ \Carbon\Carbon::parse($item['publishedAt'])->locale('uk')->isoFormat('D MMMM YYYY') }}</time>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </article>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="d-xl-flex border-bottom border-black pb-3 mb-3">
            @foreach ($data as $key => $item)
                @if ($key > 5 && $key < 10)
                    <article class="{{ $key === 9 ? 'col px-xl-4' : 'col px-xl-4 border-e' }}">
                        <a href="{{ route('news.index', ['url' => $item['url']]) }}">
                            <div class="{{ $key === 9 ? '' : 'xl-mb-2-pb-2' }}">
                                <h2>{{ $item['title'] }}</h2>
                                <p>
                                    <time>{{ \Carbon\Carbon::parse($item['publishedAt'])->locale('uk')->isoFormat('D MMMM YYYY') }}</time>
                                </p>
                            </div>
                        </a>
                    </article>
                @endif
            @endforeach
        </div>
        <div class="d-xl-flex gap-4 img-cont border-bottom border-black justify-content-between mb-3">
            @foreach ($data as $key => $item)
                @if ($key > 9 && $key < 14)
                    <article class="">
                        <a href="{{ route('news.index', ['url' => $item['url']]) }}">
                            <img class="mb-2 img-fluid w-100 h-100 rounded object-fit-cover"
                                src="{{ $item['mainImage'] }}" alt="{{ $item['mainImgDesc'] }}">
                            <h2 class="{{ $key === 9 ? '' : 'mb-2 pb-2' }}">{{ $item['title'] }}</h2>
                            <div class="{{ $key !== 13 ? 'bb-sm mb-3 mb-xl-0' : '' }}">
                                <p>
                                    <time>{{ \Carbon\Carbon::parse($item['publishedAt'])->locale('uk')->isoFormat('D MMMM YYYY') }}</time>
                                </p>
                            </div>
                        </a>
                    </article>
                @endif
            @endforeach
        </div>
    </div>
    {{-- Блок №2 Розділи --}}
    <div class="mb-3">
        <div class="banner__container mx-auto border-top border-bottom py-1 text-center"
            style="color: rgb(107 114 128); font-size: 12px; line-height: 12px; font-weight: 300;">
            ОГОЛОШЕННЯ
        </div>
        @php
            $blockType = 'Блок №2 Розділи';
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
                                                    <div class="d-flex flex-column text-start w-100">
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
                                                                <div class="d-flex flex-column text-start text-white w-100">
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
    <div class="container px-xl-0">
        <div class="d-xl-flex gap-3">
            <div class="endless mx-auto border-top border-black pt-3">
                @foreach ($data as $key => $item)
                    @if ($key > 14 && $key < 24)
                        <article class="{{ $key === 23 ? 'mb-3' : 'border-bottom mb-3' }}">
                            <a href="{{ route('news.index', ['url' => $item['url']]) }}"
                                class="d-xl-flex d-flex gap-4 justify-content-between">
                                <div class="d-xl-flex gap-4 justify-content-between"
                                    style="max-width: 608px; width: 100%;">
                                    <div class="endless-info">
                                        <p><time>{{ \Carbon\Carbon::parse($item['publishedAt'])->locale('uk')->isoFormat('D MMMM YYYY') }}</time>
                                        </p>
                                    </div>
                                    <div class="endless-title">
                                        <h2 class="{{ $key === 8 ? '' : 'mb-2 pb-2' }}">{{ $item['title'] }}</h2>
                                        <p class="d-none d-xl-block">{{ $item['desc'] }}</p>
                                    </div>
                                </div>
                                <div class="img-prev img-mini">
                                    <img class="mb-3 mb-xl-2 img-fluid w-100 h-100 rounded object-fit-cover"
                                        src="{{ $item['mainImage'] }}" alt="{{ $item['mainImgDesc'] }}">
                                </div>
                            </a>
                        </article>
                    @endif
                @endforeach
            </div>
            <div class="endless-search mx-auto mb-3 border-top border-black pt-3 w-100">
                <form action="/search" method="GET">
                    <input type="text" name="query" placeholder="Що Вас цікавить?">
                    <button type="submit">Пошук</button>
                </form>
            </div>
        </div>
    </div>
    {{-- Блок №3 Розділи --}}
    <div class="mb-3">
        <div class="banner__container mx-auto border-top border-bottom py-1 text-center"
            style="color: rgb(107 114 128); font-size: 12px; line-height: 12px; font-weight: 300;">
            ОГОЛОШЕННЯ
        </div>
        @php
            $blockType = 'Блок №3 Розділи';
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
                        <div id="carouselThreeBanner" class="carousel slide carousel-dark mx-auto"
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
                                                    <div class="d-flex flex-column text-start w-100">
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
                                    <div id="carouselThreeBanner" class="carousel slide mx-auto"
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
                                                                <div class="d-flex flex-column text-start text-white  w-100">
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
                                                <div id="carouselThreeBanner"
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
                                                            <div id="carouselThreeBanner"
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
                            data-bs-target="#carouselThreeBanner" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next banner-contol" type="button"
                            data-bs-target="#carouselThreeBanner" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                        <div class="d-none d-md-block">
                            <ol class="carousel-indicators" style="position: absolute; bottom: 100px;">
                                @foreach ($images as $key => $image)
                                    <li style="list-style: none;" data-bs-target="#carouselThreeBanner"
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
                            data-bs-target="#carouselThreeBanner" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next banner-contol" type="button"
                            data-bs-target="#carouselThreeBanner" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                        <div class="d-none d-md-block">
                            <ol class="carousel-indicators" style="position: absolute; bottom: 100px;">
                                @foreach ($images as $key => $image)
                                    <li style="list-style: none;" data-bs-target="#carouselThreeBanner"
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
                            data-bs-target="#carouselThreeBanner" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next banner-contol" type="button"
                            data-bs-target="#carouselThreeBanner" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                        <div class="d-none d-md-block">
                            <ol class="carousel-indicators" style="position: absolute; bottom: -10px;">
                                @for ($i = 0; $i < count($images) / 2; $i++)
                                    <li style="list-style: none;" data-bs-target="#carouselThreeBanner"
                                        data-bs-slide-to="{{ $i }}" class="{{ $i == 0 ? 'active' : '' }}">
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
                            data-bs-target="#carouselThreeBanner" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next banner-contol" type="button"
                            data-bs-target="#carouselThreeBanner" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                        <div class="d-none d-md-block">
                            <ol class="carousel-indicators" style="position: absolute; bottom: -10px;">
                                @for ($i = 0; $i < count($images) / 2; $i++)
                                    <li style="list-style: none;" data-bs-target="#carouselThreeBanner"
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
    <div class="container px-xl-0">
        <div class="endless">
            @foreach ($data as $key => $item)
                @if ($key >= 24)
                    <article class="border-bottom mb-3 article-w">
                        <a href="{{ route('news.index', ['url' => $item['url']]) }}"
                            class="d-xl-flex d-flex gap-4 justify-content-between">
                            <div class="d-xl-flex gap-4 justify-content-between">
                                <div class="endless-info">
                                    <p>
                                        <time>{{ \Carbon\Carbon::parse($item['publishedAt'])->locale('uk')->isoFormat('D MMMM YYYY') }}</time>
                                    </p>
                                </div>
                                <div class="endless-title">
                                    <h2 class="{{ $key === 8 ? '' : 'mb-2 pb-2' }}">{{ $item['title'] }}</h2>
                                    <p class="d-none d-xl-block">{{ $item['desc'] }}</p>
                                </div>
                            </div>
                            <div class="img-prev img-mini">
                                <img class="mb-3 mb-xl-2 img-fluid w-100 h-100 rounded object-fit-cover"
                                    src="{{ $item['mainImage'] }}" alt="{{ $item['mainImgDesc'] }}">
                            </div>
                        </a>
                    </article>
                @endif
            @endforeach
        </div>
    </div>
@endsection
