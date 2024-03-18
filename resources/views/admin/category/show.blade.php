<?php
$title = "Категория: $category->name"
?>
@extends('layouts.admin')
@section('content')
    <p class="fs-1 text-center">Категория: {{ $category->name }}</p>

    <div class="border border-3 border-success rounded p-3">
        <div class="text-center">
            <img width="400" src="{{ asset('storage/' . $category->img) }}" alt="Картинка категории" class="img-fluid rounded">
        </div>

        <br/>

        <label style="display: none" id="label-img" for="img" class="fs-5">Изображение категории</label>
        <input id="img" name="img" type="hidden" class="form-control border border-dark">
        @error('img')
        <p class="text-danger">{{ $message }}</p>
        @enderror

        <br/>

        <label for="name" class="fs-5">Название</label>
        <input disabled value="{{ $category->name }}" name="name" maxlength="20" required id="name" type="text" class="form-control border border-dark" placeholder="Введите название категории">
        @error('name')
        <p class="text-danger">{{ $message }}</p>
        @enderror

        <br/>

        <label for="short-desc" class="fs-5">Краткое описание</label>
        <textarea disabled maxlength="50" required name="short_desc" id="short-desc" class="form-control border border-dark" placeholder="Введите краткое описание">{{ $category->short_desc }}</textarea>
        @error('short_desc')
        <p class="text-danger">{{ $message }}</p>
        @enderror

        <br/>

        <label for="desc" class="fs-5">Описание</label>
        <textarea disabled maxlength="100" required name="desc" id="desc" class="form-control border border-dark" placeholder="Введите описание">{{ $category->desc }}</textarea>
        @error('desc')
        <p class="text-danger">{{ $message }}</p>
        @enderror

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
