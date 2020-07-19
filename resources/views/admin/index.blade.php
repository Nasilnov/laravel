@extends('layouts.app')
@section('content')

    <a href="{!! route('news.create') !!}">Добавить новость</a><br>
    <a href="{!! route('category.create') !!}">Добавить категорию новостей</a><br>
<a href="{{ route('account') }}">В ичный кабинет</a>
@stop
