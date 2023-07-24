<?php

namespace App\Http\Requests;

use App\Enums\MaritalStatusEnum;
use App\Traits\SendValidationErrorsToToast;
use Illuminate\Foundation\Http\FormRequest;

class StoreTeacherRequest extends FormRequest
{
    use SendValidationErrorsToToast;

    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'passport' => 'required|image|mimes:png,jpg, jpeg|max:2096',
            'marital_status' => 'required|in:single,married',
            'date_of_employment' => 'required|date'
        ];
    }
}
