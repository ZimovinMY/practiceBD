<!doctype html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
          crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@6.x/css/materialdesignicons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
    <meta name="csrf-token" content="<?php echo csrf_token(); ?>">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
</head>
<div>
    <header class="bg-primary text-white d-flex flex-wrap justify-content-center py-2 mb-2 border-bottom" style="--bs-bg-opacity: .2; padding-left: 100px; padding-right: 50px">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none" style="margin-left: 405px">
            <img width="55" height="55" src="https://cdn-icons-png.flaticon.com/512/1104/1104982.png">
            <span class="text-primary" style="padding-left: 10px" class="fs-4"><center><b>
                "Разработка программных средств для работы с реестром организаций,<br>
                задействованных в бюджетных процессах Минобрнауки"
            </b></center></span>
        </a>
        <ul class="nav nav-pills mt-2">
            <li class="nav-item"><a href="/" class="nav-link active text-white" aria-current="page">На главную</a></li>
            @auth("web")
                <li class="nav-item"><a href="{{route("logout")}}" class="nav-link">Выйти</a></li>
            @endauth
            @guest("web")
                <li class="nav-item"><a href="{{route("login")}}" class="nav-link">Войти</a></li>
            @endauth
        </ul>
    </header>
</div>
@yield('content')
</html>
