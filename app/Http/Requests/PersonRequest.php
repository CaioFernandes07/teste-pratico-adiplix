<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PersonRequest extends FormRequest
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
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:people,email'],
        ];

        // Se for update, ignora o email da própria pessoa
        if ($this->method() === 'PUT' || $this->method() === 'PATCH') {
            $personId = $this->route('person');
            $rules['email'] = [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('people', 'email')->ignore($personId)
            ];
        }

        return $rules;
    }
}
