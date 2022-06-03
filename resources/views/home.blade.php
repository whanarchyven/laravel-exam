@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Авторизация') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Теперь вы можете войти на сайт') }}
                    <div class="btn btn-success" style="display: flex;margin-top: 10px"><a class="text-white"  href="{{route('main')}}">Войти в Метро Москвы!</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
