<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class CategoryService
{
    public function index()
    {
        return Category::all(['id', 'img', 'name', 'short_desc']);
    }

    public function store($data): void
    {
        $data['img'] = Storage::disk('public')->put('/images', $data['img']);

        Category::create($data);
    }

    public function show($category_id)
    {
        return Category::findOrFail($category_id, ['id', 'img', 'name', 'short_desc', 'desc']);
    }

    public function destroy($category_id): void
    {
        $category = Category::findOrFail($category_id);

        Storage::disk('public')->delete($category->img);

        $category->delete();
    }
}
