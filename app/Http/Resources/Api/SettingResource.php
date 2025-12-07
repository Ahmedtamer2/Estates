<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SettingResource extends JsonResource
{
  /**
   * Transform the resource into an array.
   *
   * @return array<string, mixed>
   */
  public function toArray(Request $request): array
  {
    return [
      'header' => [
        'title' => $this->header_title,
        'description' => $this->header_description,
        'image' => $this->header_image ? asset('storage/' . $this->header_image) : null,
      ],
      'about_us' => [
        'title' => $this->about_us_title,
        'description' => $this->about_us_description,
        'image1' => $this->about_us_image1 ? asset('storage/' . $this->about_us_image1) : null,
        'image2' => $this->about_us_image2 ? asset('storage/' . $this->about_us_image2) : null,
        'join_team_link' => $this->join_team_link,
      ],
      'contact' => [
        'email' => $this->email,
        'phone' => $this->phone,
      ],
      'social_media' => [
        'facebook' => $this->facebook,
        'instagram' => $this->instagram,
        'twitter' => $this->twitter,
        'youtube' => $this->youtube,
      ],
    ];
  }
}
