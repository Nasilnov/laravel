@foreach($category as $n)
    <a href="/news/category/{{$n['id']}}">
        <h1>{{$n['id']}} -  {{$n['name']}}</h1>
    </a>
@endforeach
