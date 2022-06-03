@extends('layouts.main')<!--Говорим, какой лейаут использовать как базу для этой страницы-->
<!--Директива section с идентификатором, в случае совпадения этого идентификатора и требуемого, подставит содержимое в лейаут-->
@section('content')
    <div class="row justify-content-center">
        <form action="{{route('posts.store')}}" method="post" class="col-md-8">
            @csrf
            <div class="form-group">
                <label for="name">Заголовок поста</label>
                <input
                    value="{{old('title')}}"

                    name="title" type="string" class="form-control" id="title" placeholder="О чём пишем?">
                @error('title')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="content">Короткое описание поста</label>
                <textarea value="{{old('short_desc')}}" name="short_desc" class="form-control" id="short_desc" placeholder="Краткое описание"></textarea>
                @error('short_desc')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="content">Текст поста</label>
                <textarea value="{{old('desc')}}" name="desc" class="form-control" id="desc" placeholder="Текст новости"></textarea>
                @error('desc')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="content">Ссылка на изображение</label>
                <textarea value="{{old('image')}}" name="image" class="form-control" id="image" placeholder="Ссылку картинку вот сюда"></textarea>
                @error('image')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-danger" style="margin-top: 3rem; width: 10rem">Опубликовать</button>
        </form>
    </div>

@endsection
