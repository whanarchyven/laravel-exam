@extends('layouts.main')<!--Говорим, какой лейаут использовать как базу для этой страницы-->
<!--Директива section с идентификатором, в случае совпадения этого идентификатора и требуемого, подставит содержимое в лейаут-->
@section('content')
    <form action="{{route('mythings.update',$thing->id)}}" method="post">
        @csrf
        @method('patch')
        <div class="form-group" style="margin-top: 20px; margin-bottom: 20px">
            <h3 class="h3">Отдать пользователю</h3>
            <select class="form-select" aria-label="Default select example" name="user_id">
                @foreach($users as $user)
                    <option value="{{$user->id}}" selected>{{$user->name}}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
