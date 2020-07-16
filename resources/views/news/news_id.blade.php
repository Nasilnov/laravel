@extends('layouts.app')
@section('content')
{{--    @dd($news->categories()->get())--}}
{{--    id новости - {{$id}}--}}
    <h2>{!! $news->title !!}</h2>
    <p>{!! $news->text !!}</p>
    <p><a href="{{ route('news.edit', ['news' => $news ]) }}">Редактировать новость</a></p>
<p>категории новостей:</p>
@foreach($news->categories()->get() as $cat )
    {{$cat->name}},
@endforeach


<form action="{{ route('news.destroy', ['news' => $news ]) }}" method="POST">
    {{ method_field('DELETE') }}
    {{ csrf_field() }}
    <button>Удалить новость</button>
</form>
@stop
