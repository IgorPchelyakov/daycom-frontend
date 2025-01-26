<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('page.title', 'Газета Дейком - головні новини України та світу')</title>
    <meta property="true" name="description"
        content="Новини в прямому ефірі, розслідування, думки, фотографії та відео журналістів Дейком з багатьох країн світу. Підпишіться на висвітлення України та міжнародних новин, політика, бізнес, технології, наука, здоров'я, мистецтво, спорт тощо.">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Газета Дейком - головні новини України та світу">
    <meta property="og:url" content="https://daycom.com.ua">
    <meta property="og:locale" content="ua">
    <meta property="og:title" content="Газета Дейком - головні новини України та світу">
    <meta property="og:description"
        content="Новини в прямому ефірі, розслідування, думки, фотографії та відео журналістів Дейком з багатьох країн світу. Підпишіться на висвітлення України та міжнародних новин, політика, бізнес, технології, наука, здоров'я, мистецтво, спорт тощо.">
    <meta name="keywords" content="Дэйком, Дейком, Дайком, Даком, новини">
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-F9XX812M9F"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-F9XX812M9F');
    </script>

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;700&family=Montserrat:wght@300;400;600&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .banner__container {
            max-width: 1920px;
        }

        .footer-link a {
            font-style: 14px;
            line-height: 17px;
            font-weight: 400;
        }

        footer h3 {
            font-size: 14px;
            line-height: 17px;
            font-weight: 500;
        }

        .container {
            max-width: 1200px;
            width: 100%;
            /* padding: 0 20px; */
        }

        h2 {
            font-size: 16px;
            line-height: 19px;
            font-weight: 400;
        }

        a {
            color: inherit;
            text-decoration: none;
            transition: color 0.3s;
            font-weight: 300;
        }

        a:hover {
            color: #1677ff;
        }

        p {
            font-size: 13px;
            line-height: 16px;
            color: #5a5a5a
        }

        .main-title {
            font-size: 32px;
            line-height: 39px;
            font-weight: 400;
            padding-bottom: 18px;
        }

        @media (max-width: 1200px) {

            h2 {
                font-size: 18px;
                line-height: 22px;
                font-weight: 400;
            }

            .bb-sm {
                border-bottom: 1px solid #ebebeb;
            }

            .main-td {
                padding: 0 20px;
            }

            .block-title {
                padding: 0 20px;
            }

            .xl-id {
                padding-right: 20px;
            }

            .img-min-400 {
                min-height: 400px;
            }

            .xl-mb-4-px-4 {
                margin-bottom: 20px;
                padding: 0 20px;
                border-bottom: 1px solid #ebebeb;
            }

            .xl-mb-2-pb-2 {
                margin-bottom: 12px;
                padding-bottom: 12px;
                border-bottom: 1px solid #ebebeb;
            }

            .main-fi {
                padding: 0 20px;
            }

            .xl-block-w {
                padding: 0 20px;
            }

            .pb-border {
                border-bottom: 1px solid #ebebeb;
                padding-bottom: 12px;
                margin-bottom: 12px;
            }

            .title-cont-sm-slide {
                min-height: 100px;
            }

            .img-sm-slide {
                max-height: 400px;
                min-width: 100%;
            }

            .fivecard-img {
                max-height: 450px;
            }

            .xl-w-biimg {
                max-height: 450px;
                min-height: 400px;
            }

            .max-img {
                max-height: 450px;
            }

            .img-cont {
                padding: 0 20px;
            }

            .fivecard-img {
                max-height: 145px;
                min-height: 145px;
            }

            .main-title {
                font-size: 27px;
                line-height: 32px;
                font-weight: 400;
                padding-bottom: 12px;
                padding-right: 20px;
                padding-left: 20px;
            }

            .line-news-title {
                padding-left: 20px;
            }
        }

        @media (min-width: 1200px) {
            .navbar-brand {
                transform: translateX(-42px);
            }

            .main-td {
                max-width: 289px;
            }

            .main-bi {
                max-width: 540px;
            }

            .main-fi {
                max-width: 345px;
            }

            .xl-border-end {
                border-right: 1px solid #ebebeb;
            }

            .xl-ps-3 {
                padding-left: 12px;
            }

            .xl-pe-3 {
                padding-right: 12px;
            }

            .xl-pe-4 {
                padding-right: 24px;
            }

            .xl-rounded {
                border-radius: 5px;
            }

            .block-container {
                min-height: 390px;
            }

            .img-rel {
                position: relative;
                min-height: 410px;
            }

            .img-abs {
                position: absolute;
                top: 0;
                right: 0;
                min-width: 480px;
                max-width: 480px;
            }

            .xl-w-bi {
                max-width: 288px;
            }

            .xl-w-biimg {
                max-height: 350px;
                min-height: 350px;
                min-width: 480px;
                max-width: 480px;
            }

            .xl-border-top {
                border-top: 1px solid #ebebeb;
            }

            .xl-w-warimg {
                max-width: 260px;
                max-height: 175px;
            }

            .xl-block-w {
                width: 290px;
            }

            .b-fig-w {
                width: 500px;
            }

            .img-cont-sm-slide {
                max-height: 200px;
                max-width: 280px;
            }

            .img-sm-slide {
                min-height: 200px;
                min-width: 100%;
            }

            .xl-border-start {
                border-left: 1px solid #ebebeb;
            }

            .fivecard-img {
                max-height: 145px;
                min-height: 145px;
            }

            .line-news-title {
                padding-left: 8px;
            }
        }

        .under {
            text-decoration: underline;
        }

        .copyright p {
            font-size: 10px;
            line-height: 12px;
            color: rgb(107, 114, 128);
        }

        .dis {
            color: rgb(107, 114, 128);
            font-size: 14px;
            line-height: 17px;
            padding-bottom: 12px;
        }

        .mini-container {
            max-width: 300px;
        }

        @media (min-width: 1200px) {
            .border-r {
                border-right: 1px solid #ebebeb;
            }

            .border-b {
                border-bottom: 1px solid #ebebeb;
            }
        }

        footer a {
            font-size: 14px;
            line-height: 17px;
            font-weight: 400;
        }

        footer h3 {
            font-size: 14px;
            line-height: 17px;
            font-weight: 500;
        }

        .tech-link a {
            font-size: 13px;
            line-height: 17px;
            font-weight: 400;
        }

        .drop-cat a {
            font-size: 14px;
            line-height: 17px;
            font-weight: 300;
        }

        .nav-style {
            background-color: white;
            background: rgba(255, 255, 255, 0.7);
            font-size: 14px;
            line-height: 16px;
            backdrop-filter: blur(30px);
            -webkit-backdrop-filter: blur(30px);
        }

        .nav-style.with-shadow {
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.05);
        }

        .nav-cont {
            padding: 0 20px;
        }

        .corp-container {
            max-width: 600px;
        }

        .corp-container h1 {
            font-size: 30px;
            line-height: 36px;
            font-weight: 300;
            margin-bottom: 20px;
        }

        .corp-container h2 {
            font-size: 16px;
            line-height: 19px;
            font-weight: 500;
            margin-bottom: 20px;
        }

        .corp-container p {
            font-size: 16px;
            line-height: 19px;
            font-weight: 300;
            margin-bottom: 20px;
        }

        .corp-footer p {
            font-size: 12px;
            line-height: 14px;
        }

        .corporation-container {
            position: relative;
            overflow: hidden;
            min-height: 200vh;
            height: 100%;
        }

        .parallax-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url({{ asset('images/bg.webp') }});
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        .corp-content {
            position: relative;
            z-index: 1;
            color: white;
        }

        .main-title__cont {
            background-color: rgba(0, 0, 0);
        }

        .corp-main-title {
            font-size: 40px;
            line-height: 48px;
            max-width: 1920px;
            font-weight: 200;
            padding: 50px;
            max-width: 1920px;
            margin-top: 60vh;
        }

        .corp-arrow-cont {
            max-width: 1920px;
            padding: 0 50px;
        }

        .corp-arrow {
            background-color: rgba(0, 0, 0);
            border-radius: 50%;
            width: 50px;
            height: 50px;
        }

        .corp-arrow img {
            padding-top: 11px;
            padding-left: 11px;
            border-radius: 50%;
        }

        .info-card-cont {
            max-width: 1240px;
            padding: 0 20px;
            color: black;
        }

        .info-card {
            background-color: white;
            width: 100%;
            border-radius: 10px;
            padding: 15px 20px;
        }

        .info-statistic {
            font-size: 58px;
            line-height: 70px;
            font-weight: 200;
        }

        .info-title {
            font-style: 16px;
            line-height: 19px;
            font-weight: 300;
        }

        .company-block-cont {
            max-width: 1240px;
            padding: 0 20px;
        }

        .company-card {
            background-color: #332E2E;
            width: 100%;
            padding: 30px;
            margin-bottom: 20px;
            border-radius: 10px;
            max-width: 370px;
        }

        .company-title {
            font-size: 30px;
            line-height: 36px;
            font-weight: 300;
            margin-bottom: 20px;
        }

        .company-card-title {
            border-bottom: 1px solid white;
            padding-bottom: 15px;
            margin-bottom: 15px;
            font-size: 22px;
            line-height: 27px;
            font-weight: 300;
        }

        .company-card-link {
            font-size: 22px;
            line-height: 27px;
            font-weight: 300;
        }

        .company-card-link img {
            margin-right: 10px;
        }

        .corp-copy-cont {
            background-color: rgba(0, 0, 0);
        }

        .corp-copy {
            max-width: 1240px;
            padding: 0 20px;
        }

        @media(max-width: 1200px) {
            .corp-main-title {
                font-size: 24px;
                line-height: 29px;
                padding: 20px;
            }

            .info-card-inner {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                margin-bottom: 20px;
                text-align: center;
            }

            .company-title {
                text-align: center;
            }

            .company-raw {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                margin-bottom: 20px;
            }

            .company-card {
                margin: 0px;
            }
        }

        .endless-search__burger {
            text-align: center;
            max-width: 367px;
        }

        .endless-search__burger form {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            justify-content: center;
        }

        .endless-search__burger input[type="text"] {
            padding: 8px 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
            width: 100%;
        }

        .endless-search__burger button {
            padding: 8px 40px;
            border: none;
            border-radius: 4px;
            background-color: #6A93B1;
            color: #ffffff;
            transition: background-color 0.3s, color 0.3s;
            width: 100%;
        }

        .endless-search__burger button:hover {
            background-color: #6a93b1b9;
            color: #fff;
        }

        @media (max-width: 1200px) {
            .endless-search__burger {
                max-width: 100%;
            }
        }

        .white-banner__link {
            padding: 4px 27px;
            border: 1px solid #5a5a5a;
            transition: all 0.3s ease;
            border-radius: 20px;
            background-color: white;
        }

        .white-banner__link:hover {
            color: white;
            background: black;
        }

        .glassmorphism-parent {
            background-color: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(10px);
        }

        .banner-contol {
            width: 4%;
        }

        @media (max-width: 700px) {
            .banner-contol {
                width: 8%;
            }
        }

        .lim-content {
            padding: 20px 0;
        }

        @media (min-width: 768px) {
            .limiting-container {
                max-height: 300px;
            }

            .lim-content {
                min-height: 300px;
                padding: 0 20px;
            }

            .lim-img img {
                min-height: 300px;
            }
        }

        @media (max-width: 768px) {
            .lim-content {
                padding: 20px 40px;
            }

            .lim-img img {
                max-height: 200px;
            }
        }

        .glassmorphism-b-parent {
            background-color: rgba(255, 255, 255, 0.125);
            backdrop-filter: blur(10px);
        }

        @media (max-width: 768px) {
            .black-banner__link {
                padding: 4px 27px;
                border: 1px solid #fff;
                transition: all 0.3s ease;
                border-radius: 20px;
                background-color: black;
            }

            .black-banner__link:hover {
                color: black;
                background: white;
            }
        }

        @media (min-width: 768px) {
            .black-banner__link {
                padding: 4px 27px;
                border: 1px solid #fff;
                transition: all 0.3s ease;
                border-radius: 20px;
                color: white;
                background-color: black;
            }

            .black-banner__link:hover {
                color: black;
                background-color: white;
            }
        }

        @media (max-width: 768px) {
            .black-m-banner__link {
                padding: 4px 27px;
                border: 1px solid #fff;
                transition: all 0.3s ease;
                border-radius: 20px;
                color: #fff;
                background-color: black;
            }

            .black-m-banner__link:hover {
                color: black;
                background: white;
            }
        }

        @media (min-width: 768px) {
            .black-m-banner__link {
                padding: 4px 27px;
                border: 1px solid #fff;
                transition: all 0.3s ease;
                border-radius: 20px;
                color: black;
                background-color: white;
            }

            .black-m-banner__link:hover {
                color: white;
                background-color: black;
            }
        }
    </style>
    <style>
        .slide-in-logo {
            position: fixed;
            /* position: absolute; */
            top: 10px;
            /* left: 0; */
            /* left: 20px; */
            left: calc(20px + 50% - 840px);
            /* transform: translateX(-101%); */
            /* transform: translateX(-101%) scale(0.8) rotate(-90deg); */
            /* transition: transform 0.5s ease-in-out, left 0.5s ease-in-out; */
            /* transition: transform 0.5s ease-in-out, left 0.5s ease-in-out, transform 0.5s ease-out; */
            opacity: 0;
            transform: scale(0.8) translateY(-30px);
            transition: opacity 0.5s ease-out, transform 0.8s ease-out;
            /* Логотип изначально невидим */
            /* transition: transform 0.5s ease-in-out, left 0.5s ease-in-out, opacity 0.5s ease-out; */
            /* transition: opacity 0.5s ease-out; */

            /* Появление вращение + фейд */
            /* transform: rotate(-180deg) translateX(-100%);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out; */

            /* transform: scale(0.5) translateX(-100%);
            transition: opacity 0.6s ease-out, transform 0.6s ease-out; */
            z-index: 1000;
        }

        .slide-in-logo.visible {
            /* transform: translateX(0); */
            /* transform: translateX(0) scale(1) rotate(0deg); */
            transform: scale(1) translateY(0);
            opacity: 1;
            /* Появление вращение + фейд */
            /* transform: rotate(0) translateX(0); */

            /* transform: scale(1) translateX(0); */
        }

        @media (min-width: 1480px) and (max-width: 1600px) {
            .slide-in-logo {
                left: 20px;
                /* left: calc(20px + 50% - 840px); */
                /* transform: translateX(calc(-100% - 20px)); */
                /* transform: translateX(calc(-100% - 20px)) scale(0.8) rotate(-90deg); */
                opacity: 0;
            }
        }

        @media (min-width: 1600px) {
            .slide-in-logo {
                /* left: 0; */
                left: calc(20px + 50% - 840px);
                /* transform: translateX(-100%) scale(0.8) rotate(-90deg); */
                opacity: 0;
            }

            .slide-in-logo.visible {
                left: calc(20px + 50% - 840px);
                /* transform: translateX(0); */
                /* transform: translateX(0) scale(1) rotate(0deg); */
                opacity: 1;
            }
        }

        @media (max-width: 1479px) {
            .slide-in-logo {
                display: none;
            }
        }
    </style>

