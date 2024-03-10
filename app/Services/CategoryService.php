<?php

namespace App\Services;

use App\Models\Category;

class CategoryService
{
    public function index()
    {
        return Category::all(['img', 'name', 'short_desc']);
    }

    public function store($data): void
    {
        Category::create($data);
    }
}
