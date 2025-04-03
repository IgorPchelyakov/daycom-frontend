@props(['culture', 'lineNews', 'sports'])

<div class="sections-news__block d-xl-flex">
    <div class="col-xl-8 pe-xl-3">
        <div class="culture__block">
            <div class="position-relative mb-2 block-container">
                <p class="block-title">Культура, музика та кіно</p>
                @foreach ($culture as $key => $item)
                    @if ($key <= 1)
                        <article class="">
                            <a class="" href="{{ route('homepage.index') . '/news/' . $item['url'] }}">
                                @if ($key === 0)
                                    <div class="img-abs">
                                        {{-- <img class="img-fluid w-100 h-100 xl-rounded object-fit-cover xl-w-biimg"
                                            src="{{ $item['mainImage'] }}" alt="{{ $item['mainImgDesc'] }}"> --}}
                                        @php
                                            $extension = pathinfo($item['mainImage'], PATHINFO_EXTENSION);
                                        @endphp

                                        @if (in_array(strtolower($extension), ['mp4', 'webm', 'avi']))
                                            <video autoplay loop muted
                                                class="img-fluid w-100 h-100 xl-rounded object-fit-cover xl-w-biimg">
                                                <source src="{{ $item['mainImage'] }}" type="video/mp4">
                                            </video>
                                        @else
                                            <img class="img-fluid w-100 h-100 xl-rounded object-fit-cover xl-w-biimg"
                                                src="{{ $item['mainImage'] }}" alt="{{ $item['mainImgDesc'] }}">
                                        @endif
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
                        @foreach (array_slice($culture, 2, 8) as $index => $item)
                            <div class="carousel-item{{ $index === 0 ? ' active' : '' }} border rounded p-3">
                                <article>
                                    <a href="{{ route('homepage.index') . '/news/' . $item['url'] }}">
                                        <div class="d-xl-flex align-items-center gap-4">
                                            <div class="title-cont-sm-slide">
                                                <h2>{{ $item['title'] }}</h2>
                                                <p class="text-gray-600">
                                                    {{ $item['desc'] }}</p>
                                            </div>
                                            <div class="mb-4 img-cont-sm-slide">
                                                {{-- <img class="img-fluid rounded object-fit-cover img-sm-slide"
                                                    src="{{ $item['mainImage'] }}" alt="{{ $item['mainImgDesc'] }}"> --}}
                                                @php
                                                    $extension = pathinfo($item['mainImage'], PATHINFO_EXTENSION);
                                                @endphp

                                                @if (in_array(strtolower($extension), ['mp4', 'webm', 'avi']))
                                                    <video autoplay loop muted
                                                        class="img-fluid rounded object-fit-cover img-sm-slide">
                                                        <source src="{{ $item['mainImage'] }}" type="video/mp4">
                                                    </video>
                                                @else
                                                    <img class="img-fluid rounded object-fit-cover img-sm-slide"
                                                        src="{{ $item['mainImage'] }}"
                                                        alt="{{ $item['mainImgDesc'] }}">
                                                @endif
                                            </div>
                                        </div>
                                    </a>
                                </article>
                            </div>
                        @endforeach
                    </div>
                    <div class="carousel-indicators pb-2" style="transform: translateY(20px)">
                        @foreach (array_slice($culture, 2, 8) as $index => $item)
                            <button type="button" data-bs-target="#carouselCulture"
                                data-bs-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}"
                                aria-current="{{ $index === 0 ? 'true' : 'false' }}"
                                aria-label="Slide {{ $index }}"></button>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 ps-xl-2 mb-4 xl-border-start">
        <div class="line-news__block block-title">
            @foreach ($lineNews as $key => $item)
                @if ($key >= 32 && $key <= 34)
                    <article class="pb-1 mb-2 px-xl-2 {{ $key === 34 ? '' : 'border-bottom' }}">
                        <a href="{{ route('homepage.index') . '/news/' . $item['url'] }}">
                            @if ($key === 32)
                                <div class="">
                                    {{-- <img class="img-fluid rounded" src="{{ $item['mainImage'] }}"
                                        alt="{{ $item['mainImgDesc'] }}"> --}}
                                    @php
                                        $extension = pathinfo($item['mainImage'], PATHINFO_EXTENSION);
                                    @endphp

                                    @if (in_array(strtolower($extension), ['mp4', 'webm', 'avi']))
                                        <video autoplay loop muted class="img-fluid rounded">
                                            <source src="{{ $item['mainImage'] }}" type="video/mp4">
                                        </video>
                                    @else
                                        <img class="img-fluid rounded" src="{{ $item['mainImage'] }}"
                                            alt="{{ $item['mainImgDesc'] }}">
                                    @endif
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
            @foreach ($lineNews as $key => $item)
                @if ($key >= 35 && $key <= 40)
                    <article class="col-xl-4 pb-1 mb-2">
                        <a href="{{ route('homepage.index') . '/news/' . $item['url'] }}">
                            <div class="d-flex gap-2">
                                <div class="w-100">
                                    <h2>{{ $item['title'] }}</h2>
                                    <p>{{ \Carbon\Carbon::parse($item['publishedAt'])->locale('uk')->isoFormat('D MMMM YYYY') }}
                                    </p>
                                </div>
                                <div class="" style="max-width: 80px; max-height: 80px">
                                    {{-- <img class="img-fluid rounded w-100 h-100 object-fit-cover"
                                        src="{{ $item['mainImage'] }}" alt="{{ $item['mainImgDesc'] }}"> --}}
                                    @php
                                        $extension = pathinfo($item['mainImage'], PATHINFO_EXTENSION);
                                    @endphp

                                    @if (in_array(strtolower($extension), ['mp4', 'webm', 'avi']))
                                        <video autoplay loop muted
                                            class="img-fluid rounded w-100 h-100 object-fit-cover">
                                            <source src="{{ $item['mainImage'] }}" type="video/mp4">
                                        </video>
                                    @else
                                        <img class="img-fluid rounded w-100 h-100 object-fit-cover"
                                            src="{{ $item['mainImage'] }}" alt="{{ $item['mainImgDesc'] }}">
                                    @endif
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
    <div class="col-xl-8 pe-xl-3">
        <div class="sience__block mb-4">
            <div class="img-rel border-bottom">
                <p class="block-title">Спорт</p>
                @foreach ($sports as $key => $item)
                    @if ($key <= 1)
                        <article class="">
                            <a class="" href="{{ route('homepage.index') . '/news/' . $item['url'] }}">
                                @if ($key === 0)
                                    <div class="img-abs">
                                        {{-- <img class="img-fluid w-100 h-100 xl-rounded object-fit-cover xl-w-biimg"
                                            src="{{ $item['mainImage'] }}" alt="{{ $item['mainImgDesc'] }}"> --}}
                                        @php
                                            $extension = pathinfo($item['mainImage'], PATHINFO_EXTENSION);
                                        @endphp

                                        @if (in_array(strtolower($extension), ['mp4', 'webm', 'avi']))
                                            <video autoplay loop muted
                                                class="img-fluid w-100 h-100 xl-rounded object-fit-cover xl-w-biimg">
                                                <source src="{{ $item['mainImage'] }}" type="video/mp4">
                                            </video>
                                        @else
                                            <img class="img-fluid w-100 h-100 xl-rounded object-fit-cover xl-w-biimg"
                                                src="{{ $item['mainImage'] }}" alt="{{ $item['mainImgDesc'] }}">
                                        @endif
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
                @foreach ($sports as $key => $item)
                    @if ($key >= 2 && $key <= 3)
                        <article class="col-xl-6 {{ $key === 2 ? 'pe-xl-3 xl-border-end' : 'xl-ps-3' }}">
                            <a href="{{ route('homepage.index') . '/news/' . $item['url'] }}">
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
            @foreach ($lineNews as $key => $item)
                @if ($key >= 41 && $key <= 45)
                    <article class="pb-1 mb-2 px-xl-2 {{ $key === 45 ? '' : 'border-bottom' }}">
                        <a href="{{ route('homepage.index') . '/news/' . $item['url'] }}">
                            <div class="d-flex gap-2">
                                <div class="w-100">
                                    <h2>{{ $item['title'] }}</h2>
                                    <p>{{ \Carbon\Carbon::parse($item['publishedAt'])->locale('uk')->isoFormat('D MMMM YYYY') }}
                                    </p>
                                </div>
                                <div class="" style="max-width: 80px; max-height: 80px">
                                    {{-- <img class="img-fluid rounded w-100 h-100 object-fit-cover"
                                        src="{{ $item['mainImage'] }}" alt="{{ $item['mainImgDesc'] }}"> --}}
                                    @php
                                        $extension = pathinfo($item['mainImage'], PATHINFO_EXTENSION);
                                    @endphp

                                    @if (in_array(strtolower($extension), ['mp4', 'webm', 'avi']))
                                        <video autoplay loop muted
                                            class="img-fluid rounded w-100 h-100 object-fit-cover">
                                            <source src="{{ $item['mainImage'] }}" type="video/mp4">
                                        </video>
                                    @else
                                        <img class="img-fluid rounded w-100 h-100 object-fit-cover"
                                            src="{{ $item['mainImage'] }}" alt="{{ $item['mainImgDesc'] }}">
                                    @endif
                                </div>
                            </div>
                        </a>
                    </article>
                @endif
            @endforeach
        </div>
    </div>
</div>
