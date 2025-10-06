<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\FaqStoreRequest;
use App\Http\Requests\FaqUpdateRequest;
use App\Models\Faq;
use Illuminate\Http\JsonResponse;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $faqs = Faq::orderBy('created_at', 'desc')->get();

        return response()->json([
            'success' => true,
            'data' => $faqs,
            'message' => 'FAQs retrieved successfully'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FaqStoreRequest $request): JsonResponse
    {
        $faq = Faq::create($request->validated());

        return response()->json([
            'success' => true,
            'data' => $faq,
            'message' => 'FAQ created successfully'
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Faq $faq): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => $faq,
            'message' => 'FAQ retrieved successfully'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FaqUpdateRequest $request, Faq $faq): JsonResponse
    {
        $faq->update($request->validated());

        return response()->json([
            'success' => true,
            'data' => $faq,
            'message' => 'FAQ updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faq $faq): JsonResponse
    {
        $faq->delete();

        return response()->json([
            'success' => true,
            'message' => 'FAQ deleted successfully'
        ]);
    }
}
