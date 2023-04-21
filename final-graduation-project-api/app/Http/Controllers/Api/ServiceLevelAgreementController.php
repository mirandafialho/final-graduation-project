<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ServiceLevelAgreement;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ServiceLevelAgreementController extends Controller
{
    public function index()
    {
        return ServiceLevelAgreement::all();
    }

    public function store(Request $request)
    {
        $serviceLevelAgreement = ServiceLevelAgreement::query()->create($request->all());

        return response()->json($serviceLevelAgreement);
    }

    public function show(int $id)
    {
        try {
            $serviceLevelAgreement = ServiceLevelAgreement::query()->findOrFail($id);

            return response()->json($serviceLevelAgreement);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['message' => $exception->getMessage()], 404);
        }
    }

    public function update(Request $request, int $id)
    {
        try {
            $serviceLevelAgreement = ServiceLevelAgreement::query()->findOrFail($id);

            $serviceLevelAgreement->update($request->all());

            return response()->json($serviceLevelAgreement);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['message' => $exception->getMessage()], 404);
        }
    }

    public function destroy(int $id)
    {
        try {
            ServiceLevelAgreement::query()->findOrFail($id)->delete();

            return response()->json(['status' => true, 'message' => 'deleted']);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['message' => $exception->getMessage()], 404);
        }
    }
}