</head>

<body
    style="font-family: 'Inter', 'sans-serif';
scroll-behavior: smooth;
text-rendering: optimizeSpeed;
font-size: 13px;
line-height: 16px;">
    @include('includes.header')
    <main class="">
        @yield('homepage')
        @yield('404')
        @yield('corporate_section')
        @yield('politics')
        @yield('legal_information')
        @yield('more_about_us')
        @yield('about_us')
        @yield('maps_ua')
        @yield('advertising')
        @yield('partnership')
        @yield('work_with_us')
        @yield('editorship')
        @yield('subscription')
        @yield('privacy_politics')
        @yield('editorial_politics')
        @yield('cookie_politics')
        @yield('service')
        @yield('content')
        @yield('terms_of_sale')
        @yield('comments_section')
        @yield('presentation_for_readers')
        @yield('social_responsability')
        @yield('journalist')
    </main>
    @if (!request()->cookie('cookie_accepted'))
        <div class="cookie-notification fixed-bottom bg-white p-3">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-10 p-0"
                        style="font-size: 12px; line-height: 14px; color: #332E2E; font-weight: light;">
                        Також веб-сайт газети Дейком використовує «cookies» та інші інтернет-сервіс для збору
                        технічних
                        даних стосовно відвідувачів з метою отримання маркетингової та статистичної інформації.
                        Пропонуємо вам ознайомитися із умовами обробки даних споживачів сайту, а саме: <a
                            class="text-decoration-underline" href="{{ route('politics.index') }}">Політикою
                            конфіденційності</a>,
                        <a class="text-decoration-underline" href="{{ route('cookie_politics.index') }}">Політику
                            щодо
                            файлів cookie</a>
                        наші
                        <a class="text-decoration-underline" href="{{ route('service.index') }}">Умови
                            обслуговування</a>.
                    </div>
                    <div
                        class="col-md-2 text-lg-end mt-2 mt-lg-0 d-flex justify-content-center p-0 justify-content-md-end">
                        <button onclick="acceptCookies()" class="btn btn-dark">Прийняти</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @include('includes.footer')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    <script>
        window.addEventListener('scroll', function() {
            const navStyle = document.querySelector('.nav-style');

            if (window.pageYOffset > 80) {
                navStyle.classList.add('with-shadow');
            } else {
                navStyle.classList.remove('with-shadow');
            }
        });

        function acceptCookies() {
            fetch('/accept-cookies', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({})
                })
                .then(response => {
                    if (response.ok) {
                        document.querySelector('.cookie-notification').style.display = 'none';
                    } else {
                        console.error('Ошибка при принятии куков');
                    }
                })
                .catch(error => {
                    console.error('Ошибка при принятии куков:', error);
                });
        }
        $(document).ready(function() {
            $('.carousel-item').each(function() {
                var $textContent = $(this).find('.text-content');
                var textContentHeight = $textContent.height();
                var minHeight = Math.max(textContentHeight + 20, 400);
                $(this).find('.d-md-none').css('min-height', minHeight);
            });
        });
    </script>
    <script>
        // window.addEventListener("scroll", function() {
        //     const logo = document.querySelector(".slide-in-logo");
        //     if (window.scrollY > 100) { // Например, при прокрутке больше 100px
        //         logo.classList.add("visible");
        //     } else {
        //         logo.classList.remove("visible");
        //     }
        // });
        window.addEventListener('scroll', () => {
            const logo = document.querySelector('.slide-in-logo');
            if (window.scrollY > 100) { // Если прокрутили больше 100px
                logo.classList.add('visible');
            } else {
                logo.classList.remove('visible');
            }
        });
    </script>
</body>

</html>
