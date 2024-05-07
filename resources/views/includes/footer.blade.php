<footer class="container mx-auto py-3 px-3 px-xl-0">
    <div class="pb-4 d-xl-flex border-top border-black pt-3">
        <div class="col-10 border-r pe-3">
            <div class="d-xl-flex gap-xl-4 items-center border-b pb-3">
                <div class="mb-3 mb-xl-0">
                    <img src="{{ asset('images/icons/logoWB.svg') }}" alt="Логотип">
                </div>
                <div class="mb-2 mb-xl-0">
                    <a href="{{ route('news.line') }}">Стрічка новин</a>
                </div>
                <div class="mb-2 mb-xl-0">
                    <a href="{{ route('news-today.index') }}">Сьогоднішня газета</a>
                </div>
                <div class="mb-2 mb-xl-0">
                    <a href="{{ route('homepage.index') }}">Перейти на домашню сторінку »</a>
                </div>
            </div>
            <div class="d-none d-xl-flex gap-3 pt-3 justify-content-between footer-link">
                <div class="d-flex flex-column footer-link">
                    <h3>Новини</h3>
                    <a href="{{ route('svitovi-novyny.index') }}" class="">Світові новини</a>
                    <a href="{{ route('usa.index') }}">Сполучені Штати</a>
                    <a href="{{ route('europe.index') }}">Європа</a>
                    <a href="{{ route('china.index') }}">Китай</a>
                    <a href="{{ route('north-america.index') }}">Північна Америка</a>
                    <a href="{{ route('south-america.index') }}">Південна Америка</a>
                    <a href="{{ route('middle-east.index') }}">Близький схід</a>
                    <a href="{{ route('pacific-region.index') }}">Тихоокеанський регіон</a>
                    <a href="{{ route('africa.index') }}">Африка</a>
                    <a href="{{ route('nauka.index') }}">Наука</a>
                    <a href="{{ route('technologies.index') }}">Технології</a>
                    <a href="{{ route('ekolohiia.index') }}">Екологія</a>
                    <a href="{{ route('ekonomika.index') }}">Економіка</a>
                    <a href="{{ route('finance.index') }}">Фінанси</a>
                </div>
                <div class="d-flex flex-column">
                    <h3>Суспільсво</h3>
                    <a href="{{ route('vijna.index') }}">Війна Росії проти України</a>
                    <a href="{{ route('suspilstvo.index') }}">Суспільство</a>
                    <a href="{{ route('vlada.index') }}">Влада</a>
                    <a href="{{ route('polityka.index') }}">Політика</a>
                    <a href="{{ route('biznes.index') }}">Бізнес</a>
                    <a href="{{ route('sport.index') }}">Спорт</a>
                    <a href="{{ route('history.index') }}">Історія</a>
                    <a href="{{ route('pryhody.index') }}">Пригоди</a>
                    <a href="{{ route('musick.index') }}">Музика</a>
                    <a href="{{ route('fashion.index') }}">Мода</a>
                    <a href="{{ route('kino.index') }}">Кіно</a>
                    <a href="{{ route('interviu.index') }}">Інтерв’ю</a>
                </div>
                <div class="d-flex flex-column">
                    <h3>Думка</h3>
                    <a href="{{ route('dumky.index') }}">Думка</a>
                    <a href="{{ route('analityka.index') }}">Аналітика</a>
                </div>
                <div class="d-flex flex-column">
                    <h3>Спосіб життя</h3>
                    <a href="{{ route('auto.index') }}">Автомобілі</a>
                    <a href="{{ route('ihry.index') }}">Ігри</a>
                    <a href="{{ route('education.index') }}">Освіта</a>
                    <a href="{{ route('kultura.index') }}">Культура</a>
                    <a href="{{ route('kulinariia.index') }}">Кулінарія</a>
                    <a href="{{ route('health.index') }}">Здоров’я</a>
                    <a href="{{ route('parenting.index') }}">Виховання дітей</a>
                    <a href="{{ route('real-estate.index') }}">Нерухомість</a>
                    <a href="{{ route('traveling.index') }}">Подорожі</a>
                </div>
                <div class="d-flex flex-column">
                    <h3>Більше</h3>
                    <a href="{{ route('pres-reliz.index') }}">Прес-релізи</a>
                    <a href="{{ route('ofitsijno.index') }}">Офіційні повідомлення</a>
                    <a href="{{ route('novyny-biznesu.index') }}">Новини бізнесу</a>
                    <a href="{{ route('politychni-novyny.index') }}">Політичні новини</a>
                </div>
            </div>
        </div>
        <div class="col-xl-2 ps-xl-3">
            <h3 class="pt-xl-1">Підписка</h3>
            <div class="dis border-b mb-2">
                <div class="pb-2">Інформаційна розсилка</div>
                <div class="">Цифрова підписка 2$</div>
            </div>
            <div class="border-b mb-2">
                <a href="#" class="pb-2">Покриття в Україні</a>
                <div class="dis">Обліковий запис</div>
            </div>
            <div class="dis"><span style="font-weight: 500">Мова:</span> UA</div>
            <div class="mb-3 pb-3 mini-container">
                <div class="dis">Соціальні мережі</div>
                <div class="d-flex gap-4 gap-xl-0 justify-content-xl-between">
                    <a href="https://t.me/daycomua" target="_blank">
                        <img src="{{ asset('images/icons/telegram.svg') }}" alt="Іконка телеграму">
                    </a>
                    <a href="https://invite.viber.com/?g2=AQAtlYpcKiouB07uDqixJWqL79MZICun%2BCk41tPSYbaplXRIGAVZyPzu8Rzp2oYt"
                        target="_blank">
                        <img src="{{ asset('images/icons/viber.svg') }}" alt="Іконка вайберу">
                    </a>
                    <a href="https://www.facebook.com/daycom.ua" target="_blank">
                        <img src="{{ asset('images/icons/facebook.svg') }}" alt="Іконка фейсбуку">
                    </a>
                    <a href="https://instagram.com/daycom.ua" target="_blank">
                        <img src="{{ asset('images/icons/instagram.svg') }}" alt="Іконка інстаграму">
                    </a>
                    <a href="https://twitter.com/daycom_ua" target="_blank">
                        <img src="{{ asset('images/icons/twitter.svg') }}" alt="Іконка твітеру">
                    </a>
                </div>
            </div>
            <div class="d-flex gap-4 gap-xl-0 justify-content-xl-between mini-container">
                <img src="{{ asset('/images/icons/logo_liqpay.svg') }}" alt="Іконка лікпей">
                <img src="{{ asset('images/icons/Visa.svg') }}" alt="Іконка віза">
                <img src="{{ asset('images/icons/mastercard.svg') }}" alt="Іконка мастеркард">
            </div>
        </div>
    </div>
    <div class="d-none d-xl-flex mx-auto justify-content-center p-3 border-top gap-3 tech-link">
        <a href="{{ route('service.index') }}">Умови обслуговування</a>
        <a href="{{ route('editorial_politics.index') }}">Редакційна політика</a>
        <a href="{{ route('privacy_politics.index') }}">Політика конфіденційності</a>
        <a href="{{ route('cookie_politics.index') }}">Політика щодо файлів cookie</a>
        <a href="{{ route('work_with_us.index') }}">Працюйте з нами</a>
        <a href="{{ route('advertising.index') }}">Розміщення реклами</a>
        <a href="{{ route('corporate_section.index') }}">Корпоративний розділ</a>
    </div>
    <div class="copyright text-center px-0 pt-3 border-top">
        <p>Дозволяється цитування матеріалів опублікованих на веб-сайті без
            отримання попередньої згоди головної редакції за умови розміщення у
            тексті обов'язкового посилання на daycom.com.ua. Для інтернет-видань
            обов'язково розміщення прямого, відкритого для пошукових систем
            гіперпосилання на статті та/або інший опублікований маетріал, що
            цитуються. Обов’язкова умова розміщення відкритого для пошукових
            систем гіперпосилання не нижче другого абзацу в тексті або як
            джерело. Порушення авторських та виняткових прав переслідується
            згідно із законодавством України.
        </p>
        <p>
            Матеріали, опубліковані у розділах: «Новини бізнесу», «Політичні
            новини», «Прес-реліз», «Офіційні повідомлення», - публікуються на
            правах реклами.
        </p>
        <p style="font-size: 12px; line-height: 14px;">
            Copyright © daycom.com.ua Всі права захищено.
        </p>
        <div class="">
            <img src="{{ asset('images/icons/WaterMark.svg') }}" alt="Водяний знак">
        </div>
    </div>
</footer>
