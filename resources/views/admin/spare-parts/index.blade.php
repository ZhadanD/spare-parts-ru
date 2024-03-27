<?php
$title = 'Запчасти'
?>
@extends('layouts.admin')
@section('content')
    <p class="fs-1 text-center">Запчасти</p>

    <div class="accordion accordion-flush mb-3" id="create-spare-parts">
        <div class="accordion-item">
            <button class="btn btn-dark mb-2" type="button" data-bs-toggle="collapse" data-bs-target="#form-create-spare-parts" aria-expanded="false" aria-controls="form-create-spare-parts">
                Создать запчасть
            </button>
            <div id="form-create-spare-parts" class="accordion-collapse collapse" data-bs-parent="#create-spare-parts">
                <form enctype="multipart/form-data" method="post" action="{{ route('spare-parts.store') }}">
                    @csrf

                    <label for="status" class="fs-5">Статус</label>
                    <select required name="status" id="status" class="form-select border border-dark">
                        <option {{ old('status') == 'Черновик' ? 'selected' : '' }}>Черновик</option>
                        <option {{ old('status') == 'Опубликована' ? 'selected' : '' }}>Опубликована</option>
                    </select>
                    @error('status')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror

                    <br/>

                    <label for="category" class="fs-5">Категория</label>
                    <select name="category" id="category" class="form-select border border-dark">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror

                    <br/>

                    <label for="img" class="fs-5">Изображение запчасти</label>
                    <input required name="img" type="file" class="form-control border border-dark">
                    @error('img')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror

                    <br/>

                    <label for="name" class="fs-5">Название</label>
                    <input value="{{ old('name') }}" name="name" maxlength="20" required id="name" type="text" class="form-control border border-dark" placeholder="Введите название запчасти">
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
            @if(count($spare_parts) === 0)
                <p class="fs-3 text-center">Нет запчастей</p>
            @else
                @foreach($spare_parts as $spare_part)
                    <div class="col-lg-4 col-md-6 col-sm-12 p-2">
                        <div class="card" style="width: 18rem;">
                            <img src="{{ asset('storage/' . $spare_part->img) }}" class="card-img-top" alt="Картинка">
                            <div class="card-body">
                                <p class="fs-4 text-center {{ $spare_part->status == 'Опубликована' ? 'text-success' : 'text-primary' }}">{{ $spare_part->status }}</p>

                                <h5 class="card-title">{{ $spare_part->name }}</h5>
                                <p class="card-text">{{ $spare_part->short_desc }}</p>
                                <div class="d-flex">
                                    <div class="m-2">
                                        <a href="{{ route('spare-parts.show', $spare_part->id) }}" class="btn btn-dark">Подробнее</a>
                                    </div>

                                    <form id="{{ 'delete-spare-part' . "-$spare_part->id" }}" class="m-2" method="post" action="{{ route('spare-parts.destroy', $spare_part->id) }}">
                                        @csrf
                                        @method('delete')

                                        <input onclick="deleteSparePart('{{ $spare_part->name }}', {{ $spare_part->id }})" type="button" class="btn btn-danger" value="Удалить">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="mt-2">
                    {{ $spare_parts->links() }}
                </div>
            @endif
        </div>
    </div>

    <script src="{{ asset('/js/admin.spare-parts.js') }}"></script>
@endsection
