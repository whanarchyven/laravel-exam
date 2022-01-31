@extends('layouts.main')<!--Говорим, какой лейаут использовать как базу для этой страницы-->
<!--Директива section с идентификатором, в случае совпадения этого идентификатора и требуемого, подставит содержимое в лейаут-->
@section('content')
    <div class="row justify-content-center">
        <form action="{{route('places.store')}}" method="post" class="col-md-8">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input
                    value="{{old('name')}}"

                    name="name" type="text" class="form-control" id="name" placeholder="title">
                @error('name')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="content">Description</label>
                <textarea value="{{old('description')}}" name="description" class="form-control" id="content" placeholder="Description"></textarea>
                @error('description')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-check" style="margin-bottom: 20px">
                <input class="form-check-input" type="checkbox" value="1"
                       id="flexCheckDefault1" name="is_repair">
                <label class="form-check-label" for="flexCheckDefault1">
                    Is a special place? repair ex.
                </label>
            </div>
            <div class="form-check" style="margin-bottom: 20px">
                <input class="form-check-input" type="checkbox"value="1"
                       id="flexCheckDefault2" name="is_working">
                <label class="form-check-label" for="flexCheckDefault2">
                    Are actually in work?
                </label>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>

@endsection
