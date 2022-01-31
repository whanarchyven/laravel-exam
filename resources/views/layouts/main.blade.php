<!doctype html>
<!--Эта страница- лейаут, она автоматически подставит своё содержимое с помощью extends на все страницы, где он есть-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>Document</title>
</head>
<body>
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">{{auth()->user()->name}}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('main')}}">Main</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('things.create')}}">Create thing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('places.create')}}">Create place</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('mythings')}}">My Things</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')<!--Поле, куда воткнуть section с идентификатором content-->
</div>
</body>
</html>
