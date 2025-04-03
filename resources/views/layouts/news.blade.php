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
    {{-- <style>
        /* ! tailwindcss v3.2.4 | MIT License | https://tailwindcss.com */
        *,
        ::after,
        ::before {
            box-sizing: border-box;
            border-width: 0;
            border-style: solid;
            border-color: #e5e7eb
        }

        ::after,
        ::before {
            --tw-content: ''
        }

        html {
            line-height: 1.5;
            -webkit-text-size-adjust: 100%;
            -moz-tab-size: 4;
            tab-size: 4;
            font-family: Figtree, sans-serif;
            font-feature-settings: normal
        }

        body {
            margin: 0;
            line-height: inherit
        }

        hr {
            height: 0;
            color: inherit;
            border-top-width: 1px
        }

        abbr:where([title]) {
            -webkit-text-decoration: underline dotted;
            text-decoration: underline dotted
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-size: inherit;
            font-weight: inherit
        }

        a {
            color: inherit;
            text-decoration: inherit
        }

        b,
        strong {
            font-weight: bolder
        }

        code,
        kbd,
        pre,
        samp {
            font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
            font-size: 1em
        }

        small {
            font-size: 80%
        }

        sub,
        sup {
            font-size: 75%;
            line-height: 0;
            position: relative;
            vertical-align: baseline
        }

        sub {
            bottom: -.25em
        }

        sup {
            top: -.5em
        }

        table {
            text-indent: 0;
            border-color: inherit;
            border-collapse: collapse
        }

        button,
        input,
        optgroup,
        select,
        textarea {
            font-family: inherit;
            font-size: 100%;
            font-weight: inherit;
            line-height: inherit;
            color: inherit;
            margin: 0;
            padding: 0
        }

        button,
        select {
            text-transform: none
        }

        [type=button],
        [type=reset],
        [type=submit],
        button {
            -webkit-appearance: button;
            background-color: transparent;
            background-image: none
        }

        :-moz-focusring {
            outline: auto
        }

        :-moz-ui-invalid {
            box-shadow: none
        }

        progress {
            vertical-align: baseline
        }

        ::-webkit-inner-spin-button,
        ::-webkit-outer-spin-button {
            height: auto
        }

        [type=search] {
            -webkit-appearance: textfield;
            outline-offset: -2px
        }

        ::-webkit-search-decoration {
            -webkit-appearance: none
        }

        ::-webkit-file-upload-button {
            -webkit-appearance: button;
            font: inherit
        }

        summary {
            display: list-item
        }

        blockquote,
        dd,
        dl,
        figure,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        hr,
        p,
        pre {
            margin: 0
        }

        fieldset {
            margin: 0;
            padding: 0
        }

        legend {
            padding: 0
        }

        menu,
        ol,
        ul {
            list-style: none;
            margin: 0;
            padding: 0
        }

        textarea {
            resize: vertical
        }

        input::placeholder,
        textarea::placeholder {
            opacity: 1;
            color: #9ca3af
        }

        [role=button],
        button {
            cursor: pointer
        }

        :disabled {
            cursor: default
        }

        audio,
        canvas,
        embed,
        iframe,
        img,
        object,
        svg,
        video {
            display: block;
            vertical-align: middle
        }

        img,
        video {
            max-width: 100%;
            height: auto
        }

        [hidden] {
            display: none
        }

        *,
        ::before,
        ::after {
            --tw-border-spacing-x: 0;
            --tw-border-spacing-y: 0;
            --tw-translate-x: 0;
            --tw-translate-y: 0;
            --tw-rotate: 0;
            --tw-skew-x: 0;
            --tw-skew-y: 0;
            --tw-scale-x: 1;
            --tw-scale-y: 1;
            --tw-pan-x: ;
            --tw-pan-y: ;
            --tw-pinch-zoom: ;
            --tw-scroll-snap-strictness: proximity;
            --tw-ordinal: ;
            --tw-slashed-zero: ;
            --tw-numeric-figure: ;
            --tw-numeric-spacing: ;
            --tw-numeric-fraction: ;
            --tw-ring-inset: ;
            --tw-ring-offset-width: 0px;
            --tw-ring-offset-color: #fff;
            --tw-ring-color: rgb(59 130 246 / 0.5);
            --tw-ring-offset-shadow: 0 0 #0000;
            --tw-ring-shadow: 0 0 #0000;
            --tw-shadow: 0 0 #0000;
            --tw-shadow-colored: 0 0 #0000;
            --tw-blur: ;
            --tw-brightness: ;
            --tw-contrast: ;
            --tw-grayscale: ;
            --tw-hue-rotate: ;
            --tw-invert: ;
            --tw-saturate: ;
            --tw-sepia: ;
            --tw-drop-shadow: ;
            --tw-backdrop-blur: ;
            --tw-backdrop-brightness: ;
            --tw-backdrop-contrast: ;
            --tw-backdrop-grayscale: ;
            --tw-backdrop-hue-rotate: ;
            --tw-backdrop-invert: ;
            --tw-backdrop-opacity: ;
            --tw-backdrop-saturate: ;
            --tw-backdrop-sepia:
        }

        ::-webkit-backdrop {
            --tw-border-spacing-x: 0;
            --tw-border-spacing-y: 0;
            --tw-translate-x: 0;
            --tw-translate-y: 0;
            --tw-rotate: 0;
            --tw-skew-x: 0;
            --tw-skew-y: 0;
            --tw-scale-x: 1;
            --tw-scale-y: 1;
            --tw-pan-x: ;
            --tw-pan-y: ;
            --tw-pinch-zoom: ;
            --tw-scroll-snap-strictness: proximity;
            --tw-ordinal: ;
            --tw-slashed-zero: ;
            --tw-numeric-figure: ;
            --tw-numeric-spacing: ;
            --tw-numeric-fraction: ;
            --tw-ring-inset: ;
            --tw-ring-offset-width: 0px;
            --tw-ring-offset-color: #fff;
            --tw-ring-color: rgb(59 130 246 / 0.5);
            --tw-ring-offset-shadow: 0 0 #0000;
            --tw-ring-shadow: 0 0 #0000;
            --tw-shadow: 0 0 #0000;
            --tw-shadow-colored: 0 0 #0000;
            --tw-blur: ;
            --tw-brightness: ;
            --tw-contrast: ;
            --tw-grayscale: ;
            --tw-hue-rotate: ;
            --tw-invert: ;
            --tw-saturate: ;
            --tw-sepia: ;
            --tw-drop-shadow: ;
            --tw-backdrop-blur: ;
            --tw-backdrop-brightness: ;
            --tw-backdrop-contrast: ;
            --tw-backdrop-grayscale: ;
            --tw-backdrop-hue-rotate: ;
            --tw-backdrop-invert: ;
            --tw-backdrop-opacity: ;
            --tw-backdrop-saturate: ;
            --tw-backdrop-sepia:
        }

        ::backdrop {
            --tw-border-spacing-x: 0;
            --tw-border-spacing-y: 0;
            --tw-translate-x: 0;
            --tw-translate-y: 0;
            --tw-rotate: 0;
            --tw-skew-x: 0;
            --tw-skew-y: 0;
            --tw-scale-x: 1;
            --tw-scale-y: 1;
            --tw-pan-x: ;
            --tw-pan-y: ;
            --tw-pinch-zoom: ;
            --tw-scroll-snap-strictness: proximity;
            --tw-ordinal: ;
            --tw-slashed-zero: ;
            --tw-numeric-figure: ;
            --tw-numeric-spacing: ;
            --tw-numeric-fraction: ;
            --tw-ring-inset: ;
            --tw-ring-offset-width: 0px;
            --tw-ring-offset-color: #fff;
            --tw-ring-color: rgb(59 130 246 / 0.5);
            --tw-ring-offset-shadow: 0 0 #0000;
            --tw-ring-shadow: 0 0 #0000;
            --tw-shadow: 0 0 #0000;
            --tw-shadow-colored: 0 0 #0000;
            --tw-blur: ;
            --tw-brightness: ;
            --tw-contrast: ;
            --tw-grayscale: ;
            --tw-hue-rotate: ;
            --tw-invert: ;
            --tw-saturate: ;
            --tw-sepia: ;
            --tw-drop-shadow: ;
            --tw-backdrop-blur: ;
            --tw-backdrop-brightness: ;
            --tw-backdrop-contrast: ;
            --tw-backdrop-grayscale: ;
            --tw-backdrop-hue-rotate: ;
            --tw-backdrop-invert: ;
            --tw-backdrop-opacity: ;
            --tw-backdrop-saturate: ;
            --tw-backdrop-sepia:
        }

        .relative {
            position: relative
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto
        }

        .mx-6 {
            margin-left: 1.5rem;
            margin-right: 1.5rem
        }

        .ml-4 {
            margin-left: 1rem
        }

        .mt-16 {
            margin-top: 4rem
        }

        .mt-6 {
            margin-top: 1.5rem
        }

        .mt-4 {
            margin-top: 1rem
        }

        .-mt-px {
            margin-top: -1px
        }

        .mr-1 {
            margin-right: 0.25rem
        }

        .flex {
            display: flex
        }

        .inline-flex {
            display: inline-flex
        }

        .grid {
            display: grid
        }

        .h-16 {
            height: 4rem
        }

        .h-7 {
            height: 1.75rem
        }

        .h-6 {
            height: 1.5rem
        }

        .h-5 {
            height: 1.25rem
        }

        .min-h-screen {
            min-height: 100vh
        }

        .w-auto {
            width: auto
        }

        .w-16 {
            width: 4rem
        }

        .w-7 {
            width: 1.75rem
        }

        .w-6 {
            width: 1.5rem
        }

        .w-5 {
            width: 1.25rem
        }

        .max-w-7xl {
            max-width: 80rem
        }

        .shrink-0 {
            flex-shrink: 0
        }

        .scale-100 {
            --tw-scale-x: 1;
            --tw-scale-y: 1;
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))
        }

        .grid-cols-1 {
            grid-template-columns: repeat(1, minmax(0, 1fr))
        }

        .items-center {
            align-items: center
        }

        .justify-center {
            justify-content: center
        }

        .gap-6 {
            gap: 1.5rem
        }

        .gap-4 {
            gap: 1rem
        }

        .self-center {
            align-self: center
        }

        .rounded-lg {
            border-radius: 0.5rem
        }

        .rounded-full {
            border-radius: 9999px
        }

        .bg-gray-100 {
            --tw-bg-opacity: 1;
            background-color: rgb(243 244 246 / var(--tw-bg-opacity))
        }

        .bg-white {
            --tw-bg-opacity: 1;
            background-color: rgb(255 255 255 / var(--tw-bg-opacity))
        }

        .bg-red-50 {
            --tw-bg-opacity: 1;
            background-color: rgb(254 242 242 / var(--tw-bg-opacity))
        }

        .bg-dots-darker {
            background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E")
        }

        .from-gray-700\/50 {
            --tw-gradient-from: rgb(55 65 81 / 0.5);
            --tw-gradient-to: rgb(55 65 81 / 0);
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to)
        }

        .via-transparent {
            --tw-gradient-to: rgb(0 0 0 / 0);
            --tw-gradient-stops: var(--tw-gradient-from), transparent, var(--tw-gradient-to)
        }

        .bg-center {
            background-position: center
        }

        .stroke-red-500 {
            stroke: #ef4444
        }

        .stroke-gray-400 {
            stroke: #9ca3af
        }

        .p-6 {
            padding: 1.5rem
        }

        .px-6 {
            padding-left: 1.5rem;
            padding-right: 1.5rem
        }

        .text-center {
            text-align: center
        }

        .text-right {
            text-align: right
        }

        .text-xl {
            font-size: 1.25rem;
            line-height: 1.75rem
        }

        .text-sm {
            font-size: 0.875rem;
            line-height: 1.25rem
        }

        .font-semibold {
            font-weight: 600
        }

        .leading-relaxed {
            line-height: 1.625
        }

        .text-gray-600 {
            --tw-text-opacity: 1;
            color: rgb(75 85 99 / var(--tw-text-opacity))
        }

        .text-gray-900 {
            --tw-text-opacity: 1;
            color: rgb(17 24 39 / var(--tw-text-opacity))
        }

        .text-gray-500 {
            --tw-text-opacity: 1;
            color: rgb(107 114 128 / var(--tw-text-opacity))
        }

        .underline {
            -webkit-text-decoration-line: underline;
            text-decoration-line: underline
        }

        .antialiased {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale
        }

        .shadow-2xl {
            --tw-shadow: 0 25px 50px -12px rgb(0 0 0 / 0.25);
            --tw-shadow-colored: 0 25px 50px -12px var(--tw-shadow-color);
            box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)
        }

        .shadow-gray-500\/20 {
            --tw-shadow-color: rgb(107 114 128 / 0.2);
            --tw-shadow: var(--tw-shadow-colored)
        }

        .transition-all {
            transition-property: all;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            transition-duration: 150ms
        }

        .selection\:bg-red-500 *::selection {
            --tw-bg-opacity: 1;
            background-color: rgb(239 68 68 / var(--tw-bg-opacity))
        }

        .selection\:text-white *::selection {
            --tw-text-opacity: 1;
            color: rgb(255 255 255 / var(--tw-text-opacity))
        }

        .selection\:bg-red-500::selection {
            --tw-bg-opacity: 1;
            background-color: rgb(239 68 68 / var(--tw-bg-opacity))
        }

        .selection\:text-white::selection {
            --tw-text-opacity: 1;
            color: rgb(255 255 255 / var(--tw-text-opacity))
        }

        .hover\:text-gray-900:hover {
            --tw-text-opacity: 1;
            color: rgb(17 24 39 / var(--tw-text-opacity))
        }

        .hover\:text-gray-700:hover {
            --tw-text-opacity: 1;
            color: rgb(55 65 81 / var(--tw-text-opacity))
        }

        .focus\:rounded-sm:focus {
            border-radius: 0.125rem
        }

        .focus\:outline:focus {
            outline-style: solid
        }

        .focus\:outline-2:focus {
            outline-width: 2px
        }

        .focus\:outline-red-500:focus {
            outline-color: #ef4444
        }

        .group:hover .group-hover\:stroke-gray-600 {
            stroke: #4b5563
        }

        .z-10 {
            z-index: 10
        }

        @media (prefers-reduced-motion: no-preference) {
            .motion-safe\:hover\:scale-\[1\.01\]:hover {
                --tw-scale-x: 1.01;
                --tw-scale-y: 1.01;
                transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))
            }
        }

        @media (prefers-color-scheme: dark) {
            .dark\:bg-gray-900 {
                --tw-bg-opacity: 1;
                background-color: rgb(17 24 39 / var(--tw-bg-opacity))
            }

            .dark\:bg-gray-800\/50 {
                background-color: rgb(31 41 55 / 0.5)
            }

            .dark\:bg-red-800\/20 {
                background-color: rgb(153 27 27 / 0.2)
            }

            .dark\:bg-dots-lighter {
                background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E")
            }

            .dark\:bg-gradient-to-bl {
                background-image: linear-gradient(to bottom left, var(--tw-gradient-stops))
            }

            .dark\:stroke-gray-600 {
                stroke: #4b5563
            }

            .dark\:text-gray-400 {
                --tw-text-opacity: 1;
                color: rgb(156 163 175 / var(--tw-text-opacity))
            }

            .dark\:text-white {
                --tw-text-opacity: 1;
                color: rgb(255 255 255 / var(--tw-text-opacity))
            }

            .dark\:shadow-none {
                --tw-shadow: 0 0 #0000;
                --tw-shadow-colored: 0 0 #0000;
                box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)
            }

            .dark\:ring-1 {
                --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
                --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);
                box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000)
            }

            .dark\:ring-inset {
                --tw-ring-inset: inset
            }

            .dark\:ring-white\/5 {
                --tw-ring-color: rgb(255 255 255 / 0.05)
            }

            .dark\:hover\:text-white:hover {
                --tw-text-opacity: 1;
                color: rgb(255 255 255 / var(--tw-text-opacity))
            }

            .group:hover .dark\:group-hover\:stroke-gray-400 {
                stroke: #9ca3af
            }
        }

        @media (min-width: 640px) {
            .sm\:fixed {
                position: fixed
            }

            .sm\:top-0 {
                top: 0px
            }

            .sm\:right-0 {
                right: 0px
            }

            .sm\:ml-0 {
                margin-left: 0px
            }

            .sm\:flex {
                display: flex
            }

            .sm\:items-center {
                align-items: center
            }

            .sm\:justify-center {
                justify-content: center
            }

            .sm\:justify-between {
                justify-content: space-between
            }

            .sm\:text-left {
                text-align: left
            }

            .sm\:text-right {
                text-align: right
            }
        }

        @media (min-width: 768px) {
            .md\:grid-cols-2 {
                grid-template-columns: repeat(2, minmax(0, 1fr))
            }
        }

        @media (min-width: 1024px) {
            .lg\:gap-8 {
                gap: 2rem
            }

            .lg\:p-8 {
                padding: 2rem
            }
        }
    </style> --}}
    {{-- @vite('resources/css/app.css') --}}
    <style>
        .container {
            max-width: 1200px;
            width: 100%;
        }

        .wrapper__content {
            max-width: 720px;
            width: 100%;
            background: #F8F8F8;
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
            min-height: calc(100vh - 110px);
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

        .smoothie {
            font-weight: 300;
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

            .content-preview-full__container img {
                min-height: 400px;
            }

            .title-container {
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
            font-weight: 300;
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
            transition: max-height 0.3s ease;
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
            margin: 0;
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

        .hidden-content {
            display: none;
            transition: max-height 0.3s ease;
        }

        .show-more-btn {
            cursor: pointer;
            background-color: #EBEBEB;
            width: 200px;
            text-decoration: none;
            color: #5A5A5A;
            transition: all 0.3s ease;
        }

        .show-more-btn:hover {
            background-color: #5A5A5A;
            color: #EBEBEB;
        }

        .avatar-container {
            width: 50px;
            height: 50px;
            overflow: hidden;
            border-radius: 50%;
        }

        .avatar {
            margin: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .user {
            font-size: 16px;
            line-height: 19px;
        }

        .theme h2 {
            font-size: 26px;
            line-height: 29px;
            font-weight: 500;
        }

        .premium-theme h2 {
            font-size: 40px;
            line-height: 48px;
            font-weight: 300;
        }

        @media (max-width: 1200px) {
            .premium-theme h2 {
                font-size: 21px;
                line-height: 24px;
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

        .ql-video {
            width: 100%;
            height: 380px;
        }
    </style>
    <style>
        iframe,
        video {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .content iframe,
        .content video {
            width: 600px;
            height: 400px;
            object-fit: contain;
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
    @yield('news')
    @yield('content')
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

        function toggleMainContent() {
            var contentDiv = document.getElementById('showMoreMainContent');
            var button = document.querySelector('.show-more-btn');

            if (contentDiv.style.maxHeight === '300px') {
                contentDiv.style.maxHeight = '100%';
                button.textContent = 'ЗГОРНУТИ';
                contentDiv.scrollIntoView({
                    behavior: 'smooth'
                });
            } else {
                contentDiv.style.maxHeight = '300px';
                button.textContent = 'ПОКАЗАТИ БІЛЬШЕ';
            }
        }

        function toggleContent(index) {
            var contentDiv = document.getElementById('showMoreContent' + index);
            var button = document.getElementById('showMoreButton' + index);
            var maxHeight = (contentDiv.style.maxHeight === '700px') ? '100%' : '700px';
            contentDiv.style.maxHeight = maxHeight;

            if (maxHeight === '700px') {
                button.textContent = 'ПОКАЗАТИ БІЛЬШЕ';
                contentDiv.scrollIntoView({
                    behavior: 'smooth'
                });
            } else {
                button.textContent = 'ЗГОРНУТИ';
            }
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('video').forEach(video => {
                video.muted = true;
            });
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
    <script>
        let currentPage = 1;
        const limit = 30;
        let isLoading = false;

        async function loadMoreArticles() {
            if (isLoading) return;
            isLoading = true;

            try {
                const response = await fetch(
                    `https://sside.daycom.com.ua/api/get-topics-pg?topicId={{ $data['topicId'] }}&newsId={{ $data['id'] }}&page=${currentPage + 1}&limit=${limit}`
                );
                if (!response.ok) {
                    throw new Error('Ошибка загрузки данных');
                }
                const data = await response.json();
                console.log(data);

                if (data.data && data.data.length > 0) {
                    appendArticles(data.data);
                    currentPage++;
                } else {
                    window.removeEventListener('scroll', onScrollLoadMore);
                }
            } catch (error) {
                console.error('Ошибка:', error);
            } finally {
                isLoading = false;
            }
        }

        let articleCounter = document.querySelectorAll('.articles article').length;

        function appendArticles(articles) {
            const container = document.getElementById('articles-container');
            if (!container) {
                return;
            }

            const lastScrollPosition = window.scrollY;

            articles.forEach((article) => {
                const currentIndex = articleCounter;
                articleCounter++;

                const articleHTML = `
            <div class="avatar__container pt-4" style="margin: 0 20px;">
                <div class="d-flex gap-4 align-items-center">
                    <div class="avatar-container">
                        <img class="avatar" src="${article.User.avatarUrl}" alt="Фото ${article.User.nickName}">
                    </div>
                    <div class="user" style="font-size: 14px; line-height: 16px;">
                        <div class="mb-1" style="color: #FECB04;">
                            ${new Date(article.publishedAt).toLocaleString('uk-UA', { hour12: false })}
                        </div>
                        <div class="">${article.User.nickName}</div>
                    </div>
                </div>
            </div>
            <article>
                <div class="content mb-4" id="showMoreContent${currentIndex}" style="max-height: 700px; overflow: hidden;">
                    <a href="${article.url}">
                        <h2>${article.title}</h2>
                    </a>
                    <img src="${article.mainImage}" alt="Главное изображение">
                    ${article.content}
                </div>
                <div class="d-flex justify-content-center align-items-center">
                    <button id="showMoreButton${currentIndex}" class="btn show-more-btn" onclick="toggleContent('${currentIndex}')">ПОКАЗАТИ БІЛЬШЕ</button>
                </div>
            </article>`;

                container.insertAdjacentHTML('beforeend', articleHTML);
            });

            window.scrollTo(0, lastScrollPosition);
        }

        function onScrollLoadMore() {
            const scrollTop = window.scrollY;
            const windowHeight = window.innerHeight;
            const documentHeight = document.documentElement.scrollHeight;

            if (scrollTop + windowHeight >= documentHeight - 2000) {
                loadMoreArticles();
            }
        }

        window.addEventListener('scroll', onScrollLoadMore);
    </script>
</body>

</html>
