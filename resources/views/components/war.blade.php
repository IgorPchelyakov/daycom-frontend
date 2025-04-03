@props(['war', 'lineNews', 'society', 'europe', 'china', 'usa', 'economy', 'technology', 'opinion', 'analytics'])

<div>
    <div class="sections-news__block d-xl-flex">
        <div class="col-xl-8 pe-xl-3">
            <div class="war-news__block mb-4">
                <div class="mb-4 img-rel">
                    <p class="block-title">Війна Росії проти України</p>
                    @foreach ($war as $key => $item)
                        @if ($key <= 1)
                            <article>
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
                    @foreach ($war as $key => $item)
                        @if ($key === 2)
                            <article class="">
                                <a href="{{ route('homepage.index') . '/news/' . $item['url'] }}">
                                    <div class="d-xl-flex gap-3">
                                        <div class="xl-block-w mb-4 mb-xl-0">
                                            <h2 class="mb-2 mb-xl-0">{{ $item['title'] }}</h2>
                                            <p class="text-gray-600 mb-0">{{ $item['desc'] }}</p>
                                        </div>
                                        <div class="d-xl-flex gap-3 b-fig-w pb-2 pb-xl-0 img-cont">
                                            {{-- <img class="mb-1 mb-xl-0 img-fluid w-100 h-100 rounded object-fit-cover xl-w-warimg"
                                                src="{{ $item['mainImage'] }}" alt="{{ $item['mainImgDesc'] }}"> --}}
                                            @if (in_array(strtolower($extension), ['mp4', 'webm', 'avi']))
                                                <video autoplay loop muted
                                                    class="mb-1 mb-xl-0 img-fluid w-100 h-100 rounded object-fit-cover xl-w-warimg">
                                                    <source src="{{ $item['mainImage'] }}" type="video/mp4">
                                                </video>
                                            @else
                                                <img class="mb-1 mb-xl-0 img-fluid w-100 h-100 rounded object-fit-cover xl-w-warimg"
                                                    src="{{ $item['mainImage'] }}" alt="{{ $item['mainImgDesc'] }}">
                                            @endif
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
                    @foreach ($war as $key => $item)
                        @if ($key >= 3 && $key <= 4)
                            <article class="col-xl-6 {{ $key === 3 ? 'pe-xl-3 xl-border-end' : 'xl-ps-3' }}">
                                <a href="{{ route('homepage.index') . '/news/' . $item['url'] }}">
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
                    @foreach ($society as $key => $item)
                        @if ($key <= 1)
                            <article class="">
                                <a class="" href="{{ route('homepage.index') . '/news/' . $item['url'] }}">
                                    @if ($key === 0)
                                        <div class="img-abs">
                                            {{-- <img class="img-fluid w-100 h-100 xl-rounded object-fit-cover xl-w-biimg"
                                                src="{{ $item['mainImage'] }}" alt="{{ $item['mainImgDesc'] }}"> --}}
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
                <div class="block-title border-bottom border-black py-3 me-xl-1 ms-xl-1 d-xl-flex">
                    @foreach ($society as $key => $item)
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
            <div class="europe__block">
                <div class="position-relative mb-2 block-container">
                    <p class="block-title">Європа</p>
                    @foreach ($europe as $key => $item)
                        @if ($key <= 1)
                            <article class="">
                                <a class="" href="{{ route('homepage.index') . '/news/' . $item['url'] }}">
                                    @if ($key === 0)
                                        <div class="img-abs">
                                            {{-- <img class="img-fluid w-100 h-100 xl-rounded object-fit-cover xl-w-biimg"
                                                src="{{ $item['mainImage'] }}" alt="{{ $item['mainImgDesc'] }}"> --}}
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
                <div class="europe__carousel pb-4 mb-4 border-bottom border-black">
                    <div id="carouselEurope" class="carousel slide carousel-dark block-title">
                        <div class="carousel-inner">
                            @for ($i = 2; $i < count($europe); $i++)
                                <div class="carousel-item{{ $i === 2 ? ' active' : '' }} border rounded p-3">
                                    <article>
                                        <a href="{{ route('homepage.index') . '/news/' . $europe[$i]['url'] }}">
                                            <div class="d-xl-flex align-items-center gap-4">
                                                <div class="title-cont-sm-slide">
                                                    <h2>{{ $europe[$i]['title'] }}</h2>
                                                    <p class="text-gray-600">{{ $europe[$i]['desc'] }}</p>
                                                </div>
                                                <div class="mb-4 img-cont-sm-slide">
                                                    {{-- <img class="img-fluid rounded object-fit-cover img-sm-slide"
                                                        src="{{ $europe[$i]['mainImage'] }}"
                                                        alt="{{ $europe[$i]['mainImgDesc'] }}"> --}}
                                                    @php
                                                        // Получаем расширение файла
                                                        $extension = pathinfo(
                                                            $europe[$i]['mainImage'],
                                                            PATHINFO_EXTENSION,
                                                        );
                                                    @endphp

                                                    @if (in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif', 'webp']))
                                                        <img class="img-fluid rounded object-fit-cover img-sm-slide"
                                                            src="{{ asset($europe[$i]['mainImage']) }}"
                                                            alt="{{ $europe[$i]['mainImgDesc'] }}">
                                                    @elseif (in_array(strtolower($extension), ['mp4', 'avi', 'mov']))
                                                        <video autoplay muted loop
                                                            class="img-fluid rounded object-fit-cover img-sm-slide">
                                                            <source src="{{ asset($europe[$i]['mainImage']) }}"
                                                                type="video/mp4">
                                                        </video>
                                                    @endif
                                                </div>
                                            </div>
                                        </a>
                                    </article>
                                </div>
                            @endfor
                        </div>
                        <div class="carousel-indicators pb-2" style="transform: translateY(20px)">
                            @for ($i = 2; $i < count($europe); $i++)
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
                    <p class="block-title">Китай</p>
                    @foreach ($china as $key => $item)
                        @if ($key <= 1)
                            <article>
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
                    @foreach ($usa as $key => $item)
                        @if ($key <= 1)
                            <article>
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
                    @foreach ($usa as $key => $item)
                        @if ($key === 2)
                            <article class="">
                                <a href="{{ route('homepage.index') . '/news/' . $item['url'] }}">
                                    <div class="d-xl-flex gap-3">
                                        <div class="xl-block-w mb-4 mb-xl-0">
                                            <h2 class="mb-2 mb-xl-0">{{ $item['title'] }}</h2>
                                            <p class="text-gray-600 mb-0">{{ $item['desc'] }}</p>
                                        </div>
                                        <div class="d-xl-flex gap-3 b-fig-w pb-2 pb-xl-0">
                                            {{-- <img class="mb-1 mb-xl-0 img-fluid w-100 h-100 rounded object-fit-cover xl-w-warimg img-cont"
                                                src="{{ $item['mainImage'] }}" alt="{{ $item['mainImgDesc'] }}"> --}}
                                            @php
                                                $extension = pathinfo($item['mainImage'], PATHINFO_EXTENSION);
                                            @endphp
                                            @if (in_array(strtolower($extension), ['mp4', 'webm', 'avi']))
                                                <video autoplay loop muted
                                                    class="mb-1 mb-xl-0 img-fluid w-100 h-100 rounded object-fit-cover xl-w-warimg img-cont">
                                                    <source src="{{ $item['mainImage'] }}" type="video/mp4">
                                                </video>
                                            @else
                                                <img class="mb-1 mb-xl-0 img-fluid w-100 h-100 rounded object-fit-cover xl-w-warimg img-cont"
                                                    src="{{ $item['mainImage'] }}" alt="{{ $item['mainImgDesc'] }}">
                                            @endif
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
                    @foreach ($economy as $key => $item)
                        @if ($key <= 1)
                            <article>
                                <a class="" href="{{ route('homepage.index') . '/news/' . $item['url'] }}">
                                    @if ($key === 0)
                                        <div class="img-abs">
                                            {{-- <img class="img-fluid w-100 h-100 xl-rounded object-fit-cover xl-w-biimg"
                                                src="{{ $item['mainImage'] }}" alt="{{ $item['mainImgDesc'] }}"> --}}
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
                <div class="position-relative mb-2 block-container">
                    <p class="block-title">Технології</p>
                    @foreach ($technology as $key => $item)
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
                <div class="technologies__carousel pb-4 mb-4">
                    <div id="carouselTechnologies" class="carousel slide carousel-dark block-title">
                        <div class="carousel-inner">
                            @for ($i = 2; $i < count($technology); $i++)
                                <div class="carousel-item{{ $i === 2 ? ' active' : '' }} border rounded p-3">
                                    <article>
                                        <a href="{{ route('homepage.index') . '/news/' . $technology[$i]['url'] }}">
                                            <div class="d-xl-flex align-items-center gap-4">
                                                <div class="title-cont-sm-slide">
                                                    <h2>{{ $technology[$i]['title'] }}</h2>
                                                    <p class="text-gray-600">{{ $technology[$i]['desc'] }}
                                                    </p>
                                                </div>
                                                <div class="mb-4 img-cont-sm-slide">
                                                    {{-- <img class="img-fluid rounded object-fit-cover img-sm-slide"
                                                        src="{{ $technology[$i]['mainImage'] }}"
                                                        alt="{{ $technology[$i]['mainImgDesc'] }}"> --}}
                                                    @php
                                                        $extension = pathinfo(
                                                            $technology[$i]['mainImage'],
                                                            PATHINFO_EXTENSION,
                                                        );
                                                    @endphp

                                                    @if (in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif', 'webp']))
                                                        <img class="img-fluid rounded object-fit-cover img-sm-slide"
                                                            src="{{ asset($technology[$i]['mainImage']) }}"
                                                            alt="{{ $technology[$i]['mainImgDesc'] }}">
                                                    @elseif (in_array(strtolower($extension), ['mp4', 'avi', 'mov']))
                                                        <video autoplay muted loop
                                                            class="img-fluid rounded object-fit-cover img-sm-slide">
                                                            <source src="{{ asset($technology[$i]['mainImage']) }}"
                                                                type="video/mp4">
                                                        </video>
                                                    @endif
                                                </div>
                                            </div>
                                        </a>
                                    </article>
                                </div>
                            @endfor
                        </div>
                        <div class="carousel-indicators pb-2" style="transform: translateY(20px)">
                            @for ($i = 2; $i < count($technology); $i++)
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
            <div class="d-flex mb-2 block-title line-news-title"
                style="color: #5a5a5a; text-decoration: underline; text-decoration-color: #5a5a5a;">
                <p class="border-end pe-3 me-3">
                    <a href="{{ route('news.line') }}" style="">Стрічка новин</a>
                </p>
                <p>
                    <a href="{{ route('news-today.index') }}">Сьогоднішня Газета</a>
                </p>
            </div>
            <div class="line-news__block block-title">
                @foreach ($lineNews as $key => $item)
                    @if ($key < 5)
                        <article class="border-bottom pb-1 mb-2 px-xl-2 {{ $key === 4 ? 'border-black' : '' }}">
                            <a href="{{ route('homepage.index') . '/news/' . $item['url'] }}">
                                @if ($key === 0)
                                    <div class="">
                                        {{-- <img class="img-fluid rounded w-100 h-100" src="{{ $item['mainImage'] }}"
                                            alt="{{ $item['mainImgDesc'] }}"> --}}
                                        @php
                                            $extension = pathinfo($item['mainImage'], PATHINFO_EXTENSION);
                                        @endphp
                                        @if (in_array(strtolower($extension), ['mp4', 'webm', 'avi']))
                                            <video autoplay loop muted class="img-fluid rounded w-100 h-100">
                                                <source src="{{ $item['mainImage'] }}" type="video/mp4">
                                            </video>
                                        @else
                                            <img class="img-fluid rounded w-100 h-100"
                                                src="{{ $item['mainImage'] }}" alt="{{ $item['mainImgDesc'] }}">
                                        @endif
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
                        @for ($i = 0; $i < count($opinion); $i += 2)
                            <div class="carousel-item{{ $i === 0 ? ' active' : '' }}">
                                <div class="row">
                                    @for ($j = $i; $j < min($i + 2, count($opinion)); $j++)
                                        <div class="col-md-6">
                                            <article>
                                                <a
                                                    href="{{ route('homepage.index') . '/news/' . $opinion[$j]['url'] }}">
                                                    <div class="mb-2" style="height: 110px;">
                                                        {{-- <img class="img-fluid rounded w-100 h-100 object-fit-cover"
                                                            src="{{ $opinion[$j]['mainImage'] }}"
                                                            alt="{{ $opinion[$j]['mainImage'] }}"> --}}
                                                        @php
                                                            $extension = pathinfo(
                                                                $opinion[$j]['mainImage'],
                                                                PATHINFO_EXTENSION,
                                                            );
                                                        @endphp

                                                        @if (in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif', 'webp']))
                                                            <img class="img-fluid rounded w-100 h-100 object-fit-cover"
                                                                src="{{ asset($opinion[$j]['mainImage']) }}"
                                                                alt="{{ $opinion[$j]['mainImgDesc'] }}">
                                                        @elseif (in_array(strtolower($extension), ['mp4', 'avi', 'mov']))
                                                            <video autoplay muted loop
                                                                class="img-fluid rounded w-100 h-100 object-fit-cover">
                                                                <source src="{{ asset($opinion[$j]['mainImage']) }}"
                                                                    type="video/mp4">
                                                            </video>
                                                        @endif
                                                    </div>
                                                    <h2 class="px-1 fs-6">{{ $opinion[$j]['title'] }}</h2>
                                                </a>
                                            </article>
                                        </div>
                                    @endfor
                                </div>
                            </div>
                        @endfor
                    </div>
                    <div class="carousel-indicators pb-2" style="transform: translateY(40px)">
                        @for ($i = 0; $i < count($opinion); $i += 2)
                            <button type="button" data-bs-target="#carouselSec"
                                data-bs-slide-to="{{ $i / 2 }}" class="{{ $i === 0 ? 'active' : '' }}"
                                aria-current="{{ $i === 0 ? 'true' : 'false' }}"
                                aria-label="Slide {{ $i / 2 }}"></button>
                        @endfor
                    </div>
                </div>
            </div>
            <div class="line-news__block mb-4 block-title">
                @foreach ($lineNews as $key => $item)
                    @if ($key >= 5 && $key <= 9)
                        <article class="border-bottom pb-1 mb-2 px-xl-2 {{ $key === 9 ? 'border-black' : '' }}">
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
            <div class="line-news__block mb-4 block-title">
                @foreach ($lineNews as $key => $item)
                    @if ($key >= 10 && $key <= 14)
                        <article class="border-bottom pb-1 mb-2 px-xl-2">
                            <a href="{{ route('homepage.index') . '/news/' . $item['url'] }}">
                                @if ($key === 10)
                                    <div class="">
                                        {{-- <img class="img-fluid rounded w-100" src="{{ $item['mainImage'] }}"
                                            alt="{{ $item['mainImgDesc'] }}"> --}}
                                        @php
                                            $extension = pathinfo($item['mainImage'], PATHINFO_EXTENSION);
                                        @endphp
                                        @if (in_array(strtolower($extension), ['mp4', 'webm', 'avi']))
                                            <video autoplay loop muted class="img-fluid rounded w-100">
                                                <source src="{{ $item['mainImage'] }}" type="video/mp4">
                                            </video>
                                        @else
                                            <img class="img-fluid rounded w-100" src="{{ $item['mainImage'] }}"
                                                alt="{{ $item['mainImgDesc'] }}">
                                        @endif
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
                @foreach ($lineNews as $key => $item)
                    @if ($key >= 15 && $key <= 19)
                        <article class="border-bottom pb-1 mb-2 px-xl-2 {{ $key === 19 ? 'border-black' : '' }}">
                            <a href="{{ route('homepage.index') . '/news/' . $item['url'] }}">
                                @if ($key === 15)
                                    <div class="">
                                        {{-- <img class="img-fluid rounded w-100 h-100" src="{{ $item['mainImage'] }}"
                                            alt="{{ $item['mainImgDesc'] }}"> --}}
                                        @php
                                            $extension = pathinfo($item['mainImage'], PATHINFO_EXTENSION);
                                        @endphp
                                        @if (in_array(strtolower($extension), ['mp4', 'webm', 'avi']))
                                            <video autoplay loop muted class="img-fluid rounded w-100 h-100">
                                                <source src="{{ $item['mainImage'] }}" type="video/mp4">
                                            </video>
                                        @else
                                            <img class="img-fluid rounded w-100 h-100"
                                                src="{{ $item['mainImage'] }}" alt="{{ $item['mainImgDesc'] }}">
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
            <div class="line-news__carousel pb-4 mb-4 block-title">
                <p class="mb-2">Аналітика</p>
                <div id="carouselAnalitics" class="carousel slide carousel-dark">
                    <div class="carousel-inner" style="min-height: 250px;">
                        @for ($i = 0; $i < count($analytics); $i += 2)
                            <div class="carousel-item{{ $i === 0 ? ' active' : '' }}">
                                <div class="row">
                                    @for ($j = $i; $j < min($i + 2, count($analytics)); $j++)
                                        <div class="col-md-6">
                                            <article>
                                                <a
                                                    href="{{ route('homepage.index') . '/news/' . $analytics[$j]['url'] }}">
                                                    <div class="mb-2" style="height: 110px;">
                                                        {{-- <img class="img-fluid rounded w-100 h-100 object-fit-cover"
                                                            src="{{ $analytics[$j]['mainImage'] }}"
                                                            alt="{{ $analytics[$j]['mainImage'] }}"> --}}
                                                        @php
                                                            $extension = pathinfo(
                                                                $analytics[$j]['mainImage'],
                                                                PATHINFO_EXTENSION,
                                                            );
                                                        @endphp

                                                        @if (in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif', 'webp']))
                                                            <img class="img-fluid rounded w-100 h-100 object-fit-cover"
                                                                src="{{ asset($analytics[$j]['mainImage']) }}"
                                                                alt="{{ $analytics[$j]['mainImgDesc'] }}">
                                                        @elseif (in_array(strtolower($extension), ['mp4', 'avi', 'mov']))
                                                            <video autoplay muted loop
                                                                class="img-fluid rounded w-100 h-100 object-fit-cover">
                                                                <source
                                                                    src="{{ asset($analytics[$j]['mainImage']) }}"
                                                                    type="video/mp4">
                                                            </video>
                                                        @endif
                                                    </div>
                                                    <h2 class="px-1 fs-6">{{ $analytics[$j]['title'] }}</h2>
                                                </a>
                                            </article>
                                        </div>
                                    @endfor
                                </div>
                            </div>
                        @endfor
                    </div>
                    <div class="carousel-indicators pb-2" style="transform: translateY(40px)">
                        @for ($i = 0; $i < count($analytics); $i += 2)
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
