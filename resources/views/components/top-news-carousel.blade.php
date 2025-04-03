@props(['data'])

<div class="container px-0">
    <div class="top-news__carousel pb-4 mb-4 border-bottom border-black">
        <p class="text-center mb-2">Новини, які можуть Вас зацікавити</p>
        <div id="carousel" class="carousel slide carousel-dark d-none d-xl-block">
            <div class="carousel-inner" style="min-height: 320px;">
                @for ($i = 0; $i < count($data); $i += 4)
                    <div class="carousel-item{{ $i === 0 ? ' active' : '' }}">
                        <div class="row">
                            @for ($j = $i; $j < min($i + 4, count($data)); $j++)
                                <div class="col-md-3">
                                    <article>
                                        <a href="{{ route('homepage.index') . '/news/' . $data[$j]['url'] }}">
                                            <div class="mb-4" style="height: 190px;">
                                                {{-- <img class="img-fluid rounded h-100 object-fit-cover"
                                                    src="{{ $data[$j]['mainImage'] }}"
                                                    alt="{{ $data[$j]['mainImage'] }}"> --}}
                                                @php
                                                    // Получаем расширение файла
                                                    $extension = pathinfo($data[$j]['mainImage'], PATHINFO_EXTENSION);
                                                @endphp

                                                @if (in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif', 'webp']))
                                                    <img class="img-fluid rounded h-100 object-fit-cover"
                                                        src="{{ asset($data[$j]['mainImage']) }}"
                                                        alt="{{ $data[$j]['mainImgDesc'] }}">
                                                @elseif (in_array(strtolower($extension), ['mp4', 'avi', 'mov']))
                                                    <video autoplay muted loop
                                                        class="img-fluid rounded h-100 object-fit-cover">
                                                        <source src="{{ asset($data[$j]['mainImage']) }}"
                                                            type="video/mp4">
                                                    </video>
                                                @endif
                                            </div>
                                            <h2 class="px-2">{{ $data[$j]['title'] }}
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
                @for ($i = 0; $i < count($data); $i += 4)
                    <button type="button" data-bs-target="#carousel" data-bs-slide-to="{{ $i / 4 }}"
                        class="{{ $i === 0 ? 'active' : '' }}" aria-current="{{ $i === 0 ? 'true' : 'false' }}"
                        aria-label="Slide {{ $i / 4 }}"></button>
                @endfor
            </div>
        </div>
        <div id="carouselOneSlide" class="carousel slide carousel-dark d-xl-none">
            <div class="carousel-inner" style="min-height: 320px;">
                @for ($i = 0; $i < count($data); $i++)
                    <div class="carousel-item{{ $i === 0 ? ' active' : '' }}">
                        <div class="row">
                            <div class="col-md-12">
                                <article>
                                    <a href="{{ route('homepage.index') . '/news/' . $data[$i]['url'] }}">
                                        <div class="mb-4" style="">
                                            <img class="img-fluid xl-rounded w-100 h-100 object-fit-cover"
                                                style="min-height: 400px; max-height: 500px;"
                                                src="{{ $data[$i]['mainImage'] }}" alt="{{ $data[$i]['mainImage'] }}">
                                        </div>
                                        <h2 class="px-4">{{ $data[$i]['title'] }}</h2>
                                    </a>
                                </article>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
            <div class="carousel-indicators pb-2" style="transform: translateY(40px)">
                @for ($i = 0; $i < count($data); $i++)
                    <button type="button" data-bs-target="#carouselOneSlide" data-bs-slide-to="{{ $i }}"
                        class="{{ $i === 0 ? 'active' : '' }}" aria-current="{{ $i === 0 ? 'true' : 'false' }}"
                        aria-label="Slide {{ $i }}"></button>
                @endfor
            </div>
        </div>
    </div>
</div>
