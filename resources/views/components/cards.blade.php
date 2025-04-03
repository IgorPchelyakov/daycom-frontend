@props(['politics', 'americas', 'middleEast', 'pacific', 'africa'])

<div class="sections-fivecard__block border-top border-black py-3">
    <div class="power__block border-bottom mb-3">
        <p class="block-title">Політика та Влада</p>
        <div class="d-xl-flex">
            @foreach ($politics as $key => $item)
                <article
                    class="col-xl px-0 {{ $key === 0 ? 'ps-xl-0 pe-xl-2' : '' }} {{ $key >= 1 && $key <= 3 ? 'px-xl-2' : '' }} {{ $key === 4 ? 'pe-xl-0 ps-xl-2' : '' }}">
                    <a href="{{ route('homepage.index') . '/news/' . $item['url'] }}">
                        <div>
                            {{-- <img class="mb-2 img-fluid w-100 h-100 rounded object-fit-cover fivecard-img img-cont"
                                src="{{ $item['mainImage'] }}" alt="{{ $item['mainImgDesc'] }}"> --}}
                            @php
                                $extension = pathinfo($item['mainImage'], PATHINFO_EXTENSION);
                            @endphp

                            @if (in_array(strtolower($extension), ['mp4', 'webm', 'avi']))
                                <video autoplay loop muted
                                    class="mb-2 img-fluid w-100 h-100 rounded object-fit-cover fivecard-img img-cont">
                                    <source src="{{ $item['mainImage'] }}" type="video/mp4">
                                </video>
                            @else
                                <img class="mb-2 img-fluid w-100 h-100 rounded object-fit-cover fivecard-img img-cont"
                                    src="{{ $item['mainImage'] }}" alt="{{ $item['mainImgDesc'] }}">
                            @endif
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
            @foreach ($americas as $key => $item)
                <article
                    class="col-xl px-0 {{ $key === 0 ? 'ps-xl-0 pe-xl-2' : '' }} {{ $key >= 1 && $key <= 3 ? 'px-xl-2' : '' }} {{ $key === 4 ? 'pe-xl-0 ps-xl-2' : '' }}">
                    <a href="{{ route('homepage.index') . '/news/' . $item['url'] }}">
                        <div>
                            {{-- <img class="mb-2 img-fluid w-100 h-100 rounded object-fit-cover fivecard-img img-cont"
                                src="{{ $item['mainImage'] }}" alt="{{ $item['mainImgDesc'] }}"> --}}
                            @php
                                $extension = pathinfo($item['mainImage'], PATHINFO_EXTENSION);
                            @endphp

                            @if (in_array(strtolower($extension), ['mp4', 'webm', 'avi']))
                                <video autoplay loop muted
                                    class="mb-2 img-fluid w-100 h-100 rounded object-fit-cover fivecard-img img-cont">
                                    <source src="{{ $item['mainImage'] }}" type="video/mp4">
                                </video>
                            @else
                                <img class="mb-2 img-fluid w-100 h-100 rounded object-fit-cover fivecard-img img-cont"
                                    src="{{ $item['mainImage'] }}" alt="{{ $item['mainImgDesc'] }}">
                            @endif
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
            @foreach ($middleEast as $key => $item)
                <article
                    class="col-xl px-0 {{ $key === 0 ? 'ps-xl-0 pe-xl-2' : '' }} {{ $key >= 1 && $key <= 3 ? 'px-xl-2' : '' }} {{ $key === 4 ? 'pe-xl-0 ps-xl-2' : '' }}">
                    <a href="{{ route('homepage.index') . '/news/' . $item['url'] }}">
                        <div>
                            {{-- <img class="mb-2 img-fluid w-100 h-100 rounded object-fit-cover fivecard-img img-cont"
                                src="{{ $item['mainImage'] }}" alt="{{ $item['mainImgDesc'] }}"> --}}
                            @php
                                $extension = pathinfo($item['mainImage'], PATHINFO_EXTENSION);
                            @endphp

                            @if (in_array(strtolower($extension), ['mp4', 'webm', 'avi']))
                                <video autoplay loop muted
                                    class="mb-2 img-fluid w-100 h-100 rounded object-fit-cover fivecard-img img-cont">
                                    <source src="{{ $item['mainImage'] }}" type="video/mp4">
                                </video>
                            @else
                                <img class="mb-2 img-fluid w-100 h-100 rounded object-fit-cover fivecard-img img-cont"
                                    src="{{ $item['mainImage'] }}" alt="{{ $item['mainImgDesc'] }}">
                            @endif
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
            @foreach ($pacific as $key => $item)
                <article
                    class="col-xl px-0 {{ $key === 0 ? 'ps-xl-0 pe-xl-2' : '' }} {{ $key >= 1 && $key <= 3 ? 'px-xl-2' : '' }} {{ $key === 4 ? 'pe-xl-0 ps-xl-2' : '' }}">
                    <a href="{{ route('homepage.index') . '/news/' . $item['url'] }}">
                        <div>
                            {{-- <img class="mb-2 img-fluid w-100 h-100 rounded object-fit-cover fivecard-img img-cont"
                                src="{{ $item['mainImage'] }}" alt="{{ $item['mainImgDesc'] }}"> --}}
                            @php
                                $extension = pathinfo($item['mainImage'], PATHINFO_EXTENSION);
                            @endphp

                            @if (in_array(strtolower($extension), ['mp4', 'webm', 'avi']))
                                <video autoplay loop muted
                                    class="mb-2 img-fluid w-100 h-100 rounded object-fit-cover fivecard-img img-cont">
                                    <source src="{{ $item['mainImage'] }}" type="video/mp4">
                                </video>
                            @else
                                <img class="mb-2 img-fluid w-100 h-100 rounded object-fit-cover fivecard-img img-cont"
                                    src="{{ $item['mainImage'] }}" alt="{{ $item['mainImgDesc'] }}">
                            @endif
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
            @foreach ($africa as $key => $item)
                <article
                    class="col-xl px-0 {{ $key === 0 ? 'ps-xl-0 pe-xl-2' : '' }} {{ $key >= 1 && $key <= 3 ? 'px-xl-2' : '' }} {{ $key === 4 ? 'pe-xl-0 ps-xl-2' : '' }}">
                    <a href="{{ route('homepage.index') . '/news/' . $item['url'] }}">
                        <div>
                            {{-- <img class="mb-2 img-fluid w-100 h-100 rounded object-fit-cover fivecard-img img-cont"
                                src="{{ $item['mainImage'] }}" alt="{{ $item['mainImgDesc'] }}"> --}}
                            @php
                                $extension = pathinfo($item['mainImage'], PATHINFO_EXTENSION);
                            @endphp

                            @if (in_array(strtolower($extension), ['mp4', 'webm', 'avi']))
                                <video autoplay loop muted
                                    class="mb-2 img-fluid w-100 h-100 rounded object-fit-cover fivecard-img img-cont">
                                    <source src="{{ $item['mainImage'] }}" type="video/mp4">
                                </video>
                            @else
                                <img class="mb-2 img-fluid w-100 h-100 rounded object-fit-cover fivecard-img img-cont"
                                    src="{{ $item['mainImage'] }}" alt="{{ $item['mainImgDesc'] }}">
                            @endif
                            <h2 class="block-title">{{ $item['title'] }}</h2>
                        </div>
                    </a>
                </article>
            @endforeach
        </div>
    </div>
</div>
