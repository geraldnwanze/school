<?php

namespace App\Http\Requests;

use App\Traits\SendValidationErrorsToToast;
use Illuminate\Foundation\Http\FormRequest;

class StoreSchoolFeePaymentRequest extends FormRequest
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
            'amount_paid' => 'required',
            'class_id' => 'required',
            'student_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'class_id.required' => 'The class field is required',
            'student_id.required' => 'The student field is required'
        ];
    }

}
