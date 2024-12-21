@props(['data'])

@php
    $culture = $data['data']['cultureMusicCinema'] ?? null;
    $lineNews = $data['data']['lineNews'] ?? null;
    $sports = $data['data']['sports'] ?? null;
@endphp

<div class="container px-0">
    <x-culture :culture="$culture" :lineNews="$lineNews" :sports="$sports" />
</div>
