@props(['data'])

@php
    $war = $data['groupedSectionsData']['Війна Росії проти України'] ?? null;
    $lineNews = $data['data']['lineNews'] ?? null;
    $society = $data['groupedSectionsData']['Суспільство'] ?? null;
    $europe = $data['groupedSectionsData']['Європа'] ?? null;
    $china = $data['groupedSectionsData']['Китай'] ?? null;
    $usa = $data['groupedSectionsData']['Сполучені Штати'] ?? null;
    $technology = $data['groupedSectionsData']['Технології'] ?? null;
    $opinion = $data['groupedSectionsData']['Думка'] ?? null;
    $analytics = $data['groupedSectionsData']['Аналітика'] ?? null;

    $combinedEconomyAndFinance = array_merge(
        $data['groupedSectionsData']['Економіка'],
        $data['groupedSectionsData']['Фінанси'],
    );

    usort($combinedEconomyAndFinance, function ($a, $b) {
        $dateA = strtotime($a['published_at']);
        $dateB = strtotime($b['published_at']);

        return $dateB - $dateA;
    });
    $economy = $combinedEconomyAndFinance ?? null;
@endphp

<div class="container px-0">
    <x-war :war="$war" :lineNews="$lineNews" :society="$society" :europe="$europe" :china="$china" :usa="$usa"
        :economy="$economy" :technology="$technology" :opinion="$opinion" :analytics="$analytics" />
</div>
