<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="icon" href="{{ asset('img/car-front.svg') }}">

    <title><?=$title?></title>
</head>
<body>
<header>
    <div class="container">
        <div class="border-bottom pb-3 mb-3 d-flex justify-content-center flex-wrap py-3">
            <div class="d-flex flex-column mb-3 mb-md-0 me-md-auto">
                <div class="text-center">
                    <img src="{{ asset('img/car-front.svg') }}" alt="Логотип" width="50">
                </div>
                <span class="fs-4">Запчасти.ру</span>
            </div>

            <p class="mx-auto fs-2">Админ панель</p>

            <?php
                $currentUrl = request()->url();
            ?>

            <nav class="d-flex justify-content-end">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a href="{{ route('admin.main') }}" class="nav-link {{ $currentUrl === route('admin.main') ? 'link-light bg-dark' : 'link-dark' }}">Главная</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('categories.index') }}" class="nav-link {{ $currentUrl === route('categories.index') ? 'link-light bg-dark' : 'link-dark' }}">Категории</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('spare-parts.index') }}" class="nav-link {{ $currentUrl === route('spare-parts.index') ? 'link-light bg-dark' : 'link-dark' }}">Запчасти</a>
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
</body>
</html>
