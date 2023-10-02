<?php

namespace App\Http\Requests;

use App\Traits\SendValidationErrorsToToast;
use Illuminate\Foundation\Http\FormRequest;

class StoreTeacherSubjectRequest extends FormRequest
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
            'teacher_id' => 'required',
            'subject_id' => 'required|array'
        ];
    }
}
