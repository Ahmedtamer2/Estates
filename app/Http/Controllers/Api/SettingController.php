<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Helpers\ApiResponse;
use App\Http\Resources\Api\SettingResource;
use Illuminate\Http\JsonResponse;

class SettingController extends Controller
{
  public function index(): JsonResponse
  {
    $setting = Setting::first();

    if (!$setting) {
      return ApiResponse::sendResponse(404, 'No settings found', null);
    }

    return ApiResponse::sendResponse(200, 'Settings retrieved successfully', new SettingResource($setting));
  }

  public function show($section): JsonResponse
  {
    $setting = Setting::first();

    if (!$setting) {
      return ApiResponse::sendResponse(404, 'No settings found', null);
    }

    $data = match ($section) {
      'header' => [
        'title' => $setting->header_title,
        'description' => $setting->header_description,
        'image' => $setting->header_image ? asset('storage/' . $setting->header_image) : null,
      ],
      'about_us' => [
        'title' => $setting->about_us_title,
        'description' => $setting->about_us_description,
        'image1' => $setting->about_us_image1 ? asset('storage/' . $setting->about_us_image1) : null,
        'image2' => $setting->about_us_image2 ? asset('storage/' . $setting->about_us_image2) : null,
        'join_team_link' => $setting->join_team_link,
      ],
      'contact' => [
        'email' => $setting->email,
        'phone' => $setting->phone,
      ],
      'social_media' => [
        'facebook' => $setting->facebook,
        'instagram' => $setting->instagram,
        'twitter' => $setting->twitter,
        'youtube' => $setting->youtube,
      ],
      default => null,
    };

    if ($data === null) {
      return ApiResponse::sendResponse(404, 'Section not found', null);
    }

    return ApiResponse::sendResponse(200, ucfirst($section) . ' settings retrieved successfully', $data);
  }
}
