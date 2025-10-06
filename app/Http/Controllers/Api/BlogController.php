<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogStoreRequest;
use App\Http\Requests\BlogUpdateRequest;
use App\Models\Blog;
use App\Models\Category;
use App\Models\State;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $query = Blog::with(['state', 'categories'])
            ->active()
            ->orderBy('created_at', 'desc');

        // Filter by state if provided
        if ($request->has('state_id')) {
            $query->where('state_id', $request->state_id);
        }

        // Filter by category if provided
        if ($request->has('category_id')) {
            $query->whereHas('categories', function ($q) use ($request) {
                $q->where('categories.id', $request->category_id);
            });
        }

        $blogs = $query->paginate(10);

        return response()->json([
            'success' => true,
            'data' => $blogs,
            'message' => 'Blogs retrieved successfully'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogStoreRequest $request): JsonResponse
    {
        $blog = Blog::create($request->validated());

        // Attach categories if provided
        if ($request->has('category_ids')) {
            $blog->categories()->attach($request->category_ids);
        }

        return response()->json([
            'success' => true,
            'data' => $blog->load(['state', 'categories']),
            'message' => 'Blog created successfully'
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => $blog->load(['state', 'categories']),
            'message' => 'Blog retrieved successfully'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogUpdateRequest $request, Blog $blog): JsonResponse
    {
        $blog->update($request->validated());

        // Sync categories if provided
        if ($request->has('category_ids')) {
            $blog->categories()->sync($request->category_ids);
        }

        return response()->json([
            'success' => true,
            'data' => $blog->load(['state', 'categories']),
            'message' => 'Blog updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog): JsonResponse
    {
        $blog->delete(); // Using soft delete

        return response()->json([
            'success' => true,
            'message' => 'Blog deleted successfully'
        ]);
    }

    /**
     * Get blog creation form data.
     */
    public function create(): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => [
                'categories' => Category::all(),
                'states' => State::activeStates()->get()
            ],
            'message' => 'Form data retrieved successfully'
        ]);
    }

    /**
     * Get blog edit form data.
     */
    public function edit(Blog $blog): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => [
                'blog' => $blog->load(['categories']),
                'categories' => Category::all(),
                'states' => State::activeStates()->get()
            ],
            'message' => 'Form data retrieved successfully'
        ]);
    }
}
