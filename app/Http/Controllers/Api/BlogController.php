<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Helpers\ApiResponse;
use App\Http\Resources\Api\BlogResource;
use Illuminate\Http\JsonResponse;

class BlogController extends Controller
{
    public function index(): JsonResponse
    {
        $blogs = Blog::all();
        return ApiResponse::sendResponse(200, 'Blogs retrieved successfully', BlogResource::collection($blogs));
    }

    public function show($id): JsonResponse
    {
        $blog = Blog::findOrFail($id);
        return ApiResponse::sendResponse(200, 'Blog retrieved successfully', new BlogResource($blog));
    }
}
