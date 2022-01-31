@extends('layouts.main')<!--Говорим, какой лейаут использовать как базу для этой страницы-->
<!--Директива section с идентификатором, в случае совпадения этого идентификатора и требуемого, подставит содержимое в лейаут-->
@section('content')
    <div class="row justify-content-center">
        <form action="{{route('things.store')}}" method="post" class="col-md-8">
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
                <textarea value="{{old('description')}}" name="description" class="form-control" id="content"
                          placeholder="Description"></textarea>
                @error('description')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="wrnt">Wrnt</label>
                <input name="wrnt" class="form-control" id="wrnt" placeholder="Wrnt" type="number">
            </div>
            <input type="hidden" name="master_id" value="{{\Illuminate\Support\Facades\Auth::user()->id}}">
            <div class="form-group" style="margin-top: 20px;margin-bottom: 20px">
                <select value="{{old('place_id')}}" class="form-select" aria-label="Default select example"
                        name="place_id">
                    <option disabled selected>Place for storage</option>
                    @foreach($places as $place)
                        <option value="{{$place->id}}">{{$place->name}}</option>
                    @endforeach
                </select>
                @error('place_id')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>

@endsection
