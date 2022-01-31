@extends('layouts.main')<!--Говорим, какой лейаут использовать как базу для этой страницы-->
<!--Директива section с идентификатором, в случае совпадения этого идентификатора и требуемого, подставит содержимое в лейаут-->
@section('content')
    <form action="{{route('places.update',$place->id)}}" method="post">
        @csrf
        @method('patch')
        <div class="form-group">
            <label for="name">Title</label>
            <input name="name" type="text" class="form-control" id="name" placeholder="name" value="{{$place->name}}">
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="description" class="form-control" id="description"
                      placeholder="Content">{{$place->description}}</textarea>
        </div>
        @if($place->is_repair==1)
            <div class="form-check" style="margin-bottom: 20px">
                <input class="form-check-input" type="checkbox" value="1"
                       id="flexCheckDefault1" name="is_repair" checked>
                <label class="form-check-label" for="flexCheckDefault1">
                    Is a special place? repair ex.
                </label>
            </div>
        @else
            <div class="form-check" style="margin-bottom: 20px">
                <input class="form-check-input" type="checkbox" value="1"
                       id="flexCheckDefault1" name="is_repair">
                <label class="form-check-label" for="flexCheckDefault1">
                    Is a special place? repair ex.
                </label>
            </div>
        @endif
        @if($place->is_working==1)
            <div class="form-check" style="margin-bottom: 20px">
                <input class="form-check-input" type="checkbox" value="1"
                       id="flexCheckDefault2" name="is_working" checked>
                <label class="form-check-label" for="flexCheckDefault2">
                    Are actually in work?
                </label>
            </div>
        @else
            <div class="form-check" style="margin-bottom: 20px">
                <input class="form-check-input" type="checkbox" value="1"
                       id="flexCheckDefault2" name="is_working" checked>
                <label class="form-check-label" for="flexCheckDefault2">
                    Are actually in work?
                </label>
            </div>
        @endif
        {{--        <div class="form-group" style="margin-top: 20px; margin-bottom: 20px">--}}
        {{--            <select class="form-select" aria-label="Default select example" name="category_id">--}}
        {{--                @foreach($categories as $category)--}}
        {{--                    @if($place->category_id==$category->id)--}}
        {{--                        <option value="{{$category->id}}" selected>{{$category->title}}</option>--}}
        {{--                    @else--}}
        {{--                        <option value="{{$category->id}}">{{$category->title}}</option>--}}
        {{--                    @endif--}}
        {{--                @endforeach--}}
        {{--            </select>--}}
        {{--        </div>--}}
        {{--        @foreach($tags as $tag)--}}
        {{--            <div class="form-check" style="margin-bottom: 20px">--}}
        {{--                <input class="form-check-input{{$tag->id}}" type="checkbox" value="{{$tag->id}}"--}}
        {{--                       id="flexCheckDefault{{$tag->id}}" name="tags[]"--}}
        {{--                @foreach($place->tags as $item)--}}
        {{--                    {{$tag->id==$item->id?' checked':''}}--}}
        {{--                    @endforeach>--}}
        {{--                <label class="form-check-label{{$tag->id}}" for="flexCheckDefault{{$tag->id}}">{{$tag->title}}--}}
        {{--                </label>--}}
        {{--            </div>--}}
        {{--        @endforeach--}}
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
