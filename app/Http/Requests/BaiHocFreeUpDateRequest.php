<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BaiHocFreeUpDateRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'id'                 => 'required|exists:bai_hoc_frees,id',
            'id_khoa_hoc_free'   => 'required|exists:khoa_hoc_frees,id',
            'bai_hoc_so'         => 'required|numeric',
            'tinh_trang'         => 'required|boolean',
            'tieu_de'            => 'required|min:3|max:100',
            'link_bai_hoc'       => 'required|min:10|max:1000',

        ];
    }

    public function messages() {
        return [
            'id.required'                =>  'Không tìm thấy bài học',
            'id.exists'                  =>  'Bài học không tồn tại!',
            'id_khoa_hoc_free.required'  =>  'Yêu cầu phải chọn loại khoá học',
            'id_khoa_hoc_free.exists'    =>  'Loại khoá học không tồn tại',
            'bai_hoc_so.required'        =>  'Phải nhập thông tin bài học số mấy',
            'bai_hoc_so.numeric'         =>  'Bài học phải là số',
            'tinh_trang.required'        =>  'Tình trạng không được để trống',
            'tinh_trang.boolean'         =>  'Tình trạng phải là boolean',
            'tieu_de.required'           =>  'Bạn phải nhập tiêu đề',
            'tieu_de.min'                =>  'Tiêu đề tối thiểu phải 3 ký tự',
            'tieu_de.max'                =>  'Tiêu đề tối đa chỉ được 100 ký tự',
            'link_bai_hoc.required'      =>  'Bạn phải nhập link bài học',
            'link_bai_hoc.min'           =>  'Link bài học tối thiểu phải 10 ký tự',
            'link_bai_hoc.max'           =>  'Link bài học tối đa chỉ được 1000 ký tự',
        ];
    }
}
