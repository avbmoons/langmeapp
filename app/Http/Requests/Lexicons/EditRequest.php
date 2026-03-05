<?php

namespace App\Http\Requests\Lexicons;

use App\Enums\Status;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class EditRequest extends FormRequest
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
            'pattern_id' => ['required'],
            'pattern_id' => ['exists:patterns,id'],
            'word_id' => ['required'],
            'word_id' => ['exists:words,id'],
            'translation' => ['required', 'string', 'max:100'],
            'spell_base' => ['required', 'string', 'max:100'],
            'spell_eng' => ['nullable', 'string', 'max:100'],
            'status' => ['required', new Enum (Status::class)],
        ];
    }

    public function attributes(): array{
        return [
            'pattern_id' => 'Pattern',
            'word_id' => 'Word',
            'translation' => 'Title',
            'spell_base' => 'Spelling base',
            'spell_eng' => 'Spelling eng',
            'status' => 'Status',          
        ];
    }
}
