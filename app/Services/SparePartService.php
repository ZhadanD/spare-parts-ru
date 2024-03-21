<?php

namespace App\Services;

use App\Models\SparePart;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;

class SparePartService
{
    public function index(): Collection
    {
        return SparePart::all(['id', 'img', 'name', 'short_desc', 'status']);
    }

    public function store($data): void
    {
        $data['img'] = Storage::disk('public')->put('/images', $data['img']);

        SparePart::create($data);
    }
}
