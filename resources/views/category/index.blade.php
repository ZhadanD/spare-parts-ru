<?php
$title = 'Категории';
?>
@extends('layouts.client')
@section('content')
    <div class="container">
        <p class="fs-1 text-center">Категории</p>

        <div class="border border-2 border-dark rounded p-3">
            <div class="row">
                @if(count($categories) === 0)
                    <p class="fs-3 text-center">Нет категорий</p>
                @else
                    @foreach($categories as $category)
                        <div class="col-lg-4 col-md-6 col-sm-12 p-2">
                            <div class="card" style="width: 18rem;">
                                <img src="{{ asset('storage/' . $category->img) }}" class="card-img-top" alt="Картинка">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $category->name }}</h5>
                                    <p class="card-text">{{ $category->short_desc }}</p>

                                    <div class="text-center">
                                        <a href="{{ route('client.categories.show', $category->id) }}" class="btn btn-dark" style="width: 100%" target="_blank">Ознакомиться</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="mt-2">
                        {{ $categories->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
