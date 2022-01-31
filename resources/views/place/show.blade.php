@extends('layouts.main')<!--Говорим, какой лейаут использовать как базу для этой страницы-->
<!--Директива section с идентификатором, в случае совпадения этого идентификатора и требуемого, подставит содержимое в лейаут-->
@section('content')
    <div>
        <h1>{{$place->name}}</h1>
        <text>{{$place->description}}</text>
    </div>
    <div style="margin-bottom: 20px;margin-top: 20px;">
        <button type="button" class="btn btn-secondary" onclick="window.location.href = '{{route('main')}}';">Назад</button>
    </div>
    <div style="margin-bottom: 20px;margin-top: 20px;">
        <form action="{{route('places.destroy',$place->id)}}" method="post">
            @csrf
            @method('delete')
            <input type="submit" class="btn btn-danger" value="Удалить">
        </form></div>
    <div>
        <button type="button" class="btn btn-primary" onclick="window.location.href = '{{route('places.edit',$place->id)}}';">Редактировать пост</button>
    </div>

@endsection
