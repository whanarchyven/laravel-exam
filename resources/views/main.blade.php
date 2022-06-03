@extends('layouts.main')<!--Говорим, какой лейаут использовать как базу для этой страницы-->
<!--Директива section с идентификатором, в случае совпадения этого идентификатора и требуемого, подставит содержимое в лейаут-->
@section('content')
    <div>
        <h1 class="h-25" style="margin-top:2rem">Новости: </h1>
        <div class="row mb-2">
            @foreach($posts as $post)
{{--                <div class="card" style="width: 18rem;margin-right: 30px;flex: 0 0 100%; margin-top: 30px">--}}
{{--                    <div class="card-body">--}}
{{--                        <h5 class="card-title">{{$post->title}}</h5>--}}
{{--                        <p class="card-text">{{$post->short_desc}}</p>--}}
{{--                        <a href="{{route('posts.show',$post->id)}}" class="card-link">Читать подробнее</a>--}}
{{--                    </div>--}}
{{--                    <div class="card"></div>--}}
{{--                </div>--}}
                <div class="col-md-6">
                    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative border-3 border-danger">
                        <div class="col p-4 d-flex flex-column position-static">
                            <h3 class="mb-0">{{$post->title}}</h3>
                            <div class="mb-1 text-muted">{{$post->created_at}}</div>
                            <p class="card-text mb-auto">{{$post->short_desc}}</p>
                            <a href="{{route('posts.show',$post->id)}}" class="stretched-link">Читать полностью</a>
                        </div>
                        <div class="col-auto d-none d-lg-block" style="background: url('{{$post->image}}');background-size: cover">
{{--                            <img src="{{$post->image}}" class="bd-placeholder-img" style="width: 200px; height: 150px; object-fit: cover">--}}
                            <div style="width: 200px; height: 100px"></div>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>

    </div>
@endsection
