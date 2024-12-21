@props(['data'])

@php
    $war = $data['data']['warRussianVsUkraine'] ?? null;
    $lineNews = $data['data']['lineNews'] ?? null;
    $society = $data['data']['society'] ?? null;
    $europe = $data['data']['europe'] ?? null;
    $china = $data['data']['china'] ?? null;
    $usa = $data['data']['usa'] ?? null;
    $economy = $data['data']['economyFinance'] ?? null;
    $technology = $data['data']['technology'] ?? null;
    $opinion = $data['data']['opinion'] ?? null;
    $analytics = $data['data']['analytics'] ?? null;
@endphp

<div class="container px-0">
    <x-war :war="$war" :lineNews="$lineNews" :society="$society" :europe="$europe" :china="$china" :usa="$usa"
        :economy="$economy" :technology="$technology" :opinion="$opinion" :analytics="$analytics" />
</div>
