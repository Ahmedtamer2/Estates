<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Helpers\ApiResponse;

class ContactRequest extends FormRequest
{
  public function authorize(): bool
  {
    return true;
  }

  public function rules(): array
  {
    return [
      'name' => 'required|string|max:50',
      'email' => 'required|email|max:50',
      'phone' => 'nullable|string|max:11',
      'subject' => 'required|string|max:100',
      'message' => 'required|string|max:255',
      'adress' => 'required|string',
    ];
  }

  public function messages(): array
  {
    return [
      'name.required' => 'The name field is required.',
      'name.string' => 'The name must be a string.',
      'name.max' => 'The name may not be greater than 255 characters.',

      'email.required' => 'The email field is required.',
      'email.email' => 'The email must be a valid email address.',
      'email.max' => 'The email may not be greater than 255 characters.',

      'phone.string' => 'The phone must be a string.',
      'phone.max' => 'The phone may not be greater than 20 characters.',

      'subject.required' => 'The subject field is required.',
      'subject.string' => 'The subject must be a string.',
      'subject.max' => 'The subject may not be greater than 255 characters.',

      'message.required' => 'The message field is required.',
      'message.string' => 'The message must be a string.',
      'message.max' => 'The message may not be greater than 255 characters.',

      'adress.required' => 'The adress field is required.',
      'adress.string' => 'The adress must be a string.',
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
