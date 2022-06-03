<!doctype html>
<!--Эта страница- лейаут, она автоматически подставит своё содержимое с помощью extends на все страницы, где он есть-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>MOSCOW METRO</title>
</head>
<body>
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <div style="display: flex; justify-content: space-between; width: 100%">
                <a href="{{route('main')}}"><img src="http://v98771lj.beget.tech/metro.svg" style="width: 300px;display: inline-block;" class="logo"></a>
                <div style="display: inline-flex; align-items: center; width: fit-content">
                    <a class="navbar-brand" href="/" style="margin-right: 2rem">Вы вошли как: {{auth()->user()->name}}</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('main')}}">Главная</a>
                            </li>
                            @if(auth()->user()->id==1)
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('posts.create')}}">Новый пост</a>
                            </li>
                            @endif
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('posts.about')}}">Пресс-служба</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('posts.feedback')}}">Обратная связь</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </nav>
    @yield('content')<!--Поле, куда воткнуть section с идентификатором content-->
</div>
</body>
</html>
