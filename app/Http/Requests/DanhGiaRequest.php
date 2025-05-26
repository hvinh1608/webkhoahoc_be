<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DanhGiaRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'ho_ten' => 'required|string|max:255',
            'khoa_hoc' => 'required|string|max:255',
            'vai_tro' => 'required|string|max:255',
            'noi_dung' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function messages() {
        return [
            'ho_ten.required' => 'Họ tên không được để trống',
            'ho_ten.string' => 'Họ tên phải là chuỗi',
            'ho_ten.max' => 'Họ tên không được quá 255 ký tự',
            'khoa_hoc.required' => 'Khóa học không được để trống',
            'khoa_hoc.string' => 'Khóa học phải là chuỗi',
            'khoa_hoc.max' => 'Khóa học không được quá 255 ký tự',
            'vai_tro.required' => 'Vai trò không được để trống',
            'vai_tro.string' => 'Vai trò phải là chuỗi',
            'vai_tro.max' => 'Vai trò không được quá 255 ký tự',
            'noi_dung.required' => 'Nội dung không được để trống',
            'noi_dung.string' => 'Nội dung phải là chuỗi',
            'rating.required' => 'Rating không được để trống',
            'rating.integer' => 'Rating phải là số nguyên',
            'rating.min' => 'Rating phải lớn hơn hoặc bằng 1',
            'rating.max' => 'Rating phải nhỏ hơn hoặc bằng 5',
            'avatar.image' => 'Avatar phải là ảnh',
            'avatar.mimes' => 'Avatar phải có định dạng jpeg, png, jpg, gif, svg',
            'avatar.max' => 'Avatar không được quá 2048 KB',
        ];
    }
}
