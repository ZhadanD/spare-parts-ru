<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategoryRequest;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

        return view('admin.category.index', compact('categories'));
    }

    public function store(CreateCategoryRequest $request)
    {
        $data = $request->validated();

        $data['img'] = Storage::disk('public')->put('/images', $data['img']);

        $this->service->store($data);

        return redirect()->route('categories.index');
    }
}
