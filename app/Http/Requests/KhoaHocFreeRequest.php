<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KhoaHocFreeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:khoa_hoc_frees,slug,' . $this->route('khoa_hoc_free'),
            'image' => 'required|url',
            'description' => 'nullable|string',
            'students_count' => 'nullable|integer|min:0',
            'lesson_count' => 'nullable|integer|min:0',
            'duration' => 'nullable|string',
            'is_free' => 'boolean',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Tiêu đề không được để trống.',
            'slug.required' => 'Slug không được để trống.',
            'slug.unique' => 'Slug này đã tồn tại.',
            'image.required' => 'Ảnh không được để trống.',
            'image.url' => 'Ảnh phải là một đường dẫn hợp lệ.',
            'students_count.integer' => 'Số học viên phải là số nguyên.',
            'lesson_count.integer' => 'Số bài học phải là số nguyên.',
            'is_free.boolean' => 'Trạng thái miễn phí phải là true hoặc false.',
        ];
    }
}
