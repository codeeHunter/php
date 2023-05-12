@extends('layouts.app')
@section('content')
    <div class="row bg-primary-subtle">
        <div class="d-flex justify-content-center m-1">
            <h3>Отзывы на город {{ $city->name }}</h3>
        </div>
        <div class="d-flex justify-content-center gap-5 flex-wrap p-5 scrollable"
            style="border: 2px solid rgb(134, 134, 134); border-radius: 7px; max-height: 85vh; overflow: auto;">
            @foreach ($feedbacks as $feedback)
                <div class="card " style="width: 18rem;">
                    <img src="{{ asset('images/' . $feedback->img) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $feedback->title }}</h5>
                        <p class="card-text">{{ $feedback->text }}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Рейтинг: {{ $feedback->rating }}</li>
                    </ul>
                    <div class="card-body">
                        <a href="#" class="link-underline-opacity-0 link-secondary">Редактировать</a>
                        <a href="#" class="link-underline-opacity-0 link-secondary">Удалить</a>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection
