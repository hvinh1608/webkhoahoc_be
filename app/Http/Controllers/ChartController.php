<?php

namespace App\Http\Controllers;

use App\Models\ChiTietPhanQuyen;
use App\Models\DanhGia;
use App\Models\KhachHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function chart()
    {
        $id_chuc_nang = 13; //Thống kê tài chính
        $id_quyen     = Auth::guard('sanctum')->user()->id_quyen;
        $check        = ChiTietPhanQuyen::where('id_quyen', $id_quyen)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status'    =>  0,
                'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        $data = KhachHang::join('tai_chinhs', 'tai_chinhs.id_khach_hang', 'khach_hangs.id')
            ->select(
                'khach_hangs.id',
                'khach_hangs.ho_va_ten',
                DB::raw(
                    'SUM(tai_chinhs.so_tien_nap) AS tong_tien'
                )
            )
            ->groupBy('khach_hangs.id', 'khach_hangs.ho_va_ten')
            ->get();


        $labels_x = [];
        $data_x   = [];
        foreach ($data as $key => $value) {
            array_push($labels_x, $value->ho_va_ten);
            array_push($data_x,   $value->tong_tien);
        }
        return response()->json([
            'labels_x' => $labels_x,
            'data_x' => $data_x,
        ]);
    }

    public function chartKhoaHoc()
    {
        $id_chuc_nang = 13; //Thống kê khóa học
        $id_quyen     = Auth::guard('sanctum')->user()->id_quyen;
        $check        = ChiTietPhanQuyen::where('id_quyen', $id_quyen)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status'    =>  0,
                'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }

        $data = DB::table('chi_tiet_khoa_hocs')
            ->join('loai_khoa_hocs', 'loai_khoa_hocs.id', '=', 'chi_tiet_khoa_hocs.id_khoa_hoc')
            ->select(
                'loai_khoa_hocs.ten_khoa_hoc',
                DB::raw('COUNT(chi_tiet_khoa_hocs.id) AS so_luot_mua')
            )
            ->groupBy('loai_khoa_hocs.ten_khoa_hoc')
            ->orderByDesc('so_luot_mua')
            ->limit(5)
            ->get();

        $labels_x = [];
        $data_x   = [];
        foreach ($data as $value) {
            array_push($labels_x, $value->ten_khoa_hoc);
            array_push($data_x, $value->so_luot_mua);
        }

        return response()->json([
            'labels_x' => $labels_x,
            'data_x'   => $data_x,
        ]);
    }

    public function chartKhachHang()
    {
        $id_chuc_nang = 13; // Thống kê khách hàng
        $id_quyen     = Auth::guard('sanctum')->user()->id_quyen;
        $check        = ChiTietPhanQuyen::where('id_quyen', $id_quyen)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status'    => 0,
                'message'   => 'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        $data = DB::table('khach_hangs')
            ->select(
                DB::raw('MONTH(created_at) as month'),
                DB::raw('COUNT(id) AS so_luot_dang_ky')
            )
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->orderByDesc('month')
            ->limit(5)
            ->get();

        $labels_x = [];
        $data_x   = [];
        foreach ($data as $value) {
            array_push($labels_x, 'Tháng ' . $value->month);
            array_push($data_x, $value->so_luot_dang_ky);
        }

        return response()->json([
            'labels_x' => $labels_x,
            'data_x'   => $data_x,
        ]);
    }

    public function chartDanhGia()
{
    $id_chuc_nang = 13; // Thống kê đánh giá
    $id_quyen     = Auth::guard('sanctum')->user()->id_quyen;
    $check        = ChiTietPhanQuyen::where('id_quyen', $id_quyen)->where('id_chuc_nang', $id_chuc_nang)->first();
    if (!$check) {
        return response()->json([
            'status'    => 0,
            'message'   => 'Bạn không có quyền thực hiện chức năng này!'
        ]);
    }
    $topKhoaHoc = DanhGia::select('khoa_hoc')
        ->selectRaw('AVG(rating) as avg_rating')
        ->groupBy('khoa_hoc')
        ->orderByDesc('avg_rating')
        ->take(5)
        ->get();

    return response()->json([
        'labels_x' => $topKhoaHoc->pluck('khoa_hoc'),
        'data_x'   => $topKhoaHoc->pluck('avg_rating')
    ]);
}

}
