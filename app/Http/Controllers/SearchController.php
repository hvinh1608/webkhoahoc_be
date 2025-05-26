<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BaiViet;
use App\Models\DanhGia;
use App\Models\KhoaHocFree;
use App\Models\LoaiKhoaHoc;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Tìm kiếm trong các mô hình khác nhau
        $khoaHocs = LoaiKhoaHoc::where('ten_khoa_hoc', 'LIKE', "%{$query}%")->get();
        $khoaHocFrees = KhoaHocFree::where('title', 'LIKE', "%{$query}%")->get();
        $baiViets = BaiViet::where('tieu_de', 'LIKE', "%{$query}%")->get();
        $danhGias = DanhGia::where('ho_ten', 'LIKE', "%{$query}%")->get();

        // Kết hợp kết quả tìm kiếm
        $results = [
            'khoaHocs' => $khoaHocs,
            'khoaHocFrees' => $khoaHocFrees,
            'baiViets' => $baiViets,
            'danhGias' => $danhGias,
        ];

        return response()->json($results);
    }
}
