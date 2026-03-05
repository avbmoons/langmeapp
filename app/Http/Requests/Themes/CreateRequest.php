<?php

namespace App\Http\Requests\Themes;

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
            'code' => ['integer'],
            'title' => ['required', 'string', 'min:3', 'max:100'],
            'title_base' => ['required', 'string', 'min:3', 'max:100'],
            'description' => ['nullable', 'string'],
            'status' => ['required', new Enum (Status::class)],
        ];
    }

    public function attributes(): array{
        return [
            'code' => 'Code',
            'title' => 'Title',
            'title_base' => 'Title base',
            'description' => 'Description',
            'status' => 'Status',
          
        ];
    }
}
