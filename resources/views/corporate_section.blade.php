@extends('layouts.main')
@section('corporate_section')
    <div class="corporation-container">
        <div class="parallax-bg">
        </div>

        <div class="corp-content mx-auto">
            <div class="main-title__cont pb-3 border-bottom mb-3">
                <div class="corp-main-title mx-auto">
                    Знайомтесь із Дейком читайте нашу політику та іншу інформацію від нас
                </div>
            </div>
            <div class="corp-arrow-cont mx-auto">
                <div class="corp-arrow">
                    <img src="{{ asset('images/icons/corpArrowDown.svg') }}" alt="">
                </div>
            </div>
            <div class="info-card-cont mx-auto mb-5" style="margin-top: 150px;">
                <div class="info-card-inner d-flex justify-content-between gap-4 border-bottom pb-4">
                    <div class="info-card border">
                        <div class="info-statistic">210</div>
                        <div class="info-title">Міст України в яких ми працюємо</div>
                    </div>
                    <div class="info-card border">
                        <div class="info-statistic">100 +</div>
                        <div class="info-title">Країн, в яких нас читають сьогодні</div>
                    </div>
                    <div class="info-card border">
                        <div class="info-statistic">2021</div>
                        <div class="info-title">Рік заснування Дейком</div>
                    </div>
                </div>
            </div>
            <div class="company-block-cont mx-auto mb-5">
                <div class="company-title">
                    Компанія
                </div>
                <div class="company-card-inner">
                    <div class="company-raw d-xl-flex justify-content-xl-between gap-4">
                        <div class="company-card">
                            <div class="company-card-title">Компанія</div>
                            <a href="{{ route('about_us.index') }}" class="company-card-link"><img
                                    src="{{ asset('images/icons/corpLinkArrow.svg') }}"
                                    alt="Стрілка переходу до розділу">Детальніше</a>
                        </div>
                        <div class="company-card">
                            <div class="company-card-title">Покриття в Україні</div>
                            <a href="{{ route('maps_ua.index') }}" class="company-card-link"><img
                                    src="{{ asset('images/icons/corpLinkArrow.svg') }}"
                                    alt="Стрілка переходу до розділу">Детальніше</a>

                        </div>
                        <div class="company-card">
                            <div class="company-card-title">Розміщення реклами</div>
                            <a href="{{ route('advertising.index') }}" class="company-card-link"><img
                                    src="{{ asset('images/icons/corpLinkArrow.svg') }}"
                                    alt="Стрілка переходу до розділу">Детальніше</a>
                        </div>
                    </div>
                    <div class="company-raw d-xl-flex d-flex justify-content-between gap-4">
                        <div class="company-card">
                            <div class="company-card-title">Угоди та партнерство</div>
                            <a href="{{ route('partnership.index') }}" class="company-card-link"><img
                                    src="{{ asset('images/icons/corpLinkArrow.svg') }}"
                                    alt="Стрілка переходу до розділу">Детальніше</a>
                        </div>
                        <div class="company-card">
                            <div class="company-card-title">Працюйте з нами</div>
                            <a href="{{ route('work_with_us.index') }}" class="company-card-link"><img
                                    src="{{ asset('images/icons/corpLinkArrow.svg') }}"
                                    alt="Стрілка переходу до розділу">Детальніше</a>
                        </div>
                        <div class="company-card">
                            <div class="company-card-title">Автори публікацій</div>
                            <a href="{{ route('editorship.index') }}" class="company-card-link"><img
                                    src="{{ asset('images/icons/corpLinkArrow.svg') }}"
                                    alt="Стрілка переходу до розділу">Детальніше</a>
                        </div>
                    </div>
                    <div class="company-raw d-xl-flex justify-content-between">
                        <div class="company-card">
                            <div class="company-card-title">Підписка</div>
                            <a href="{{ route('subscription.index') }}" class="company-card-link"><img
                                    src="{{ asset('images/icons/corpLinkArrow.svg') }}"
                                    alt="Стрілка переходу до розділу">Детальніше</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="company-block-cont mx-auto mb-5">
                <div class="company-title">
                    Наша політика
                </div>
                <div class="company-card-inner">
                    <div class="company-raw d-xl-flex justify-content-between gap-4">
                        <div class="company-card">
                            <div class="company-card-title">Політика конфіденційності</div>
                            <a href="{{ route('privacy_politics.index') }}" class="company-card-link"><img
                                    src="{{ asset('images/icons/corpLinkArrow.svg') }}"
                                    alt="Стрілка переходу до розділу">Детальніше</a>
                        </div>
                        <div class="company-card">
                            <div class="company-card-title">Редакційна політика</div>
                            <a href="{{ route('editorial_politics.index') }}" class="company-card-link"><img
                                    src="{{ asset('images/icons/corpLinkArrow.svg') }}"
                                    alt="Стрілка переходу до розділу">Детальніше</a>

                        </div>
                        <div class="company-card">
                            <div class="company-card-title">Політика щодо файлів cookie</div>
                            <a href="{{ route('cookie_politics.index') }}" class="company-card-link"><img
                                    src="{{ asset('images/icons/corpLinkArrow.svg') }}"
                                    alt="Стрілка переходу до розділу">Детальніше</a>
                        </div>
                    </div>
                    <div class="company-raw d-xl-flex" style="gap: 45px;">
                        <div class="company-card">
                            <div class="company-card-title">Соціальна відповідальність</div>
                            <a href="{{ route('social_responsability.index') }}" class="company-card-link"><img
                                    src="{{ asset('images/icons/corpLinkArrow.svg') }}"
                                    alt="Стрілка переходу до розділу">Детальніше</a>
                        </div>
                        <div class="company-card">
                            <div class="company-card-title">Журналістика</div>
                            <a href="{{ route('journalist.index') }}" class="company-card-link"><img
                                    src="{{ asset('images/icons/corpLinkArrow.svg') }}"
                                    alt="Стрілка переходу до розділу">Детальніше</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="company-block-cont mx-auto mb-5">
                <div class="company-title">
                    Юриична інформація
                </div>
                <div class="company-card-inner">
                    <div class="company-raw d-xl-flex justify-content-between" style="gap: 30px;">
                        <div class="company-card">
                            <div class="company-card-title">Умови обслуговування</div>
                            <a href="{{ route('service.index') }}" class="company-card-link"><img
                                    src="{{ asset('images/icons/corpLinkArrow.svg') }}"
                                    alt="Стрілка переходу до розділу">Детальніше</a>
                        </div>
                        <div class="company-card">
                            <div class="company-card-title">Використання вмісту</div>
                            <a href="{{ route('content.index') }}" class="company-card-link"><img
                                    src="{{ asset('images/icons/corpLinkArrow.svg') }}"
                                    alt="Стрілка переходу до розділу">Детальніше</a>

                        </div>
                        <div class="company-card">
                            <div class="company-card-title">Умови продажу</div>
                            <a href="{{ route('terms_of_sale.index') }}" class="company-card-link"><img
                                    src="{{ asset('images/icons/corpLinkArrow.svg') }}"
                                    alt="Стрілка переходу до розділу">Детальніше</a>
                        </div>
                    </div>
                    <div class="company-raw d-xl-flex" style="gap: 45px;">
                        <div class="company-card">
                            <div class="company-card-title">Розділ коментарів</div>
                            <a href="{{ route('comments_section.index') }}" class="company-card-link"><img
                                    src="{{ asset('images/icons/corpLinkArrow.svg') }}"
                                    alt="Стрілка переходу до розділу">Детальніше</a>
                        </div>
                        <div class="company-card">
                            <div class="company-card-title">Умови подання для читачів</div>
                            <a href="{{ route('presentation_for_readers.index') }}" class="company-card-link"><img
                                    src="{{ asset('images/icons/corpLinkArrow.svg') }}"
                                    alt="Стрілка переходу до розділу">Детальніше</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="corp-copy-cont">
                <div class="corp-copy mx-auto py-2">
                    Будь-яка інформація, яка опублікована у корпоративному розділі Дейком, підрозділах: “Компанія”, “Наша
                    політика” або “Юридична інформація” може змінюватися, редагуватися або доповнюватися будь-коли. Після
                    зміни
                    чи оновлення опублікованої інформації ми обов’язково інформуємо користувачів інтернет-ресурсу шляхом
                    маркування статусу матеріалу. Таке маркування знаходиться наприкінці кожного тексту, і обов’язково
                    містить
                    дату публікації та дату оновлення, якщо такі є.
                </div>
            </div>
        </div>
    </div>
@endsection
