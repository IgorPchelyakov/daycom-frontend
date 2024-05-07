<header class="navbar px-2 py-0 container-fluid d-none d-xl-block"
    style="background-color: white; font-size: 14px; line-height: 16px;">
    <div class="container border-bottom p-0" style="height: 40px;">
        <div class="" style="font-weight: 300; width: 400px;">
            {{ \Carbon\Carbon::now()->locale('uk')->isoFormat('Україна, dddd, D MMMM YYYY') }}
        </div>
        <a class="navbar-brand mx-auto" href="{{ route('homepage.index') }}">
            <img src="{{ asset('images/icons/logo.svg') }}" alt="Логотип">
        </a>
        <div class="d-flex gap-2">
            <a href="{{ route('news-today.index') }}">Сьогоднішня газета</a>
            <a href="{{ route('news.line') }}">Стрічка новин</a>
            <a href="#">Підписка</a>
        </div>
    </div>
</header>
<nav class="navbar sticky-top px-4 py-0 container-fluid nav-style">
    <div class="container nav-cont" style="height: 40px;">
        <button class="btn btn-sm ps-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar"
            aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="d-xl-none" href="{{ route('homepage.index') }}" style="transform: translateX(-6px)">
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
                            <div class="drop-cat">
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
                            <div class="drop-cat">
                                <li><a class="dropdown-item" href="{{ route('svitovi-novyny.index') }}">Світові
                                        новини</a></li>
                                <li><a class="dropdown-item" href="{{ route('north-america.index') }}">Північна
                                        Америка</a></li>
                                <li><a class="dropdown-item" href="{{ route('south-america.index') }}">Південна
                                        Америка</a></li>
                                <li><a class="dropdown-item" href="{{ route('middle-east.index') }}">Близький схід</a>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('pacific-region.index') }}">Тихоокеанський
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
                                <li><a class="dropdown-item" href="{{ route('vinnytsa.index') }}">Вінниця</a></li>
                                <li><a class="dropdown-item" href="{{ route('zhmerynka.index') }}">Жмеринка</a></li>
                                <li><a class="dropdown-item" href="{{ route('mohyliv-podilskyi.index') }}">Могилів-Подільський</a></li>
                                <li><a class="dropdown-item" href="{{ route('hmilnyk.index') }}">Хмільник</a></li>
                                <li><a class="dropdown-item" href="{{ route('gaysin.index') }}">Гайсин</a></li>
                                <li><a class="dropdown-item" href="{{ route('kozyatyn.index') }}">Козятин</a></li>
                                <li><a class="dropdown-item" href="{{ route('ladyzhin.index') }}">Ладижин</a></li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-light btn-sm dropdown-toggle" style="width: 100%;" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Волинська область
                            </button>
                            <ul class="dropdown-menu drop-cat" style="width: 100%">
                                <li><a class="dropdown-item" href="{{ route('kovel.index') }}">Ковель</a></li>
                                <li><a class="dropdown-item" href="{{ route('lutsk.index') }}">Луцьк</a></li>
                                <li><a class="dropdown-item" href="{{ route('novovolynsk.index') }}">Нововолинськ</a></li>
                                <li><a class="dropdown-item" href="{{ route('volodymyr-volynskiy.index') }}">Володимир-Волинський</a></li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-light btn-sm dropdown-toggle" style="width: 100%;" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Житомирська область
                            </button>
                            <ul class="dropdown-menu drop-cat" style="width: 100%">
                                <li><a class="dropdown-item" href="{{ route('berdychiv.index') }}">Бердичів</a></li>
                                <li><a class="dropdown-item" href="{{ route('korosten.index') }}">Коростень</a></li>
                                <li><a class="dropdown-item" href="{{ route('korostyshiv.index') }}">Коростишів</a></li>
                                <li><a class="dropdown-item" href="{{ route('malyn.index') }}">Малин</a></li>
                                <li><a class="dropdown-item" href="{{ route('novohrad-volynskiy.index') }}">Новоград-Волинський</a></li>
                                <li><a class="dropdown-item" href="{{ route('zhytomyr.index') }}">Житомир</a></li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-light btn-sm dropdown-toggle" style="width: 100%;" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Закарпатська область
                            </button>
                            <ul class="dropdown-menu drop-cat" style="width: 100%">
                                <li><a class="dropdown-item" href="{{ route('beregove.index') }}">Берегове</a></li>
                                <li><a class="dropdown-item" href="{{ route('hust.index') }}">Хуст</a></li>
                                <li><a class="dropdown-item" href="{{ route('mukachevo.index') }}">Мукачево</a></li>
                                <li><a class="dropdown-item" href="{{ route('uzhhorod.index') }}">Ужгород</a></li>
                                <li><a class="dropdown-item" href="{{ route('vinohradiv.index') }}">Виноградів</a></li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-light btn-sm dropdown-toggle" style="width: 100%;" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Запорізька область
                            </button>
                            <ul class="dropdown-menu drop-cat" style="width: 100%">
                                <li><a class="dropdown-item" href="{{ route('berdyansk.index') }}">Бердянськ</a></li>
                                <li><a class="dropdown-item" href="{{ route('dniprorudne.index') }}">Дніпрорудне</a></li>
                                <li><a class="dropdown-item" href="{{ route('energodar.index') }}">Енергодар</a></li>
                                <li><a class="dropdown-item" href="{{ route('melitopol.index') }}">Мелітополь</a></li>
                                <li><a class="dropdown-item" href="{{ route('pology.index') }}">Пологи</a></li>
                                <li><a class="dropdown-item" href="{{ route('tokmak.index') }}">Токмак</a></li>
                                <li><a class="dropdown-item" href="{{ route('zaporizhzhia.index') }}">Запоріжжя</a></li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-light btn-sm dropdown-toggle" style="width: 100%;" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Івано-Франківська область
                            </button>
                            <ul class="dropdown-menu drop-cat" style="width: 100%">
                                <li><a class="dropdown-item" href="{{ route('dolyna.index') }}">Долина</a></li>
                                <li><a class="dropdown-item" href="{{ route('ivano-frankivsk.index') }}">Івано-Франківськ</a></li>
                                <li><a class="dropdown-item" href="{{ route('kalush.index') }}">Калуш</a></li>
                                <li><a class="dropdown-item" href="{{ route('kolomya.index') }}">Коломия</a></li>
                                <li><a class="dropdown-item" href="{{ route('nadvirna.index') }}">Надвірна</a></li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-light btn-sm dropdown-toggle" style="width: 100%;" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Кіровоградська область
                            </button>
                            <ul class="dropdown-menu drop-cat" style="width: 100%">
                                <li><a class="dropdown-item" href="{{ route('kropyvnytskiy.index') }}">Кропивницький</a></li>
                                <li><a class="dropdown-item" href="{{ route('olexandriya.index') }}">Олександрія</a></li>
                                <li><a class="dropdown-item" href="{{ route('svitlovodsk.index') }}">Світловодськ</a></li>
                                <li><a class="dropdown-item" href="{{ route('znamyanka.index') }}">Знам'янка</a></li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-light btn-sm dropdown-toggle" style="width: 100%;" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Львівська область
                            </button>
                            <ul class="dropdown-menu drop-cat" style="width: 100%">
                                <li><a class="dropdown-item" href="{{ route('boryslav.index') }}">Борислав</a></li>
                                <li><a class="dropdown-item" href="{{ route('brody.index') }}">Броди</a></li>
                                <li><a class="dropdown-item" href="{{ route('chervonograd.index') }}">Червоноград</a></li>
                                <li><a class="dropdown-item" href="{{ route('drohobych.index') }}">Дрогобич</a></li>
                                <li><a class="dropdown-item" href="{{ route('lviv.index') }}">Львів</a></li>
                                <li><a class="dropdown-item" href="{{ route('novoyavorivsk.index') }}">Новояворівськ</a></li>
                                <li><a class="dropdown-item" href="{{ route('noviy-rozdil.index') }}">Новий Розділ</a></li>
                                <li><a class="dropdown-item" href="{{ route('sambir.index') }}">Самбір</a></li>
                                <li><a class="dropdown-item" href="{{ route('sokal.index') }}">Сокаль</a></li>
                                <li><a class="dropdown-item" href="{{ route('stebnyk.index') }}">Стебник</a></li>
                                <li><a class="dropdown-item" href="{{ route('striy.index') }}">Стрий</a></li>
                                <li><a class="dropdown-item" href="{{ route('truskavets.index') }}">Трускавець</a></li>
                                <li><a class="dropdown-item" href="{{ route('zolochiv.index') }}">Золочів</a></li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-light btn-sm dropdown-toggle" style="width: 100%;" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Миколаївська область
                            </button>
                            <ul class="dropdown-menu drop-cat" style="width: 100%">
                                <li><a class="dropdown-item" href="{{ route('mykolayiv.index') }}">Миколаїв</a></li>
                                <li><a class="dropdown-item" href="{{ route('pervomaisk.index') }}">Первомайськ</a></li>
                                <li><a class="dropdown-item" href="{{ route('voznesensk.index') }}">Вознесенськ</a></li>
                                <li><a class="dropdown-item" href="{{ route('yuzhnoukrainsk.index') }}">Южноукраїнськ</a></li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-light btn-sm dropdown-toggle" style="width: 100%;" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Полтавська область
                            </button>
                            <ul class="dropdown-menu drop-cat" style="width: 100%">
                                <li><a class="dropdown-item" href="{{ route('hadiach.index') }}">Гадяч</a></li>
                                <li><a class="dropdown-item" href="{{ route('horishni-plavni.index') }}">Горішні Плавні</a></li>
                                <li><a class="dropdown-item" href="{{ route('kremenchuk.index') }}">Кременчук</a></li>
                                <li><a class="dropdown-item" href="{{ route('lubny.index') }}">Лубни</a></li>
                                <li><a class="dropdown-item" href="{{ route('myrhorod.index') }}">Миргород</a></li>
                                <li><a class="dropdown-item" href="{{ route('poltava.index') }}">Полтава</a></li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-light btn-sm dropdown-toggle" style="width: 100%;" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Рівненська область
                            </button>
                            <ul class="dropdown-menu drop-cat" style="width: 100%">
                                <li><a class="dropdown-item" href="{{ route('dubno.index') }}">Дубно</a></li>
                                <li><a class="dropdown-item" href="{{ route('kostopil.index') }}">Костопіль</a></li>
                                <li><a class="dropdown-item" href="{{ route('rivne.index') }}">Рівне</a></li>
                                <li><a class="dropdown-item" href="{{ route('sarny.index') }}">Сарни</a></li>
                                <li><a class="dropdown-item" href="{{ route('varash.index') }}">Вараш</a></li>
                                <li><a class="dropdown-item" href="{{ route('zdolbuniv.index') }}">Здолбунів</a></li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-light btn-sm dropdown-toggle" style="width: 100%;" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Сумська область
                            </button>
                            <ul class="dropdown-menu drop-cat" style="width: 100%">
                                <li><a class="dropdown-item" href="{{ route('gluhiv.index') }}">Глухів</a></li>
                                <li><a class="dropdown-item" href="{{ route('konotop.index') }}">Конотоп</a></li>
                                <li><a class="dropdown-item" href="{{ route('krolevets.index') }}">Кролевець</a></li>
                                <li><a class="dropdown-item" href="{{ route('lebedyn.index') }}">Лебедин</a></li>
                                <li><a class="dropdown-item" href="{{ route('ohtyrka.index') }}">Охтирка</a></li>
                                <li><a class="dropdown-item" href="{{ route('romny.index') }}">Ромни</a></li>
                                <li><a class="dropdown-item" href="{{ route('shostka.index') }}">Шостка</a></li>
                                <li><a class="dropdown-item" href="{{ route('sumy.index') }}">Суми</a></li>
                                <li><a class="dropdown-item" href="{{ route('trostyanets.index') }}">Тростянець</a></li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-light btn-sm dropdown-toggle" style="width: 100%;" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Тернопільська область
                            </button>
                            <ul class="dropdown-menu drop-cat" style="width: 100%">
                                <li><a class="dropdown-item" href="{{ route('chortkiv.index') }}">Чортків</a></li>
                                <li><a class="dropdown-item" href="{{ route('kremenets.index') }}">Кременець</a></li>
                                <li><a class="dropdown-item" href="{{ route('ternopil.index') }}">Тернопіль</a></li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-light btn-sm dropdown-toggle" style="width: 100%;" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Херсонська область
                            </button>
                            <ul class="dropdown-menu drop-cat" style="width: 100%">
                                <li><a class="dropdown-item" href="{{ route('henichesk.index') }}">Генічеськ</a></li>
                                <li><a class="dropdown-item" href="{{ route('kahovka.index') }}">Каховка</a></li>
                                <li><a class="dropdown-item" href="{{ route('kherson.index') }}">Херсон</a></li>
                                <li><a class="dropdown-item" href="{{ route('nova-kakhovka.index') }}">Нова Каховка</a></li>
                                <li><a class="dropdown-item" href="{{ route('oleshki.index') }}">Олешки</a></li>
                                <li><a class="dropdown-item" href="{{ route('skadovsk.index') }}">Скадовськ</a></li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-light btn-sm dropdown-toggle" style="width: 100%;" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Хмельницька область
                            </button>
                            <ul class="dropdown-menu drop-cat" style="width: 100%">
                                <li><a class="dropdown-item" href="{{ route('hmelnytskiy.index') }}">Хмельницький</a></li>
                                <li><a class="dropdown-item" href="{{ route('kamyanets-podilsky.index') }}">Кам'янець-Подільський</a></li>
                                <li><a class="dropdown-item" href="{{ route('krasyliv.index') }}">Красилів</a></li>
                                <li><a class="dropdown-item" href="{{ route('netishin.index') }}">Нетішин</a></li>
                                <li><a class="dropdown-item" href="{{ route('polonne.index') }}">Полонне</a></li>
                                <li><a class="dropdown-item" href="{{ route('shepetivka.index') }}">Шепетівка</a></li>
                                <li><a class="dropdown-item" href="{{ route('slavuta.index') }}">Славута</a></li>
                                <li><a class="dropdown-item" href="{{ route('starokostyntynivka.index') }}">Старокостянтинівка</a></li>
                                <li><a class="dropdown-item" href="{{ route('volochysk.index') }}">Волочиськ</a></li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-light btn-sm dropdown-toggle" style="width: 100%;" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Дніпропетровська область
                            </button>
                            <ul class="dropdown-menu drop-cat" style="width: 100%">
                                <li><a class="dropdown-item" href="{{ route('dnipro.index') }}">Дніпро</a></li>
                                <li><a class="dropdown-item" href="{{ route('kryvyi-rih.index') }}">Кривий Ріг</a></li>
                                <li><a class="dropdown-item" href="{{ route('kamianske.index') }}">Кам'янське</a></li>
                                <li><a class="dropdown-item" href="{{ route('nikopol.index') }}">Нікополь</a></li>
                                <li><a class="dropdown-item" href="{{ route('pavlograd.index') }}">Павлоград</a></li>
                                <li><a class="dropdown-item" href="{{ route('novomoskovsk.index') }}">Новомосковськ</a></li>
                                <li><a class="dropdown-item" href="{{ route('zhovti-vody.index') }}">Жовті Води</a></li>
                                <li><a class="dropdown-item" href="{{ route('marganets.index') }}">Марганець</a></li>
                                <li><a class="dropdown-item" href="{{ route('pokrov.index') }}">Покров</a></li>
                                <li><a class="dropdown-item" href="{{ route('sinelnikovo.index') }}">Синельникове</a></li>
                                <li><a class="dropdown-item" href="{{ route('ternivka.index') }}">Тернівка</a></li>
                                <li><a class="dropdown-item" href="{{ route('pershotravensk.index') }}">Першотравенськ</a></li>
                                <li><a class="dropdown-item" href="{{ route('vilnohorsk.index') }}">Вільногірськ</a></li>
                                <li><a class="dropdown-item" href="{{ route('pyatihatky.index') }}">П'ятихатки</a></li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-light btn-sm dropdown-toggle" style="width: 100%;" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Київська область
                            </button>
                            <ul class="dropdown-menu drop-cat" style="width: 100%">
                                <li><a class="dropdown-item" href="{{ route('kyiv.index') }}">Київ</a></li>
                                <li><a class="dropdown-item" href="{{ route('berezan.index') }}">Березань</a></li>
                                <li><a class="dropdown-item" href="{{ route('bilacerkva.index') }}">Біла Церква</a></li>
                                <li><a class="dropdown-item" href="{{ route('boryspil.index') }}">Бориспіль</a></li>
                                <li><a class="dropdown-item" href="{{ route('boyarka.index') }}">Боярка</a></li>
                                <li><a class="dropdown-item" href="{{ route('brovary.index') }}">Бровари</a></li>
                                <li><a class="dropdown-item" href="{{ route('bucha.index') }}">Буча</a></li>
                                <li><a class="dropdown-item" href="{{ route('fastiv.index') }}">Фастів</a></li>
                                <li><a class="dropdown-item" href="{{ route('irpin.index') }}">Ірпінь</a></li>
                                <li><a class="dropdown-item" href="{{ route('obukhiv.index') }}">Обухів</a></li>
                                <li><a class="dropdown-item" href="{{ route('pereyaslav.index') }}">Переяслав</a></li>
                                <li><a class="dropdown-item" href="{{ route('skvyra.index') }}">Сквира</a></li>
                                <li><a class="dropdown-item" href="{{ route('slavutych.index') }}">Славутич</a></li>
                                <li><a class="dropdown-item" href="{{ route('vasylkiv.index') }}">Васильків</a></li>
                                <li><a class="dropdown-item" href="{{ route('vyshhorod.index') }}">Вишгород</a></li>
                                <li><a class="dropdown-item" href="{{ route('vyshneve.index') }}">Вишневе</a></li>
                                <li><a class="dropdown-item" href="{{ route('yagotyn.index') }}">Яготин</a></li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-light btn-sm dropdown-toggle" style="width: 100%;" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Одеська область
                            </button>
                            <ul class="dropdown-menu drop-cat" style="width: 100%">
                                <li><a class="dropdown-item" href="{{ route('odesa.index') }}">Одеса</a></li>
                                <li><a class="dropdown-item" href="{{ route('izmail.index') }}">Ізмаїл</a></li>
                                <li><a class="dropdown-item" href="{{ route('chornomorsk.index') }}">Чорноморськ</a>
                                </li>
                                <li><a class="dropdown-item"
                                        href="{{ route('bilgorod.index') }}">Білгород-Дністровський</a></li>
                                <li><a class="dropdown-item" href="{{ route('podilsk.index') }}">Подільськ</a></li>
                                <li><a class="dropdown-item" href="{{ route('teplodar.index') }}">Теплодар</a></li>
                                <li><a class="dropdown-item" href="{{ route('youzhne.index') }}">Южне</a></li>
                                <li><a class="dropdown-item" href="{{ route('kiliya.index') }}">Кілія</a></li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-light btn-sm dropdown-toggle" style="width: 100%;" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Харківська область
                            </button>
                            <ul class="dropdown-menu drop-cat" style="width: 100%">
                                <li><a class="dropdown-item" href="{{ route('balaklia.index') }}">Балаклія</a></li>
                                <li><a class="dropdown-item" href="{{ route('chuguyiv.index') }}">Чугуїв</a></li>
                                <li><a class="dropdown-item" href="{{ route('dergachi.index') }}">Дергачі</a></li>
                                <li><a class="dropdown-item" href="{{ route('harkiv.index') }}">Харків</a></li>
                                <li><a class="dropdown-item" href="{{ route('izum.index') }}">Ізюм</a></li>
                                <li><a class="dropdown-item" href="{{ route('krasnograd.index') }}">Красноград</a></li>
                                <li><a class="dropdown-item" href="{{ route('kupyansk.index') }}">Куп'янськ</a></li>
                                <li><a class="dropdown-item" href="{{ route('lozova.index') }}">Лозова</a></li>
                                <li><a class="dropdown-item" href="{{ route('lubotin.index') }}">Люботин</a></li>
                                <li><a class="dropdown-item" href="{{ route('merefa.index') }}">Мерефа</a></li>
                                <li><a class="dropdown-item" href="{{ route('pervomayskiy.index') }}">Первомайський</a></li>
                                <li><a class="dropdown-item" href="{{ route('vovchansk.index') }}">Вовчанськ</a></li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-light btn-sm dropdown-toggle" style="width: 100%;" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Черкаська область
                            </button>
                            <ul class="dropdown-menu drop-cat" style="width: 100%">
                                <li><a class="dropdown-item" href="{{ route('cherkasy.index') }}">Черкаси</a></li>
                                <li><a class="dropdown-item" href="{{ route('kaniv.index') }}">Канів</a></li>
                                <li><a class="dropdown-item" href="{{ route('smila.index') }}">Сміла</a></li>
                                <li><a class="dropdown-item" href="{{ route('uman.index') }}">Умань</a></li>
                                <li><a class="dropdown-item" href="{{ route('vatutine.index') }}">Ватутіне</a></li>
                                <li><a class="dropdown-item" href="{{ route('zolotonosha.index') }}">Золотоноша</a></li>
                                <li><a class="dropdown-item" href="{{ route('zvenyhorodka.index') }}">Звенигородка</a></li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-light btn-sm dropdown-toggle" style="width: 100%;" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Чернігівська область
                            </button>
                            <ul class="dropdown-menu drop-cat" style="width: 100%">
                                <li><a class="dropdown-item" href="{{ route('bahmach.index') }}">Бахмач</a></li>
                                <li><a class="dropdown-item" href="{{ route('chernihiv.index') }}">Чернігів</a></li>
                                <li><a class="dropdown-item" href="{{ route('nizhin.index') }}">Ніжин</a></li>
                                <li><a class="dropdown-item" href="{{ route('pryluki.index') }}">Прилуки</a></li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-light btn-sm dropdown-toggle" style="width: 100%;" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Чернівецька область
                            </button>
                            <ul class="dropdown-menu drop-cat" style="width: 100%">
                                <li><a class="dropdown-item" href="{{ route('chernivtsi.index') }}">Чернівці</a></li>
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
                        <ul class="dropdown-menu drop-cat" style="width: 100%">
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
                            <li><a class="dropdown-item" href="{{ route('technologies.index') }}">Технології</a></li>
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
                        <ul class="dropdown-menu drop-cat" style="width: 100%">
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
                        <ul class="dropdown-menu drop-cat" style="width: 100%">
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
                        <ul class="dropdown-menu drop-cat" style="width: 100%">
                            <li><a class="dropdown-item" href="{{ route('auto.index') }}">Автомобілі</a></li>
                            <li><a class="dropdown-item" href="{{ route('ihry.index') }}">Ігри</a></li>
                            <li><a class="dropdown-item" href="{{ route('education.index') }}">Освіта</a></li>
                            <li><a class="dropdown-item" href="{{ route('kultura.index') }}">Культура</a></li>
                            <li><a class="dropdown-item" href="{{ route('kulinariia.index') }}">Кулінарія</a></li>
                            <li><a class="dropdown-item" href="{{ route('health.index') }}">Здоров’я</a></li>
                            <li><a class="dropdown-item" href="{{ route('parenting.index') }}">Виховання дітей</a>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('real-estate.index') }}">Нерухомість</a></li>
                            <li><a class="dropdown-item" href="{{ route('traveling.index') }}">Подорожі</a></li>
                        </ul>
                    </div>
                    <div class="dropdown">
                        <button
                            class="btn btn-light btn-sm dropdown-toggle d-flex justify-content-between align-items-center"
                            style="width: 100%;" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Більше новин
                        </button>
                        <ul class="dropdown-menu drop-cat" style="width: 100%">
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
