<!doctype html>
<html lang="en">
<head>
    <link rel="manifest" href="/manifest.json">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="mobile-web-app-capable" content="yes">
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
    <script>
        if ('serviceWorker' in navigator) {
            navigator.serviceWorker.register('/service-worker.js').then(function(registration) {
                console.log('Service Worker registered with scope:', registration.scope);
            }).catch(function(error) {
                console.log('Service Worker registration failed:', error);
            });
        }
    </script>
</head>
<div>
    <header class="bg-primary text-white d-flex align-items-center justify-content-between px-2 py-2 mb-2 border-bottom flex-wrap" style="--bs-bg-opacity: .2;">
        <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
            <img src="https://cdn-icons-png.flaticon.com/512/1104/1104982.png" alt="Logo" class="logo-img">
            <span class="text-primary ms-2 header-title">
                <b>Реестр Минобрнауки</b>
            </span>
        </a>
        <nav class="d-flex">
            <ul class="nav nav-pills flex-row">
                <li class="nav-item"><a href="/" class="nav-link active text-white px-2 py-1">Главная</a></li>
                @auth("web")
                    <li class="nav-item"><a href="{{route('logout')}}" class="nav-link text-primary px-2 py-1">Выйти</a></li>
                @endauth
                @guest("web")
                    <li class="nav-item"><a href="{{route('login')}}" class="nav-link text-primary px-2 py-1">Войти</a></li>
                @endguest
            </ul>
        </nav>
    </header>
</div>

<style>
    /* Основной стиль для логотипа и текста */
    .logo-img {
        width: 40px;
        height: 40px;
    }
    .header-title {
        font-size: 1rem;
    }

    /* Адаптивные стили для ПК */
    @media (min-width: 768px) {
        .logo-img {
            width: 50px;
            height: 50px;
        }
        .header-title {
            font-size: 1.2rem;
        }
    }
</style>


@yield('content')
</html>
