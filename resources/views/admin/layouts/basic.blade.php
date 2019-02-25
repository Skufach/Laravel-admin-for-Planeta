<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

<div class="container">

    <ul class="nav justify-content-center my-4">
        <li class="nav-item">
            <a class="nav-link" href="{{URL::to('AdminPanel/posts')}}">Главная</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{URL::to('AdminPanel/categories')}}">Категории</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{URL::to('AdminPanel/countries')}}">Страны</a>
        </li>
    </ul>

    @yield('content')


</div>

</body>
</html>