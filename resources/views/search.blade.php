@extends('layouts.line_news')
@section('search')

    @if ($query && empty($data))
        <div class="seacrh__container border-top border-bottom mb-3 pb-3">
            <div class="container px-xl-0">
                <div class="search__wrapper mx-auto">
                    <p>За запитом {{ $query }} новин не знайдено.</p>
                    <form action="/search" method="GET">
                        <input type="text" name="query" placeholder="Що Вас цікавить?">
                        <button type="submit">Пошук</button>
                    </form>
                </div>
            </div>
        </div>
    @else
        <div class="seacrh__container border-top border-bottom mb-3 pb-3">
            <div class="container px-xl-0">
                <div class="search__wrapper mx-auto">
                    @if ($query)
                        <p>Результати пошуку на сайті газети Дейком:</p>
                    @endif
                    <form action="/search" method="GET">
                        <input type="text" name="query" placeholder="Що Вас цікавить?" value="{{ $query }}">
                        <button type="submit">Пошук</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="container px-xl-0 results__container">
            <div class="endless mx-auto">
                @foreach ($data as $key => $item)
                    <article class="border-bottom mb-3">
                        <a href="{{ route('news.index', ['url' => $item['url']]) }}"
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
                @endforeach
            </div>
        </div>
    @endif
@endsection
