<?php
$title = "Категория: $category->name"
?>
@extends('layouts.admin')
@section('content')
    <p class="fs-1 text-center">Категория: {{ $category->name }}</p>

    <div class="border border-3 border-success rounded p-3">
        <div class="text-center">
            <img width="400" src="{{ asset('storage/' . $category->img) }}" alt="Картинка категории" class="img-fluid rounded">
            @error('img')
                <div id="img-error" class="d-flex justify-content-center jus">
                    <p class="text-danger fs-3 m-2">{{ $message }}</p>

                    <button onclick="closeError('img-error')" type="button" class="btn btn-danger m-2">X</button>
                </div>
            @enderror
            @error('name')
                <div id="name-error" class="d-flex justify-content-center jus">
                    <p class="text-danger fs-3 m-2">{{ $message }}</p>

                    <button onclick="closeError('name-error')" type="button" class="btn btn-danger m-2">X</button>
                </div>
            @enderror
            @error('short_desc')
                <div id="short-desc-error" class="d-flex justify-content-center jus">
                    <p class="text-danger fs-3 m-2">{{ $message }}</p>

                    <button onclick="closeError('short-desc-error')" type="button" class="btn btn-danger m-2">X</button>
                </div>
            @enderror
            @error('desc')
                <div id="desc-error" class="d-flex justify-content-center jus">
                    <p class="text-danger fs-3 m-2">{{ $message }}</p>

                    <button onclick="closeError('desc-error')" type="button" class="btn btn-danger m-2">X</button>
                </div>
            @enderror
        </div>

        <br/>

        <form id="update-category" action="{{ route('categories.update', $category->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')

            <label style="display: none" id="label-img" for="img" class="fs-5">Изображение категории</label>
            <input id="img" name="img" type="hidden" class="form-control border border-dark">

            <br/>

            <label for="name" class="fs-5">Название</label>
            <input disabled value="{{ $category->name }}" name="name" maxlength="20" required id="name" type="text" class="form-control border border-dark" placeholder="Введите название категории">

            <br/>

            <label for="short-desc" class="fs-5">Краткое описание</label>
            <textarea disabled maxlength="50" required name="short_desc" id="short-desc" class="form-control border border-dark" placeholder="Введите краткое описание">{{ $category->short_desc }}</textarea>

            <br/>

            <label for="desc" class="fs-5">Описание</label>
            <textarea disabled maxlength="100" required name="desc" id="desc" class="form-control border border-dark" placeholder="Введите описание">{{ $category->desc }}</textarea>
        </form>

        <br/>

        <div id="buttons-change-delete" class="d-flex">
            <button onclick="changeCategory()" type="button" class="btn btn-warning m-2">Редактировать</button>

            <form id="{{ 'delete-category' . "-$category->id" }}" class="m-2" action="{{ route('categories.destroy', $category->id) }}" method="post">
                @csrf
                @method('delete')

                <input onclick="deleteCategory('{{ $category->name }}', {{ $category->id }})" type="button" class="btn btn-danger" value="Удалить">
            </form>
        </div>
    </div>
@endsection
