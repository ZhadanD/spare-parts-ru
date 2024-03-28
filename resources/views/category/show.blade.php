<?php
$title = 'Категория: ' . $arrData['category']->name;
?>
@extends('layouts.client')
@section('content')
    <div class="container">
        <div class="px-4 py-5 mt-5 text-center">
            <h1 class="display-5 fw-bold text-body-emphasis">{{ $title }}</h1>
            <div class="col-lg-6 mx-auto">
                <p class="lead mb-4 fs-3">{{ $arrData['category']->short_desc }}</p>
                <p class="lead mb-4 fs-3">{{ $arrData['category']->desc }}</p>
            </div>
        </div>

        <div class="modal fade" id="showSparePart" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 spare-part-name"></h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="text-center">
                            <img id="spare-part-img" width="400" src="#" alt="Картинка выбранной запчасти" class="img-fluid rounded">
                        </div>

                        <p class="spare-part-name fs-3 text-center"></p>

                        <p id="spare-part-short-desc" class="text-center fs-4"></p>

                        <div class="border border-dark rounded p-2 m-2 fs-5" id="spare-part-desc"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="border border-2 border-dark rounded p-3">
            <div class="row">
                @if(count($arrData['sparePartsCategory']) === 0)
                    <p class="fs-3 text-center">Нет запчастей</p>
                @else
                    @foreach($arrData['sparePartsCategory'] as $spare_part)
                        <div class="col-lg-4 col-md-6 col-sm-12 p-2">
                            <div class="card" style="width: 18rem;">

                                <?php $urlImg = asset('storage/' . $spare_part->img); ?>

                                <img src="{{ $urlImg }}" class="card-img-top" alt="Картинка">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $spare_part->name }}</h5>
                                    <p class="card-text">{{ $spare_part->short_desc }}</p>

                                    <div class="text-center">
                                        <button type="button" class="btn btn-dark" style="width: 100%" data-bs-toggle="modal" data-bs-target="#showSparePart" onclick="showSparePart('{{ $urlImg }}', '{{ $spare_part->name }}', '{{ $spare_part->short_desc }}', '{{ $spare_part->desc }}')">Подробнее</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="mt-2">
                        {{ $arrData['sparePartsCategory']->links() }}
                    </div>
                @endif
            </div>
        </div>

        <script src="{{ asset('js/client.category.js') }}"></script>
    </div>
@endsection
