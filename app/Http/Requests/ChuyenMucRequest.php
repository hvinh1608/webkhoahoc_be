<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChuyenMucRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'ten_chuyen_muc'    =>   'required|min:5',
            'slug_chuyen_muc'   =>   'required|min:5',
            'tinh_trang'        =>   'required|boolean',
        ];
    }

    public function messages()
    {
        return [
            'ten_chuyen_muc.*'  =>   'Tên Chuyên Mục phải nhiều hơn 5 ký tự',
            'slug_chuyen_muc.*' =>   'slug Chuyên Mục phải nhiều hơn 5 ký tự',
            'tinh_trang.*'      =>   'TÌnh Trạng khồn được để trống',
        ];
    }
}
