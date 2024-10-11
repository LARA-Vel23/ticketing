<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBankRequest extends FormRequest
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
            'name' => ['required', 'min:3', 'max:191','unique:currencies,name'],
            'account_name' => ['required', 'min:3', 'max:191'],
            'account_number' => ['required', 'min:3', 'max:191'],
            'bank_ifsc' => ['nullable', 'min:3', 'max:191'],
            'bank_swift' => ['nullable', 'min:3', 'max:191'],
            'bank_branch' => ['nullable', 'min:3', 'max:191'],
            'bank_branch_code' => ['nullable', 'min:3', 'max:191']
        ];
    }
}
