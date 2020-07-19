@extends('layouts.app')
@section('content')
    @forelse ($allCategories as $n)
    <a href="{{route('category.edit', ['category' => $n ]) }}">
        <h3>{{$n->id}} -  {{$n->name}}</h3>
    </a>
    @empty
        Пусто
    @endforelse
<br>
    <a href="{{ route('category.create') }}">Добавить категорию</a>

@stop

