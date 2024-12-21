@props(['data'])
<div class="mb-3">
    <div class="banner__container mx-auto border-top border-bottom py-1 text-center"
        style="color: rgb(107 114 128); font-size: 12px; line-height: 12px; font-weight: 300;">
        ОГОЛОШЕННЯ
    </div>
    @php
        $blockType = 'Блок №5 Головна сторінка';

        $matchingBanners = collect($data['bannersData'])->filter(function ($banner) use ($blockType) {
            $bannerBlockTypes = json_decode($banner['blockTypes'], true);
            return in_array($blockType, $bannerBlockTypes);
        });

        $banner = $matchingBanners->isNotEmpty() ? $matchingBanners->random() : null;
    @endphp
    @if ($banner)
        @php
            $images = json_decode($banner['images']);
            $headlines = json_decode($banner['headlines']);
            $descriptions = json_decode($banner['descriptions']);
            $advertiserLinks = json_decode($banner['advertiserLinks']);
        @endphp
        @if ($banner['bannerType'] === 'Слайд-шоу Flex L white')
            <div class="banner__container mx-auto text-center position-relative" style="background-color: #EBEBEB;">
                <div class="second-banner__carousel pb-4 mb-4">
                    <div id="carouselFiveBanner" class="carousel slide carousel-dark mx-auto" style="max-width: 1200px;">
                        <div class="carousel-inner mx-auto" style="max-width: 1200px; width: 100%;">
                            @foreach ($images as $key => $image)
                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                    <div class="d-md-none" style="min-height: auto; background-color: #fff;">
                                        <img style="max-width: 1200px; width: 100%; height: auto; object-fit: contain;"
                                            src="{{ $image }}" class="d-block w-100" alt="Banner Image">
                                        <div class="position-relative" style="padding: 20px;">
                                            <div class="text-start">
                                                @if (isset($headlines[$key]))
                                                    <h3
                                                        style="font-weight: 500; font-size: 20px; line-height: 24px; color: black;">
                                                        {{ $headlines[$key] }}</h3>
                                                @endif
                                                @if (isset($descriptions[$key]))
                                                    <p
                                                        style="font-size: 14px; line-height: 16px; color: black; margin-top: 10px;">
                                                        {{ $descriptions[$key] }}</p>
                                                @endif
                                                @if (isset($advertiserLinks[$key]))
                                                    <div class="">
                                                        <a class="white-banner__link" target="_blank"
                                                            href="{{ $advertiserLinks[$key] }}">Переглянути</a>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-none d-md-block">
                                        <img style="max-width: 1200px; max-height: 600px; width: 100%; min-height: 600px; height: 100%; object-fit: cover;"
                                            src="{{ $image }}" class="d-block w-100" alt="Banner Image">
                                        <div class="glassmorphism-parent position-absolute w-100 d-none d-md-block"
                                            style="height: 110px; bottom: 0;">
                                            <div class="d-md-flex align-items-center justify-content-between gap-4 w-100 h-100"
                                                style="padding: 10px 30px; position: absolute; bottom: 0; max-width: 1200px; max-height: 110px;">
                                                <div class="d-flex flex-column text-start">
                                                    @if (isset($headlines[$key]))
                                                        <h3 style="font-weight: 500; font-size: 20px; line-height: 24px; color: black;"
                                                            class="w-100">
                                                            {{ $headlines[$key] }}</h3>
                                                    @endif
                                                    @if (isset($descriptions[$key]))
                                                        <p style="font-size: 14px; line-height: 16px; color: black; margin: 0;"
                                                            class="w-100">
                                                            {{ $descriptions[$key] }}</p>
                                                    @endif
                                                </div>
                                                @if (isset($advertiserLinks[$key]))
                                                    <div class="ml-auto text-start">
                                                        <a class="white-banner__link" target="_blank"
                                                            href="{{ $advertiserLinks[$key] }}">Переглянути</a>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @elseif ($banner['bannerType'] === 'Слайд-шоу Flex L black')
                        <div class="banner__container mx-auto text-center position-relative"
                            style="background-color: #EBEBEB;">
                            <div class="second-banner__carousel pb-4 mb-4">
                                <div id="carouselFiveBanner" class="carousel slide mx-auto" style="max-width: 1200px;">
                                    <div class="carousel-inner mx-auto" style="max-width: 1200px; width: 100%;">
                                        @foreach ($images as $key => $image)
                                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                                <div class="d-md-none"
                                                    style="min-height: auto; background-color: #000;">
                                                    <img style="max-width: 1200px; width: 100%; height: auto; object-fit: contain;"
                                                        src="{{ $image }}" class="d-block w-100"
                                                        alt="Banner Image">
                                                    <div class="position-relative" style="padding: 20px;">
                                                        <div class="text-start text-white">
                                                            @if (isset($headlines[$key]))
                                                                <h3
                                                                    style="font-weight: 500; font-size: 20px; line-height: 24px;">
                                                                    {{ $headlines[$key] }}</h3>
                                                            @endif
                                                            @if (isset($descriptions[$key]))
                                                                <p
                                                                    style="font-size: 14px; line-height: 16px; color: #fff; margin-top: 10px;">
                                                                    {{ $descriptions[$key] }}</p>
                                                            @endif
                                                            @if (isset($advertiserLinks[$key]))
                                                                <div class="">
                                                                    <a class="black-banner__link" target="_blank"
                                                                        href="{{ $advertiserLinks[$key] }}">Переглянути</a>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-none d-md-block" style="background-color: #000;">
                                                    <img style="max-width: 1200px; max-height: 600px; width: 100%; min-height: 600px; height: 100%; object-fit: cover;"
                                                        src="{{ $image }}" class="d-block w-100"
                                                        alt="Banner Image">
                                                    <div class="glassmorphism-b-parent position-absolute w-100 d-none d-md-block"
                                                        style="height: 110px; bottom: 0;">
                                                        <div class="d-md-flex align-items-center justify-content-between gap-4 w-100 h-100"
                                                            style="padding: 10px 30px; position: absolute; bottom: 0; max-width: 1200px; max-height: 110px;">
                                                            <div class="d-flex flex-column text-start text-white">
                                                                @if (isset($headlines[$key]))
                                                                    <h3 style="font-weight: 500; font-size: 20px; line-height: 24px;"
                                                                        class="w-100">
                                                                        {{ $headlines[$key] }}</h3>
                                                                @endif
                                                                @if (isset($descriptions[$key]))
                                                                    <p style="font-size: 14px; line-height: 16px; color: #fff; margin: 0;"
                                                                        class="w-100">
                                                                        {{ $descriptions[$key] }}</p>
                                                                @endif
                                                            </div>
                                                            @if (isset($advertiserLinks[$key]))
                                                                <div class="ml-auto text-start">
                                                                    <a class="black-banner__link" target="_blank"
                                                                        href="{{ $advertiserLinks[$key] }}">Переглянути</a>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @elseif ($banner['bannerType'] === 'Повідомлення Flex М white')
                                    <div class="banner__container mx-auto text-center position-relative"
                                        style="background-color: #EBEBEB;">
                                        <div class="second-banner__carousel pb-4 mb-4">
                                            <div id="carouselFiveBanner" class="carousel slide carousel-dark mx-auto">
                                                <div class="carousel-inner mx-auto"
                                                    style="max-width: 1920px; width: 100%;">
                                                    @for ($i = 0; $i < count($images); $i += 2)
                                                        @php
                                                            $headlineIndex = ($i / 2) % count($headlines);
                                                            $descriptionIndex = ($i / 2) % count($descriptions);
                                                            $linkIndex = ($i / 2) % count($advertiserLinks);
                                                            $headline = isset($headlines[$headlineIndex])
                                                                ? $headlines[$headlineIndex]
                                                                : '';
                                                            $description = isset($descriptions[$descriptionIndex])
                                                                ? $descriptions[$descriptionIndex]
                                                                : '';
                                                            $link = isset($advertiserLinks[$linkIndex])
                                                                ? $advertiserLinks[$linkIndex]
                                                                : '';
                                                        @endphp
                                                        <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
                                                            <div
                                                                class="d-md-flex align-items-center h-100 limiting-container">
                                                                @if ($i < count($images))
                                                                    <div class="text-center lim-img"
                                                                        style="flex: 0 0 33.33%;">
                                                                        <img class="img-size"
                                                                            style="width: 100%; object-fit: cover; height: 100%;"
                                                                            src="{{ $images[$i] }}"
                                                                            alt="Banner Image">
                                                                    </div>
                                                                @endif
                                                                <div class="d-flex flex-column justify-content-center text-md-start lim-content"
                                                                    style="background-color: #fff; flex: 0 0 33.33%; height: 100%;">
                                                                    <div class=""
                                                                        style="flex-grow: 7; display: flex; flex-direction: column; justify-content: center;">
                                                                        @if ($headline)
                                                                            <h3
                                                                                style="font-weight: 500; font-size: 20px; line-height: 24px; color: black;">
                                                                                {{ $headline }}</h3>
                                                                        @endif
                                                                        @if ($description)
                                                                            <p
                                                                                style="font-size: 14px; line-height: 16px; color: black; margin-top: 10px;">
                                                                                {{ $description }}</p>
                                                                        @endif
                                                                    </div>
                                                                    @if ($link)
                                                                        <div class="" style="flex-grow: 3;">
                                                                            <a class="white-banner__link"
                                                                                target="_blank"
                                                                                href="{{ $link }}">Переглянути</a>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                                @if ($i + 1 < count($images))
                                                                    <div class="text-center lim-img"
                                                                        style="flex: 0 0 33.33%;">
                                                                        <img class="img-size"
                                                                            style="width: 100%; object-fit: cover; height: 100%;"
                                                                            src="{{ $images[$i + 1] }}"
                                                                            alt="Banner Image">
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    @endfor
                                                </div>
                                            @elseif ($banner['bannerType'] === 'Повідомлення Flex М black')
                                                <div class="banner__container mx-auto text-center position-relative"
                                                    style="background-color: #EBEBEB;">
                                                    <div class="second-banner__carousel pb-4 mb-4">
                                                        <div id="carouselFiveBanner"
                                                            class="carousel slide carousel mx-auto">
                                                            <div class="carousel-inner mx-auto"
                                                                style="max-width: 1920px; width: 100%;">
                                                                @for ($i = 0; $i < count($images); $i += 2)
                                                                    @php
                                                                        $headlineIndex = ($i / 2) % count($headlines);
                                                                        $descriptionIndex =
                                                                            ($i / 2) % count($descriptions);
                                                                        $linkIndex = ($i / 2) % count($advertiserLinks);
                                                                        $headline = isset($headlines[$headlineIndex])
                                                                            ? $headlines[$headlineIndex]
                                                                            : '';
                                                                        $description = isset(
                                                                            $descriptions[$descriptionIndex],
                                                                        )
                                                                            ? $descriptions[$descriptionIndex]
                                                                            : '';
                                                                        $link = isset($advertiserLinks[$linkIndex])
                                                                            ? $advertiserLinks[$linkIndex]
                                                                            : '';
                                                                    @endphp
                                                                    <div
                                                                        class="carousel-item {{ $i == 0 ? 'active' : '' }}">
                                                                        <div
                                                                            class="d-md-flex align-items-center h-100 limiting-container">
                                                                            @if ($i < count($images))
                                                                                <div class="text-center lim-img"
                                                                                    style="flex: 0 0 33.33%;">
                                                                                    <img class="img-size"
                                                                                        style="width: 100%; object-fit: cover; height: 100%;"
                                                                                        src="{{ $images[$i] }}"
                                                                                        alt="Banner Image">
                                                                                </div>
                                                                            @endif
                                                                            <div class="d-flex flex-column justify-content-center text-md-start lim-content"
                                                                                style="background-color: #000; flex: 0 0 33.33%; height: 100%;">
                                                                                <div class=""
                                                                                    style="flex-grow: 7; display: flex; flex-direction: column; justify-content: center;">
                                                                                    @if ($headline)
                                                                                        <h3
                                                                                            style="font-weight: 500; font-size: 20px; line-height: 24px; color: white;">
                                                                                            {{ $headline }}</h3>
                                                                                    @endif
                                                                                    @if ($description)
                                                                                        <p
                                                                                            style="font-size: 14px; line-height: 16px; color: white; margin-top: 10px;">
                                                                                            {{ $description }}</p>
                                                                                    @endif
                                                                                </div>
                                                                                @if ($link)
                                                                                    <div class=""
                                                                                        style="flex-grow: 3;">
                                                                                        <div class="">
                                                                                            <a class="black-m-banner__link"
                                                                                                target="_blank"
                                                                                                href="{{ $link }}">Переглянути</a>
                                                                                        </div>
                                                                                    </div>
                                                                                @endif
                                                                            </div>
                                                                            @if ($i + 1 < count($images))
                                                                                <div class="text-center lim-img"
                                                                                    style="flex: 0 0 33.33%;">
                                                                                    <img class="img-size"
                                                                                        style="width: 100%; object-fit: cover; height: 100%;"
                                                                                        src="{{ $images[$i + 1] }}"
                                                                                        alt="Banner Image">
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                @endfor
                                                            </div>
                                                        @else
        @endif
    @endif
    @if ($banner)
        @if ($banner['bannerType'] === 'Слайд-шоу Flex L white')
            @if (count($images) > 1)
                <div class="carousel-controls mx-auto h-100">
                    <button class="carousel-control-prev banner-contol" type="button"
                        data-bs-target="#carouselFiveBanner" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next banner-contol" type="button"
                        data-bs-target="#carouselFiveBanner" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                    <div class="d-none d-md-block">
                        <ol class="carousel-indicators" style="position: absolute; bottom: 100px;">
                            @foreach ($images as $key => $image)
                                <li style="list-style: none;" data-bs-target="#carouselFiveBanner"
                                    data-bs-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}">
                                </li>
                            @endforeach
                        </ol>
                    </div>
                </div>
            @endif
        @elseif ($banner['bannerType'] === 'Слайд-шоу Flex L black')
            @if (count($images) > 1)
                <div class="carousel-controls mx-auto h-100">
                    <button class="carousel-control-prev banner-contol" type="button"
                        data-bs-target="#carouselFiveBanner" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next banner-contol" type="button"
                        data-bs-target="#carouselFiveBanner" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                    <div class="d-none d-md-block">
                        <ol class="carousel-indicators" style="position: absolute; bottom: 100px;">
                            @foreach ($images as $key => $image)
                                <li style="list-style: none;" data-bs-target="#carouselFiveBanner"
                                    data-bs-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}">
                                </li>
                            @endforeach
                        </ol>
                    </div>
                </div>
            @endif
        @elseif ($banner['bannerType'] === 'Повідомлення Flex М white')
            @if (count($images) > 2)
                <div class="carousel-controls mx-auto h-100">
                    <button class="carousel-control-prev banner-contol" type="button"
                        data-bs-target="#carouselFiveBanner" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next banner-contol" type="button"
                        data-bs-target="#carouselFiveBanner" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                    <div class="d-none d-md-block">
                        <ol class="carousel-indicators" style="position: absolute; bottom: -10px;">
                            @for ($i = 0; $i < count($images) / 2; $i++)
                                <li style="list-style: none;" data-bs-target="#carouselFiveBanner"
                                    data-bs-slide-to="{{ $i }}" class="{{ $i == 0 ? 'active' : '' }}">
                                </li>
                            @endfor
                        </ol>
                    </div>
                </div>
            @endif
        @elseif ($banner['bannerType'] === 'Повідомлення Flex М black')
            @if (count($images) > 2)
                <div class="carousel-controls mx-auto h-100">
                    <button class="carousel-control-prev banner-contol" type="button"
                        data-bs-target="#carouselFiveBanner" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next banner-contol" type="button"
                        data-bs-target="#carouselFiveBanner" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                    <div class="d-none d-md-block">
                        <ol class="carousel-indicators" style="position: absolute; bottom: -10px;">
                            @for ($i = 0; $i < count($images) / 2; $i++)
                                <li style="list-style: none;" data-bs-target="#carouselFiveBanner"
                                    data-bs-slide-to="{{ $i }}" class="{{ $i == 0 ? 'active' : '' }}">
                                </li>
                            @endfor
                        </ol>
                    </div>
                </div>
            @endif
        @endif
    @else
    @endif
</div>
</div>
</div>
</div>
