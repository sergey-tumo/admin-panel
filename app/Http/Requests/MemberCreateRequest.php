<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
    

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
        'email' => ['required', 'string'],
        'first_name' => ['required', 'string'],
        'last_name' => ['required', 'string'],
        'image' => ['required', 'string'],
        'position' => ['required', 'string'],
        'sallary' => ['required', 'integer'],
        'gender' => ['required', 'string'],
        'age' => ['required', 'integer'],
        'joined_at' => ['required', 'string'],
        ];
    }
}
