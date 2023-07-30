<?php

namespace App\Http\Requests;

use App\Traits\SendValidationErrorsToToast;
use Illuminate\Foundation\Http\FormRequest;

class StoreTeacherClassroomRequest extends FormRequest
{
    use SendValidationErrorsToToast;
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'teacher_id' => 'required',
            'classroom_id' => 'required|array'
        ];
    }
}