@extends('layouts.app')
@section('content')
    <h3>Категория новостей - {{$name}}</h3><br>

<form action="#" method="post">
    @csrf
    <label for="title">Заголовок</label>
    <input type="text" name="title"><br><br>
    <label for="description">Описание</label>
    <input type="text" name="description"><br><br>
    <label for="text">Содержание</label>
    <textarea name="text" cols="50" rows="20"></textarea><br>
    <input type="submit" value="жми!">
</form>
@stop
