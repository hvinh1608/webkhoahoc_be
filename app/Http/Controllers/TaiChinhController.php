<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaiChinhRequestCreate;
use App\Models\ChiTietKhoaHoc;
use App\Models\ChiTietPhanQuyen;
use App\Models\GoiDaMua;
use App\Models\KhachHang;
use App\Models\TaiChinh;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class TaiChinhController extends Controller
{
    public function napTien(TaiChinhRequestCreate $request)
    {
        $id_chuc_nang = 35; //Nạp tiền
        $id_quyen     = Auth::guard('sanctum')->user()->id_quyen;
        $check        = ChiTietPhanQuyen::where('id_quyen', $id_quyen)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status'    =>  0,
                'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        $user = Auth::guard('sanctum')->user();
        TaiChinh::create([
            'id_khach_hang' => $request->id,
            'id_nhan_vien'  => $user->id,
            'so_tien_nap'   => $request->so_tien_can_nap,
            'kieu_nap'      => \App\Models\TaiChinh::NAP_BANG_TAY,
            'noi_dung_nap'  => $request->ly_do_nap_tien,
        ]);
        $KhachHang = KhachHang::where('id', $request->id)->first();
        $KhachHang->so_du = $KhachHang->so_du + $request->so_tien_can_nap;
        $KhachHang->save();

        return response()->json([
            'status'    => 1,
            'message'   => 'Đã nạp tiền ' . number_format($request->so_tien_can_nap) . ' thành công'
        ]);
    }
    public function getData()
    {
        $id_chuc_nang = 36; //Lấy dữ liệu tài chính
        $id_quyen     = Auth::guard('sanctum')->user()->id_quyen;
        $check        = ChiTietPhanQuyen::where('id_quyen', $id_quyen)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status'    =>  0,
                'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        $data = TaiChinh::select('nhan_viens.ho_va_ten as hoten_nv', 'khach_hangs.ho_va_ten as hoten_kh', 'khach_hangs.email', 'tai_chinhs.so_tien_nap', 'tai_chinhs.kieu_nap', 'tai_chinhs.noi_dung_nap', 'tai_chinhs.created_at')
            ->join('khach_hangs', 'khach_hangs.id', 'tai_chinhs.id_khach_hang')
            ->join('nhan_viens', 'nhan_viens.id', 'tai_chinhs.id_nhan_vien')
            ->get();
        return response()->json([
            'data'  => $data
        ]);
    }
    public function getDataOnePerson(Request $request)
    {
        $id_chuc_nang = 37; //Lấy dữ liệu tài chính của 1 người
        $id_quyen     = Auth::guard('sanctum')->user()->id_quyen;
        $check        = ChiTietPhanQuyen::where('id_quyen', $id_quyen)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status'    =>  0,
                'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        $data = TaiChinh::select('nhan_viens.ho_va_ten as hoten_nv', 'khach_hangs.ho_va_ten as hoten_kh', 'khach_hangs.email', 'tai_chinhs.so_tien_nap', 'tai_chinhs.kieu_nap', 'tai_chinhs.noi_dung_nap', 'tai_chinhs.created_at')
            ->join('khach_hangs', 'khach_hangs.id', 'tai_chinhs.id_khach_hang')
            ->join('nhan_viens', 'nhan_viens.id', 'tai_chinhs.id_nhan_vien')
            ->where('tai_chinhs.id_khach_hang', $request->id)
            ->get();
        return response()->json([
            'data'  => $data
        ]);
    }
    public function autoGiaoDich()
    {
        try {
            $payload = [
                "USERNAME" => "0335446435",
                "PASSWORD" => "Lethikimngoc3@",
                "DAY_BEGIN" => "13/4/2025",
                "DAY_END" => "26/4/2025",
                "NUMBER_MB" => "56700112233"
            ];
            $axios = new \GuzzleHttp\Client();
            $responsive = $axios->post('https://api-mb.dzmid.io.vn/api/transactions', [
                'json' => $payload
            ]);
            $data = json_decode($responsive->getBody()->getContents(), true);
            Log::info('API MB trả về:', $data);

            if (isset($data['data']['transactionHistoryList']) && is_array($data['data']['transactionHistoryList'])) {
                foreach ($data['data']['transactionHistoryList'] as $gd) {
                    // Lấy mã giao dịch từ description (ví dụ: GD100021)
                    if (preg_match('/GD\d+/', $gd['description'], $matches)) {
                        $ma_giao_dich = $matches[0];
                    } else {
                        continue;
                    }
                    // Tìm giao dịch chưa thanh toán, đúng mã giao dịch và số tiền
                    $tai_chinh = \App\Models\TaiChinh::where('hash', $ma_giao_dich)
                        ->where('so_tien_nap', $gd['creditAmount'])
                        ->where('is_thanh_toan', 0)
                        ->first();

                    if ($tai_chinh) {
                        $tai_chinh->is_thanh_toan = 1;
                        $tai_chinh->save();

                        // Cộng tiền vào tài khoản khách hàng
                        $khachHang = \App\Models\KhachHang::find($tai_chinh->id_khach_hang);
                        if ($khachHang) {
                            $khachHang->so_du += $tai_chinh->so_tien_nap;
                            $khachHang->save();
                        }
                    }
                }
            } else {
                Log::error('API MB trả về không đúng định dạng:', $data);
            }
            return response()->json(['status' => 1, 'message' => 'Đã quét giao dịch xong!']);
        } catch (\Exception $e) {
            Log::error('autoGiaoDich error: ' . $e->getMessage());
        }
    }

    public function webhookSepay(Request $request)
    {
        Log::info('Webhook Sepay:', $request->all());

        // Lấy mã giao dịch từ content (hoặc description) bằng regex
        $content = $request->input('content', '');
        if (preg_match('/GD\d+/', $content, $matches)) {
            $ma_giao_dich = $matches[0];
        } else {
            // Không tìm thấy mã giao dịch, bỏ qua
            return response()->json(['status' => 0, 'message' => 'Không tìm thấy mã giao dịch']);
        }

        // Lấy số tiền từ transferAmount
        $so_tien = $request->input('transferAmount');

        // Tìm giao dịch chưa thanh toán, đúng mã giao dịch và số tiền
        $tai_chinh = \App\Models\TaiChinh::where('hash', $ma_giao_dich)
            ->where('so_tien_nap', $so_tien)
            ->where('is_thanh_toan', 0)
            ->first();

        if ($tai_chinh) {
            $tai_chinh->is_thanh_toan = 1;
            $tai_chinh->save();

            // Cộng tiền vào tài khoản khách hàng
            $khachHang = \App\Models\KhachHang::find($tai_chinh->id_khach_hang);
            if ($khachHang) {
                $khachHang->so_du += $tai_chinh->so_tien_nap;
                $khachHang->save();

                Mail::to($khachHang->email)->send(new \App\Mail\ThongBaoNapTien($tai_chinh->so_tien_nap, $khachHang->ho_va_ten));
            }
        }

        return response()->json(['status' => 1]);
    }

    public function checkMuaKhoaHoc(Request $request)
    {
        $user = Auth::guard('sanctum')->user();

        // 1. Kiểm tra user có gói còn hạn không
        $goi = GoiDaMua::where('user_id', $user->id)
            ->where('ngay_ket_thuc', '>', now())
            ->first();

        if ($goi) {
            // Nếu có gói còn hạn, cho phép truy cập tất cả khóa học
            return response()->json([
                'status' => 1
            ]);
        }

        // 2. Nếu không có gói, kiểm tra mua lẻ như cũ
        $data = ChiTietKhoaHoc::where('id_khach_hang', $user->id)
            ->where('id_khoa_hoc', $request->id_khoa_hoc)
            ->where('da_thu_hoi', false)
            ->first();

        return response()->json([
            'status'  => $data ? 1 : 0
        ]);
    }

    public function checkTrangThaiNapTien(Request $request)
    {
        $tai_chinh = TaiChinh::where('hash', $request->hash)->orWhere('noi_dung_nap', $request->hash)->first();
        if ($tai_chinh && $tai_chinh->is_thanh_toan == 1) {
            return response()->json(['status' => 'success']);
        }
        return response()->json(['status' => 'pending']);
    }
}
