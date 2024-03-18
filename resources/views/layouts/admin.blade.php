<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="icon" href="/img/car-front.svg">

    <title><?=$title?></title>
</head>
<body>
<header>
    <div class="container">
        <div class="border-bottom pb-3 mb-3 d-flex justify-content-center flex-wrap py-3">
            <div class="d-flex align-items-center mb-3 mb-md-0 me-md-auto">
                <img src="/img/car-front.svg" alt="Логотип" width="70">
            </div>

            <p class="mx-auto fs-2">Админ панель</p>

            <nav class="d-flex justify-content-end">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a href="{{ route('admin.main') }}" class="nav-link link-dark">Главная</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('categories.index') }}" class="nav-link link-dark">Категории</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link link-dark">Запчасти</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('main') }}" class="nav-link link-dark">В магазин</a>
                    </li>

                    <div class="dropdown">
                        <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Здравствуйте, {{ auth()->user()->name }}!
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Профиль</a></li>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        this.closest('form').submit();">Выйти</a></li>
                            </form>
                        </ul>
                    </div>
                </ul>
            </nav>
        </div>
    </div>
</header>

<main>
    <div class="container">
        @yield('content')
    </div>
</main>

<script src="{{ asset('/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('/js/admin.js') }}"></script>
</body>
</html>
