@extends('layouts.main')<!--Говорим, какой лейаут использовать как базу для этой страницы-->
<!--Директива section с идентификатором, в случае совпадения этого идентификатора и требуемого, подставит содержимое в лейаут-->
@section('content')
    <div>
        <h1 class="h-25">Мои вещи: </h1>
        <div style="display: flex; flex-wrap: wrap; padding: 30px;border: 2px solid green; border-radius: 15px;margin-bottom: 30px">
            @foreach($my_things as $thing)
                <div class="card" style="width: 18rem;margin-right: 30px;flex: 0 0 30%; margin-top: 30px">
                    <div class="card-body">
                        <h5 class="card-title">{{$thing->name}}</h5>
                        <p class="card-text">{{$thing->description}}</p>
                        <a href="{{route('mythings.show',$thing->id)}}" class="card-link">Read More</a>
                    </div>
                </div>

            @endforeach
        </div>
    </div>
@endsection
