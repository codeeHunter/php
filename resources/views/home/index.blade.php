@extends('layouts.app')

@section('content')
    <div class="">
        @if ($isShow)
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false"
                backdrop="false">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Ваш город Ижевск?</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Нет</button>
                            <button type="button" class="btn btn-primary" id="yes-city">Да</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if (count($feedbacks) <= 0)
            <h2>Отзывов еще нет.</h2>
        @else
            @foreach ($feedbacks as $feedback)
                <div class="container">
                    {{ $feedback->title }}
                </div>
            @endforeach
        @endif

    </div>

    <div class="">
        <h3>Хотите создать отзыв?</h3>
        <a href="{{ route('feedback.create') }}" class="btn btn-primary my-20">Да</a>
    </div>
@endsection

@section('script')
    @if ($isShow)
        <script>
            const myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {});

            document.querySelector('#yes-city').addEventListener('click', () => {
                myModal.hide();
            });

            myModal.show();
        </script>
    @endif
@endsection
