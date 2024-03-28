<?php

namespace App\Http\Controllers;

use App\Services\Client\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private CategoryService $service;

    public function __construct(CategoryService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $categories = $this->service->index();

        return view('category.index', compact('categories'));
    }

    public function show($categoryId)
    {
        $arrData = $this->service->show($categoryId);

        return view('category.show', compact('arrData'));
    }
}
