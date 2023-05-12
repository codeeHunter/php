@extends('layouts.app')
@section('content')
    <div class="row bg-primary-subtle">
        <form action="{{ route('feedback.store') }}" method="POST">
            @csrf
            <div class="col">
                <input type="text" class="form-control" name="title" placeholder="Название" aria-label="Название">
                <textarea type="email" class="form-control" name="text" placeholder="Место для отзыва"
                    aria-label="Место для отзыва"></textarea>
                <input type="number" class="form-control" name="rating" placeholder="Рейтинг" aria-label="Рейтинг">
                <input type="form" class="form-control" name="img" placeholder="Картинка" aria-label="Картинка">
                <input type="text"class="form-control" name="city" placeholder="Выберите город">
            </div>

            <div class="col my-16">
                <button type="submit" class="btn btn-primary">Создать отзыв</button>
            </div>
        </form>
    </div>
@endsection
