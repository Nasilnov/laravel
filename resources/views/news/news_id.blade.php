@extends('layouts.app')
@section('content')
    id новости - {{$id}}
    <h2>{!! $news['title'] !!}</h2>
    <p>{!! $news['text'] !!}</p>
    <p><a href="{{ route('newsEdit', ['id' => $id ]) }}">Редактировать новость</a></p>
@stop
