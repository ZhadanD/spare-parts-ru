<?php
$title = 'Категории'
?>
@extends('layouts.admin')
@section('content')
    <p class="fs-1 text-center">Категории</p>

    <div class="accordion accordion-flush mb-3" id="create-category">
        <div class="accordion-item">
            <button class="btn btn-dark mb-2" type="button" data-bs-toggle="collapse" data-bs-target="#form-create-category" aria-expanded="false" aria-controls="form-create-category">
                Создать категорию
            </button>
            <div id="form-create-category" class="accordion-collapse collapse" data-bs-parent="#create-category">
                <form method="POST" action="{{ route('categories.store') }}" enctype="multipart/form-data">
                    @csrf

                    <label for="img" class="fs-5">Изображение категории</label>
                    <input required name="img" type="file" class="form-control border border-dark">
                    @error('img')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror

                    <br/>

                    <label for="name" class="fs-5">Название</label>
                    <input value="{{ old('name') }}" name="name" maxlength="20" required id="name" type="text" class="form-control border border-dark" placeholder="Введите название категории">
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror

                    <br/>

                    <label for="short-desc" class="fs-5">Краткое описание</label>
                    <textarea maxlength="50" required name="short_desc" id="short-desc" class="form-control border border-dark" placeholder="Введите краткое описание">{{ old('short_desc') }}</textarea>
                    @error('short_desc')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror

                    <br/>

                    <label for="desc" class="fs-5">Описание</label>
                    <textarea maxlength="100" required name="desc" id="desc" class="form-control border border-dark" placeholder="Введите описание">{{ old('desc') }}</textarea>
                    @error('desc')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror

                    <br/>

                    <button type="submit" class="btn btn-dark">Создать</button>
                </form>
            </div>
        </div>
    </div>

    <div class="border border-3 border-success rounded p-3">
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
                                <div class="d-flex">
                                    <div class="m-2">
                                        <a href="{{ route('categories.show', $category->id) }}" class="btn btn-dark">Подробнее</a>
                                    </div>

                                    <form id="{{ 'delete-category' . "-$category->id" }}" class="m-2" action="{{ route('categories.destroy', $category->id) }}" method="post">
                                        @csrf
                                        @method('delete')

                                        <input onclick="deleteCategory('{{ $category->name }}', {{ $category->id }})" type="button" class="btn btn-danger" value="Удалить">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

    <script src="{{ asset('/js/admin.categories.js') }}"></script>
@endsection
