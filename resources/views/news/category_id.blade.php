@extends('layouts.app')
@section('content')
    @forelse ($news as $n)

        <a href="{{ route('newsId', ['news' => $n])}}">
            <h3>{{$n->id}} -  {{$n->title}}</h3>
            <p>{!! $n->description !!}</p>
            <p>
                @if(!is_null($n->updated_at))
                    {{$n->updated_at->format('d-m-Y H:i')}}
                    @else
                    {{$n->created_at->format('d-m-Y H:i')}}
                    @endif
            </p>
        </a>

    @empty
        Пусто
    @endforelse
    <a href="{{route('newsAdd', ['id' => $id])}}">Добавить новость</a>

    <nav class="block-pagination">
        {!! $news->links() !!}
    </nav>

@stop

