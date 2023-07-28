<?php

namespace App\Http\Requests;

use App\Traits\SendValidationErrorsToToast;
use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentProfileRequest extends FormRequest
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
            'classroom_id' => 'required',
            'last_name' => 'required',
            'first_name' => 'required',
            'other_names' => 'sometimes',
            'gender' => 'required',
            'dob' => 'required|date',
            'residential_address' => 'required',
            'permanent_address' => 'required',
            'fathers_name' => 'sometimes',
            'fathers_phone' => 'sometimes',
            'mothers_name' => 'sometimes',
            'mothers_phone' => 'sometimes',
            'guardians_name' => 'sometimes',
            'guardians_phone' => 'sometimes'
        ];
    }
}
