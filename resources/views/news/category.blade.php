@extends('layouts.app')
@section('content')
    @forelse ($category as $n)
    <a href="{{route('categoryId', ['category' => $n ]) }}">
        <h3>{{$n->id}} -  {{$n->name}}</h3>
    </a>
    @empty
        Пусто
    @endforelse

    <nav class="blog-pagination">
        <a class="btn btn-outline-primary" href="#">Older</a>
        <a class="btn btn-outline-secondary disabled" href="#" tabindex="-1" aria-disabled="true">Newer</a>
    </nav>
@stop

