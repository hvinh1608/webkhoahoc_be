<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class XoaKhoaHocFreeRequest extends FormRequest
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
            'id' => 'required|exists:khoa_hoc_frees,id',
        ];
    }

    public function messages(): array
    {
        return [
            'id.required' => 'Không tìm thấy khóa học',
            'id.exists' => 'Khóa học không tồn tại',
        ];
    }
}
