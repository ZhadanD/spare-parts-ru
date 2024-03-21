<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateSparePartRequest;
use App\Services\SparePartService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SparePartsController extends Controller
{
    private SparePartService $service;

    public function __construct(SparePartService $service)
    {
        $this->service = $service;
    }

    public function index(): View
    {
        $spare_parts = $this->service->index();

        return view('admin.spare-parts.index', compact('spare_parts'));
    }

    public function store(CreateSparePartRequest $request)
    {
        $data = $request->validated();

        $this->service->store($data);

        return redirect()->route('spare-parts.index');
    }
}
