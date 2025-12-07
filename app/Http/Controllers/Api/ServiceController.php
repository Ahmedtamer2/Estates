<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Helpers\ApiResponse;
use App\Http\Resources\Api\ServiceResource;
use Illuminate\Http\JsonResponse;

class ServiceController extends Controller
{
  public function index(): JsonResponse
  {
    $services = Service::all();
    return ApiResponse::sendResponse(200, 'Services retrieved successfully', ServiceResource::collection($services));
  }

  public function show($id): JsonResponse
  {
    $service = Service::findOrFail($id);
    return ApiResponse::sendResponse(200, 'Service retrieved successfully', new ServiceResource($service));
  }
}
