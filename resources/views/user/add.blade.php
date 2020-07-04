@extends('layouts.app')
@section('content')

    <h2>Форма добавления пользователя</h2>
    <form action="{{route('saveUser')}}" method="post">
        @csrf
        <label for="login">Логин</label>
        <input type="text" name="login" class="form-control" placeholder="Введите логин">
        <label for="name">Имя</label>
        <input type="text" name="name" class="form-control" placeholder="Введите ваше имя">
        <label for="password">Пароль</label>
        <input type="text" name="password" class="form-control" placeholder="Введите пароль">
        <label for="email">Email</label>
        <input type="text" name="email" class="form-control" placeholder="Введите email">
        <label for="phone">Телефон</label>
        <input type="text" name="phone" class="form-control" placeholder="Введите телефон">
{{--        <label for="mem">Запомнить меня</label>--}}
{{--        <input type="checkbox" name="mem">--}}
        <button type="submit" class="btn btn-success">Жми!</button>
    </form>
@stop
