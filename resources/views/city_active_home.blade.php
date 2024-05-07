@extends('layouts.city_main')
@section('city_active_home')
    <div class="banner__container mx-auto border-top border-bottom mb-3 py-1 text-center"
        style="color: rgb(107 114 128); font-size: 12px; line-height: 12px; font-weight: 300;">
        ОГОЛОШЕННЯ
    </div>
    <div class="container px-0">
        <div class="mx-auto text-xl-center" style="max-width: 800px;">
            @foreach ($data['Заголовок газети 24 години'] as $key => $item)
                @php
                    $currentDate = \Carbon\Carbon::now();
                    $currentDate->addHours(2);
                    $publicationDate = \Carbon\Carbon::parse($item['publishedAt']);
                @endphp

                @if ($publicationDate->greaterThanOrEqualTo($currentDate->subHours(24)))
                    <article class="">
                        <a
                            href="{{ $item['feed'] === 'Загальнонаціональна стрічка' ? route('news.index', ['url' => $item['url']]) : route($city['news_link'], ['url' => $item['url']]) }}">
                            <div class="">
                                <h2 class="main-title">{{ $item['title'] }}</h2>
                            </div>
                        </a>
                    </article>
                @break
            @endif
        @endforeach
    </div>
</div>
<div class="container px-0">
    <div class="main-today__block border-bottom pb-4 mb-3 border-black">
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
</div>
<div class="container px-0">
    <div class="sections-news__block d-xl-flex">
        <div class="col-xl-8 pe-xl-3">
            <h2 class="pb-3 city-title" style="font-weight: bold; font-size: 12px; line-height: 15px;">ОСТАННІ
                НОВИНИ
                МІСТА</h2>
            <div class="d-xl-flex d-flex flex-xl-row flex-column-reverse border-b border-black mb-3 gap-xl-4">
                <div class="city-news">
                    @foreach ($feed as $key => $item)
                        @if ($key < 1)
                            <article>
                                <a href="{{ route($city['news_link'], ['url' => $item['url']]) }}">
                                    <h2>{{ $item['title'] }}</h2>
                                </a>
                            </article>
                        @endif
                        <ul class="city-list">
                            @if ($key > 0 && $key < 4)
                                <li>
                                    <article>
                                        <a href="{{ route($city['news_link'], ['url' => $item['url']]) }}">
                                            <h2>{{ $item['title'] }}</h2>
                                        </a>
                                    </article>
                                </li>
                            @endif
                        </ul>
                    @endforeach
                </div>
                <div class="city-news-img__cont">
                    @foreach ($feed as $key => $item)
                        @if ($key < 1)
                            <article>
                                <a href="{{ route($city['news_link'], ['url' => $item['url']]) }}">
                                    <img class="img-fluid xl-rounded object-fit-cover" src="{{ $item['mainImage'] }}"
                                        alt="{{ $item['mainImgDesc'] }}">
                                    <p class="img-figcaption">{{ $item['mainImgAuthor'] }}</p>
                                </a>
                            </article>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="border-bottom border-black mb-3">
                @foreach ($feed as $key => $item)
                    @if ($key === 4)
                        <article class="city-news-container">
                            <a href="{{ route($city['news_link'], ['url' => $item['url']]) }}">
                                <div class="d-xl-flex gap-xl-4">
                                    <div class="city-title">
                                        <h2>{{ $item['title'] }}</h2>
                                        <p>{{ $item['desc'] }}</p>
                                        <p>
                                            {{ \Carbon\Carbon::parse($item['publishedAt'])->locale('uk')->isoFormat('D MMMM YYYY') }},
                                            {{ $item['section'] }}
                                        </p>
                                    </div>
                                    <div class="city-news-img__cont">
                                        <img class="img-fluid xl-rounded object-fit-cover"
                                            src="{{ $item['mainImage'] }}" alt="{{ $item['mainImgDesc'] }}">
                                        <p class="img-figcaption">{{ $item['mainImgAuthor'] }}</p>
                                    </div>
                                </div>
                            </a>
                        </article>
                    @endif
                @endforeach
            </div>
            @foreach ($feed as $key => $item)
                @if ($key > 4 && $key < 9)
                    <div class="border-bottom border-black mb-3">
                        <article class="city-news-container">
                            <a href="{{ route($city['news_link'], ['url' => $item['url']]) }}">
                                <div class="d-xl-flex gap-xl-4">
                                    <div class="city-title">
                                        <h2>{{ $item['title'] }}</h2>
                                        <p>{{ $item['desc'] }}</p>
                                        <p>
                                            {{ \Carbon\Carbon::parse($item['publishedAt'])->locale('uk')->isoFormat('D MMMM YYYY') }},
                                            {{ $item['section'] }}
                                        </p>
                                    </div>
                                    <div class="city-news-img__cont">
                                        <img class="img-fluid xl-rounded object-fit-cover"
                                            src="{{ $item['mainImage'] }}" alt="{{ $item['mainImgDesc'] }}">
                                        <p class="img-figcaption">{{ $item['mainImgAuthor'] }}</p>
                                    </div>
                                </div>
                            </a>
                        </article>
                    </div>
                @endif
            @endforeach
            <h2 class="city-title" style="font-weight: bold; font-size: 12px; line-height: 15px;">
                <a href="{{ route('suspilstvo.index') }}">Суспільство
                    України »</a>
            </h2>
            <div class="d-xl-flex d-flex flex-xl-row flex-column-reverse mb-3 gap-xl-4">
                <div class="city-news">
                    @foreach ($data['Суспільство'] as $key => $item)
                        @if ($key < 1)
                            <article>
                                <a href="{{ route('news.index', ['url' => $item['url']]) }}">
                                    <h2>{{ $item['title'] }}</h2>
                                </a>
                            </article>
                        @endif
                        <ul class="city-list">
                            @if ($key > 0 && $key < 4)
                                <li>
                                    <article>
                                        <a href="{{ route('news.index', ['url' => $item['url']]) }}">
                                            <h2>{{ $item['title'] }}</h2>
                                        </a>
                                    </article>
                                </li>
                            @endif
                        </ul>
                    @endforeach
                </div>
                <div class="city-news-img__cont">
                    @foreach ($data['Суспільство'] as $key => $item)
                        @if ($key < 1)
                            <article>
                                <a href="{{ route('news.index', ['url' => $item['url']]) }}">
                                    <img class="img-fluid xl-rounded object-fit-cover" src="{{ $item['mainImage'] }}"
                                        alt="{{ $item['mainImgDesc'] }}">
                                    <p class="img-figcaption">{{ $item['mainImgAuthor'] }}</p>
                                </a>
                            </article>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-xl-4 ps-xl-3 mb-4 xl-border-start">
            <div class="d-flex mb-2 block-title">
                <h2 style="font-weight: bold; font-size: 12px; line-height: 15px;">СЬОГОДНІШНЯ ГАЗЕТА</h2>
            </div>
            <div class="line-news__block block-title">
                @foreach ($newsToday as $item)
                    <article>
                        <a href="{{ route('news.index', ['url' => $item['url']]) }}">
                            <h2>{{ $item['title'] }}</h2>
                            <p>{{ $item['section'] }}</p>
                        </a>
                    </article>
                @endforeach
            </div>
            <div class="more-news under text-end" style="font-weight: bold; font-size: 12px; line-height: 15px;">
                <a href="{{ route('news-today.index') }}">Більше новин »</a>
            </div>
        </div>
    </div>
