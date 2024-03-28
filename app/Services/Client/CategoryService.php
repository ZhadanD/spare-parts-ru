<?php

namespace App\Services\Client;

use App\Models\Category;
use App\Models\SparePart;
use Illuminate\Pagination\LengthAwarePaginator;

class CategoryService
{
    public function index(): LengthAwarePaginator
    {
        return Category::paginate(10, ['id', 'img', 'name', 'short_desc']);
    }

    public function show($categoryId): array
    {
        $category = Category::findOrFail($categoryId, ['name', 'short_desc', 'desc']);

        $sparePartsCategory = SparePart::where('category_id', '=', $categoryId)
                                ->where('status', '=', 'Опубликована')
                                ->paginate(10, ['img', 'name', 'short_desc', 'desc']);

        return [
            'category' => $category,
            'sparePartsCategory' => $sparePartsCategory,
        ];
    }
}
