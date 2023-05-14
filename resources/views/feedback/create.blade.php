@extends('layouts.app')
@section('style')
    <style>
        #city-list {
            position: absolute;
            top: 100%;
            left: 0;
            z-index: 1000;
            display: flex;
            flex-direction: column;
            background-color: #fff;
            border: 1px solid rgba(0, 0, 0, 0.15);
            border-radius: 0.25rem;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            max-height: 300px;
            overflow-y: auto;
        }

        .autocomplete-item {
            padding: 0.5rem;
            cursor: pointer;
            white-space: nowrap;
        }

        .autocomplete-item:hover {
            background-color: #f5f5f5;
        }
    </style>
@endsection
@section('content')
    <div class="my-3 text-center">
        <h2>Создать отзыв</h2>
    </div>

    <div class="d-flex justify-content-center">
        <div class="bg-primary-subtle p-3" style="border: 2px solid rgb(134, 134, 134); border-radius: 7px; width: 80vw">
            <form action="{{ route('feedback.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Название:</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Введите название"
                        maxlength="100" required>
                    <div class="invalid-feedback">
                        Название должно содержать от 1 до 100 символов.
                    </div>
                </div>
                <div class="form-group">
                    <label for="text">Место для отзыва:</label>
                    <textarea class="form-control" name="text" id="text" rows="5" placeholder="Введите отзыв" maxlength="255"
                        required></textarea>
                    <div class="invalid-feedback">
                        Текст отзыва должен содержать от 1 до 255 символов.
                    </div>
                </div>
                <div class="form-group">
                    <label for="rating">Рейтинг:</label>
                    <input type="number" class="form-control" name="rating" id="rating" placeholder="Введите рейтинг"
                        min="1" max="5" required>
                    <div class="invalid-feedback">
                        Рейтинг должен быть от 1 до 5.
                    </div>
                </div>
                <div class="form-group">
                    <label for="img">Загрузите ваше фото:</label>
                </div>
                <input type="file" class="form-control-file" name="img" id="img">

                <div class="form-group">
                    <label for="city">Город:</label>
                    <input type="text" class="form-control" name="city" id="cities" placeholder="Напишите город"
                        autocomplete="off" required>
                    <div id="cityList"></div>
                </div>
                <div class="col my-3">
                    @if (auth()->check())
                        <button type="submit" class="btn btn-primary">Создать</button>
                    @else
                        <a class="btn btn-primary" href="{{ route('login') }}">Авторизуйтесь</a>
                    @endif
                </div>
            </form>
        </div>
    </div>

    <script>
        (function() {
            'use strict';

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation');

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms).forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }

                    form.classList.add('was-validated');
                }, false);
            });
        })();

        window.addEventListener('DOMContentLoaded', function() {
            var input = document.getElementById('cities');
            var cities = {!! json_encode($cities->pluck('name')) !!};

            // Создаем автокомплит
            input.addEventListener('input', function() {
                var val = this.value.toLowerCase();
                var matches = cities.filter(function(city) {
                    return city.toLowerCase().startsWith(val);
                });
                updateAutocomplete(matches);
            });

            // Обновляем список автокомплита
            function updateAutocomplete(matches) {
                var list = document.getElementById('cityList');
                list.innerHTML = '';

                // Создаем элементы списка
                if (matches.length > 0) {
                    for (var i = 0; i < matches.length; i++) {
                        var item = document.createElement('div');
                        item.classList.add('autocomplete-item');
                        item.innerText = matches[i];
                        item.addEventListener('click', function() {
                            input.value = this.innerText;
                            list.innerHTML = '';
                        });
                        list.appendChild(item);
                    }
                } else {
                    var item = document.createElement('div');
                    item.classList.add('autocomplete-item');
                    item.innerText = 'Ничего не найдено';
                    list.appendChild(item);
                }
            }

            // Скрываем список при потере фокуса
            input.addEventListener('blur', function() {
                setTimeout(function() {
                    var list = document.getElementById('city-list');
                    list.innerHTML = '';
                }, 100);
            });
        });
    </script>
@endsection
