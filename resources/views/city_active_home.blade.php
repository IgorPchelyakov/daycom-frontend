@extends('layouts.city_main')
@section('city_active_home')
    @php
        $hotNews = $data['data']['hotNews'][0] ?? null;
    @endphp
    <x-banners.banner-block1 :data="$data" />
    <div class="container px-0">
        <div class="mx-auto text-xl-center" style="max-width: 800px;">
            <x-hot-news :data="$hotNews" />
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
                        @foreach ($data['data']['mainToday'] as $key => $item)
                            @if ($key >= 1 && $key <= 2)
                                <article class="{{ $key === 2 ? ' mb-0' : 'border-bottom pb-1 mb-2' }}">
                                    <a
                                        href="{{ $item['feed'] === 'Загальнонаціональна стрічка' ? route('news.index', ['url' => $item['url']]) : route($cityData['news_link'], ['url' => $item['url']]) }}">
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
                    @foreach ($data['data']['mainToday'] as $key => $item)
                        @if ($key === 0)
                            <article class="">
                                <a
                                    href="{{ $item['feed'] === 'Загальнонаціональна стрічка' ? route('news.index', ['url' => $item['url']]) : route($cityData['news_link'], ['url' => $item['url']]) }}">
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
                    @foreach ($data['data']['mainToday'] as $key => $item)
                        @if ($key >= 3 && $key <= 5)
                            @if ($key === 3)
                                <article class="border-bottom pb-1 mb-2">
                                    <a
                                        href="{{ $item['feed'] === 'Загальнонаціональна стрічка' ? route('news.index', ['url' => $item['url']]) : route($cityData['news_link'], ['url' => $item['url']]) }}">
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
                                        href="{{ $item['feed'] === 'Загальнонаціональна стрічка' ? route('news.index', ['url' => $item['url']]) : route($cityData['news_link'], ['url' => $item['url']]) }}">
                                        <h2 class="">{{ $item['title'] }}</h2>
                                    </a>
                                </article>
                            @endif
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="d-xl-flex">
                @foreach ($data['data']['mainToday'] as $key => $item)
                    @if ($key >= 6)
                        <article class="{{ $loop->last ? 'col px-4' : 'col px-4 xl-border-end' }}">
                            <a
                                href="{{ $item['feed'] === 'Загальнонаціональна стрічка' ? route('news.index', ['url' => $item['url']]) : route($cityData['news_link'], ['url' => $item['url']]) }}">
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
                    @for ($i = 0; $i < count($data['data']['topNews']); $i += 4)
                        <div class="carousel-item{{ $i === 0 ? ' active' : '' }}">
                            <div class="row">
                                @for ($j = $i; $j < min($i + 4, count($data['data']['topNews'])); $j++)
                                    <div class="col-md-3">
                                        <article>
                                            <a
                                                href="{{ $data['data']['topNews'][$j]['feed'] === 'Загальнонаціональна стрічка'
                                                    ? route('homepage.index') . '/news/' . $data['data']['topNews'][$j]['url']
                                                    : route($cityData['news_link'], ['url' => $data['data']['topNews'][$j]['url']]) }}">
                                                <div class="mb-4" style="height: 190px;">
                                                    <img class="img-fluid rounded h-100 object-fit-cover"
                                                        src="{{ $data['data']['topNews'][$j]['mainImage'] }}"
                                                        alt="{{ $data['data']['topNews'][$j]['mainImage'] }}">
                                                </div>
                                                <h2 class="px-2">{{ $data['data']['topNews'][$j]['title'] }}
                                                </h2>
                                            </a>
                                        </article>
                                    </div>
                                @endfor
                            </div>
                        </div>
                    @endfor
                </div>
                <div class="carousel-indicators pb-2" style="transform: translateY(40px)">
                    @for ($i = 0; $i < count($data['data']['topNews']); $i += 4)
                        <button type="button" data-bs-target="#carousel" data-bs-slide-to="{{ $i / 4 }}"
                            class="{{ $i === 0 ? 'active' : '' }}" aria-current="{{ $i === 0 ? 'true' : 'false' }}"
                            aria-label="Slide {{ $i / 4 }}"></button>
                    @endfor
                </div>
            </div>
            <div id="carouselOneSlide" class="carousel slide carousel-dark d-xl-none">
                <div class="carousel-inner" style="min-height: 320px;">
                    @for ($i = 0; $i < count($data['data']['topNews']); $i++)
                        <div class="carousel-item{{ $i === 0 ? ' active' : '' }}">
                            <div class="row">
                                <div class="col-md-12">
                                    <article>
                                        <a
                                            href="{{ route('homepage.index') . '/news/' . $data['data']['topNews'][$i]['url'] }}">
                                            <div class="mb-4" style="">
                                                <img class="img-fluid xl-rounded w-100 h-100 object-fit-cover"
                                                    style="min-height: 400px; max-height: 500px;"
                                                    src="{{ $data['data']['topNews'][$i]['mainImage'] }}"
                                                    alt="{{ $data['data']['topNews'][$i]['mainImage'] }}">
                                            </div>
                                            <h2 class="px-4">{{ $data['data']['topNews'][$i]['title'] }}</h2>
                                        </a>
                                    </article>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
                <div class="carousel-indicators pb-2" style="transform: translateY(40px)">
                    @for ($i = 0; $i < count($data['data']['topNews']); $i++)
                        <button type="button" data-bs-target="#carouselOneSlide" data-bs-slide-to="{{ $i }}"
                            class="{{ $i === 0 ? 'active' : '' }}" aria-current="{{ $i === 0 ? 'true' : 'false' }}"
                            aria-label="Slide {{ $i }}"></button>
                    @endfor
                </div>
            </div>
        </div>
    </div>
    <x-banners.banner-block2 :data="$data" />
    <div class="container px-0">
        <div class="sections-news__block d-xl-flex">
            <div class="col-xl-8 pe-xl-3">
                <h2 class="pb-3 city-title" style="font-weight: bold; font-size: 12px; line-height: 15px;">ОСТАННІ
                    НОВИНИ
                    МІСТА</h2>
                <div class="d-xl-flex d-flex flex-xl-row flex-column-reverse border-b border-black mb-3 gap-xl-4">
                    <div class="city-news">
                        @foreach ($data['feedData'] as $key => $item)
                            @if ($key < 1)
                                <article>
                                    <a href="{{ route($cityData['news_link'], ['url' => $item['url']]) }}">
                                        <h2>{{ $item['title'] }}</h2>
                                    </a>
                                </article>
                            @endif
                            <ul class="city-list">
                                @if ($key > 0 && $key < 4)
                                    <li>
                                        <article>
                                            <a href="{{ route($cityData['news_link'], ['url' => $item['url']]) }}">
                                                <h2>{{ $item['title'] }}</h2>
                                            </a>
                                        </article>
                                    </li>
                                @endif
                            </ul>
                        @endforeach
                    </div>
                    <div class="city-news-img__cont">
                        @foreach ($data['feedData'] as $key => $item)
                            @if ($key < 1)
                                <article>
                                    <a href="{{ route($cityData['news_link'], ['url' => $item['url']]) }}">
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
                    @foreach ($data['feedData'] as $key => $item)
                        @if ($key === 4)
                            <article class="city-news-container">
                                <a href="{{ route($cityData['news_link'], ['url' => $item['url']]) }}">
                                    <div class="d-xl-flex gap-xl-4">
                                        <div class="city-title">
                                            <h2>{{ $item['title'] }}</h2>
                                            <p>{{ $item['desc'] }}</p>
                                            <p>
                                                {{ \Carbon\Carbon::parse($item['publishedAt'])->locale('uk')->isoFormat('D MMMM YYYY') }},
                                                {{ $item['section'][0] }}
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
                @foreach ($data['feedData'] as $key => $item)
                    @if ($key > 4 && $key < 9)
                        <div class="border-bottom border-black mb-3">
                            <article class="city-news-container">
                                <a href="{{ route($cityData['news_link'], ['url' => $item['url']]) }}">
                                    <div class="d-xl-flex gap-xl-4">
                                        <div class="city-title">
                                            <h2>{{ $item['title'] }}</h2>
                                            <p>{{ $item['desc'] }}</p>
                                            <p>
                                                {{ \Carbon\Carbon::parse($item['publishedAt'])->locale('uk')->isoFormat('D MMMM YYYY') }},
                                                {{ $item['section'][0] }}
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
                        @foreach ($data['groupedSectionsData']['Суспільство'] as $key => $item)
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
                        @foreach ($data['groupedSectionsData']['Суспільство'] as $key => $item)
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
                    @foreach (collect($data['data']['lineNews'])->take(25) as $item)
                        <article>
                            <a href="{{ route('news.index', ['url' => $item['url']]) }}">
                                <h2>{{ $item['title'] }}</h2>
                                <p>{{ $item['Sections'][0]['sectionTitle'] }}</p>
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
    <x-banners.banner-block3 :data="$data" />
    <div class="container px-0 border-top border-black pt-3">
        <div class="sections-news__block d-xl-flex">
            <div class="col-xl-8 pe-xl-3">
                <h2 class="pb-3 city-title" style="font-weight: bold; font-size: 12px; line-height: 15px;">БІЛЬШЕ
                    НОВИН</h2>
                @foreach ($data['feedData'] as $key => $item)
                    @if ($key > 9 && $key < 16)
                        <div class="border-bottom border-black mb-3">
                            <article class="city-news-container">
                                <a href="{{ route($cityData['news_link'], ['url' => $item['url']]) }}">
                                    <div class="d-xl-flex gap-xl-4">
                                        <div class="city-title">
                                            <h2>{{ $item['title'] }}</h2>
                                            <p>{{ $item['desc'] }}</p>
                                            <p>
                                                {{ \Carbon\Carbon::parse($item['publishedAt'])->locale('uk')->isoFormat('D MMMM YYYY') }},
                                                {{ $item['Sections'][0]['sectionTitle'] }}
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
                        @foreach ($data['groupedSectionsData']['Війна Росії проти України'] as $key => $item)
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
                        @foreach ($data['groupedSectionsData']['Війна Росії проти України'] as $key => $item)
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
                        @foreach ($data['groupedSectionsData']['Європа'] as $key => $item)
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
                        @foreach ($data['groupedSectionsData']['Сполучені Штати'] as $key => $item)
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
                        <h2 style="font-weight: bold; font-size: 12px; line-height: 15px;">Китай</h2>
                        <a class="under" href="{{ route('china.index') }}">Більше новин »</a>
                    </div>
                    <div class="mb-3">
                        @foreach ($data['groupedSectionsData']['Китай'] as $key => $item)
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
    <x-banners.banner-block4 :data="$data" />
    <div class="container px-0 border-top border-black pt-3">
        <div class="sections-news__block d-xl-flex">
            <div class="col-xl-8 pe-xl-3">
                @foreach ($data['feedData'] as $key => $item)
                    @if ($key > 15 && $key < 21)
                        <div class="border-bottom border-black mb-3">
                            <article class="city-news-container">
                                <a href="{{ route($cityData['news_link'], ['url' => $item['url']]) }}">
                                    <div class="d-xl-flex gap-xl-4">
                                        <div class="city-title">
                                            <h2>{{ $item['title'] }}</h2>
                                            <p>{{ $item['desc'] }}</p>
                                            <p>
                                                {{ \Carbon\Carbon::parse($item['publishedAt'])->locale('uk')->isoFormat('D MMMM YYYY') }},
                                                {{ $item['Sections'][0]['sectionTitle'] }}
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
                        @php
                            $combinedCultureMusicCinema = array_merge(
                                $data['groupedSectionsData']['Культура'],
                                $data['groupedSectionsData']['Музика'],
                                $data['groupedSectionsData']['Кіно'],
                            );

                            usort($combinedCultureMusicCinema, function ($a, $b) {
                                $dateA = strtotime($a['published_at']);
                                $dateB = strtotime($b['published_at']);

                                return $dateB - $dateA;
                            });
                        @endphp
                        @foreach ($combinedCultureMusicCinema as $key => $item)
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
                        @foreach ($combinedCultureMusicCinema as $key => $item)
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
                        @php
                            $combinedEconomyAndFinance = array_merge(
                                $data['groupedSectionsData']['Економіка'],
                                $data['groupedSectionsData']['Фінанси'],
                            );

                            usort($combinedEconomyAndFinance, function ($a, $b) {
                                $dateA = strtotime($a['published_at']);
                                $dateB = strtotime($b['published_at']);

                                return $dateB - $dateA;
                            });
                        @endphp
                        @foreach ($combinedEconomyAndFinance as $key => $item)
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
                        @foreach ($data['groupedSectionsData']['Технології'] as $key => $item)
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
                        @foreach ($data['groupedSectionsData']['Наука'] as $key => $item)
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
