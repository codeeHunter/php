@extends('layouts.app')
@section('content')
    <div class="row bg-primary-subtle">
        <form action="{{ route('user.store') }}" method="POST">
            @csrf
            <div class="col">
                <input type="text" class="form-control" name="fio" placeholder="Fio" aria-label="Fio">
                <input type="email" class="form-control" name="email" placeholder="Email" aria-label="ivanov@mail.ru">
                <input type="password" class="form-control" name="password" placeholder="Password" aria-label="Last name">
            </div>
            <div class="col">
                <input type="text" class="form-control" name="phone" placeholder="8 (666) 666-55-44"
                    aria-label="8 (666) 666-55-44">
            </div>
            <div class="col">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>
@endsection
