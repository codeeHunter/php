@extends('layouts.app')
@section('content')
    <div class="my-3 text-center">
        <h2>Редактировать отзыв</h2>
    </div>
    <div class="d-flex justify-content-center">
        <div class="bg-primary-subtle p-3" style="border: 2px solid rgb(134, 134, 134); border-radius: 7px; width: 80vw">
            <form action="{{ route('feedback.update', [$city, $feedback]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="col my-2">
                    <input type="text" class="form-control my-3" name="title" value="{{ $feedback->title }}"
                        aria-label="Название">
                    <textarea type="text" class="form-control my-3" name="text" aria-label="Место для отзыва">{{ $feedback->text }}</textarea>
                    <input type="number" class="form-control my-3" name="rating" value="{{ $feedback->rating }}"
                        aria-label="Рейтинг">
                    <p>Предыдущий файл: {{ $feedback->img }}</p>
                    <input type="file" class="form-control my-3" name="img">
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary">Редактировать</button>
                </div>
            </form>
        </div>
    </div>
@endsection
