<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ServiceCatalogue;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ServiceCatalogueController extends Controller
{
    public function index()
    {
        return ServiceCatalogue::all();
    }

    public function store(Request $request)
    {
        $serviceCatalogue = ServiceCatalogue::query()->create($request->all());

        return response()->json($serviceCatalogue);
    }

    public function show(int $id)
    {
        try {
            $serviceCatalogue = ServiceCatalogue::query()->findOrFail($id);

            return response()->json($serviceCatalogue);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['message' => $exception->getMessage()], 404);
        }
    }

    public function update(Request $request, int $id)
    {
        try {
            $serviceCatalogue = ServiceCatalogue::query()->findOrFail($id);

            $serviceCatalogue->update($request->all());

            return response()->json($serviceCatalogue);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['message' => $exception->getMessage()], 404);
        }
    }

    public function destroy(int $id)
    {
        try {
            ServiceCatalogue::query()->findOrFail($id)->delete();

            return response()->json(['status' => true, 'message' => 'deleted']);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['message' => $exception->getMessage()], 404);
        }
    }
}
