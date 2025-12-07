<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Helpers\ApiResponse;
use App\Http\Requests\Api\ContactRequest;
use App\Http\Resources\Api\ContactResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(): JsonResponse
    {
        $contacts = Contact::all();
        return ApiResponse::sendResponse(200, 'Contacts retrieved successfully', ContactResource::collection($contacts));
    }

    public function store(ContactRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $contact = Contact::create($validated);

        return ApiResponse::sendResponse(200, 'Message sent successfully', new ContactResource($contact));
    }

    public function show($id): JsonResponse
    {
        $contact = Contact::findOrFail($id);
        return ApiResponse::sendResponse(200, 'Contact retrieved successfully', new ContactResource($contact));
    }
}
