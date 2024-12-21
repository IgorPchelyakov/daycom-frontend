@props(['data'])

<div class="mx-auto text-xl-center" style="max-width: 800px;">
    @php
        $showArticle = $data ? \Carbon\Carbon::parse($data['publishedAt'])->diffInHours(now()) <= 24 : false;
    @endphp

    @if ($showArticle)
        <article class="">
            <a href="{{ route('homepage.index') . '/news/' . $data['url'] }}">
                <div class="">
                    <h2 class="main-title">{{ $data['title'] }}</h2>
                </div>
            </a>
        </article>
    @endif
</div>
