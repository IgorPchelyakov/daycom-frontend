<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Газета Дейком - {{ $metaData['title'] }}</title>
    <meta name="description" content="{{ $metaData['description'] }}">
    <meta property="og:title" content="{{ $metaData['title'] }}">
    <meta property="og:description" content="{{ $metaData['description'] }}">
    <meta property="og:url" content="{{ $metaData['url'] }}">
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

        }

        @media (min-width: 1200px) {
            .navbar-brand {
                transform: translateX(45px);
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

        @media(min-width: 1200px) {
            .navbar-brand {
                transform: translateX(-42px);
            }

            .block-2 img {
                max-width: 520px;
                min-width: 520px;
                width: 100%;
                min-height: 360px;
                max-height: 360px;
                height: 100%;
            }

            .block-1 h2,
            p {
                max-width: 310px;
            }

            .block-3 h2,
            p {
                max-width: 310px;
                min-width: 100%;
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

            .block-4 img {
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

            .bb-sm {
                border-bottom: 1px solid #ebebeb;
            }
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
        @yield('news-today')
        @yield('line_news')
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
    <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
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
        document.addEventListener('DOMContentLoaded', function() {
            const picker = new Pikaday({
                field: document.getElementById('datepicker'),
                firstDay: 1,
                i18n: {
                    previousMonth: 'Previous Month',
                    nextMonth: 'Next Month',
                    months: ['Січень', 'Лютий', 'Березень', 'Квітень', 'Травень', 'Червень', 'Липень',
                        'Серпень',
                        'Вересень', 'Жовтень', 'Листопад', 'Грудень'
                    ],
                    weekdays: ['Неділя', 'Понеділок', 'Вівторок', 'Середа', 'Четвер', 'П\'ятниця',
                        'Субота'
                    ],
                    weekdaysShort: ['Нд', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб']
                },
                format: 'D/M/YYYY',
                toString(date, format) {
                    const day = date.getDate();
                    const month = date.getMonth() + 1;
                    const year = date.getFullYear();
                    return `${day}/${month}/${year}`;
                },
                parse(dateString, format) {
                    const parts = dateString.split('/');
                    const day = parseInt(parts[0], 10);
                    const month = parseInt(parts[1], 10) - 1;
                    const year = parseInt(parts[2], 10);
                    return new Date(year, month, day);
                },
                onSelect: function(date) {
                    const day = date.getDate();
                    const month = date.getMonth() + 1;
                    const year = date.getFullYear();

                    const formattedDay = day < 10 ? `0${day}` : day;
                    const formattedMonth = month < 10 ? `0${month}` : month;

                    const formattedDate = `${year}-${formattedMonth}-${formattedDay}`;
                    // https://sside.daycom.com.ua/api/news/news-today
                    // http://localhost:4444/api/news/news-today/
                    fetch(`https://sside.daycom.com.ua/api/news/news-today/${formattedDate}`)
                        .then(response => response.json())
                        .then(data => {
                            const currentDate = new Date();
                            const filteredData = data.filter(item => {
                                const publicationDate = new Date(item
                                    .publishedAt);
                                return publicationDate <=
                                    currentDate;
                            });

                            renderData(
                                filteredData
                            );
                        })
                        .catch(error => {
                            console.error('Ошибка:', error);
                        });

                    function renderData(data) {
                        const block1 = document.querySelector('.block-1');
                        if (block1) {
                            block1.innerHTML = '';
                            const containerElement = document.createElement('div');
                            containerElement.classList.add('block');

                            data.forEach((item, index) => {
                                const articleElement = document.createElement('div');
                                articleElement.classList.add('article');

                                if (index === 0 || index === 1) {
                                    const img =
                                        `<img class="mb-2 img-fluid w-100 h-100 rounded object-fit-cover" src="${item.mainImage}" alt="${item.mainImgDesc}">`;
                                    const border = ` class="bb-sm mb-3 mb-xl-0"`;
                                    const formattedDate = new Date(item.publishedAt)
                                        .toLocaleDateString('uk-UA', {
                                            year: 'numeric',
                                            month: 'long',
                                            day: 'numeric'
                                        }).replace(/\sр\.$/, '');
                                    // https://daycom.com.ua/news
                                    // http://127.0.0.1:8000/news/
                                    articleElement.innerHTML = `
                                        <article ${index === 1 ? border : ''}>
                                            <a href="https://daycom.com.ua/news/${item.url}">
                                                ${ index === 0 ? img : ''}
                                                <h2>${item.title}</h2>
                                                <p>${item.desc}</p>
                                                <div>
                                                    <p><time>${formattedDate}</time>, ${item.section}</p>
                                                </div>
                                            </a>
                                        </article>`;
                                    block1.appendChild(containerElement);
                                    containerElement.appendChild(articleElement);
                                }
                            });
                        } else {
                            console.error('Элемент .block-1 не найден на странице.');
                        }

                        const block2 = document.querySelector('.block-2');
                        if (block2) {
                            block2.innerHTML = '';
                            const containerElement = document.createElement('div');
                            containerElement.classList.add('block');

                            data.forEach((item, index) => {
                                const articleElement = document.createElement('div');
                                articleElement.classList.add('article');

                                if (index === 2) {
                                    const img =
                                        `<img class="mb-2 img-fluid w-100 h-100 rounded object-fit-cover" src="${item.mainImage}" alt="${item.mainImgDesc}">`;
                                    const border = ` class="bb-sm mb-3 mb-xl-0"`;
                                    const formattedDate = new Date(item.publishedAt)
                                        .toLocaleDateString('uk-UA', {
                                            year: 'numeric',
                                            month: 'long',
                                            day: 'numeric'
                                        }).replace(/\sр\.$/, '');
                                    articleElement.innerHTML = `
                                        <article ${border}>
                                            <a href="https://daycom.com.ua/news/${item.url}">
                                                ${img}
                                                <h2>${item.title}</h2>
                                                <p>${item.desc}</p>
                                                <div>
                                                    <p><time>${formattedDate}</time>, ${item.section}</p>
                                                </div>
                                            </a>
                                        </article>`;
                                    containerElement.appendChild(articleElement);
                                }
                            });
                            block2.appendChild(containerElement);
                        } else {
                            console.error('Элемент .block-2 не найден на странице.');
                        }

                        const block3 = document.querySelector('.block-3');
                        if (block3) {
                            block3.innerHTML = '';
                            const containerElement = document.createElement('div');
                            containerElement.classList.add('block');

                            data.forEach((item, index) => {
                                const articleElement = document.createElement('div');
                                articleElement.classList.add('article');

                                if (index > 2 && index <= 4) {
                                    const img =
                                        `<img class="mb-3 img-fluid w-100 h-100 rounded object-fit-cover" src="${item.mainImage}" alt="${item.mainImgDesc}">`;
                                    const formattedDate = new Date(item.publishedAt)
                                        .toLocaleDateString('uk-UA', {
                                            year: 'numeric',
                                            month: 'long',
                                            day: 'numeric'
                                        }).replace(/\sр\.$/, '');
                                    articleElement.innerHTML = `
                                        <article>
                                            <a href="https://daycom.com.ua/news/${item.url}">
                                                ${index === 3 ? img : ''}
                                                <h2>${item.title}</h2>
                                                <p>${item.desc}</p>
                                                <div>
                                                    <p><time>${formattedDate}</time>, ${item.section}</p>
                                                </div>
                                            </a>
                                        </article>`;
                                    containerElement.appendChild(articleElement);
                                }
                            });
                            block3.appendChild(containerElement);
                        } else {
                            console.error('Элемент .block-3 не найден на странице.');
                        }
                        const block4 = document.querySelector('.block-4');
                        if (block4) {
                            block4.innerHTML = '';
                            const row = document.createElement('div');
                            row.classList.add('row');

                            data.forEach((item, index) => {
                                const articleElement = document.createElement('div');
                                articleElement.classList.add('article', 'col-xl-3');

                                if (index > 4) {
                                    const img =
                                        `<img class="mb-2 img-fluid w-100 h-100 rounded object-fit-cover" src="${item.mainImage}" alt="${item.mainImgDesc}">`;
                                    const border = ` class="bb-sm mb-2 mb-xl-0"`;
                                    const formattedDate = new Date(item.publishedAt)
                                        .toLocaleDateString('uk-UA', {
                                            year: 'numeric',
                                            month: 'long',
                                            day: 'numeric'
                                        }).replace(/\sр\.$/, '');
                                    articleElement.innerHTML = `
                                        <article ${border}>
                                            <a href="https://daycom.com.ua/news/${item.url}">
                                                ${img}
                                                <h2>${item.title}</h2>
                                                <p>${item.desc}</p>
                                                <div>
                                                    <p><time>${formattedDate}</time>, ${item.section}</p>
                                                </div>
                                            </a>
                                        </article>`;
                                    row.appendChild(articleElement);
                                }
                            });
                            block4.appendChild(row);
                        } else {
                            console.error('Элемент .block-4 не найден на странице.');
                        }
                    }
                }
            });

            const today = new Date();
            picker.setDate(today);
        });
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
    <script>
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
        window.addEventListener("scroll", function() {
            const logo = document.querySelector(".slide-in-logo");
            if (window.scrollY > 100) { // Например, при прокрутке больше 100px
                logo.classList.add("visible");
            } else {
                logo.classList.remove("visible");
            }
        });
    </script>
</body>

</html>
