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
                    @if ($feedback->img)
                        <img src="{{ asset('images/' . $feedback->img) }}" class="card-img-top" alt="..."
                            style="height: 200px; width: auto;">
                    @else
                        <img src="{{ asset('template.jpg') }}" class="card-img-top" alt="..."
                            style="height: 200px; width: auto;">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $feedback->title }}</h5>
                        <p class="card-text">{{ $feedback->text }}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Рейтинг: {{ $feedback->rating }}</li>
                    </ul>
                    <div class="card-body d-flex justify-content-between">
                        <a href="{{ route('feedback.show', [$city, $feedback]) }}" class="btn btn-secondary"
                            style="text-decoration: none">Редактировать</a>
                        <form action="{{ route('feedback.delete', [$city, $feedback]) }}" method="POST">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Delete" class="btn btn-danger">
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
