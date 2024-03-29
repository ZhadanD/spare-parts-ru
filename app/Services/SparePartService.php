<?php

namespace App\Services;

use App\Models\Category;
use App\Models\SparePart;
use Illuminate\Support\Facades\Storage;

class SparePartService
{
    public function index(): array
    {
        $spare_parts = SparePart::paginate(10, ['id', 'img', 'name', 'short_desc', 'status']);

        $categories = Category::all(['id', 'name']);

        return ['spare_parts' => $spare_parts, 'categories' => $categories];
    }

    public function show($sparePartId): array
    {
        $sparePart = SparePart::findOrFail($sparePartId);

        $sparePartCategory = $sparePart->category;

        $categories = Category::all(['id', 'name']);

        return [
            'sparePart' => $sparePart,
            'sparePartCategory' => $sparePartCategory,
            'categories' => $categories,
        ];
    }

    public function update($data, $sparePartId): void
    {
        $sparePart = SparePart::findOrFail($sparePartId);

        if(isset($data['img'])) {
            Storage::disk('public')->delete($sparePart->img);
            $data['img'] = Storage::disk('public')->put('/images', $data['img']);
        } else $data['img'] = $sparePart->img;

        $sparePart->update([
            'img' => $data['img'],
            'name' => $data['name'],
            'short_desc' => $data['short_desc'],
            'desc' => $data['desc'],
            'status' => $data['status'],
            'category_id' => isset($data['category']) ? $data['category'] : null,
        ]);
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
            'category_id' => isset($data['category']) ? $data['category'] : null,
        ]);
    }

    public function destroy($spare_part_id): void
    {
        $spare_part = SparePart::findOrFail($spare_part_id);

        Storage::disk('public')->delete($spare_part->img);

        $spare_part->delete();
    }
}
