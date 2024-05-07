@extends('layouts.main')
@section('editorship')
    <div class="container">
        <div class="mx-auto px-4 px-xl-0">
            <div class="border-bottom py-3 mb-3">
                <a href="{{ route('corporate_section.index') }}">
                    <img src="{{ asset('images/icons/backArrowCorp.svg') }}" class="me-1" style="padding-bottom: 2px;"
                        alt="Стрілка повернення до корпоративного розділу">Повернутися до корпоративного розділу
                </a>
            </div>
        </div>
        <div class="mb-3 border-bottom">
            <h1>
                Автори публікацій
            </h1>
            <p>
                Щоб створювати нашу фірмову журналістику та динамічні продукти, які
                відрізняються від інших, нам потрібні найкращі таланти у світі. В
                Дейком працюють журналісти, розробники, стратеги, відеооператори,
                маркетологи, арт-директори та багато інших. Ми цінуємо
                співробітників на всіх етапах їхньої кар’єри, які привносять різні
                точки зору та досвід до Дейком.
            </p>
        </div>
        <div class="row">
            @foreach ($authors as $author)
                <div class="col-md-3 mb-4">
                    <div class="card border-0">
                        <img class="rounded mb-2" src="{{ $author['avatarUrl'] }}" alt="Фоторграфія {{ $author['nickName'] }}">
                        <h2>{{ $author['nickName'] }}</h2>
                        <p>{{ $author['descUser'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="corp-footer">
            <p>
                Інформація на цій сторінці опублікована 1 вересня 2022 року,
                оновлення опублікованої інформації відсутні. | <a href={{ route('corporate_section.index') }}
                    class="under">Корпоративний розділ</a> | <a href={{ route('news.line') }} class="under">Стрічка
                    новин</a> | <a href={{ route('news-today.index') }} class="under">Сьогоднішня газета</a>
            </p>
        </div>
    </div>
@endsection
