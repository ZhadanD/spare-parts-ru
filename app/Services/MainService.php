<?php

namespace App\Services;

use App\Models\Category;
use App\Models\SparePart;
use App\Models\User;

class MainService
{
    public function getMainContent(): array
    {
        $usersCounter = User::where(['role' => 'user'])->count();

        $categoriesCounter = Category::all(['id'])->count();

        $sparePartsCounter = SparePart::all(['id'])->count();

        return [
            'usersCounter' => $usersCounter,
            'categoriesCounter' => $categoriesCounter,
            'sparePartsCounter' => $sparePartsCounter,
        ];
    }
}
