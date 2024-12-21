@extends('layouts.city_main')
@section('city_home')
    <x-banners.banner-block1 :data="$data" />
    <div class="container px-0">
        <div class="main-today__block border-bottom pb-4 mb-2 border-black">
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
                                                <h2 class="px-2">{{ $data['data']['topNews'][$j]['title'] }}</h2>
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
                                            href="{{ $data['data']['topNews'][$i]['feed'] === 'Загальнонаціональна стрічка'
                                                ? route('homepage.index') . '/news/' . $data['data']['topNews'][$i]['url']
                                                : route($cityData['news_link'], ['url' => $data['data']['topNews'][$i]['url']]) }}">
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
    {{-- Блок №2 Головна сторінка --}}
    <x-banners.banner-block2 :data="$data" />
    <div class="container px-0">
        <div class="sections-news__block d-xl-flex">
            <div class="col-xl-8 pe-xl-2">
                <div class="war-news__block mb-4">
                    <div class="mb-4 img-rel">
                        <p class="block-title">Війна Росії проти України</p>
                        @foreach ($data['data']['warRussianVsUkraine'] as $key => $item)
                            @if ($key <= 1)
                                <article>
                                    <a class=""
                                        href="{{ $item['feed'] === 'Загальнонаціональна стрічка' ? route('news.index', ['url' => $item['url']]) : route($cityData['news_link'], ['url' => $item['url']]) }}">
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
                        @foreach ($data['data']['warRussianVsUkraine'] as $key => $item)
                            @if ($key === 2)
                                <article class="">
                                    <a
                                        href="{{ $item['feed'] === 'Загальнонаціональна стрічка' ? route('news.index', ['url' => $item['url']]) : route($cityData['news_link'], ['url' => $item['url']]) }}">
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
                        @foreach ($data['data']['warRussianVsUkraine'] as $key => $item)
                            @if ($key >= 3 && $key <= 4)
                                <article class="col-xl-6 {{ $key === 3 ? 'pe-xl-3 xl-border-end' : 'xl-ps-3' }}">
                                    <a
                                        href="{{ $item['feed'] === 'Загальнонаціональна стрічка' ? route('news.index', ['url' => $item['url']]) : route($cityData['news_link'], ['url' => $item['url']]) }}">
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
                        @foreach ($data['data']['society'] as $key => $item)
                            @if ($key <= 1)
                                <article class="">
                                    <a class=""
                                        href="{{ $item['feed'] === 'Загальнонаціональна стрічка' ? route('news.index', ['url' => $item['url']]) : route($cityData['news_link'], ['url' => $item['url']]) }}">
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
                        @foreach ($data['data']['society'] as $key => $item)
                            @if ($key >= 3 && $key <= 4)
                                <article class="col-xl-6 {{ $key === 3 ? 'pe-xl-3 xl-border-end' : 'xl-ps-3' }}">
                                    <a
                                        href="{{ $item['feed'] === 'Загальнонаціональна стрічка' ? route('news.index', ['url' => $item['url']]) : route($cityData['news_link'], ['url' => $item['url']]) }}">
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
                        @foreach ($data['data']['europe'] as $key => $item)
                            @if ($key <= 1)
                                <article class="">
                                    <a class=""
                                        href="{{ $item['feed'] === 'Загальнонаціональна стрічка' ? route('news.index', ['url' => $item['url']]) : route($cityData['news_link'], ['url' => $item['url']]) }}">
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
                                @for ($i = 2; $i < count($data['data']['europe']); $i++)
                                    <div class="carousel-item{{ $i === 2 ? ' active' : '' }} border rounded p-3">
                                        <article>
                                            <a
                                                href="{{ $data['data']['europe'][$i]['feed'] === 'Загальнонаціональна стрічка'
                                                    ? route('homepage.index') . '/news/' . $data['data']['europe'][$i]['url']
                                                    : route($cityData['news_link'], ['url' => $data['data']['europe'][$i]['url']]) }}">
                                                <div class="d-xl-flex align-items-center gap-4">
                                                    <div class="title-cont-sm-slide">
                                                        <h2>{{ $data['data']['europe'][$i]['title'] }}</h2>
                                                        <p class="text-gray-600">
                                                            {{ $data['data']['europe'][$i]['desc'] }}</p>
                                                    </div>
                                                    <div class="mb-4 img-cont-sm-slide">
                                                        <img class="img-fluid rounded object-fit-cover img-sm-slide"
                                                            src="{{ $data['data']['europe'][$i]['mainImage'] }}"
                                                            alt="{{ $data['data']['europe'][$i]['mainImgDesc'] }}">
                                                    </div>
                                                </div>
                                            </a>
                                        </article>
                                    </div>
                                @endfor
                            </div>
                            <div class="carousel-indicators pb-2" style="transform: translateY(20px)">
                                @for ($i = 2; $i < count($data['data']['europe']); $i++)
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
                        @foreach ($data['data']['china'] as $key => $item)
                            @if ($key <= 1)
                                <article>
                                    <a class=""
                                        href="{{ $item['feed'] === 'Загальнонаціональна стрічка' ? route('news.index', ['url' => $item['url']]) : route($cityData['news_link'], ['url' => $item['url']]) }}">
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
                        @foreach ($data['data']['usa'] as $key => $item)
                            @if ($key <= 1)
                                <article>
                                    <a class=""
                                        href="{{ $item['feed'] === 'Загальнонаціональна стрічка' ? route('news.index', ['url' => $item['url']]) : route($cityData['news_link'], ['url' => $item['url']]) }}">
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
                        @foreach ($data['data']['usa'] as $key => $item)
                            @if ($key === 2)
                                <article class="">
                                    <a
                                        href="{{ $item['feed'] === 'Загальнонаціональна стрічка' ? route('news.index', ['url' => $item['url']]) : route($cityData['news_link'], ['url' => $item['url']]) }}">
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
                        @foreach ($data['data']['economyFinance'] as $key => $item)
                            @if ($key <= 1)
                                <article>
                                    <a class=""
                                        href="{{ $item['feed'] === 'Загальнонаціональна стрічка' ? route('news.index', ['url' => $item['url']]) : route($cityData['news_link'], ['url' => $item['url']]) }}">
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
                        @foreach ($data['data']['technology'] as $key => $item)
                            @if ($key <= 1)
                                <article class="">
                                    <a class=""
                                        href="{{ $item['feed'] === 'Загальнонаціональна стрічка' ? route('news.index', ['url' => $item['url']]) : route($cityData['news_link'], ['url' => $item['url']]) }}">
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
                                @for ($i = 2; $i < count($data['data']['technology']); $i++)
                                    <div class="carousel-item{{ $i === 2 ? ' active' : '' }} border rounded p-3">
                                        <article>
                                            <a
                                                href="{{ $data['data']['technology'][$i]['feed'] === 'Загальнонаціональна стрічка'
                                                    ? route('homepage.index') . '/news/' . $data['data']['technology'][$i]['url']
                                                    : route($cityData['news_link'], ['url' => $data['data']['technology'][$i]['url']]) }}">
                                                <div class="d-xl-flex align-items-center gap-4">
                                                    <div class="title-cont-sm-slide">
                                                        <h2>{{ $data['data']['technology'][$i]['title'] }}</h2>
                                                        <p class="text-gray-600">
                                                            {{ $data['data']['technology'][$i]['desc'] }}
                                                        </p>
                                                    </div>
                                                    <div class="mb-4 img-cont-sm-slide">
                                                        <img class="img-fluid rounded object-fit-cover img-sm-slide"
                                                            src="{{ $data['data']['technology'][$i]['mainImage'] }}"
                                                            alt="{{ $data['data']['technology'][$i]['mainImgDesc'] }}">
                                                    </div>
                                                </div>
                                            </a>
                                        </article>
                                    </div>
                                @endfor
                            </div>
                            <div class="carousel-indicators pb-2" style="transform: translateY(20px)">
                                @for ($i = 2; $i < count($data['data']['technology']); $i++)
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
                    @foreach ($data['data']['lineNews'] as $key => $item)
                        @if ($key < 5)
                            <article class="border-bottom pb-1 mb-2 px-xl-2 {{ $key === 4 ? 'border-black' : '' }}">
                                <a
                                    href="{{ $item['feed'] === 'Загальнонаціональна стрічка' ? route('news.index', ['url' => $item['url']]) : route($cityData['news_link'], ['url' => $item['url']]) }}">
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
                            @for ($i = 0; $i < count($data['data']['opinion']); $i += 2)
                                <div class="carousel-item{{ $i === 0 ? ' active' : '' }}">
                                    <div class="row">
                                        @for ($j = $i; $j < min($i + 2, count($data['data']['opinion'])); $j++)
                                            <div class="col-md-6">
                                                <article>
                                                    <a
                                                        href="{{ $data['data']['opinion'][$j]['feed'] === 'Загальнонаціональна стрічка'
                                                            ? route('homepage.index') . '/news/' . $data['data']['opinion'][$j]['url']
                                                            : route($cityData['news_link'], ['url' => $data['data']['opinion'][$j]['url']]) }}">
                                                        <div class="mb-2" style="height: 110px;">
                                                            <img class="img-fluid rounded w-100 h-100 object-fit-cover"
                                                                src="{{ $data['data']['opinion'][$j]['mainImage'] }}"
                                                                alt="{{ $data['data']['opinion'][$j]['mainImage'] }}">
                                                        </div>
                                                        <h2 class="px-1 fs-6">{{ $data['data']['opinion'][$j]['title'] }}
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
                            @for ($i = 0; $i < count($data['data']['opinion']); $i += 2)
                                <button type="button" data-bs-target="#carouselSec"
                                    data-bs-slide-to="{{ $i / 2 }}" class="{{ $i === 0 ? 'active' : '' }}"
                                    aria-current="{{ $i === 0 ? 'true' : 'false' }}"
                                    aria-label="Slide {{ $i / 2 }}"></button>
                            @endfor
                        </div>
                    </div>
                </div>
                <div class="line-news__block mb-4 block-title">
                    @foreach ($data['data']['lineNews'] as $key => $item)
                        @if ($key >= 5 && $key <= 9)
                            <article class="border-bottom pb-1 mb-2 px-xl-2 {{ $key === 9 ? 'border-black' : '' }}">
                                <a
                                    href="{{ $item['feed'] === 'Загальнонаціональна стрічка' ? route('news.index', ['url' => $item['url']]) : route($cityData['news_link'], ['url' => $item['url']]) }}">
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
                    @foreach ($data['data']['lineNews'] as $key => $item)
                        @if ($key >= 10 && $key <= 14)
                            <article class="border-bottom pb-1 mb-2 px-xl-2">
                                <a
                                    href="{{ $item['feed'] === 'Загальнонаціональна стрічка' ? route('news.index', ['url' => $item['url']]) : route($cityData['news_link'], ['url' => $item['url']]) }}">
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
                    @foreach ($data['data']['lineNews'] as $key => $item)
                        @if ($key >= 15 && $key <= 19)
                            <article class="border-bottom pb-1 mb-2 px-xl-2 {{ $key === 19 ? 'border-black' : '' }}">
                                <a
                                    href="{{ $item['feed'] === 'Загальнонаціональна стрічка' ? route('news.index', ['url' => $item['url']]) : route($cityData['news_link'], ['url' => $item['url']]) }}">
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
                            @for ($i = 0; $i < count($data['data']['analytics']); $i += 2)
                                <div class="carousel-item{{ $i === 0 ? ' active' : '' }}">
                                    <div class="row">
                                        @for ($j = $i; $j < min($i + 2, count($data['data']['analytics'])); $j++)
                                            <div class="col-md-6">
                                                <article>
                                                    <a
                                                        href="{{ $data['data']['analytics'][$j]['feed'] === 'Загальнонаціональна стрічка'
                                                            ? route('homepage.index') . '/news/' . $data['data']['analytics'][$j]['url']
                                                            : route($cityData['news_link'], ['url' => $data['data']['analytics'][$j]['url']]) }}">
                                                        <div class="mb-2" style="height: 110px;">
                                                            <img class="img-fluid rounded w-100 h-100 object-fit-cover"
                                                                src="{{ $data['data']['analytics'][$j]['mainImage'] }}"
                                                                alt="{{ $data['data']['analytics'][$j]['mainImage'] }}">
                                                        </div>
                                                        <h2 class="px-1 fs-6">
                                                            {{ $data['data']['analytics'][$j]['title'] }}</h2>
                                                    </a>
                                                </article>
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                            @endfor
                        </div>
                        <div class="carousel-indicators pb-2" style="transform: translateY(40px)">
                            @for ($i = 0; $i < count($data['data']['analytics']); $i += 2)
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
    <x-banners.banner-block3 :data="$data" />
    <div class="container px-0">
        <div class="line-news__block border-top border-bottom border-black py-3 mb-4">
            <div class="d-xl-flex">
                @foreach ($data['data']['lineNews'] as $key => $item)
                    @if ($key >= 20 && $key <= 23)
                        <article class="{{ $key === 23 ? 'col px-4' : 'col px-4 xl-border-end' }}">
                            <a
                                href="{{ $item['feed'] === 'Загальнонаціональна стрічка' ? route('news.index', ['url' => $item['url']]) : route($cityData['news_link'], ['url' => $item['url']]) }}">
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
                        @foreach ($data['data']['science'] as $key => $item)
                            @if ($key <= 1)
                                <article class="">
                                    <a class=""
                                        href="{{ $item['feed'] === 'Загальнонаціональна стрічка' ? route('news.index', ['url' => $item['url']]) : route($cityData['news_link'], ['url' => $item['url']]) }}">
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
                        @foreach ($data['data']['science'] as $key => $item)
                            @if ($key >= 2 && $key <= 3)
                                <article class="col-xl-6 {{ $key === 2 ? 'pe-xl-3 xl-border-end' : 'xl-ps-3' }}">
                                    <a
                                        href="{{ $item['feed'] === 'Загальнонаціональна стрічка' ? route('news.index', ['url' => $item['url']]) : route($cityData['news_link'], ['url' => $item['url']]) }}">
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
                    @foreach ($data['data']['lineNews'] as $key => $item)
                        @if ($key >= 24 && $key <= 27)
                            <article class="pb-1 mb-2 px-xl-2 {{ $key === 27 ? '' : 'border-bottom' }}">
                                <a
                                    href="{{ $item['feed'] === 'Загальнонаціональна стрічка' ? route('news.index', ['url' => $item['url']]) : route($cityData['news_link'], ['url' => $item['url']]) }}">
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
                @foreach ($data['data']['lineNews'] as $key => $item)
                    @if ($key >= 28 && $key <= 31)
                        <article class="{{ $key === 31 ? 'col px-4' : 'col px-4 xl-border-end' }}">
                            <a
                                href="{{ $item['feed'] === 'Загальнонаціональна стрічка' ? route('news.index', ['url' => $item['url']]) : route($cityData['news_link'], ['url' => $item['url']]) }}">
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
    {{-- Блок №4 Головна сторінка --}}
    <x-banners.banner-block4 :data="$data" />
    <div class="container px-0">
        <div class="sections-news__block d-xl-flex">
            <div class="col-xl-8 pe-xl-2">
                <div class="culture__block">
                    <div class="position-relative mb-2">
                        <p class="block-title">Культура, музика та кіно</p>
                        @foreach ($data['data']['cultureMusicCinema'] as $key => $item)
                            @if ($key <= 1)
                                <article class="">
                                    <a class=""
                                        href="{{ $item['feed'] === 'Загальнонаціональна стрічка' ? route('news.index', ['url' => $item['url']]) : route($cityData['news_link'], ['url' => $item['url']]) }}">
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
                                @for ($i = 2; $i < count($data['data']['cultureMusicCinema']); $i++)
                                    <div class="carousel-item{{ $i === 2 ? ' active' : '' }} border rounded p-3">
                                        <article>
                                            <a
                                                href="{{ $data['data']['cultureMusicCinema'][$i]['feed'] === 'Загальнонаціональна стрічка'
                                                    ? route('homepage.index') . '/news/' . $data['data']['cultureMusicCinema'][$i]['url']
                                                    : route($cityData['news_link'], ['url' => $data['data']['cultureMusicCinema'][$i]['url']]) }}">
                                                <div class="d-xl-flex align-items-center gap-4">
                                                    <div class="title-cont-sm-slide">
                                                        <h2>{{ $data['data']['cultureMusicCinema'][$i]['title'] }}</h2>
                                                        <p class="text-gray-600">
                                                            {{ $data['data']['cultureMusicCinema'][$i]['desc'] }}</p>
                                                    </div>
                                                    <div class="mb-4 img-cont-sm-slide">
                                                        <img class="img-fluid rounded object-fit-cover img-sm-slide"
                                                            src="{{ $data['data']['cultureMusicCinema'][$i]['mainImage'] }}"
                                                            alt="{{ $data['data']['cultureMusicCinema'][$i]['mainImgDesc'] }}">
                                                    </div>
                                                </div>
                                            </a>
                                        </article>
                                    </div>
                                @endfor
                            </div>
                            <div class="carousel-indicators pb-2" style="transform: translateY(20px)">
                                @for ($i = 2; $i < count($data['data']['cultureMusicCinema']); $i++)
                                    <button type="button" data-bs-target="#carouselCulture"
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
                <div class="line-news__block block-title">
                    @foreach ($data['data']['lineNews'] as $key => $item)
                        @if ($key >= 32 && $key <= 34)
                            <article class="pb-1 mb-2 px-xl-2 {{ $key === 34 ? '' : 'border-bottom' }}">
                                <a
                                    href="{{ $item['feed'] === 'Загальнонаціональна стрічка' ? route('news.index', ['url' => $item['url']]) : route($cityData['news_link'], ['url' => $item['url']]) }}">
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
                    @foreach ($data['data']['lineNews'] as $key => $item)
                        @if ($key >= 35 && $key <= 40)
                            <article class="col-xl-4 pb-1 mb-2">
                                <a
                                    href="{{ $item['feed'] === 'Загальнонаціональна стрічка' ? route('news.index', ['url' => $item['url']]) : route($cityData['news_link'], ['url' => $item['url']]) }}">
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
                        @foreach ($data['data']['sports'] as $key => $item)
                            @if ($key <= 1)
                                <article class="">
                                    <a class=""
                                        href="{{ $item['feed'] === 'Загальнонаціональна стрічка' ? route('news.index', ['url' => $item['url']]) : route($cityData['news_link'], ['url' => $item['url']]) }}">
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
                        @foreach ($data['data']['sports'] as $key => $item)
                            @if ($key >= 2 && $key <= 3)
                                <article class="col-xl-6 {{ $key === 2 ? 'pe-xl-3 xl-border-end' : 'xl-ps-3' }}">
                                    <a
                                        href="{{ $item['feed'] === 'Загальнонаціональна стрічка' ? route('news.index', ['url' => $item['url']]) : route($cityData['news_link'], ['url' => $item['url']]) }}">
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
                    @foreach ($data['data']['lineNews'] as $key => $item)
                        @if ($key >= 41 && $key <= 45)
                            <article class="pb-1 mb-2 px-xl-2 {{ $key === 45 ? '' : 'border-bottom' }}">
                                <a
                                    href="{{ $item['feed'] === 'Загальнонаціональна стрічка' ? route('news.index', ['url' => $item['url']]) : route($cityData['news_link'], ['url' => $item['url']]) }}">
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
    {{-- Блок №5 Головна сторінка --}}
    <x-banners.banner-block5 :data="$data" />
    <div class="container px-0">
        <div class="sections-fivecard__block border-top border-black py-3">
            <div class="power__block border-bottom mb-3">
                <p class="block-title">Політика та Влада</p>
                <div class="d-xl-flex">
                    @foreach ($data['data']['politicsGovernment'] as $key => $item)
                        <article
                            class="col-xl px-0 px-xl-3 {{ $key === 0 ? 'ps-0' : '' }} {{ $key === 4 ? 'pe-0' : '' }}">
                            <a
                                href="{{ $item['feed'] === 'Загальнонаціональна стрічка' ? route('news.index', ['url' => $item['url']]) : route($cityData['news_link'], ['url' => $item['url']]) }}">
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
                    @foreach ($data['data']['americas'] as $key => $item)
                        <article
                            class="col-xl px-0 px-xl-3 {{ $key === 0 ? 'ps-0' : '' }} {{ $key === 4 ? 'pe-0' : '' }}">
                            <a
                                href="{{ $item['feed'] === 'Загальнонаціональна стрічка' ? route('news.index', ['url' => $item['url']]) : route($cityData['news_link'], ['url' => $item['url']]) }}">
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
                    @foreach ($data['data']['middleEast'] as $key => $item)
                        <article
                            class="col-xl px-0 px-xl-3 {{ $key === 0 ? 'ps-0' : '' }} {{ $key === 4 ? 'pe-0' : '' }}">
                            <a
                                href="{{ $item['feed'] === 'Загальнонаціональна стрічка' ? route('news.index', ['url' => $item['url']]) : route($cityData['news_link'], ['url' => $item['url']]) }}">
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
                    @foreach ($data['data']['pacific'] as $key => $item)
                        <article
                            class="col-xl px-0 px-xl-3 {{ $key === 0 ? 'ps-0' : '' }} {{ $key === 4 ? 'pe-0' : '' }}">
                            <a
                                href="{{ $item['feed'] === 'Загальнонаціональна стрічка' ? route('news.index', ['url' => $item['url']]) : route($cityData['news_link'], ['url' => $item['url']]) }}">
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
                    @foreach ($data['data']['africa'] as $key => $item)
                        <article
                            class="col-xl px-0 px-xl-3 {{ $key === 0 ? 'ps-0' : '' }} {{ $key === 4 ? 'pe-0' : '' }}">
                            <a
                                href="{{ $item['feed'] === 'Загальнонаціональна стрічка' ? route('news.index', ['url' => $item['url']]) : route($cityData['news_link'], ['url' => $item['url']]) }}">
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
