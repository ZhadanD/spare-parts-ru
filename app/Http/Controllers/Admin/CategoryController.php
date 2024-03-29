<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Services\CategoryService;
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

        return view('admin.category.index', compact('categories'));
    }

    public function store(CreateCategoryRequest $request)
    {
        $data = $request->validated();

        $this->service->store($data);

        return redirect()->route('categories.index');
    }

    public function show($category_id)
    {
        $category = $this->service->show($category_id);

        return view('admin.category.show', compact('category'));
    }

    public function destroy($category_id)
    {
        $this->service->destroy($category_id);

        return redirect()->route('categories.index');
    }

    public function update(UpdateCategoryRequest $request, $category_id)
    {
        $data = $request->validated();

        $this->service->update($data, $category_id);

        return redirect()->route('categories.show', $category_id);
    }
}
