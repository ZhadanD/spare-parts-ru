<?php
$title = 'Главная'
?>
@extends('layouts.admin')
@section('content')
    <p class="fs-1 text-center">Главная</p>

    <div class="border border-3 border-success rounded p-3">
        <div class="d-flex justify-content-center flex-wrap">
            <div class="card m-2" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title text-center">Пользователей на сайте</h5>
                    <p class="card-text text-center fs-4">{{ $content['usersCounter'] }}</p>
                </div>
            </div>

            <div class="card m-2" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title text-center">Категорий на сайте</h5>
                    <p class="card-text text-center fs-4">{{ $content['categoriesCounter'] }}</p>
                </div>
            </div>

            <div class="card m-2" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title text-center">Запчастей на сайте</h5>
                    <p class="card-text text-center fs-4">{{ $content['sparePartsCounter'] }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
