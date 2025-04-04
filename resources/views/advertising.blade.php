@extends('layouts.main')
@section('advertising')
    <div class="corp-container container">
        <div class="mx-auto px-4 px-xl-0">
            <div class="border-bottom py-3 mb-3">
                <a href="{{ route('corporate_section.index') }}">
                    <img src="{{ asset('images/icons/backArrowCorp.svg') }}" class="me-1" style="padding-bottom: 2px;"
                        alt="Стрілка повернення до корпоративного розділу">Повернутися до корпоративного розділу
                </a>
            </div>
        </div>
        <div class="mb-3 border-bottom">
            <h1>Розміщення реклами</h1>
            <p>
                Місце призначення для неперевершеного висвітлення найважливіших
                історій нашого часу, які викликають пристрасті читачів, якими б вони
                не були. Просуває бренди завдяки найкращому рекламному досвіду у
                світі.
            </p>
        </div>
        <div>
            <h2>Всі новини, які можна надрукувати</h2>
            <p>
                Наша газета є нашим найбільш знаковим продуктом. Завдяки
                неймовірному охопленню та довготривалому впливу, Дейком - це те
                місце, де бренди залишають свій слід.
            </p>
            <p>
                Коли бренди хочуть сказати щось важливе, вони звертаються до Дейком.
                Від реклами на всю сторінку до унікальних багатосторінкових виробів
                на замовлення, обкладинок, вкладок тощо - друковані видання надають
                широкий спектр рекламних можливостей.
            </p>
            <p>
                Щодня Дейком публікує сотні журналістських матеріалів на різні теми
                - від клімату до гендеру, від мистецтва до журналістських
                розслідувань, багато з яких готуються місяцями.
            </p>
            <p>
                Отримайте доступ до найвпливовіших журналістських матеріалів та
                розмов нашого часу.
            </p>
            <h2>Наші зобов’язання щодо сторітейоінгу</h2>
            <p>
                Сторітелінг - один із найефективніших способів побудови емпатії.
            </p>
            <p>
                Оскільки публікація статтей допомагає брендам впливати на світ, ми
                залишаємося відданими визнанню та усуненню нерівності в нашому
                процесі та створенні контенту.
            </p>
            <p>
                Наш головний обов'язок - вдумливо та з повагою відображати світ
                через глибоке розуміння потреб аудиторії та створювати переконливі
                та репрезентативні історії.
            </p>
            <p>
                Ми знаємо, що створення найкращих брендових історій у світі вимагає
                розуміння важливості різноманітності та інклюзії як нерозривно
                пов'язаних елементів нашого сторітелінгу.
            </p>
            <h2>Ми пропонуємо розміщувати рекламу у двох форматах:</h2>
            <ul>
                <li>
                    <p>
                        Регіональне розміщеннярозміщення матеріалів у одному місті чи
                        декільках містах та/або областей одного або декількох регіонів
                        за ваших потреб у розміщенні на певній території.
                    </p>
                </li>
                <li>
                    <p>
                        Загальнонаціональне розміщеннярозміщення матеріалів, яке
                        покриває всю мережу у 210 міст України із аудиторією майже у 25
                        мільйонів.
                    </p>
                </li>
            </ul>
            <h2>Ми пропонуємо розміщувати рекламу у чотирьох типах:</h2>
            <ul>
                <li>
                    <p>Друковані новини - розміщення друкованих привабливих ісотрій;</p>
                </li>
                <li>
                    <p>Оголошення - банери на сторінках сайту;</p>
                </li>
                <li>
                    <p>
                        Daycom Flex - це наш власний набір нативних рекламних форматів,
                        унікальний для інтернет-ресурсу, розроблений для того, щоб бути
                        красивим, привабливим і, перш за все, ефективним;
                    </p>
                </li>
                <li>
                    <p>
                        Спеціальний вміст - унікальні нативні рекламні продукти надають
                        перевагу і дозволяють нашим творчим командам створювати найбільш
                        продуманий та інноваційний контент в індустрії;.
                    </p>
                </li>
            </ul>
            <p>
                Для великих мережевих чи корпоративних брендів у Дейком передбачені
                індивідуальні корпоративні рішення із максимальною ефективністю.
            </p>
            <p>
                Для отримання довідкової інформації звертайтесь на електронну пошту:
                info@daycom.com.ua
            </p>
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
