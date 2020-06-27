@foreach($news as $n)
    @if( $n['category_id'] == $id)
        <a href="/news/{{$n['id']}}">
            <h1>{{$n['id']}} -  {{$n['title']}}</h1>
        </a>
    @endif
@endforeach
<a href="/news/add?category_id={{$id}}">Добавить новость</a>
