<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Ticket::all());
    }

    public function store(Request $request): JsonResponse
    {
        $ticket = Ticket::query()->create($request->all());

        return response()->json($ticket);
    }

    public function show(int $id): JsonResponse
    {
        try {
            $ticket = Ticket::query()->findOrFail($id);

            return response()->json($ticket);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['message' => $exception->getMessage()], 404);
        }
    }

    public function update(Request $request, int $id): JsonResponse
    {
        try {
            $ticket = Ticket::query()->findOrFail($id);

            $ticket->update($request->all());

            return response()->json($ticket);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['message' => $exception->getMessage()], 404);
        }
    }

    public function destroy(int $id): JsonResponse
    {
        try {
            $ticket = Ticket::query()->findOrFail($id);

            $ticket->delete();

            return response()->json(['status' => true, 'message' => 'deleted']);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['message' => $exception->getMessage()], 404);
        }
    }
}
