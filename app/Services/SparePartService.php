<?php

namespace App\Services;

use App\Models\SparePart;
use Illuminate\Database\Eloquent\Collection;

class SparePartService
{
    public function index(): Collection
    {
        return SparePart::all(['id', 'img', 'name', 'short_desc', 'status']);
    }
}
