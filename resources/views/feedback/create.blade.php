@extends('layouts.app')
@section('content')
    <div class="my-3 text-center" >
        <h2>Создать отзыв</h2>
    </div>
    <div class="d-flex justify-content-center">
        <div class="bg-primary-subtle p-3" style="border: 2px solid rgb(134, 134, 134); border-radius: 7px; width: 80vw">
            <form action="{{ route('feedback.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col my-2">
                    <input type="text" class="form-control my-3" name="title" placeholder="Название"
                        aria-label="Название">
                    <textarea type="email" class="form-control my-3" name="text" placeholder="Место для отзыва"
                        aria-label="Место для отзыва"></textarea>
                    <input type="number" class="form-control my-3" name="rating" placeholder="Рейтинг"
                        aria-label="Рейтинг">
                    <input type="file" class="form-control my-3" name="img" placeholder="Загрузите ваше фото">
                    <input type="text"class="form-control my-3" name="city" placeholder="Напишите город">
                </div>

                <div class="col">
                    <button type="submit" class="btn btn-primary">Создать</button>
                </div>
            </form>
        </div>
    </div>
@endsection
