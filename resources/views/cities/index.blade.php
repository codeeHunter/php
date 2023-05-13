@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-center my-3">
        @if (count($cities) > 0)
            <h2>
                Список городов
            </h2>
        @else
            <h2>
                Отзывов еще нет. Создайте отзыв.
            </h2>
        @endif
    </div>

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

    @if (count($feedbacks) > 0)
        <div class="d-flex justify-content-center align-items-center flex-column p-2 scrollable mx-auto"
            style="border: 2px solid rgb(134, 134, 134); border-radius: 7px; max-height: 85vh; width: 80vw;">
            @foreach ($cities as $city)
                <div class="container scrollable">
                    <a href="{{ route('feedbacks.index', $city->id) }}" class="link-secondary link-underline-opacity-0"
                        style="text-decoration: none">{{ $city->name }}</a>
                </div>
            @endforeach
        </div>
    @endif

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
