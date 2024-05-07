<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $data['title'] }}</title>
    <meta name="description" content="{{ $data['desc'] }}">

    <meta property="og:title" content="{{ $data['title'] }}">
    <meta property="og:description" content="{{ $data['desc'] }}">
    <meta property="og:image" content="{{ $data['mainImage'] }}">
    <meta property="og:url" content="{{ $data['url'] }}">

    <meta name="twitter:title" content="{{ $data['title'] }}">
    <meta name="twitter:description" content="{{ $data['desc'] }}">
    <meta name="twitter:image" content="{{ $data['mainImage'] }}">
    <meta name="twitter:card" content="twitter_card">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;700&family=Montserrat:wght@300;400;600&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .container {
            max-width: 1200px;
            width: 100%;
            /* padding: 0 20px; */
        }

        .content__container {
            max-width: 640px;
            width: 100%;
        }

        .content__container-plus {
            max-width: 800px;
            width: 100%;
        }

        .content-bi__container {
            max-width: 840px;
            width: 100%;
        }

        .content-preview__container {
            position: relative;
            display: flex;
            flex-direction: column;
            max-width: 1920px;
            width: 100%;
            max-height: calc(100vh - 80px);
            min-height: 400px;
        }

        .content-preview__container img {
            max-width: 100%;
            height: 100%;
            min-height: 400px;
        }

        .content-preview-full__container {
            max-width: 1920px;
            width: 100%;
        }

        .content-preview-full__container img {
            min-height: 400px;
        }

        .content-preview-mini__container img {
            min-height: 170px;
            width: 100%;
        }

        .other-title {
            font-size: 14px;
            line-height: 16px;
            font-weight: 300;
        }

        .other-title h2 {
            font-size: 16px;
            line-height: 19px;
            font-weight: 300;
        }

        .title-container {
            max-width: 970px;
            color: white;
            position: absolute;
            bottom: 60px;
            width: 100%;
        }

        .title-container h1 {
            font-size: 40px;
            line-height: 48px;
            font-weight: 200;
        }

        .title-container h2 {
            font-size: 24px;
            line-height: 29px;
            font-weight: 200;
        }

        .text-white h1 {
            color: white;
            font-size: 40px;
            line-height: 48px;
            font-weight: 200;
        }

        .text-white h2 {
            color: white;
            font-size: 24px;
            line-height: 29px;
            font-weight: 200;
        }

        .text-black h1 {
            color: black;
            font-size: 40px;
            line-height: 48px;
            font-weight: 200;
        }

        .text-black h2 {
            color: black;
            font-size: 24px;
            line-height: 29px;
            font-weight: 200;
        }

        .title-block {
            padding: 0 60px;
        }

        .other-block {
            width: 280px;
        }

        .content-preview-mini__container img {
            max-height: 170px;
            height: 100%;
            width: 100%;
            min-width: 100%;
        }

        .other-block img {
            max-height: 170px;
        }

        @media (max-width: 1200px) {
            .content-preview__container {
                max-width: 1200px;
                width: 100%;
            }

            .title-container {
                bottom: 20px;
                max-width: 890px;
            }

            .title-container h1 {
                font-size: 26px;
                line-height: 29px;
            }

            .title-container h2 {
                font-size: 16px;
                line-height: 18px;
            }

            .title-block {
                padding: 0 20px;
            }

            .text-white h1 {
                font-size: 26px;
                line-height: 29px;
            }

            .text-white h2 {
                font-size: 16px;
                line-height: 18px;
            }

            .text-black h1 {
                font-size: 26px;
                line-height: 29px;
            }

            .text-black h2 {
                font-size: 16px;
                line-height: 18px;
            }

            .content-preview-mini__container img {
                min-height: 320px;
                height: 100%;
                width: 100%;
                min-width: 100%;
            }
        }

        @media (max-width: 768px) {

            .content-preview__container img {
                max-width: 100%;
            }

            .title-conteiner {
                bottom: 370px;
                max-height: 380px;
            }
        }

        h1 {
            font-size: 26px;
            line-height: 31px;
            margin-bottom: 15px;
            font-weight: 400;
        }

        h2 {
            font-size: 18px;
            line-height: 22px;
            font-weight: 300;
        }

        figcaption {
            font-size: 12px;
            line-height: 15px;
            color: rgb(107, 114, 128);
        }

        img {
            max-width: 100%;
        }

        a {
            color: inherit;
            text-decoration: none;
            transition: color 0.3s;
        }

        a:hover {
            color: #1677ff;
        }

        .content {
            max-width: 840px;
            padding: 0 20px;
            font-size: 17px;
            font-weight: 300;
            line-height: 22px;
        }

        .content p {
            margin-top: 20px;
        }

        .content blockquote {
            margin-top: 20px;
            border-left: solid 1px #333;
            padding-left: 15px;
        }

        .content img {
            margin-top: 20px;
        }

        .content br {
            margin: 0;
        }

        .content h2 {
            margin-top: 20px;
            font-weight: 500;
            font-size: 1.375rem;
            line-height: 1.688rem;
        }

        .content h3 {
            margin-top: 20px;
            font-size: 1.25rem;
            line-height: 1.75rem;
            font-weight: 500;
        }

        .content h4 {
            margin-top: 20px;
            font-size: 0.875rem;
            line-height: 1.063rem;
            font-weight: 300;
            color: #585858;
        }

        .content img {
            font-size: 12px;
            line-height: 15px;
            color: rgb(107, 114, 128);
        }

        .content a {
            color: rgb(50, 104, 145);
            transition: all 0.3s;
        }

        .content a:hover {
            color: gray;
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

        .border-b-other {
            border-bottom: 1px solid #ebebeb;
        }

        @media (min-width: 1200px) {
            .navbar-brand {
                transform: translateX(-42px);
            }

            .border-r {
                border-right: 1px solid #ebebeb;
            }

            .border-r-w {
                border-right: 1px solid #ebebeb;
            }

            .border-b {
                border-bottom: 1px solid #ebebeb;
            }
        }

        .block-title {
            font-size: 14px;
            line-height: 17px;
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

        .drop-cat a {
            font-size: 14px;
            line-height: 17px;
            font-weight: 400;
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
    </style>
</head>

<body
    style="font-family: 'Inter', 'sans-serif';
scroll-behavior: smooth;
text-rendering: optimizeSpeed;
font-size: 13px;
line-height: 16px;">
    @include('includes.city_header')
    @yield('news_city')
    @include('includes.footer')
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
