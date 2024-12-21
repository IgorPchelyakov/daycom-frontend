@props(['data'])

@php
    $politics = $data['data']['politicsGovernment'] ?? null;
    $americas = $data['data']['americas'] ?? null;
    $middleEast = $data['data']['middleEast'] ?? null;
    $pacific = $data['data']['pacific'] ?? null;
    $africa = $data['data']['africa'] ?? null;
@endphp

<div class="container px-0">
    <x-cards :politics="$politics" :americas="$americas" :middleEast="$middleEast" :pacific="$pacific" :africa="$africa" />
</div>
