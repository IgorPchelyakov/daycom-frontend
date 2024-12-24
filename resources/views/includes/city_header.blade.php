<header class="navbar px-2 py-0 container-fluid d-none d-xl-block"
    style="background-color: white; font-size: 14px; line-height: 16px;">
    <div class="container border-bottom p-0" style="height: 40px;">
        <div class="" style="font-weight: 300; width: 400px;">
            {{ \Carbon\Carbon::now()->locale('uk')->isoFormat($cityData['name'] . ', dddd, D MMMM YYYY') }}
        </div>
        <a class="navbar-brand mx-auto" href="{{ route('city.feed', ['city' => $cityData['name_link']]) }}">
            <img src="{{ asset('images/icons/logo.svg') }}" alt="Логотип">
        </a>
        <div class="d-flex gap-2" style="font-weight: 300;">
            <a href="{{ route('news-today.index') }}">Сьогоднішня газета</a>
            <a href="{{ route($cityData['news_line']) }}">Стрічка новин</a>
            <a href="{{ route('subscription.month') }}">Підписка</a>
        </div>
    </div>
</header>
<nav class="navbar sticky-top px-4 py-0 container-fluid nav-style">
    <img src="{{ asset('images/blacklogo.svg') }}" alt="Логотип" class="slide-in-logo">
    <div class="container p-0" style="height: 40px;">
        <button class="btn btn-sm ps-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar"
            aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="d-xl-none" href="{{ route('city.feed', ['city' => $cityData['name_link']]) }}"
            style="transform: translateX(-6px)">
            <img src="{{ asset('images/icons/logo.svg') }}" alt="Логотип">
        </a>
        <div class="d-none d-xl-block">
            <div class="d-flex gap-2 align-items-center">
                <a href="{{ route('vijna.index') }}">Війна Росії проти України</a>
                <a href="{{ route('usa.index') }}">США</a>
                <a href="{{ route('europe.index') }}">Європа</a>
                <a href="{{ route('china.index') }}">Китай</a>
                <a href="{{ route('suspilstvo.index') }}">Суспільство</a>
                <a href="{{ route('biznes.index') }}">Бізнес</a>
                <a href="{{ route('polityka.index') }}">Політика</a>
                <a href="{{ route('ekonomika.index') }}">Економіка</a>
                <a href="{{ route('analityka.index') }}">Аналітика</a>
                <a href="{{ route('technologies.index') }}">Технології</a>
                <a href="{{ route('nauka.index') }}">Наука</a>
                <a href="{{ route('kultura.index') }}">Культура</a>
                <div class="dropdown">
                    <button class="btn btn-sm dropdown-toggle" style="width: 100%;" type="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                    </button>
                    <ul class="dropdown-menu translate-middle-x">
                        <div class="d-flex justify-content-between">
                            <div class="tech-link">
                                <li><a class="dropdown-item" href="{{ route('ekolohiia.index') }}">Екологія</a></li>
                                <li><a class="dropdown-item" href="{{ route('finance.index') }}">Фінанси</a></li>
                                <li><a class="dropdown-item" href="{{ route('vlada.index') }}">Влада</a></li>
                                <li><a class="dropdown-item" href="{{ route('sport.index') }}">Спорт</a></li>
                                <li><a class="dropdown-item" href="{{ route('history.index') }}">Історія</a></li>
                                <li><a class="dropdown-item" href="{{ route('pryhody.index') }}">Пригоди</a></li>
                                <li><a class="dropdown-item" href="{{ route('musick.index') }}">Музика</a></li>
                                <li><a class="dropdown-item" href="{{ route('fashion.index') }}">Мода</a></li>
                                <li><a class="dropdown-item" href="{{ route('kino.index') }}">Кіно</a></li>
                                <li><a class="dropdown-item" href="{{ route('interviu.index') }}">Інтерв’ю</a></li>
                                <li><a class="dropdown-item" href="{{ route('dumky.index') }}">Думка</a></li>
                                <li><a class="dropdown-item" href="{{ route('auto.index') }}">Автомобілі</a></li>
                                <li><a class="dropdown-item" href="{{ route('ihry.index') }}">Ігри</a></li>
                                <li><a class="dropdown-item" href="{{ route('education.index') }}">Освіта</a></li>
                                <li><a class="dropdown-item" href="{{ route('kulinariia.index') }}">Кулінарія</a></li>
                                <li><a class="dropdown-item" href="{{ route('health.index') }}">Здоров’я</a></li>
                                <li><a class="dropdown-item" href="{{ route('parenting.index') }}">Виховання дітей</a>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('real-estate.index') }}">Нерухомість</a>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('traveling.index') }}">Подорожі</a></li>
                            </div>
                            <div class="tech-link">
                                <li><a class="dropdown-item" href="{{ route('svitovi-novyny.index') }}">Світові
                                        новини</a></li>
                                <li><a class="dropdown-item" href="{{ route('north-america.index') }}">Північна
                                        Америка</a></li>
                                <li><a class="dropdown-item" href="{{ route('south-america.index') }}">Південна
                                        Америка</a></li>
                                <li><a class="dropdown-item" href="{{ route('middle-east.index') }}">Близький
                                        схід</a>
                                </li>
                                <li><a class="dropdown-item"
                                        href="{{ route('pacific-region.index') }}">Тихоокеанський
                                        регіон</a></li>
                                <li><a class="dropdown-item" href="{{ route('africa.index') }}">Африка</a></li>
                                <li><a class="dropdown-item" href="{{ route('pres-reliz.index') }}">Прес-релізи</a>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('ofitsijno.index') }}">Офіційні
                                        повідомлення</a></li>
                                <li><a class="dropdown-item" href="{{ route('novyny-biznesu.index') }}">Новини
                                        бізнесу</a></li>
                                <li><a class="dropdown-item" href="{{ route('politychni-novyny.index') }}">Політичні
                                        новини</a></li>
                            </div>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
        <div class="">
            <img src="{{ asset('images/icons/user.svg') }}" alt="Іконка входу в кабінет">
        </div>
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasDarkNavbar"
            aria-labelledby="offcanvasDarkNavbarLabel" style="min-height: 100vh;">
            <div class="offcanvas-header border-bottom">
                <img src="{{ asset('images/icons/logoWB.svg') }}" alt="Логотип">
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body text-center">
                <a class="btn btn-sm d-flex fw-bold mb-3" style="width: 100%;" href="{{ route('homepage.index') }}"
                    role="button">Домашня
                    сторінка</a>
                <div class="endless-search__burger mx-auto mb-3 w-100">
                    <form action="/search" method="GET">
                        <input type="text" name="query" placeholder="Що Вас цікавить?">
                        <button type="submit">Пошук</button>
                    </form>
                </div>
                <p class="d-inline-flex gap-1" style="width: 100%;">
                    <a class="btn btn-light border" style="min-width: 100%;" data-bs-toggle="collapse"
                        href="#collapseExample" role="button" aria-expanded="false"
                        aria-controls="collapseExample">
                        Обрати місто
                    </a>
                </p>
                <div class="collapse mb-3" id="collapseExample">
                    <div class="card card-body">
                        <div class="dropdown">
                            <button class="btn btn-light btn-sm dropdown-toggle" style="width: 100%;" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Вінницька область
                            </button>
                            <ul class="dropdown-menu drop-cat" style="width: 100%">
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'vinnytsa']) }}">Вінниця</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'zhmerynka']) }}">Жмеринка</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'mohyliv-podilskyi']) }}">Могилів-Подільський</a>
                                </li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'hmilnyk']) }}">Хмільник</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'gaysin']) }}">Гайсин</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'kozyatyn']) }}">Козятин</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'ladyzhin']) }}">Ладижин</a></li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-light btn-sm dropdown-toggle" style="width: 100%;" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Волинська область
                            </button>
                            <ul class="dropdown-menu drop-cat" style="width: 100%">
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'kovel']) }}">Ковель</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'lutsk']) }}">Луцьк</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'novovolynsk']) }}">Нововолинськ</a>
                                </li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'volodymyr-volynskiy']) }}">Володимир-Волинський</a>
                                </li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-light btn-sm dropdown-toggle" style="width: 100%;" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Житомирська область
                            </button>
                            <ul class="dropdown-menu drop-cat" style="width: 100%">
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'berdychiv']) }}">Бердичів</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'korosten']) }}">Коростень</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'korostyshiv']) }}">Коростишів</a>
                                </li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'malyn']) }}">Малин</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'novohrad-volynskiy']) }}">Новоград-Волинський</a>
                                </li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'zhytomyr']) }}">Житомир</a></li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-light btn-sm dropdown-toggle" style="width: 100%;" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Закарпатська область
                            </button>
                            <ul class="dropdown-menu drop-cat" style="width: 100%">
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'beregove']) }}">Берегове</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'hust']) }}">Хуст</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'mukachevo']) }}">Мукачево</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'uzhhorod']) }}">Ужгород</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'vinohradiv']) }}">Виноградів</a>
                                </li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-light btn-sm dropdown-toggle" style="width: 100%;" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Запорізька область
                            </button>
                            <ul class="dropdown-menu drop-cat" style="width: 100%">
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'berdyansk']) }}">Бердянськ</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'dniprorudne']) }}">Дніпрорудне</a>
                                </li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'energodar']) }}">Енергодар</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'melitopol']) }}">Мелітополь</a>
                                </li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'pology']) }}">Пологи</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'tokmak']) }}">Токмак</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'zaporizhzhia']) }}">Запоріжжя</a>
                                </li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-light btn-sm dropdown-toggle" style="width: 100%;" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Івано-Франківська область
                            </button>
                            <ul class="dropdown-menu drop-cat" style="width: 100%">
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'dolyna']) }}">Долина</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'ivano-frankivsk']) }}">Івано-Франківськ</a>
                                </li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'kalush']) }}">Калуш</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'kolomya']) }}">Коломия</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'nadvirna']) }}">Надвірна</a></li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-light btn-sm dropdown-toggle" style="width: 100%;" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Кіровоградська область
                            </button>
                            <ul class="dropdown-menu drop-cat" style="width: 100%">
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'kropyvnytskiy']) }}">Кропивницький</a>
                                </li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'olexandriya']) }}">Олександрія</a>
                                </li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'svitlovodsk']) }}">Світловодськ</a>
                                </li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'znamyanka']) }}">Знам'янка</a></li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-light btn-sm dropdown-toggle" style="width: 100%;" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Львівська область
                            </button>
                            <ul class="dropdown-menu drop-cat" style="width: 100%">
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'boryslav']) }}">Борислав</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'brody']) }}">Броди</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'chervonograd']) }}">Червоноград</a>
                                </li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'drohobych']) }}">Дрогобич</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'lviv']) }}">Львів</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'novoyavorivsk']) }}">Новояворівськ</a>
                                </li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'noviy-rozdil']) }}">Новий
                                        Розділ</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'sambir']) }}">Самбір</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'sokal']) }}">Сокаль</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'stebnyk']) }}">Стебник</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'striy']) }}">Стрий</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'truskavets']) }}">Трускавець</a>
                                </li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'zolochiv']) }}">Золочів</a></li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-light btn-sm dropdown-toggle" style="width: 100%;" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Миколаївська область
                            </button>
                            <ul class="dropdown-menu drop-cat" style="width: 100%">
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'mykolayiv']) }}">Миколаїв</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'pervomaisk']) }}">Первомайськ</a>
                                </li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'voznesensk']) }}">Вознесенськ</a>
                                </li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'yuzhnoukrainsk']) }}">Южноукраїнськ</a>
                                </li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-light btn-sm dropdown-toggle" style="width: 100%;" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Полтавська область
                            </button>
                            <ul class="dropdown-menu drop-cat" style="width: 100%">
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'hadiach']) }}">Гадяч</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'horishni-plavni']) }}">Горішні
                                        Плавні</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'kremenchuk']) }}">Кременчук</a>
                                </li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'lubny']) }}">Лубни</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'myrhorod']) }}">Миргород</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'poltava']) }}">Полтава</a></li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-light btn-sm dropdown-toggle" style="width: 100%;" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Рівненська область
                            </button>
                            <ul class="dropdown-menu drop-cat" style="width: 100%">
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'dubno']) }}">Дубно</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'kostopil']) }}">Костопіль</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'rivne']) }}">Рівне</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'sarny']) }}">Сарни</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'varash']) }}">Вараш</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'zdolbuniv']) }}">Здолбунів</a>
                                </li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-light btn-sm dropdown-toggle" style="width: 100%;" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Сумська область
                            </button>
                            <ul class="dropdown-menu drop-cat" style="width: 100%">
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'gluhiv']) }}">Глухів</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'konotop']) }}">Конотоп</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'krolevets']) }}">Кролевець</a>
                                </li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'lebedyn']) }}">Лебедин</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'ohtyrka']) }}">Охтирка</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'romny']) }}">Ромни</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'shostka']) }}">Шостка</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'sumy']) }}">Суми</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'trostyanets']) }}">Тростянець</a>
                                </li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-light btn-sm dropdown-toggle" style="width: 100%;" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Тернопільська область
                            </button>
                            <ul class="dropdown-menu drop-cat" style="width: 100%">
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'chortkiv']) }}">Чортків</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'kremenets']) }}">Кременець</a>
                                </li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'ternopil']) }}">Тернопіль</a></li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-light btn-sm dropdown-toggle" style="width: 100%;" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Херсонська область
                            </button>
                            <ul class="dropdown-menu drop-cat" style="width: 100%">
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'henichesk']) }}">Генічеськ</a>
                                </li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'kahovka']) }}">Каховка</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'kherson']) }}">Херсон</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'nova-kakhovka']) }}">Нова
                                        Каховка</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'oleshki']) }}">Олешки</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'skadovsk']) }}">Скадовськ</a></li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-light btn-sm dropdown-toggle" style="width: 100%;" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Хмельницька область
                            </button>
                            <ul class="dropdown-menu drop-cat" style="width: 100%">
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'hmelnytskiy']) }}">Хмельницький</a>
                                </li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'kamyanets-podilsky']) }}">Кам'янець-Подільський</a>
                                </li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'krasyliv']) }}">Красилів</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'netishin']) }}">Нетішин</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'polonne']) }}">Полонне</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'shepetivka']) }}">Шепетівка</a>
                                </li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'slavuta']) }}">Славута</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'starokostyntynivka']) }}">Старокостянтинівка</a>
                                </li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'volochysk']) }}">Волочиськ</a>
                                </li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-light btn-sm dropdown-toggle" style="width: 100%;" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Дніпропетровська область
                            </button>
                            <ul class="dropdown-menu drop-cat" style="width: 100%">
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'dnipro']) }}">Дніпро</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'kryvyi-rih']) }}">Кривий Ріг</a>
                                </li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'kamianske']) }}">Кам'янське</a>
                                </li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'nikopol']) }}">Нікополь</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'pavlograd']) }}">Павлоград</a>
                                </li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'novomoskovsk']) }}">Новомосковськ</a>
                                </li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'zhovti-vody']) }}">Жовті Води</a>
                                </li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'marganets']) }}">Марганець</a>
                                </li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'pokrov']) }}">Покров</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'sinelnikovo']) }}">Синельникове</a>
                                </li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'ternivka']) }}">Тернівка</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'pershotravensk']) }}">Першотравенськ</a>
                                </li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'vilnohorsk']) }}">Вільногірськ</a>
                                </li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'pyatihatky']) }}">П'ятихатки</a>
                                </li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-light btn-sm dropdown-toggle" style="width: 100%;" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Київська область
                            </button>
                            <ul class="dropdown-menu drop-cat" style="width: 100%">
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'kyiv']) }}">Київ</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'berezan']) }}">Березань</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'bilacerkva']) }}">Біла Церква</a>
                                </li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'boryspil']) }}">Бориспіль</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'boyarka']) }}">Боярка</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'brovary']) }}">Бровари</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'bucha']) }}">Буча</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'fastiv']) }}">Фастів</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'irpin']) }}">Ірпінь</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'obukhiv']) }}">Обухів</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'pereyaslav']) }}">Переяслав</a>
                                </li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'skvyra']) }}">Сквира</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'slavutych']) }}">Славутич</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'vasylkiv']) }}">Васильків</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'vyshhorod']) }}">Вишгород</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'vyshneve']) }}">Вишневе</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'yagotyn']) }}">Яготин</a></li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-light btn-sm dropdown-toggle" style="width: 100%;" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Одеська область
                            </button>
                            <ul class="dropdown-menu drop-cat" style="width: 100%">
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'odesa']) }}">Одеса</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'izmail']) }}">Ізмаїл</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'chornomorsk']) }}">Чорноморськ</a>
                                </li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'bilgorod']) }}">Білгород-Дністровський</a>
                                </li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'podilsk']) }}">Подільськ</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'teplodar']) }}">Теплодар</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'youzhne']) }}">Южне</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'kiliya']) }}">Кілія</a></li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-light btn-sm dropdown-toggle" style="width: 100%;" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Харківська область
                            </button>
                            <ul class="dropdown-menu drop-cat" style="width: 100%">
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'balaklia']) }}">Балаклія</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'chuguyiv']) }}">Чугуїв</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'dergachi']) }}">Дергачі</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'harkiv']) }}">Харків</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'izum']) }}">Ізюм</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'krasnograd']) }}">Красноград</a>
                                </li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'kupyansk']) }}">Куп'янськ</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'lozova']) }}">Лозова</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'lubotin']) }}">Люботин</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'merefa']) }}">Мерефа</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'pervomayskiy']) }}">Первомайський</a>
                                </li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'vovchansk']) }}">Вовчанськ</a>
                                </li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-light btn-sm dropdown-toggle" style="width: 100%;" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Черкаська область
                            </button>
                            <ul class="dropdown-menu drop-cat" style="width: 100%">
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'cherkasy']) }}">Черкаси</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'kaniv']) }}">Канів</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'smila']) }}">Сміла</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'uman']) }}">Умань</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'vatutine']) }}">Ватутіне</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'zolotonosha']) }}">Золотоноша</a>
                                </li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'zvenyhorodka']) }}">Звенигородка</a>
                                </li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-light btn-sm dropdown-toggle" style="width: 100%;" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Чернігівська область
                            </button>
                            <ul class="dropdown-menu drop-cat" style="width: 100%">
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'bahmach']) }}">Бахмач</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'chernihiv']) }}">Чернігів</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'nizhin']) }}">Ніжин</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'pryluki']) }}">Прилуки</a></li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-light btn-sm dropdown-toggle" style="width: 100%;" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Чернівецька область
                            </button>
                            <ul class="dropdown-menu drop-cat" style="width: 100%">
                                <li><a class="dropdown-item"
                                        href="{{ route('city.feed', ['city' => 'chernivtsi']) }}">Чернівці</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="pb-3 mb-3 border-bottom">
                    <div class="dropdown">
                        <button
                            class="btn btn-light btn-sm dropdown-toggle d-flex justify-content-between align-items-center"
                            style="width: 100%;" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Новини
                        </button>
                        <ul class="dropdown-menu" style="width: 100%">
                            <li><a class="dropdown-item" href="{{ route('svitovi-novyny.index') }}">Світові
                                    новини</a></li>
                            <li><a class="dropdown-item" href="{{ route('usa.index') }}">Сполучені Штати</a></li>
                            <li><a class="dropdown-item" href="{{ route('europe.index') }}">Європа</a></li>
                            <li><a class="dropdown-item" href="{{ route('china.index') }}">Китай</a></li>
                            <li><a class="dropdown-item" href="{{ route('north-america.index') }}">Північна
                                    Америка</a></li>
                            <li><a class="dropdown-item" href="{{ route('south-america.index') }}">Південна
                                    Америка</a></li>
                            <li><a class="dropdown-item" href="{{ route('middle-east.index') }}">Близький схід</a>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('pacific-region.index') }}">Тихоокеанський
                                    регіон</a></li>
                            <li><a class="dropdown-item" href="{{ route('africa.index') }}">Африка</a></li>
                            <li><a class="dropdown-item" href="{{ route('nauka.index') }}">Наука</a></li>
                            <li><a class="dropdown-item" href="{{ route('technologies.index') }}">Технології</a>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('ekolohiia.index') }}">Екологія</a></li>
                            <li><a class="dropdown-item" href="{{ route('ekonomika.index') }}">Економіка</a></li>
                            <li><a class="dropdown-item" href="{{ route('finance.index') }}">Фінанси</a></li>
                        </ul>
                    </div>
                    <div class="dropdown">
                        <button
                            class="btn btn-light btn-sm dropdown-toggle d-flex justify-content-between align-items-center"
                            style="width: 100%;" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Суспільство
                        </button>
                        <ul class="dropdown-menu" style="width: 100%">
                            <li><a class="dropdown-item" href="{{ route('vijna.index') }}">Війна Росії проти
                                    України</a></li>
                            <li><a class="dropdown-item" href="{{ route('suspilstvo.index') }}">Суспільство</a></li>
                            <li><a class="dropdown-item" href="{{ route('vlada.index') }}">Влада</a></li>
                            <li><a class="dropdown-item" href="{{ route('polityka.index') }}">Політика</a></li>
                            <li><a class="dropdown-item" href="{{ route('biznes.index') }}">Бізнес</a></li>
                            <li><a class="dropdown-item" href="{{ route('sport.index') }}">Спорт</a></li>
                            <li><a class="dropdown-item" href="{{ route('history.index') }}">Історія</a></li>
                            <li><a class="dropdown-item" href="{{ route('pryhody.index') }}">Пригоди</a></li>
                            <li><a class="dropdown-item" href="{{ route('musick.index') }}">Музика</a></li>
                            <li><a class="dropdown-item" href="{{ route('fashion.index') }}">Мода</a></li>
                            <li><a class="dropdown-item" href="{{ route('kino.index') }}">Кіно</a></li>
                            <li><a class="dropdown-item" href="{{ route('interviu.index') }}">Інтерв’ю</a></li>
                        </ul>
                    </div>
                    <div class="dropdown">
                        <button
                            class="btn btn-light btn-sm dropdown-toggle d-flex justify-content-between align-items-center"
                            style="width: 100%;" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Думка
                        </button>
                        <ul class="dropdown-menu" style="width: 100%">
                            <li><a class="dropdown-item" href="{{ route('dumky.index') }}">Думка</a></li>
                            <li><a class="dropdown-item" href="{{ route('analityka.index') }}">Аналітика</a></li>
                        </ul>
                    </div>
                    <div class="dropdown">
                        <button
                            class="btn btn-light btn-sm dropdown-toggle d-flex justify-content-between align-items-center"
                            style="width: 100%;" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Спосіб життя
                        </button>
                        <ul class="dropdown-menu" style="width: 100%">
                            <li><a class="dropdown-item" href="{{ route('auto.index') }}">Автомобілі</a></li>
                            <li><a class="dropdown-item" href="{{ route('ihry.index') }}">Ігри</a></li>
                            <li><a class="dropdown-item" href="{{ route('education.index') }}">Освіта</a></li>
                            <li><a class="dropdown-item" href="{{ route('kultura.index') }}">Культура</a></li>
                            <li><a class="dropdown-item" href="{{ route('kulinariia.index') }}">Кулінарія</a></li>
                            <li><a class="dropdown-item" href="{{ route('health.index') }}">Здоров’я</a></li>
                            <li><a class="dropdown-item" href="{{ route('parenting.index') }}">Виховання дітей</a>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('real-estate.index') }}">Нерухомість</a>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('traveling.index') }}">Подорожі</a></li>
                        </ul>
                    </div>
                    <div class="dropdown">
                        <button
                            class="btn btn-light btn-sm dropdown-toggle d-flex justify-content-between align-items-center"
                            style="width: 100%;" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Більше новин
                        </button>
                        <ul class="dropdown-menu" style="width: 100%">
                            <li><a class="dropdown-item" href="{{ route('pres-reliz.index') }}">Прес-релізи</a></li>
                            <li><a class="dropdown-item" href="{{ route('ofitsijno.index') }}">Офіційні
                                    повідомлення</a></li>
                            <li><a class="dropdown-item" href="{{ route('novyny-biznesu.index') }}">Новини
                                    бізнесу</a></li>
                            <li><a class="dropdown-item" href="{{ route('politychni-novyny.index') }}">Політичні
                                    новини</a></li>
                        </ul>
                    </div>
                    <a class="btn btn-light btn-sm d-flex" style="width: 100%;" href="{{ route('news.line') }}"
                        role="button">Стрічка новин</a>
                    <a class="btn btn-light btn-sm d-flex" style="width: 100%;"
                        href="{{ route('news-today.index') }}" role="button">Сьогоднішня газета</a>
                </div>
                <div class="">
                    <a class="btn btn-light btn-sm d-flex" style="width: 100%;"
                        href="{{ route('corporate_section.index') }}" role="button">Корпоративний розділ</a>
                    <a class="btn btn-light btn-sm d-flex" style="width: 100%;"
                        href="{{ route('editorial_politics.index') }}" role="button">Редакційна політика</a>
                    <a class="btn btn-light btn-sm d-flex" style="width: 100%;"
                        href="{{ route('privacy_politics.index') }}" role="button">Політика конфіденційності</a>
                    <a class="btn btn-light btn-sm d-flex" style="width: 100%;"
                        href="{{ route('cookie_politics.index') }}" role="button">Політика щодо файлів cookie</a>
                    <a class="btn btn-light btn-sm d-flex" style="width: 100%;"
                        href="{{ route('advertising.index') }}" role="button">Розміщення реклами</a>
                    <a class="btn btn-light btn-sm d-flex" style="width: 100%;" href="{{ route('service.index') }}"
                        role="button">Умови обслуговування</a>
                    <a class="btn btn-light btn-sm d-flex" style="width: 100%;" href="#"
                        role="button">Зв’яжіться з нами</a>
                </div>
            </div>
        </div>
    </div>
</nav>
