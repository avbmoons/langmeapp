<?php

namespace App\Http\Requests\Words;

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
            'theme_ids' => ['required', 'array'],
            'theme_ids.*' => ['exists:themes,id'],
            'code' => ['integer'],
            'title' => ['required', 'string', 'min:3', 'max:50'],
            'status' => ['required', new Enum (Status::class)],
        ];
    }

    public function getThemeIds(): array{
        return (array) $this->validated('theme_ids');
    }

    public function attributes(): array{
        return [
            'code' => 'Code',
            'title' => 'Title',
            'theme_ids' => 'Themes',
            'status' => 'Status',          
        ];
    }
}
