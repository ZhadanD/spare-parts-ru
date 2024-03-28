<?php
$title = 'Главная страница';
?>
@extends('layouts.client')
@section('content')
    <div class="container">
        <div class="px-4 py-5 my-5 text-center">
            <img class="d-block mx-auto mb-4" src="{{ asset('img/car-front.svg') }}" alt="Логотип сайта" width="100">
            <h1 class="display-5 fw-bold text-body-emphasis">Интернет магазин "Запчасти.ру"</h1>
            <div class="col-lg-6 mx-auto">
                <p class="lead mb-4 fs-3">У нас в магазине вы можете купить любую запчасть, выложенную на этом сайте.</p>
                <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                    <a href="{{ route('client.categories.index') }}" class="btn btn-dark btn-lg px-4 gap-3">Начать ознакомление</a>
                </div>
            </div>
        </div>

        <div id="company" class="border border-dark border-2 rounded p-3 my-2">
            <div class="container col-xxl-8 px-4 py-5">
                <div class="row flex-lg-row-reverse align-items-center justify-content-center g-5 py-5">
                    <div class="col-10 col-sm-8 col-lg-6">
                        <img src="{{ asset('img/шестеренки.png') }}" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
                    </div>
                    <div class="col-lg-6">
                        <h2 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">О компании</h2>
                        <p class="lead fs-4">Наша компания является лидером в сфере продажи автомобильных запчастей и аксессуаров. Мы предлагаем широкий ассортимент запчастей для всех марок автомобилей, от классических до самых современных моделей. Наша команда состоит из опытных специалистов, которые всегда готовы помочь с выбором нужной запчасти или предложить альтернативные варианты. Мы ценим наших клиентов и стараемся удовлетворить их потребности в максимально короткие сроки.</p>
                    </div>
                </div>
            </div>
        </div>

        <br/>

        <div id="contacts" class="border border-dark border-2 rounded p-3 my-2">
            <div class="px-4 pt-5 my-5 text-center border-bottom">
                <h1 class="display-4 fw-bold text-body-emphasis">Наши контакты</h1>
                <div class="col-lg-6 mx-auto">
                    <p class="lead mb-4 fs-4">Есть вопросы? Позвоните нам по номеру <span class="fw-bold">8-900-000-00-00</span> и мы ответим вам!</p>
                    <p class="lead mb-4 fs-4">Мы находимся в городе Воронеж.</p>
                </div>
                <div class="overflow-hidden" style="max-height: 30vh;">
                    <div class="container px-5">
                        <img src="{{ asset('img/воронеж.png') }}" class="img-fluid border rounded-3 shadow-lg mb-4" alt="Воронеж" loading="lazy">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
