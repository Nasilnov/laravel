@extends('layouts.app')
@section('content')
{{--    @dd($news);--}}
    @forelse ($news as $n)

        <a href="{{ route('newsId', ['news' => $n])}}">
            <h3>{{$n->id}} -  {{$n->title}}</h3>
            <p>{!! $n->description !!}</p>
{{--            <p>--}}
{{--                @if(!is_null($n->updated_at))--}}
{{--                    {{$n->updated_at->format('d-m-Y H:i')}}--}}
{{--                    @else--}}
{{--                    {{$n->created_at->format('d-m-Y H:i')}}--}}
{{--                    @endif--}}
{{--            </p>--}}
        </a>

    @empty
        Пусто
    @endforelse
@if(isset(auth()->user()->is_admin) &&  auth()->user()->is_admin === true)
    <a href="{{route('news.create', ['id' => $id])}}">Добавить новость</a>
@endif

    <nav class="block-pagination">
        {!! $news->links() !!}
    </nav>

@stop

