@props(['data'])
@php
    $hotNews = $data['data']['hotNews'][0] ?? null;
    $mainToday = $data['data']['mainToday'] ?? null;
    $topNews = $data['data']['topNews'] ?? null;
@endphp

<x-hot-news :data="$hotNews" />
<x-main-today :data="$mainToday" />
<x-top-news-carousel :data="$topNews" />
