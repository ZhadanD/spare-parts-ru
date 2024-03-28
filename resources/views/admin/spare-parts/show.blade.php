<?php
$title = "Запчасть: {$arrData['sparePart']->name}"
?>
@extends('layouts.admin')
@section('content')
    <p class="fs-1 text-center">Запчасть: {{ $arrData['sparePart']->name }}</p>

    <div class="border border-3 border-dark rounded p-3">
        <div class="text-center">
            <img width="400" src="{{ asset('storage/' . $arrData['sparePart']->img) }}" alt="Картинка запчасти" class="img-fluid rounded">
            @error('img')
                <div id="img-error" class="d-flex justify-content-center jus">
                    <p class="text-danger fs-3 m-2">{{ $message }}</p>

                    <button onclick="closeError('img-error')" type="button" class="btn btn-danger m-2">X</button>
                </div>
            @enderror
            @error('status')
                <div id="status-error" class="d-flex justify-content-center jus">
                    <p class="text-danger fs-3 m-2">{{ $message }}</p>

                    <button onclick="closeError('status-error')" type="button" class="btn btn-danger m-2">X</button>
                </div>
            @enderror
            @error('category')
                <div id="category-error" class="d-flex justify-content-center jus">
                    <p class="text-danger fs-3 m-2">{{ $message }}</p>

                    <button onclick="closeError('category-error')" type="button" class="btn btn-danger m-2">X</button>
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

        <form id="update-spare-part" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')

            <label style="display: none" id="label-img" for="img" class="fs-5">Изображение запчасти</label>
            <input id="img" name="img" type="hidden" class="form-control border border-dark">

            <br/>

            <label for="status" class="fs-5">Статус</label>
            <select disabled required name="status" id="status" class="form-select border border-dark">
                <option {{ $arrData['sparePart']->status == 'Черновик' ? 'selected' : '' }}>Черновик</option>
                <option {{ $arrData['sparePart']->status == 'Опубликована' ? 'selected' : '' }}>Опубликована</option>
            </select>

            <br/>

            <label for="category" class="fs-5">Категория</label>
            <select disabled name="category" id="category" class="form-select border border-dark">
                @foreach($arrData['categories'] as $category)
                    <option value="{{ $category->id }}" {{ $arrData['sparePartCategory']->id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>

            <br/>

            <label for="name" class="fs-5">Название</label>
            <input disabled value="{{ $arrData['sparePart']->name }}" name="name" maxlength="20" required id="name" type="text" class="form-control border border-dark" placeholder="Введите название запчасти">

            <br/>

            <label for="short-desc" class="fs-5">Краткое описание</label>
            <textarea disabled maxlength="50" required name="short_desc" id="short-desc" class="form-control border border-dark" placeholder="Введите краткое описание">{{ $arrData['sparePart']->short_desc }}</textarea>

            <br/>

            <label for="desc" class="fs-5">Описание</label>
            <textarea disabled maxlength="100" required name="desc" id="desc" class="form-control border border-dark" placeholder="Введите описание">{{ $arrData['sparePart']->desc }}</textarea>
        </form>

        <br/>

        <div id="buttons-change-delete" class="d-flex">
            <button onclick="changeSparePart()" type="button" class="btn btn-warning m-2">Редактировать</button>

            <form id="{{ 'delete-spare-part' . "-{$arrData['sparePart']->id}" }}" class="m-2" method="post" action="{{ route('spare-parts.destroy', $arrData['sparePart']->id) }}">
                @csrf
                @method('delete')

                <input onclick="deleteSparePart('{{ $arrData['sparePart']->name }}', {{ $arrData['sparePart']->id }})" type="button" class="btn btn-danger" value="Удалить">
            </form>
        </div>
    </div>

    <script src="{{ asset('/js/admin.spare-part.js') }}"></script>
@endsection
