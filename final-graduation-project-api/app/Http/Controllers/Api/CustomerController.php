<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Customer::all());
    }

    public function store(Request $request): JsonResponse
    {
        $customer = Customer::query()->create($request->all());

        return response()->json($customer);
    }

    public function show(int $id): JsonResponse
    {
        try {
            $customer = Customer::query()->findOrFail($id);

            return response()->json($customer);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['message' => $exception->getMessage()], 404);
        }
    }

    public function update(Request $request, int $id): JsonResponse
    {
        try {
            $customer = Customer::query()->findOrFail($id);

            $customer->update($request->all());

            return response()->json($customer);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['message' => $exception->getMessage()], 404);
        }
    }

    public function destroy(int $id): JsonResponse
    {
        try {
            $customer = Customer::query()->findOrFail($id);

            $customer->delete();

            return response()->json(['status' => true, 'message' => 'deleted']);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['message' => $exception->getMessage()], 404);
        }
    }
}
