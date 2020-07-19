@extends('layouts.app')
@section('content')
{{--    @dd($news->categories()->get())--}}
{{--    id новости - {{$id}}--}}
    <h2>{!! $news->title !!}</h2>
    <p>{!! $news->text !!}</p>
<p>категории новостей:</p>
@foreach($news->categories()->get() as $cat )
    {{$cat->name}},
@endforeach

@if(isset(auth()->user()->is_admin) &&  auth()->user()->is_admin === true)
    <p><a href="{{ route('news.edit', ['news' => $news ]) }}">Редактировать новость</a></p>


    <form action="{{ route('news.destroy', ['news' => $news ]) }}" method="POST">
    {{ method_field('DELETE') }}
    {{ csrf_field() }}
    <button>Удалить новость</button>
</form>
@endif
@stop