</div>
<div class="banner__container mx-auto border-top border-bottom mb-3 py-1 text-center"
    style="color: rgb(107 114 128); font-size: 12px; line-height: 12px; font-weight: 300;">
    ОГОЛОШЕННЯ
</div>
<div class="container px-0 border-top border-black pt-3">
    <div class="sections-news__block d-xl-flex">
        <div class="col-xl-8 pe-xl-3">
            <h2 class="pb-3 city-title" style="font-weight: bold; font-size: 12px; line-height: 15px;">БІЛЬШЕ
                НОВИН</h2>
            @foreach ($feed as $key => $item)
                @if ($key > 9 && $key < 16)
                    <div class="border-bottom border-black mb-3">
                        <article class="city-news-container">
                            <a href="{{ route($city['news_link'], ['url' => $item['url']]) }}">
                                <div class="d-xl-flex gap-xl-4">
                                    <div class="city-title">
                                        <h2>{{ $item['title'] }}</h2>
                                        <p>{{ $item['desc'] }}</p>
                                        <p>
                                            {{ \Carbon\Carbon::parse($item['publishedAt'])->locale('uk')->isoFormat('D MMMM YYYY') }},
                                            {{ $item['section'] }}
                                        </p>
                                    </div>
                                    <div class="city-news-img__cont">
                                        <img class="img-fluid xl-rounded object-fit-cover"
                                            src="{{ $item['mainImage'] }}" alt="{{ $item['mainImgDesc'] }}">
                                        <p class="img-figcaption">{{ $item['mainImgAuthor'] }}</p>
                                    </div>
                                </div>
                            </a>
                        </article>
                    </div>
                @endif
            @endforeach
            <h2 class="city-title" style="font-weight: bold; font-size: 12px; line-height: 15px;">
                <a href="{{ route('vijna.index') }}">Війна Росії
                    проти
                    України »</a>
            </h2>
            <div class="d-xl-flex d-flex flex-xl-row flex-column-reverse mb-3 gap-xl-4">
                <div class="city-news">
                    @foreach ($data['Війна Росії проти України'] as $key => $item)
                        @if ($key < 1)
                            <article>
                                <a href="{{ route('news.index', ['url' => $item['url']]) }}">
                                    <h2>{{ $item['title'] }}</h2>
                                </a>
                            </article>
                        @endif
                        <ul class="city-list">
                            @if ($key > 0 && $key < 4)
                                <li>
                                    <article>
                                        <a href="{{ route('news.index', ['url' => $item['url']]) }}">
                                            <h2>{{ $item['title'] }}</h2>
                                        </a>
                                    </article>
                                </li>
                            @endif
                        </ul>
                    @endforeach
                </div>
                <div class="city-news-img__cont">
                    @foreach ($data['Війна Росії проти України'] as $key => $item)
                        @if ($key < 1)
                            <article>
                                <a href="{{ route('news.index', ['url' => $item['url']]) }}">
                                    <img class="img-fluid xl-rounded object-fit-cover" src="{{ $item['mainImage'] }}"
                                        alt="{{ $item['mainImgDesc'] }}">
                                    <p class="img-figcaption">{{ $item['mainImgAuthor'] }}</p>
                                </a>
                            </article>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-xl-4 ps-xl-3 mb-4 xl-border-start">
            <div class="line-news__block mb-4 block-title">
                <div class="d-flex justify-content-between">
                    <h2 style="font-weight: bold; font-size: 12px; line-height: 15px;">ЄВРОПА</h2>
                    <a class="under" href="{{ route('europe.index') }}">Більше новин »</a>
                </div>
                <div class="border-bottom border-black mb-3">
                    @foreach ($data['Європа'] as $key => $item)
                        @if ($key < 1)
                            <article>
                                <a href="{{ route('news.index', ['url' => $item['url']]) }}">
                                    <h2>{{ $item['title'] }}</h2>
                                    <p>{{ $item['desc'] }}</p>
                                    <img class="img-fluid xl-rounded object-fit-cover" src="{{ $item['mainImage'] }}"
                                        alt="{{ $item['mainImgDesc'] }}">
                                </a>
                            </article>
                        @endif
                        <ul class="city-list">
                            @if ($key > 0)
                                <li>
                                    <article>
                                        <a href="{{ route('news.index', ['url' => $item['url']]) }}">
                                            <h2>{{ $item['title'] }}</h2>
                                        </a>
                                    </article>
                                </li>
                            @endif
                        </ul>
                    @endforeach
                </div>
                <div class="d-flex justify-content-between">
                    <h2 style="font-weight: bold; font-size: 12px; line-height: 15px;">США</h2>
                    <a class="under" href="{{ route('usa.index') }}">Більше новин »</a>
                </div>
                <div class="border-bottom border-black mb-3">
                    @foreach ($data['Сполучені Штати'] as $key => $item)
                        @if ($key < 1)
                            <article>
                                <a href="{{ route('news.index', ['url' => $item['url']]) }}">
                                    <h2>{{ $item['title'] }}</h2>
                                    <p>{{ $item['desc'] }}</p>
                                    <img class="img-fluid xl-rounded object-fit-cover" src="{{ $item['mainImage'] }}"
                                        alt="{{ $item['mainImgDesc'] }}">
                                </a>
                            </article>
                        @endif
                        <ul class="city-list">
                            @if ($key > 0)
                                <li>
                                    <article>
                                        <a href="{{ route('news.index', ['url' => $item['url']]) }}">
                                            <h2>{{ $item['title'] }}</h2>
                                        </a>
                                    </article>
                                </li>
                            @endif
                        </ul>
                    @endforeach
                </div>
                <div class="d-flex justify-content-between">
                    <h2 style="font-weight: bold; font-size: 12px; line-height: 15px;">Китай</h2>
                    <a class="under" href="{{ route('china.index') }}">Більше новин »</a>
                </div>
                <div class="mb-3">
                    @foreach ($data['Китай'] as $key => $item)
                        @if ($key < 1)
                            <article>
                                <a href="{{ route('news.index', ['url' => $item['url']]) }}">
                                    <h2>{{ $item['title'] }}</h2>
                                    <p>{{ $item['desc'] }}</p>
                                    <img class="img-fluid xl-rounded object-fit-cover" src="{{ $item['mainImage'] }}"
                                        alt="{{ $item['mainImgDesc'] }}">
                                </a>
                            </article>
                        @endif
                        <ul class="city-list">
                            @if ($key > 0)
                                <li>
                                    <article>
                                        <a href="{{ route('news.index', ['url' => $item['url']]) }}">
                                            <h2>{{ $item['title'] }}</h2>
                                        </a>
                                    </article>
                                </li>
                            @endif
                        </ul>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<div class="banner__container mx-auto border-top border-bottom mb-3 py-1 text-center"
    style="color: rgb(107 114 128); font-size: 12px; line-height: 12px; font-weight: 300;">
    ОГОЛОШЕННЯ
