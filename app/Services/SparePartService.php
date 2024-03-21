<?php

namespace App\Services;

use App\Models\Category;
use App\Models\SparePart;
use Illuminate\Support\Facades\Storage;

class SparePartService
{
    public function index(): array
    {
        $spare_parts = SparePart::all(['id', 'img', 'name', 'short_desc', 'status']);

        $categories = Category::all(['id', 'name']);

        return ['spare_parts' => $spare_parts, 'categories' => $categories];
    }

    public function store($data): void
    {
        $data['img'] = Storage::disk('public')->put('/images', $data['img']);

        SparePart::create([
            'img' => $data['img'],
            'name' => $data['name'],
            'short_desc' => $data['short_desc'],
            'desc' => $data['desc'],
            'status' => $data['status'],
            'category_id' => $data['category'],
        ]);
    }
}
