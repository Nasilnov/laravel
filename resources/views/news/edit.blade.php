@extends('layouts.app')
@section('content')
    Редактирование новости c id - {{$news->id}}
@if(session()->has('message'))
    <h3 style="color: red;">{{ session()->get('message') }}</h3>
@endif

<form action="{{ route('news.update',['news'=> $news]) }}" method="post">
    @method('PUT')
    @csrf
    <label for="title">Заголовок</label>
    <input type="text" name="title" value="{{$news->title}}" class="form-control">
    @if($errors->has('title'))
        <div class="alert alert-danger">
            @foreach($errors->get('title') as $error)
                <p style="margin-bottom: 0;">{{ $error }}</p>
            @endforeach
        </div>
    @endif
    <label for="description">Описание</label>
    <input type="text" name="description" value="{{$news->description}}" class="form-control">
    @if($errors->has('description'))
        <div class="alert alert-danger">
            @foreach($errors->get('description') as $error)
                <p style="margin-bottom: 0;">{{ $error }}</p>
            @endforeach
        </div>
    @endif
    <label for="text">Содержание</label>
    <textarea name="text" cols="50" rows="10" class="form-control" id="editor" >{{$news->text}}</textarea>
    @if($errors->has('text'))
        <div class="alert alert-danger">
            @foreach($errors->get('text') as $error)
                <p style="margin-bottom: 0;">{{ $error }}</p>
            @endforeach
        </div>
    @endif
    <p>Отметь нужную категорию:</p>
    @foreach($allCategories as $cat)
        {{$cat->name}}   <input type="checkbox"
                                name="category_id_m[]"
                                value="{{$cat->id}}"
                                @foreach ($news->categories()->get() as $attr)
                                @if ($attr->id == $cat->id)
                                    checked
                                @endif
                                @endforeach
        ><br>
    @endforeach
    @if($errors->has('category_id_m'))
        <div class="alert alert-danger">
            @foreach($errors->get('category_id_m') as $error)
                <p style="margin-bottom: 0;">{{ $error }}</p>
            @endforeach
        </div>
    @endif
    <button type="submit" class="btn btn-success">Жми!</button>
</form>
@stop
@push('js')
        <script src="https://cdn.ckeditor.com/ckeditor5/20.0.0/classic/ckeditor.js"></script>
{{--    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>--}}
        <script>
            ClassicEditor
                .create( document.querySelector( '#editor' ), {
                    image: {
                        uploadUrl: {
                            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
                            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
                        }
                    },
                    heading: {
                        options: [
                            { model: 'paragraph', title: 'Параграф', class: 'ck-heading_paragraph' },
                            { model: 'heading1', view: 'h1', title: 'Заголовок 1', class: 'ck-heading_heading1' },
                            { model: 'heading2', view: 'h2', title: 'Заголовок 2', class: 'ck-heading_heading2' },
                            { model: 'heading3', view: 'h3', title: 'Заголовок 3', class: 'ck-heading_heading3' },
                            { model: 'heading4', view: 'h4', title: 'Заголовок 4', class: 'ck-heading_heading4' },
                            { model: 'heading5', view: 'h5', title: 'Заголовок 5', class: 'ck-heading_heading5' },
                            { model: 'heading6', view: 'h6', title: 'Заголовок 6', class: 'ck-heading_heading6' },
                        ]
                    }
                })
                .catch( error => {
                    console.log( error );
                });
        </script>
@endpush
