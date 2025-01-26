@props(['data'])

@php
    $lineNews = $data['data']['lineNews'] ?? null;
    $science = $data['groupedSectionsData']['Наука'] ?? null;
@endphp

<div class="container px-0">
    <x-science :lineNews="$lineNews" :science="$science" />
</div>
