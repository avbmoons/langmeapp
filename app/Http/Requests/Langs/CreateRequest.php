<?php

namespace App\Http\Requests\Langs;

use App\Enums\Position;
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
            'title' => ['required', 'string', 'min:3', 'max:50'],
            'native' => ['required', 'string', 'min:3', 'max:50'],
            'alias' => ['required', 'string', 'min:3', 'max:10'],
            'status' => ['required', new Enum (Status::class)],
            'position' => ['required', new Enum (Position::class)],
        ];
    }

    public function attributes(): array{
        return [
            'code' => 'Code',
            'title' => 'Title',
            'native' => 'Native title',
            'alias' => 'Alias',
            'status' => 'Status',
            'position' => 'Position',            
        ];
    }
}
