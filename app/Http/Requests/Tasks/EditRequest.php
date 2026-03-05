<?php

namespace App\Http\Requests\Tasks;

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
            'theme_ids' => ['required', 'array'],
            'theme_ids.*' => ['exists:themes,id'],
            'lang_ids' => ['required', 'array'],
            'lang_ids.*' => ['exists:langs,id'],
            'mode_id' => ['required', 'integer'],
            'mode_id' => ['exists:modes,id'],
            'num_enjoy' => ['nullable', 'integer'],
            'num_normal' => ['nullable', 'integer'],
            'num_worry' => ['nullable', 'integer'],
            'status' => ['required', new Enum (Status::class)],
        ];
    }

    public function getThemeIds(): array{
        return (array) $this->validated('theme_ids');
    }

    public function getLangIds(): array{
        return (array) $this->validated('lang_ids');
    }

    public function attributes(): array{
        return [
            'mode_id' => 'Mode',
            'lang_ids' => 'Langs',
            'theme_ids' => 'Themes',
            'num_enjoy' => 'Score enjoy',
            'num_normal' => 'Score normal',
            'num_worry' => 'Score worry',
            'status' => 'Status',          
        ];
    }
}
