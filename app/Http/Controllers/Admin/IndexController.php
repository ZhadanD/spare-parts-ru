<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\MainService;

class IndexController extends Controller
{
    private MainService $service;

    public function __construct(MainService $service)
    {
        $this->service = $service;
    }

    public function __invoke()
    {
        $content = $this->service->getMainContent();

        return view('admin.main', compact('content'));
    }
}
