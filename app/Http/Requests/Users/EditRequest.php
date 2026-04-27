<?php

namespace App\Http\Requests\Users;

use App\Enums\UserRole;
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
            'is_admin' => [new Enum(UserRole::class)],
            'name' => ['required', 'string'],
            'email' => ['required', 'string'],
            'password' => ['required', 'string'],
        ];
    }

    public function attributes(): array
    {
        return [
            'is_admin' => 'IsAdmin',
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',           
        ];
    }
}
