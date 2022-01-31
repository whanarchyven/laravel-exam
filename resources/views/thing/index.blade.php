@extends('layouts.main')<!--Говорим, какой лейаут использовать как базу для этой страницы-->
<!--Директива section с идентификатором, в случае совпадения этого идентификатора и требуемого, подставит содержимое в лейаут-->
@section('content')
    <div>
        @foreach($things as $item)
            <div><a href="{{route('things.show',$item->id)}}"> {{$item->id}}. {{$item->name}}</a></div>
        @endforeach
    </div>
@endsection
