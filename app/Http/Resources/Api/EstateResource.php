<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EstateResource extends JsonResource
{
  /**
   * Transform the resource into an array.
   *
   * @return array<string, mixed>
   */
  public function toArray(Request $request): array
  {
    return [
      'id' => $this->id,
      'name' => $this->name,
      'price' => $this->price,
      'operation_type' => $this->operation_type,
      'images' => $this->images ? array_map(fn($image) => asset('storage/' . $image), $this->images) : [],
      'address' => $this->address,
      'area' => $this->area,
      'rooms' => $this->rooms,
      'bathrooms' => $this->bathrooms,
    ];
  }
}
