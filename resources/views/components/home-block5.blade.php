@props(['data'])

@php
    $combinedPoliticsGovernment = array_merge(
        $data['groupedSectionsData']['Політика'],
        $data['groupedSectionsData']['Влада'],
    );

    usort($combinedPoliticsGovernment, function ($a, $b) {
        $dateA = strtotime($a['published_at']);
        $dateB = strtotime($b['published_at']);

        return $dateB - $dateA;
    });

    $combinedNorthSouthAmerica = array_merge(
        $data['groupedSectionsData']['Північна Америка'],
        $data['groupedSectionsData']['Південна Америка'],
    );

    usort($combinedNorthSouthAmerica, function ($a, $b) {
        $dateA = strtotime($a['published_at']);
        $dateB = strtotime($b['published_at']);

        return $dateB - $dateA;
    });
    $politics = array_slice($combinedPoliticsGovernment, 0, 5) ?? null;
    $americas = array_slice($combinedNorthSouthAmerica, 0, 5) ?? null;
    $middleEast = array_slice($data['groupedSectionsData']['Близький схід'], 0, 5) ?? null;
    $pacific = array_slice($data['groupedSectionsData']['Тихоокеанський регіон'], 0, 5) ?? null;
    $africa = array_slice($data['groupedSectionsData']['Африка'], 0, 5) ?? null;
@endphp

<div class="container px-0">
    <x-cards :politics="$politics" :americas="$americas" :middleEast="$middleEast" :pacific="$pacific" :africa="$africa" />
</div>
