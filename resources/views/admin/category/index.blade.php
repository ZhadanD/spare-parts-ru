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
                <form>
                    <input type="file" class="form-control border border-dark" required>

                    <br/>

                    <label for="name" class="fs-5">Название</label>
                    <input maxlength="20" required id="name" type="text" class="form-control border border-dark" placeholder="Введите название категории">

                    <br/>

                    <label for="short-desc" class="fs-5">Краткое описание</label>
                    <textarea maxlength="50" required name="short-desc" id="short-desc" class="form-control border border-dark" placeholder="Введите краткое описание"></textarea>

                    <br/>

                    <label for="desc" class="fs-5">Описание</label>
                    <textarea maxlength="100" required name="desc" id="desc" class="form-control border border-dark" placeholder="Введите описание"></textarea>
                </form>
            </div>
        </div>
    </div>

    <div class="border border-3 border-success rounded p-3">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12 p-2">
                <div class="card" style="width: 18rem;">
                    <img src="/img/downloaded/categories/мебель.png" class="card-img-top" alt="Картинка">
                    <div class="card-body">
                        <h5 class="card-title">Название</h5>
                        <p class="card-text">Краткое описание</p>
                        <div class="row">
                            <div class="col"><a href="#" class="btn btn-dark">Подробнее</a></div>
                            <div class="col">
                                <form>
                                    <button type="submit" class="btn btn-danger">Удалить</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 p-2">
                <div class="card" style="width: 18rem;">
                    <img src="/img/downloaded/categories/мебель.png" class="card-img-top" alt="Картинка">
                    <div class="card-body">
                        <h5 class="card-title">Название</h5>
                        <p class="card-text">Краткое описание</p>

                        <div class="row">
                            <div class="col"><a href="#" class="btn btn-dark">Подробнее</a></div>
                            <div class="col">
                                <form>
                                    <button type="submit" class="btn btn-danger">Удалить</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 p-2">
                <div class="card" style="width: 18rem;">
                    <img src="/img/downloaded/categories/мебель.png" class="card-img-top" alt="Картинка">
                    <div class="card-body">
                        <h5 class="card-title">Название</h5>
                        <p class="card-text">Краткое описание</p>
                        <div class="row">
                            <div class="col"><a href="#" class="btn btn-dark">Подробнее</a></div>
                            <div class="col">
                                <form>
                                    <button type="submit" class="btn btn-danger">Удалить</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 p-2">
                <div class="card" style="width: 18rem;">
                    <img src="/img/downloaded/categories/мебель.png" class="card-img-top" alt="Картинка">
                    <div class="card-body">
                        <h5 class="card-title">Название</h5>
                        <p class="card-text">Краткое описание</p>
                        <div class="row">
                            <div class="col"><a href="#" class="btn btn-dark">Подробнее</a></div>
                            <div class="col">
                                <form>
                                    <button type="submit" class="btn btn-danger">Удалить</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 p-2">
                <div class="card" style="width: 18rem;">
                    <img src="/img/downloaded/categories/мебель.png" class="card-img-top" alt="Картинка">
                    <div class="card-body">
                        <h5 class="card-title">Название</h5>
                        <p class="card-text">Краткое описание</p>
                        <div class="row">
                            <div class="col"><a href="#" class="btn btn-dark">Подробнее</a></div>
                            <div class="col">
                                <form>
                                    <button type="submit" class="btn btn-danger">Удалить</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 p-2">
                <div class="card" style="width: 18rem;">
                    <img src="/img/downloaded/categories/мебель.png" class="card-img-top" alt="Картинка">
                    <div class="card-body">
                        <h5 class="card-title">Название</h5>
                        <p class="card-text">Краткое описание</p>
                        <div class="row">
                            <div class="col"><a href="#" class="btn btn-dark">Подробнее</a></div>
                            <div class="col">
                                <form>
                                    <button type="submit" class="btn btn-danger">Удалить</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
