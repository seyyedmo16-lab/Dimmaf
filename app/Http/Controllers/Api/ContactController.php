<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactStoreRequest;
use App\Http\Requests\ContactUpdateRequest;
use App\Mail\NewMessageMail;
use App\Models\Contact;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $query = Contact::with('state')->orderBy('created_at', 'desc');

        // Filter by state if provided
        if ($request->has('state_id')) {
            $query->where('state_id', $request->state_id);
        }

        // Filter by answered status if provided
        if ($request->has('answered')) {
            $answered = filter_var($request->answered, FILTER_VALIDATE_BOOLEAN);
            if ($answered) {
                $query->whereNotNull('answer');
            } else {
                $query->whereNull('answer');
            }
        }

        $contacts = $query->paginate(15);

        return response()->json([
            'success' => true,
            'data' => $contacts,
            'message' => 'Contacts retrieved successfully'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContactStoreRequest $request): JsonResponse
    {
        $contact = Contact::create($request->validated());

        // Send email notification to admin
        try {
            $admin = User::where('role', 'admin')->first();
            if ($admin) {
                Mail::to($admin->email)->send(new NewMessageMail($contact));
            }
        } catch (\Exception $e) {
            // Log error but don't fail the request
            \Log::error('Failed to send contact email: ' . $e->getMessage());
        }

        return response()->json([
            'success' => true,
            'data' => $contact->load('state'),
            'message' => 'Your message sent successfully'
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => $contact->load('state'),
            'message' => 'Contact retrieved successfully'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContactUpdateRequest $request, Contact $contact): JsonResponse
    {
        $contact->update($request->validated());

        return response()->json([
            'success' => true,
            'data' => $contact->load('state'),
            'message' => 'Contact updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact): JsonResponse
    {
        $contact->delete();

        return response()->json([
            'success' => true,
            'message' => 'Contact deleted successfully'
        ]);
    }

    /**
     * Get contact history (answered contacts).
     */
    public function history(Request $request): JsonResponse
    {
        $query = Contact::with('state')
            ->whereNotNull('answer')
            ->orderBy('updated_at', 'desc');

        if ($request->has('state_id')) {
            $query->where('state_id', $request->state_id);
        }

        $contacts = $query->paginate(15);

        return response()->json([
            'success' => true,
            'data' => $contacts,
            'message' => 'Contact history retrieved successfully'
        ]);
    }

    /**
     * Get form data for creating contacts.
     */
    public function create(): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => [
                'states' => State::activeStates()->get()
            ],
            'message' => 'Form data retrieved successfully'
        ]);
    }
}
