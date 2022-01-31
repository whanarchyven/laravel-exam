@extends('layouts.main')<!--Говорим, какой лейаут использовать как базу для этой страницы-->
<!--Директива section с идентификатором, в случае совпадения этого идентификатора и требуемого, подставит содержимое в лейаут-->
@section('content')
    <form action="{{route('things.update',$thing->id)}}" method="post">
        @csrf
        @method('patch')
        <div class="form-group">
            <label for="name">Название вещи</label>
            <input name="name" type="text" class="form-control" id="name" placeholder="name" value="{{$thing->name}}">
        </div>
        <div class="form-group">
            <label for="content">Описание</label>
            <textarea name="description" class="form-control" id="description"
                      placeholder="Content">{{$thing->description}}</textarea>
        </div>
        <div class="form-group">
            <label for="wrnt">Гарантия (нед.)</label>
            <input name="wrnt" class="form-control" id="wrnt" placeholder="Wrnt" value="{{$thing->wrnt}}" type="number">
        </div>
        <input type="hidden" name="master_id" value="{{\Illuminate\Support\Facades\Auth::user()->id}}">

        <div class="form-group" style="margin-top: 20px; margin-bottom: 20px">
            <h3 class="h3">Изменить расположение</h3>
            <select class="form-select" aria-label="Default select example" name="place_id">
                @foreach($places as $place)
                    @if($place_id==$place->id)
                        <option value="{{$place->id}}" selected>{{$place->name}}</option>
                    @else
                        <option value="{{$place->id}}">{{$place->name}}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
