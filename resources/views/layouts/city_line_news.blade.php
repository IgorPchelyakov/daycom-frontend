<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Газета Дейком - {{ $metaData['title'] }}</title>
    <meta name="description" content="{{ $metaData['description'] }}">
    <meta property="og:title" content="{{ $metaData['title'] }}">
    <meta property="og:description" content="{{ $metaData['url'] }}">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;700&family=Montserrat:wght@300;400;600&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">
    <style>
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
            padding: 0 20px;
        }

        h1 {
            font-size: 36px;
            line-height: 44px;
            font-weight: 300;
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



        @media (max-width: 1200px) {
            h2 {
                font-size: 18px;
                line-height: 22px;
                font-weight: 400;
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
            }

            .max-img {
                max-height: 450px;
            }

            .bb-sm {
                border-bottom: 1px solid #ebebeb;
            }

        }

        @media (min-width: 1200px) {
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

            .img-rel {
                position: relative;
            }

            .img-abs {
                position: absolute;
                top: 0;
                right: 0;
                max-height: 400px;
            }

            .xl-w-bi {
                max-width: 288px;
            }

            .xl-w-biimg {
                max-width: 490px;
                max-height: 327px;
                min-width: 100%;
            }

            .xl-border-top {
                border-top: 1px solid #ebebeb;
            }

            .xl-w-warimg {
                max-width: 260px;
                max-height: 175px;
            }

            .xl-block-w {
                width: 285px;
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
            line-height: 16px;
            font-weight: 400;
        }

        .block-1 img {
            max-width: 310px;
            min-width: 310px;
            width: 100%;
            min-height: 206px;
            max-height: 206px;
            height: 100%;
        }

        .block-1 .article {
            border-bottom: 1px solid #ebebeb;
        }

        .block-1 .article:last-child {
            border-bottom: none;
        }

        .article {
            margin-bottom: 12px;
        }

        .block-3 .article {
            border-bottom: 1px solid #ebebeb;
        }

        .block-3 .article:last-child {
            border-bottom: none;
        }

        .block-2 img {
            max-width: 520px;
            min-width: 520px;
            width: 100%;
            min-height: 360px;
            max-height: 360px;
            height: 100%;
        }

        .block-3 img {
            max-width: 310px;
            min-width: 310px;
            width: 100%;
            min-height: 206px;
            max-height: 206px;
            height: 100%;
        }

        .border-e {
            border-right: 1px solid #ebebeb;
        }

        .border-s {
            border-left: 1px solid #ebebeb;
        }

        .img-cont img {
            max-width: 282px;
            min-width: 282px;
            width: 100%;
            min-height: 190px;
            max-height: 190px;
            height: 100%;
        }

        @media(min-width: 1200px) {
            .navbar-brand {
                transform: translateX(-42px);
            }

            .img-prev img {
                max-width: 205px;
                min-width: 205px;
                width: 100%;
                min-height: 135px;
                max-height: 135px;
                height: 100%;
            }

            .block-1 h2,
            p {
                max-width: 310px;
            }

            .block-2 h2,
            p {
                max-width: 520px;
            }

            .block-3 h2,
            p {
                max-width: 310px;
                min-width: 100%;
            }
        }

        .endless {
            max-width: 880px;
            padding: 0 20px;
        }

        .endless-info p {
            font-size: 12px;
            line-height: 14px;
            margin-bottom: 6px;
        }

        .endless-title {
            max-width: 470px;
            width: 100%;
        }

        @media(min-width: 1200px) {
            .endless-info {
                max-width: 145px;
                min-width: 145px;
            }
        }

        @media(max-width:1200px) {

            .block-1 img {
                max-width: 100%;
                min-width: 100%;
                width: 100%;
                min-height: 320px;
                max-height: 320px;
                height: 100%;
            }

            .block-1 h2,
            p {
                max-width: 100%;
            }

            .block-2 img {
                max-width: 100%;
                min-width: 100%;
                width: 100%;
                min-height: 320px;
                max-height: 320px;
                height: 100%;
            }

            .block-3 img {
                max-width: 100%;
                min-width: 100%;
                width: 100%;
                min-height: 320px;
                max-height: 320px;
                height: 100%;
            }

            .border-e {
                border-right: none;
            }

            .border-s {
                border-left: none;
            }

            .img-cont img {
                max-width: 100%;
                width: 100%;
                min-height: 320px;
                max-height: 320px;
                height: 100%;
            }

            .img-prev img {
                max-width: 80px;
                width: 100%;
                min-width: 80px;
                min-height: 80px;
                max-height: 80px;
                height: 100%;
            }

            .endless {
                padding: 0;
            }
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

        .seacrh__container {
            min-height: 100px;
            background-color: #ebebeb;
        }

        .results__container {
            min-height: calc(100vh - 900px);
        }

        .search__wrapper {
            text-align: center;
            margin-top: 20px;
            max-width: 800px;
        }

        .search__wrapper form {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            justify-content: center;
        }

        .search__wrapper input[type="text"] {
            padding: 8px 10px;
            border: none;
            border-bottom: 1px solid black;
            margin-right: 5px;
            width: 100%;
            font-size: 24px;
            font-weight: 600;
            line-height: 32px;
            color: #000;
            background-color: #ebebeb;
            text-align: center;
        }

        .search__wrapper input[type="text"]::placeholder {
            color: #ссс;
            text-align: center;
        }

        .search__wrapper input[type="text"]:focus {
            outline: none;
        }

        .search__wrapper button {
            padding: 8px 60px;
            border: none;
            font-size: 18px;
            line-height: 22px;
            border-radius: 4px;
            background-color: #6A93B1;
            color: #fff;
            transition: background-color 0.3s, color 0.3s;
        }

        .search__wrapper button:hover {
            background-color: #6a93b1b9;
            color: #fff;
        }

        .endless-search {
            text-align: center;
            max-width: 320px;
        }

        .endless-search form {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            justify-content: center;
        }

        .endless-search input[type="text"] {
            padding: 8px 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
            width: 100%;
        }

        .endless-search button {
            padding: 8px 40px;
            border: none;
            border-radius: 4px;
            background-color: #6A93B1;
            color: #ffffff;
            transition: background-color 0.3s, color 0.3s;
            width: 100%;
        }

        .endless-search button:hover {
            background-color: #6a93b1b9;
            color: #fff;
        }

        @media (max-width: 1200px) {
            .endless-search {
                max-width: 100%;
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
    </style>
</head>

<body
    style="font-family: 'Inter', 'sans-serif';
scroll-behavior: smooth;
text-rendering: optimizeSpeed;
font-size: 13px;
line-height: 16px;">
    @include('includes.city_header')
    <main class="">
        @yield('city_active_line_news')
        @yield('city_search')
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
    </main>
    @include('includes.footer')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    <script>
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
    </script>
</body>

</html>
