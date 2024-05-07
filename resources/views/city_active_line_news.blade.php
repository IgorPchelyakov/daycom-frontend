@extends('layouts.city_line_news')
@section('city_active_line_news')
    @php
        $action = '/' . $city['name_link'] . '/search';
    @endphp
    <div class="banner__container mx-auto border-top border-bottom mb-3 py-1 text-center"
        style="color: rgb(107 114 128); font-size: 12px; line-height: 12px; font-weight: 300;">
        ОГОЛОШЕННЯ
    </div>
    <div class="container px-xl-0">
        <div class="my-3 pb-3 border-bottom border-black">
            <h1>{{ $metaData['line_title'] }}</h1>
            <p>{{ $metaData['line_description'] }}</p>
        </div>
        <div class="articles d-xl-flex gap-3 border-bottom pb-3 mb-3">
            <div class="block-1 border-e pe-xl-3">
                @foreach ($data as $key => $item)
                    @if ($key < 2)
                        <article class="bb-sm mb-3 mb-xl-0">
                            <a href="{{ route($city['news_link'], ['url' => $item['url']]) }}">
                                @if ($key === 0)
                                    <img class="mb-2 img-fluid w-100 h-100 rounded object-fit-cover"
                                        src="{{ $item['mainImage'] }}" alt="{{ $item['mainImgDesc'] }}">
                                @endif
                                <h2>{{ $item['title'] }}</h2>
                                @if ($key > 0)
                                    <p>{{ $item['desc'] }}</p>
                                @endif
                                <div>
                                    <p><time>{{ \Carbon\Carbon::parse($item['publishedAt'])->locale('uk')->isoFormat('D MMMM YYYY') }}</time>,
                                        {{ $item['section'] }}
                                    </p>
                                </div>
                            </a>
                        </article>
                    @endif
                @endforeach
            </div>
            <div class="block-2">
                @foreach ($data as $key => $item)
                    @if ($key === 2)
                        <article class="bb-sm mb-3 mb-xl-0">
                            <a href="{{ route($city['news_link'], ['url' => $item['url']]) }}">
                                <img class="mb-2 img-fluid w-100 h-100 rounded object-fit-cover"
                                    src="{{ $item['mainImage'] }}" alt="{{ $item['mainImgDesc'] }}">
                                <h2>{{ $item['title'] }}</h2>
                                <p>{{ $item['desc'] }}</p>
                                <div>
                                    <p><time>{{ \Carbon\Carbon::parse($item['publishedAt'])->locale('uk')->isoFormat('D MMMM YYYY') }}</time>,
                                        {{ $item['section'] }}
                                    </p>
                                </div>
                            </a>
                        </article>
                    @endif
                @endforeach
            </div>
            <div class="block-3 border-s ps-xl-3">
                @foreach ($data as $key => $item)
                    @if ($key >= 3 && $key <= 4)
                        <article class="{{ $key === 4 ? '' : 'bb-sm mb-3 mb-xl-0' }}">
                            <a href="{{ route($city['news_link'], ['url' => $item['url']]) }}">
                                @if ($key === 3)
                                    <img class="mb-2 img-fluid w-100 h-100 rounded object-fit-cover"
                                        src="{{ $item['mainImage'] }}" alt="{{ $item['mainImgDesc'] }}">
                                @endif
                                <h2>{{ $item['title'] }}</h2>
                                @if ($key === 4)
                                    <p>{{ $item['desc'] }}</p>
                                @endif
                                <div>
                                    <p><time>{{ \Carbon\Carbon::parse($item['publishedAt'])->locale('uk')->isoFormat('D MMMM YYYY') }}</time>,
                                        {{ $item['section'] }}
                                    </p>
                                </div>
                            </a>
                        </article>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="d-xl-flex border-bottom border-black pb-3 mb-3">
            @foreach ($data as $key => $item)
                @if ($key > 4 && $key < 9)
                    <article class="{{ $key === 8 ? 'col px-xl-4' : 'col px-xl-4 border-e' }}">
                        <a href="{{ route($city['news_link'], ['url' => $item['url']]) }}">
                            <div class="{{ $key === 8 ? '' : 'xl-mb-2-pb-2' }}">
                                <h2>{{ $item['title'] }}</h2>
                                <p>
                                    <time>{{ \Carbon\Carbon::parse($item['publishedAt'])->locale('uk')->isoFormat('D MMMM YYYY') }}</time>,
                                    {{ $item['section'] }}
                                </p>
                            </div>
                        </a>
                    </article>
                @endif
            @endforeach
        </div>
        <div class="d-xl-flex gap-4 img-cont border-bottom border-black justify-content-between mb-3">
            @foreach ($data as $key => $item)
                @if ($key > 8 && $key < 13)
                    <article class="">
                        <a href="{{ route($city['news_link'], ['url' => $item['url']]) }}">
                            <img class="mb-2 img-fluid w-100 h-100 rounded object-fit-cover" src="{{ $item['mainImage'] }}"
                                alt="{{ $item['mainImgDesc'] }}">
                            <h2 class="{{ $key === 8 ? '' : 'mb-2 pb-2' }}">{{ $item['title'] }}</h2>
                            <div class="{{ $key !== 12 ? 'bb-sm mb-3 mb-xl-0' : '' }}">
                                <p><time>{{ \Carbon\Carbon::parse($item['publishedAt'])->locale('uk')->isoFormat('D MMMM YYYY') }}</time>,
                                    {{ $item['section'] }}
                                </p>
                            </div>
                        </a>
                    </article>
                @endif
            @endforeach
        </div>
    </div>
    <div class="banner__container mx-auto border-top border-bottom mb-3 py-1 text-center"
        style="color: rgb(107 114 128); font-size: 12px; line-height: 12px; font-weight: 300;">
        ОГОЛОШЕННЯ
    </div>
    <div class="container px-xl-0">
        <div class="d-xl-flex gap-3">
            <div class="endless mx-auto border-top border-black pt-3">
                @foreach ($data as $key => $item)
                    @if ($key > 13 && $key < 23)
                        <article class="{{ $key === 22 ? 'mb-3' : 'border-bottom mb-3' }}">
                            <a href="{{ route($city['news_link'], ['url' => $item['url']]) }}"
                                class="d-xl-flex d-flex gap-4 justify-content-between">
                                <div class="d-xl-flex gap-4 justify-content-between" style="max-width: 608px; width: 100%;">
                                    <div class="endless-info">
                                        <p>
                                            <time>{{ \Carbon\Carbon::parse($item['publishedAt'])->locale('uk')->isoFormat('D MMMM YYYY') }}</time>,
                                            {{ $item['section'] }}
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
                <form action={{ $action }} method="GET">
                    <input type="text" name="query" placeholder="Що Вас цікавить?">
                    <button type="submit">Пошук</button>
                </form>
            </div>
        </div>
    </div>
    <div class="banner__container mx-auto border-top border-bottom mb-3 py-1 text-center"
        style="color: rgb(107 114 128); font-size: 12px; line-height: 12px; font-weight: 300;">
        ОГОЛОШЕННЯ
    </div>
    <div class="container px-xl-0">
        <div class="endless mx-auto">
            @foreach ($data as $key => $item)
                @if ($key > 24)
                    <article class="border-bottom mb-3">
                        <a href="{{ route($city['news_link'], ['url' => $item['url']]) }}"
                            class="d-xl-flex d-flex gap-4 justify-content-between">
                            <div class="d-xl-flex gap-4 justify-content-between" style="max-width: 608px; width: 100%;">
                                <div class="endless-info">
                                    <p>
                                        <time>{{ \Carbon\Carbon::parse($item['publishedAt'])->locale('uk')->isoFormat('D MMMM YYYY') }}</time>,
                                        {{ $item['section'] }}
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
