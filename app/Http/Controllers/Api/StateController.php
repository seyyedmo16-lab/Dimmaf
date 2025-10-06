<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StateUpdateRequest;
use App\Models\State;
use Illuminate\Http\JsonResponse;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $states = State::orderBy('name')->get();

        return response()->json([
            'success' => true,
            'data' => $states,
            'message' => 'States retrieved successfully'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(State $state): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => $state,
            'message' => 'State retrieved successfully'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StateUpdateRequest $request, State $state): JsonResponse
    {
        $state->update($request->validated());

        return response()->json([
            'success' => true,
            'data' => $state,
            'message' => 'State updated successfully'
        ]);
    }

    /**
     * Get active states only.
     */
    public function active(): JsonResponse
    {
        $states = State::activeStates()->orderBy('name')->get();

        return response()->json([
            'success' => true,
            'data' => $states,
            'message' => 'Active states retrieved successfully'
        ]);
    }
}
