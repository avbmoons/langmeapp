<?php

namespace App\Http\Requests\Patterns;

use App\Enums\Status;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class CreateRequest extends FormRequest
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
            'lang_id' => ['required'],
            'lang_id' => ['exists:langs,id'],
            'title' => ['required', 'string', 'min:3', 'max:100'],
            'description' => ['nullable', 'string'],
            'status' => ['required', new Enum (Status::class)],
        ];
    }

    public function attributes(): array{
        return [
            'lang_id' => 'Lang',
            'title' => 'Title',
            'description' => 'Description',
            'status' => 'Status',          
        ];
    }
}
