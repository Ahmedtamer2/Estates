<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Helpers\ApiResponse;

class RegisterRequest extends FormRequest
{
  public function authorize(): bool
  {
    return true;
  }

  public function rules(): array
  {
    return [
      'name' => 'required|string|max:255',
      'email' => 'required|email|unique:users',
      'password' => 'required|min:6',
    ];
  }

  protected function failedValidation(Validator $validator)
  {
    throw new HttpResponseException(
      ApiResponse::sendResponse(
        422,
        $validator->errors()->first(),
        null,
        $validator->errors()
      )
    );
  }
}
