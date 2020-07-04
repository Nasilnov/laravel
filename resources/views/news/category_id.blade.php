@extends('layouts.app')
@section('content')
{{--    {{dd($news)}}--}}
    @forelse ($news as $key => $n)
    @if( $n['category_id'] == $id)
        <a href="{{ route('newsId', ['id' => $key])}}">
            <h3>{{$key}} -  {{$n['title']}}</h3>
            <p>{!! $n['description'] !!}</p>
        </a>
    @endif
    @empty
        Пусто
    @endforelse
    <a href="{{route('newsAdd', ['id' => $id])}}">Добавить новость</a>
@stop
