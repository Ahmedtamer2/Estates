<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Estate;
use App\Helpers\ApiResponse;
use App\Http\Resources\Api\EstateResource;
use Illuminate\Http\JsonResponse;

class EstateController extends Controller
{
    public function index(): JsonResponse
    {
        $estates = Estate::all();
        return ApiResponse::sendResponse(200, 'Estates retrieved successfully', EstateResource::collection($estates));
    }

    public function show($id): JsonResponse
    {
        $estate = Estate::findOrFail($id);
        return ApiResponse::sendResponse(200, 'Estate retrieved successfully', new EstateResource($estate));
    }
}
