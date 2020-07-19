<div class="row-flex">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbar-example" aria-controls="navbar-example"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-example">
            <div class="navbar-header">
                {{--            <div class="collapse navbar-collapse" id="navbar-menu">--}}
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active"><a class="nav-link" href="{{route('home')}}">Главная</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                           role="button" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false">
                            Новости
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach($categories as $cat)
                            <a class="dropdown-item" href="{{route('categoryId', ['category' => $cat ]) }}"> {{$cat->name}}</a>
                            @endforeach
                        </div>
                     </li>
                    @if(isset(auth()->user()->is_admin) &&  auth()->user()->is_admin === true)
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                           role="button" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false">
                            Админка
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item"  href="{{ route('user.index') }}">Пользователи</a>
                                <a class="dropdown-item"  href="{{ route('category.index') }}">Категории</a>
                                <a class="dropdown-item"  href="{!! route('news.create') !!}">Добавить новость</a>
                        </div>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</nav>
</div>
{{--</div>--}}
