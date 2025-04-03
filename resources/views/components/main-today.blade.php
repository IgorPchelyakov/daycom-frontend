@props(['data'])
<div class="container px-0">
    <div class="main-today__block border-bottom pb-4 mb-2 border-black">
        <div class="d-xl-flex gap-4 mt-4 border-bottom pb-4 mb-4">
            <div class="w-100 main-td">
                <div class="mb-2">
                    <p>Головне сьогодні</p>
                </div>
                <div class="">
                    @foreach ($data as $key => $item)
                        @if ($key === 1 || $key === 2)
                            <article class="{{ $key === 2 ? ' mb-0' : 'border-bottom pb-1 mb-2' }}">
                                <a href="{{ route('homepage.index') . '/news/' . $item['url'] }}">
                                    <div class="">
                                        <h2 class="">{{ $item['title'] }}</h2>
                                        <p class="text-gray-600">{{ $item['desc'] }}</p>
                                    </div>
                                </a>
                            </article>
                        @endif
                        @continue($key !== 1 && $key !== 2)
                    @endforeach
                </div>
            </div>
            <div class="main-bi w-100 xl-border-end xl-pe-4">
                @foreach ($data as $key => $item)
                    @if ($key === 0)
                        <article class="">
                            <a href="{{ route('homepage.index') . '/news/' . $item['url'] }}">
                                <div class="">
                                    @php
                                        $extension = pathinfo($item['mainImage'], PATHINFO_EXTENSION);
                                    @endphp

                                    @if (in_array(strtolower($extension), ['mp4', 'webm', 'avi']))
                                        <video autoplay loop muted
                                            class="img-fluid xl-rounded w-100 img-min-400 object-fit-cover">
                                            <source src="{{ $item['mainImage'] }}" type="video/mp4">
                                        </video>
                                    @else
                                        <img class="img-fluid xl-rounded w-100 img-min-400 object-fit-cover"
                                            src="{{ $item['mainImage'] }}" alt="{{ $item['mainImgDesc'] }}">
                                    @endif
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
                @foreach ($data as $key => $item)
                    @if ($key >= 3 && $key <= 5)
                        @if ($key === 3)
                            <article class="border-bottom pb-1 mb-2">
                                <a href="{{ route('homepage.index') . '/news/' . $item['url'] }}">
                                    <div class="">
                                        {{-- <img class="img-fluid rounded" src="{{ $item['mainImage'] }}"
                                            alt="mainImgDesc"> --}}
                                        @php
                                            $extension = pathinfo($item['mainImage'], PATHINFO_EXTENSION);
                                        @endphp

                                        @if (in_array(strtolower($extension), ['mp4', 'webm', 'avi']))
                                            <video autoplay loop muted
                                                class="img-fluid xl-rounded w-100 img-min-400 object-fit-cover">
                                                <source src="{{ $item['mainImage'] }}" type="video/mp4">
                                            </video>
                                        @else
                                            <img class="img-fluid xl-rounded w-100 img-min-400 object-fit-cover"
                                                src="{{ $item['mainImage'] }}" alt="{{ $item['mainImgDesc'] }}">
                                        @endif
                                        <p class="text-end text-gray-600">{{ $item['mainImgAuthor'] }}</p>
                                    </div>
                                    <h2 class="">{{ $item['title'] }}</h2>
                                </a>
                            </article>
                        @endif
                        @if ($key > 3)
                            <article class="{{ $key === 5 ? ' mb-0' : 'border-bottom pb-1 mb-2' }}">
                                <a href="{{ route('homepage.index') . '/news/' . $item['url'] }}">
                                    <h2 class="">{{ $item['title'] }}</h2>
                                </a>
                            </article>
                        @endif
                    @endif
                @endforeach
            </div>
        </div>
        <div class="d-xl-flex">
            @foreach ($data as $key => $item)
                @if ($key >= 6)
                    <article class="{{ $loop->last ? 'col px-4' : 'col px-4 xl-border-end' }}">
                        <a href="{{ route('homepage.index') . '/news/' . $item['url'] }}">
                            <h2 class="{{ $loop->last ? '' : 'xl-mb-2-pb-2' }}">{{ $item['title'] }}</h2>
                        </a>
                    </article>
                @endif
            @endforeach
        </div>
    </div>
</div>
