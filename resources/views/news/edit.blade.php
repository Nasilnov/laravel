@extends('layouts.app')
@section('content')

    Редактирование новости c id - {{$id}}
    @isset($save)
        <p>Новость успешно сохранена</p>
    @endisset

<form action="{{ route('updateNews') }}" method="post">
    @csrf
    <input type="text" style="display: none" value="{{$id}}" name="id">
    <label for="title">Заголовок</label>
    <input type="text" name="title" value="{{$news->title}}" class="form-control">
    <label for="description">Описание</label>
    <input type="text" name="description" value="{{$news->description}}" class="form-control">
    <label for="text">Содержание</label>
    <textarea name="text" cols="50" rows="10" class="form-control">{{$news->text}}</textarea>
    <button type="submit" class="btn btn-success">Жми!</button>
</form>
@stop
