@extends('layouts.main')<!--Говорим, какой лейаут использовать как базу для этой страницы-->
<!--Директива section с идентификатором, в случае совпадения этого идентификатора и требуемого, подставит содержимое в лейаут-->
@section('content')
    <div>
        <img src="{{$post->image}}" style="width: 600px; height: 300px; object-fit: cover">
        <h1>{{$post->title}}</h1>
        <p>{{$post->short_desc}}</p>
        <p>{{$post->created_at}} <span style="margin-left: 20px">👁 {{$views}}</span></p>
        <text style="font-size: 20px">{{$post->desc}}</text>
    </div>
    <div style="margin-bottom: 20px;margin-top: 20px;">
        <button type="button" class="btn btn-secondary" onclick="window.location.href = '{{route('main')}}';">Назад</button>
    </div>
    @if(auth()->user()->id==1)
    <div style="margin-bottom: 20px;margin-top: 20px;">
        <form action="{{route('posts.destroy',$post->id)}}" method="post">
            @csrf
            @method('delete')
            <input type="submit" class="btn btn-danger" value="Удалить">
        </form></div>
    <div>
        <button type="button" class="btn btn-primary" onclick="window.location.href = '{{route('posts.edit',$post->id)}}';">Редактировать пост</button>
    </div>
    @else
        @if($is_liked==0)
            <form action="{{route('like.set')}}" method="post">
                @csrf
                <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                <input type="hidden" name="post_id" value="{{$post->id}}">
                <button type="submit" class="btn border-danger" value="Удалить">❤ {{$likes_count}}</button>
            </form>
        @else
            <form action="{{route('like.remove')}}" method="post">
                @csrf
                <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                <input type="hidden" name="post_id" value="{{$post->id}}">
                <button type="submit" class="btn btn-danger " value="Удалить">❤ {{$likes_count}}</button>
            </form>
        @endif
    @endif


@endsection
