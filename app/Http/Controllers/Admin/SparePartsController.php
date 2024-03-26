<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateSparePartRequest;
use App\Http\Requests\UpdateSparePartRequest;
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
        $arr = $this->service->index();

        $spare_parts = $arr['spare_parts'];
        $categories = $arr['categories'];

        return view('admin.spare-parts.index', compact('spare_parts', 'categories'));
    }

    public function show($sparePartId): View
    {
        $arrData = $this->service->show($sparePartId);

        return view('admin.spare-parts.show', compact('arrData'));
    }

    public function update(UpdateSparePartRequest $request, $sparePartId)
    {
        $data = $request->validated();

        $this->service->update($data, $sparePartId);

        return redirect()->route('spare-parts.update', $sparePartId);
    }

    public function store(CreateSparePartRequest $request)
    {
        $data = $request->validated();

        $this->service->store($data);

        return redirect()->route('spare-parts.index');
    }

    public function destroy($spare_part_id)
    {
        $this->service->destroy($spare_part_id);

        return redirect()->route('spare-parts.index');
    }
}
