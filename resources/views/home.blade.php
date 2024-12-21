@extends('layouts.main')
@section('homepage')
    <x-banners.banner-block1 :data="$data" />
    <x-home-block1 :data="$data" />
    <x-banners.banner-block2 :data="$data" />
    <x-home-block2 :data="$data" />
    <x-banners.banner-block3 :data="$data" />
    <x-home-block3 :data="$data" />
    <x-banners.banner-block4 :data="$data" />
    <x-home-block4 :data="$data" />
    <x-banners.banner-block5 :data="$data" />
    <x-home-block5 :data="$data" />
@endsection