</div>
<div class="container px-0 border-top border-black pt-3">
    <div class="sections-news__block d-xl-flex">
        <div class="col-xl-8 pe-xl-3">
            @foreach ($feed as $key => $item)
                @if ($key > 15 && $key < 21)
                    <div class="border-bottom border-black mb-3">
                        <article class="city-news-container">
                            <a href="{{ route($city['news_link'], ['url' => $item['url']]) }}">
                                <div class="d-xl-flex gap-xl-4">
                                    <div class="city-title">
                                        <h2>{{ $item['title'] }}</h2>
                                        <p>{{ $item['desc'] }}</p>
                                        <p>
                                            {{ \Carbon\Carbon::parse($item['publishedAt'])->locale('uk')->isoFormat('D MMMM YYYY') }},
                                            {{ $item['section'] }}
                                        </p>
                                    </div>
                                    <div class="city-news-img__cont">
                                        <img class="img-fluid xl-rounded object-fit-cover"
                                            src="{{ $item['mainImage'] }}" alt="{{ $item['mainImgDesc'] }}">
                                        <p class="img-figcaption">{{ $item['mainImgAuthor'] }}</p>
                                    </div>
                                </div>
                            </a>
                        </article>
                    </div>
                @endif
            @endforeach
            <h2 class="city-title" style="font-weight: bold; font-size: 12px; line-height: 15px;"><a
                    href="{{ route('musick.index') }}">Культура, музика
                    та
                    кіно »</a></h2>
            <div class="d-xl-flex d-flex flex-xl-row flex-column-reverse mb-3 gap-xl-4">
                <div class="city-news">
                    @foreach ($data['Культура, музика та кіно'] as $key => $item)
                        @if ($key < 1)
                            <article>
                                <a href="{{ route('news.index', ['url' => $item['url']]) }}">
                                    <h2>{{ $item['title'] }}</h2>
                                </a>
                            </article>
                        @endif
                        <ul class="city-list">
                            @if ($key > 0 && $key < 4)
                                <li>
                                    <article>
                                        <a href="{{ route('news.index', ['url' => $item['url']]) }}">
                                            <h2>{{ $item['title'] }}</h2>
                                        </a>
                                    </article>
                                </li>
                            @endif
                        </ul>
                    @endforeach
                </div>
                <div class="city-news-img__cont">
                    @foreach ($data['Культура, музика та кіно'] as $key => $item)
                        @if ($key < 1)
                            <article>
                                <a href="{{ route('news.index', ['url' => $item['url']]) }}">
                                    <img class="img-fluid xl-rounded object-fit-cover"
                                        src="{{ $item['mainImage'] }}" alt="{{ $item['mainImgDesc'] }}">
                                    <p class="img-figcaption">{{ $item['mainImgAuthor'] }}</p>
                                </a>
                            </article>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-xl-4 ps-xl-3 mb-4 xl-border-start">
            <div class="line-news__block block-title">
                <div class="d-flex justify-content-between">
                    <h2 style="font-weight: bold; font-size: 12px; line-height: 15px;">Економіка та Фінанси</h2>
                    <a class="under" href="{{ route('ekonomika.index') }}">Більше новин »</a>
                </div>
                <div class="border-bottom border-black mb-3">
                    @foreach ($data['Економіка та Фінанси'] as $key => $item)
                        @if ($key < 1)
                            <article>
                                <a href="{{ route('news.index', ['url' => $item['url']]) }}">
                                    <h2>{{ $item['title'] }}</h2>
                                    <p>{{ $item['desc'] }}</p>
                                    <img class="img-fluid xl-rounded object-fit-cover"
                                        src="{{ $item['mainImage'] }}" alt="{{ $item['mainImgDesc'] }}">
                                </a>
                            </article>
                        @endif
                        <ul class="city-list">
                            @if ($key > 0)
                                <li>
                                    <article>
                                        <a href="{{ route('news.index', ['url' => $item['url']]) }}">
                                            <h2>{{ $item['title'] }}</h2>
                                        </a>
                                    </article>
                                </li>
                            @endif
                        </ul>
                    @endforeach
                </div>
                <div class="d-flex justify-content-between">
                    <h2 style="font-weight: bold; font-size: 12px; line-height: 15px;">Технології</h2>
                    <a class="under" href="{{ route('technologies.index') }}">Більше новин »</a>
                </div>
                <div class="border-bottom border-black mb-3">
                    @foreach ($data['Технології'] as $key => $item)
                        @if ($key < 1)
                            <article>
                                <a href="{{ route('news.index', ['url' => $item['url']]) }}">
                                    <h2>{{ $item['title'] }}</h2>
                                    <p>{{ $item['desc'] }}</p>
                                    <img class="img-fluid xl-rounded object-fit-cover"
                                        src="{{ $item['mainImage'] }}" alt="{{ $item['mainImgDesc'] }}">
                                </a>
                            </article>
                        @endif
                        <ul class="city-list">
                            @if ($key > 0)
                                <li>
                                    <article>
                                        <a href="{{ route('news.index', ['url' => $item['url']]) }}">
                                            <h2>{{ $item['title'] }}</h2>
                                        </a>
                                    </article>
                                </li>
                            @endif
                        </ul>
                    @endforeach
                </div>
                <div class="d-flex justify-content-between">
                    <h2 style="font-weight: bold; font-size: 12px; line-height: 15px;">Наука</h2>
                    <a class="under" href="{{ route('nauka.index') }}">Більше новин »</a>
                </div>
                <div class="mb-3">
                    @foreach ($data['Наука'] as $key => $item)
                        @if ($key < 1)
                            <article>
                                <a href="{{ route('news.index', ['url' => $item['url']]) }}">
                                    <h2>{{ $item['title'] }}</h2>
                                    <p>{{ $item['desc'] }}</p>
                                    <img class="img-fluid xl-rounded object-fit-cover"
                                        src="{{ $item['mainImage'] }}" alt="{{ $item['mainImgDesc'] }}">
                                </a>
                            </article>
                        @endif
                        <ul class="city-list">
                            @if ($key > 0)
                                <li>
                                    <article>
                                        <a href="{{ route('news.index', ['url' => $item['url']]) }}">
                                            <h2>{{ $item['title'] }}</h2>
                                        </a>
                                    </article>
                                </li>
                            @endif
                        </ul>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
