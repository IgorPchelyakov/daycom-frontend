@extends('layouts.news_city')
@section('news_city')
    @php
        $newsUrl = 'https://sside.daycom.com.ua/api/news-post';
        $newsCh = curl_init();
        curl_setopt($newsCh, CURLOPT_URL, $newsUrl);
        curl_setopt($newsCh, CURLOPT_RETURNTRANSFER, 1);
        $newsResponse = curl_exec($newsCh);

        if ($newsResponse) {
            $newsData = json_decode($newsResponse, true);
            if ($newsData !== null) {
                $newsData;
            } else {
                echo 'Помилка при декодуванні данних';
            }
        } else {
            echo 'Помилка при отримані данних';
        }

        curl_close($newsCh);
    @endphp
    <div
        class="{{ $data['postType'] === 'Публікація Premium' ? 'content-preview__container' : '' }} {{ $data['postType'] === 'Публікація Premium black' || $data['postType'] === 'Публікація Premium white' ? 'content-preview-full__container' : '' }} mx-auto px-0">
        @if ($data['postType'] === 'Вільна публікація')
            <div class="content__container mx-auto pt-5" style="padding: 0 20px;">
                <h1 class="">{{ $data['title'] }}</h1>
                @if ($data['showDesc'] === true)
                    <h2 class="border-bottom mb-3 pb-3">{{ $data['desc'] }}</h2>
                @endif
            </div>
            @if ($data['imageSize'] === true)
                <div class="content__container mx-auto" style="padding: 0 20px;">
                    <img class="img-fluid w-100 pb-1 object-fit-cover" src="{{ $data['mainImage'] }}"
                        alt="{{ $data['mainImgDesc'] }}">
                    <figcaption style="padding: 0 20px;">{{ $data['mainImgDesc'] . ' - ' . $data['mainImgAuthor'] }}
                    </figcaption>
                </div>
            @else
                <div class="container px-0">
                    <img class="img-fluid w-100 object-fit-cover" src="{{ $data['mainImage'] }}"
                        alt="{{ $data['mainImgDesc'] }}">
                    <figcaption style="padding: 0 20px;">{{ $data['mainImgDesc'] . ' - ' . $data['mainImgAuthor'] }}
                    </figcaption>
                </div>
            @endif
        @elseif ($data['postType'] === 'Вільна публікація +')
            <div class="content__container-plus mx-auto pt-5">
                <h1 class="border-bottom mb-3 pb-3 px-xl-0 text-center smoothie title-block">{{ $data['title'] }}</h1>
            </div>

            @if ($data['imageSize'] === true)
                <div class="content__container mx-auto">
                    <img class="img-fluid w-100 pb-1 object-fit-cover" style="min-height: 400px;"
                        src="{{ $data['mainImage'] }}" alt="{{ $data['mainImgDesc'] }}">
                    <div class="title-block" style="padding: 0 20px;">
                        <figcaption>{{ $data['mainImgDesc'] . ' - ' . $data['mainImgAuthor'] }}</figcaption>
                    </div>
                </div>
            @else
                <div class="container px-0">
                    <img class="img-fluid w-100 object-fit-cover" style="min-height: 400px;" src="{{ $data['mainImage'] }}"
                        alt="{{ $data['mainImgDesc'] }}">
                    <div class="title-block" style="padding: 0 20px;">
                        <figcaption>{{ $data['mainImgDesc'] . ' - ' . $data['mainImgAuthor'] }}</figcaption>
                    </div>
                </div>
            @endif
        @elseif ($data['postType'] === 'Публікація Premium')
            <img class="img-fluid object-fit-cover" src="{{ $data['mainImage'] }}" alt="{{ $data['mainImgDesc'] }}">
            <figcaption class="title-block">{{ $data['mainImgDesc'] . ' - ' . $data['mainImgAuthor'] }}</figcaption>
            <div class="title-container title-block">
                <h1 class="">{{ $data['title'] }}</h1>
                @if ($data['showDesc'] === true)
                    <h2 class="">{{ $data['desc'] }}</h2>
                @endif
            </div>
        @elseif ($data['postType'] === 'Публікація Premium white')
            <div class="d-xl-flex border-bottom">
                <div
                    class="pb-4 pb-xl-0 pt-4 pt-xl-0 col-xl-6 d-flex flex-column text-center items-center justify-content-center align-items-center text-black">
                    <h1 class="" style="max-width: 760px; padding: 0 20px;">{{ $data['title'] }}</h1>
                    @if ($data['showDesc'] === true)
                        <h2 class="" style="max-width: 760px; padding: 0 20px;">{{ $data['desc'] }}</h2>
                    @endif
                </div>
                <div class="col-xl-6">
                    <img class="object-fit-cover h-100" src="{{ $data['mainImage'] }}" alt="{{ $data['mainImgDesc'] }}">
                </div>
            </div>
            <figcaption class="title-block text-end">{{ $data['mainImgDesc'] . ' - ' . $data['mainImgAuthor'] }}
            </figcaption>
        @elseif ($data['postType'] === 'Публікація Premium black')
            <div class="d-xl-flex border-bottom" style="border-color: white;">
                <div
                    class="pb-4 pb-xl-0 pt-4 pt-xl-0 col-xl-6 d-flex flex-column text-center items-center justify-content-center align-items-center text-white bg-black">
                    <h1 class="" style="max-width: 760px; padding: 0 20px;">{{ $data['title'] }}</h1>
                    @if ($data['showDesc'] === true)
                        <h2 class="" style="max-width: 760px; padding: 0 20px;">{{ $data['desc'] }}</h2>
                    @endif
                </div>
                <div class="col-xl-6">
                    <img class="object-fit-cover" src="{{ $data['mainImage'] }}" alt="{{ $data['mainImgDesc'] }}">
                </div>
            </div>
            <figcaption class="title-block text-end">{{ $data['mainImgDesc'] . ' - ' . $data['mainImgAuthor'] }}
            </figcaption>
        @endif
    </div>
    <div class="container px-0 mb-4">
        <div class="content__container mx-auto mt-4">
            <div class="content">
                <div class="border-top">
                    {!! $data['content'] !!}
                </div>
            </div>
            <div class="content">
                @if ($data['showAuthor'] == true)
                    <h4>{{ $userData['nickName'] }} {{ $data['showAuthorDesc'] ? ' - ' . $userData['descUser'] : '' }}
                    </h4>
                @endif
                @php
                    $updatedDate = \Carbon\Carbon::parse($data['updatedAt']);
                    $createdDate = \Carbon\Carbon::parse($data['createdAt']);
                @endphp
                <h4>
                    Цей матеріал опубліковано
                    {{ \Carbon\Carbon::parse($data['publishedAt'])->locale('uk')->isoFormat('D.MM.YYYY') }} року,
                    {{ $updatedDate->equalTo($createdDate) ? 'оновлення відсутні' : 'оновлення ' . $updatedDate->isoFormat('D.MM.YYYY') }},
                    розділ {{ $data['section'] }}, із заголовком: {{ $data['title'] }}. | <a class="under"
                        href="{{ route('news-today.index') }}">Сьогоднішня
                        газета</a> | <a class="under" href="{{ route('news.line') }}">Стрічка новин</a> | <a
                        class="under" href="#">Підпишіться</a>
                </h4>
            </div>
        </div>
    </div>
    @php
        function filterPosts($posts, $currentDate, $limit)
        {
            $filteredPosts = [];
            foreach ($posts as $post) {
                $postDate = new DateTime($post['publishedAt']);
                if ($postDate <= $currentDate && count($filteredPosts) < $limit) {
                    $filteredPosts[] = $post;
                }
            }
            return $filteredPosts;
        }

        $currentDate = new DateTime('now', new DateTimeZone('Europe/Kiev'));
        $currentDate->modify('+2 hour');

        $filteredWarPosts = filterPosts($newsData['warSectionPosts'], $currentDate, 3);
        $filteredEuropePosts = filterPosts($newsData['europePosts'], $currentDate, 3);
        $filteredSocietyPosts = filterPosts($newsData['societyPosts'], $currentDate, 3);
        $filteredFreeLinePosts = filterPosts($newsData['freeLinePosts'], $currentDate, 10);
    @endphp
    <div class="content-preview-mini__container mx-auto py-4" style="background-color: #2b2a2a; color: white;">
        <div class="container d-xl-flex px-xl-0" style="padding: 0 20px;">
            <div class="other-title border-r pe-xl-3">
                <p class="other-title">Війна Росії проти України</p>
                <div class="d-xl-flex gap-3 justify-content-between border-b pb-2 mb-2">
                    @foreach ($filteredWarPosts as $index => $post)
                        @if ($index < 3)
                            <article class="col">
                                <a href="{{ route('news.index', ['url' => $post['url']]) }}">
                                    <div>
                                        <img class="img-fluid w-100 h-100 object-fit-cover rounded mb-2"
                                            style="min-width: 100%;" src="{{ $post['mainImage'] }}"
                                            alt="{{ $post['mainImgDesc'] }}">
                                        <h2 class="other-title">{{ $post['title'] }}</h2>
                                    </div>
                                </a>
                            </article>
                        @endif
                    @endforeach
                </div>
                <p class="other-title">Європа</p>
                <div class="d-xl-flex gap-3 justify-content-between border-b pb-2 mb-2">
                    @foreach ($filteredEuropePosts as $index => $post)
                        @if ($index < 3)
                            <article class="col">
                                <a href="{{ route('news.index', ['url' => $post['url']]) }}">
                                    <div class="">
                                        <img class="img-fluid w-100 h-100 object-fit-cover rounded mb-2"
                                            src="{{ $post['mainImage'] }}" alt="{{ $post['mainImgDesc'] }}">
                                        <h2 class="other-title">{{ $post['title'] }}</h2>
                                    </div>
                                </a>
                            </article>
                        @endif
                    @endforeach
                </div>
                <p class="other-title">Суспільство</p>
                <div class="d-xl-flex gap-3 justify-content-between pb-2 mb-2">
                    @foreach ($filteredSocietyPosts as $index => $post)
                        @if ($index < 3)
                            <article class="col">
                                <a href="{{ route('news.index', ['url' => $post['url']]) }}">
                                    <div class="">
                                        <img class="img-fluid w-100 h-100 object-fit-cover rounded mb-2"
                                            src="{{ $post['mainImage'] }}" alt="{{ $post['mainImgDesc'] }}">
                                        <h2 class="other-title">{{ $post['title'] }}</h2>
                                    </div>
                                </a>
                            </article>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="px-xl-3 other-title">
                <div class="border-b pb-3 mb-3">
                    <a href="{{ route('news.line') }}" class="under">Стрічка новин</a>, останні публікацї
                </div>
                @foreach ($filteredFreeLinePosts as $index => $post)
                    @if ($index < 10)
                        <article class="mb-2 pb-2 mb-xl-3 pb-xl-3 {{ $index === 9 ? '' : ' border-b-other' }}">
                            <a href="{{ route('news.index', ['url' => $post['url']]) }}">
                                <div class="">
                                    <h2 class="other-title">{{ $post['title'] }}</h2>
                                </div>
                            </a>
                        </article>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection
