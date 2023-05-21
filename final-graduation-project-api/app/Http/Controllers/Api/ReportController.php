<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Report::all());
    }

    public function store(Request $request): JsonResponse
    {
        $report = Report::query()->create($request->all());

        return response()->json($report);
    }

    public function show(int $id): JsonResponse
    {
        try {
            $report = Report::query()->findOrFail($id);

            return response()->json($report);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['message' => $exception->getMessage()], 404);
        }
    }

    public function update(Request $request, int $id): JsonResponse
    {
        try {
            $report = Report::query()->findOrFail($id);

            $report->update($request->all());

            return response()->json($report);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['message' => $exception->getMessage()], 404);
        }
    }

    public function destroy(int $id): JsonResponse
    {
        try {
            $report = Report::query()->findOrFail($id);

            $report->delete();

            return response()->json(['status' => true, 'message' => 'deleted']);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['message' => $exception->getMessage()], 404);
        }
    }
}
