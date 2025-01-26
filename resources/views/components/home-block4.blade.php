@props(['data'])

@php
    $combinedCultureMusicCinema = array_merge(
        $data['groupedSectionsData']['Культура'],
        $data['groupedSectionsData']['Музика'],
        $data['groupedSectionsData']['Кіно'],
    );

    usort($combinedCultureMusicCinema, function ($a, $b) {
        $dateA = strtotime($a['published_at']);
        $dateB = strtotime($b['published_at']);

        return $dateB - $dateA;
    });
    $culture = $combinedCultureMusicCinema ?? null;
    $lineNews = $data['data']['lineNews'] ?? null;
    $sports = $data['groupedSectionsData']['Спорт'] ?? null;
@endphp

<div class="container px-0">
    <x-culture :culture="$culture" :lineNews="$lineNews" :sports="$sports" />
</div>
