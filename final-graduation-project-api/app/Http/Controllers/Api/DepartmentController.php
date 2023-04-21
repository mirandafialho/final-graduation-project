<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Department::all());
    }

    public function store(Request $request): JsonResponse
    {
        $department = Department::query()->create($request->all());

        return response()->json($department);
    }

    public function show(int $id): JsonResponse
    {
        try {
            $department = Department::query()->findOrFail($id);

            return response()->json($department);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['message' => $exception->getMessage()], 404);
        }
    }

    public function update(Request $request, int $id): JsonResponse
    {
        try {
            $department = Department::query()->findOrFail($id);

            $department->update($request->all());

            return response()->json($department);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['message' => $exception->getMessage()], 404);
        }
    }

    public function destroy(int $id): JsonResponse
    {
        try {
            $department = Department::query()->findOrFail($id);

            $department->delete();

            return response()->json(['status' => true, 'message' => 'deleted']);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['message' => $exception->getMessage()], 404);
        }
    }
}
