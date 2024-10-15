<?php

namespace App\Http\Requests\Merchant;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTransactionRequest extends FormRequest
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
            'account_name' => ['required', 'min:3', 'max:191'],
            'account_number' => ['required', 'min:3', 'max:191'],
            'merchant_id' => ['nullable', 'min:3', 'max:191'],
            'country_id' => ['nullable', 'min:3', 'max:191'],
            'bank_id' => ['nullable', 'min:3', 'max:191'],
            'admin_id' => ['required', 'min:3', 'max:191'],
            'bank' => ['required', 'min:3', 'max:191'],
            'bank_ifsc' => ['nullable', 'min:3', 'max:191'],
            'bank_swift' => ['nullable', 'min:3', 'max:191'],
            'bank_branch' => ['nullable', 'min:3', 'max:191'],
            'bank_branch_code' => ['nullable', 'min:3', 'max:191'],
            'bank_reference' => ['nullable', 'min:3', 'max:191'],
            'reference' => ['nullable', 'min:3', 'max:191'],
            'type' => ['nullable', 'min:3', 'max:191'],
            'status' => ['nullable', 'in:1,2'],
            'amount' => ['nullable', 'min:3', 'max:191'],
            'remarks' => ['nullable', 'min:3', 'max:191'],
            'notify' => ['nullable', 'min:3', 'max:191']
        ];
    }
}
