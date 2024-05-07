@extends('layouts.main')
@section('404')
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: calc(100vh - 560px);">
            <div class="row col-md-6 text-center justify-content-center align-items-center">
                <div class="mb-4" style="font-size: 40px; line-height: 48px; font-weight: 200;">
                    Сторінку не знайдено
                </div>
                <div class="px-4 py-2 mb-4" style="background-color: #ebebeb; width: 200px; border-radius: 25px;">
                    404
                </div>
                <p class="" style="max-width: 400px;">
                    Вибачте, здається, ми втратили сторінку, на яку ви намагаєтесь потрапити, але ми не хочемо
                    втратити вас.
                </p>
                <div class="under mb-4" style="color: gray">
                    <a href="{{ route('homepage.index') }}">
                        Повернутися на головну сторінку
                    </a>
                </div>
                <div id="timer"></div>
            </div>
        </div>
    </div>
    <script>
        let secondsLeft = 15; // Установить количество секунд
        let timer = document.getElementById('timer');

        function countdown() {
            timer.textContent = `Ви повернетесь на головну сторінку через ${secondsLeft} сек.`;
            secondsLeft--;

            if (secondsLeft < 0) {
                window.location.href = "{{ route('homepage.index') }}";
            } else {
                setTimeout(countdown, 1000);
            }
        }

        countdown();
    </script>
@endsection
