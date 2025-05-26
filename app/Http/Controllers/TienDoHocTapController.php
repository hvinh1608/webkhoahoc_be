<?php

namespace App\Http\Controllers;

use App\Mail\CouponAwardedMail;
use App\Models\BaiHoc;
use App\Models\BaiHocFree;
use App\Models\Coupon;
use App\Models\DiemDanh;
use App\Models\KhachHang;
use App\Models\PhanThuong;
use App\Models\TienDoHocTap;
use App\Services\LeaderboardService;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class TienDoHocTapController extends Controller
{
    public function danhDauHoanThanh(Request $request)
    {
        $request->validate([
            'bai_hoc_id' => 'required|exists:bai_hocs,id'
        ]);

        $user = Auth::guard('sanctum')->user();

        $tienDo = TienDoHocTap::updateOrCreate(
            [
                'khach_hang_id' => $user->id,
                'bai_hoc_id' => $request->bai_hoc_id,
            ],
            [
                'da_hoan_thanh' => true
            ]
        );

        // Điểm danh ngày học
        DiemDanh::firstOrCreate([
            'khach_hang_id' => $user->id,
            'ngay' => now()->toDateString(),
        ]);

        // Lấy id khóa học từ bài học
        $baiHoc = \App\Models\BaiHoc::find($request->bai_hoc_id);
        $idKhoaHoc = $baiHoc->id_khoa_hoc;

        // Tổng số bài học trong khóa học
        $tongBai = \App\Models\BaiHoc::where('id_khoa_hoc', $idKhoaHoc)->count();

        // Số bài học đã hoàn thành của user trong khóa học này
        $daHoc = \App\Models\TienDoHocTap::where('khach_hang_id', $user->id)
            ->whereHas('baiHoc', function ($q) use ($idKhoaHoc) {
                $q->where('id_khoa_hoc', $idKhoaHoc);
            })
            ->where('da_hoan_thanh', true)
            ->count();

        // Nếu đã hoàn thành tất cả bài học, thêm vào bảng trung gian
        if ($tongBai > 0 && $daHoc == $tongBai) {
            DB::table('khach_hang_khoa_hoan_thanh')->updateOrInsert([
                'khach_hang_id' => $user->id,
                'khoa_hoc_id' => $idKhoaHoc,
            ], [
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        app(\App\Services\LeaderboardService::class)->checkForRankChange();

        Log::info('Tiến độ học tập đã cập nhật: ', $tienDo->toArray());

        return response()->json(['message' => 'Đã lưu tiến độ']);
    }

    public function layTienDoKhoaHoc($idKhoaHoc)
    {
        $userId = Auth::guard('sanctum')->user()->id;

        // Tổng số bài học trong khóa học
        $tongBai = BaiHoc::where('id_khoa_hoc', $idKhoaHoc)->count();

        // Số bài học đã hoàn thành
        $daHoc = TienDoHocTap::where('khach_hang_id', $userId)
            ->whereHas('baiHoc', function ($q) use ($idKhoaHoc) {
                $q->where('id_khoa_hoc', $idKhoaHoc);
            })->count();

        // Danh sách ID các bài học đã hoàn thành
        $completedLessons = TienDoHocTap::where('khach_hang_id', $userId)
            ->whereHas('baiHoc', function ($q) use ($idKhoaHoc) {
                $q->where('id_khoa_hoc', $idKhoaHoc);
            })
            ->pluck('bai_hoc_id')
            ->toArray();

        // Tính phần trăm tiến độ
        $phanTram = $tongBai > 0 ? round(($daHoc / $tongBai) * 100) : 0;

        Log::info('Tiến độ học tập: ', [
            'tong_bai' => $tongBai,
            'da_hoc' => $daHoc,
            'phan_tram' => $phanTram,
            'completed_lessons' => $completedLessons,

        ]);

        $quizFinalDone = \App\Models\KetQuaTracNghiem::where('khach_hang_id', $userId)
            ->where('khoa_hoc_id', $idKhoaHoc)
            ->where('loai', 'final') // nếu có phân biệt loại
            ->exists();

        return response()->json([
            'phan_tram' => $phanTram,
            'da_hoc' => $daHoc,
            'tong_bai' => $tongBai,
            'completed_lessons' => $completedLessons, // Trả về danh sách bài học đã hoàn thành
            'quiz_final_done' => $quizFinalDone,
        ]);
    }

    public function lichSuDiemDanh(Request $request)
    {
        $user = Auth::guard('sanctum')->user();

        $diemDanh = DiemDanh::where('khach_hang_id', $user->id)
            ->orderBy('ngay', 'desc')
            ->pluck('ngay'); // Chỉ lấy danh sách các ngày điểm danh

        return response()->json($diemDanh);
    }

    public function tinhStreak()
    {
        $user = Auth::guard('sanctum')->user();

        $diemDanh = DiemDanh::where('khach_hang_id', $user->id)
            ->orderByDesc('ngay')
            ->pluck('ngay')
            ->map(fn($ngay) => \Carbon\Carbon::parse($ngay)->toDateString())
            ->toArray();

        $streak = 0;
        $today = \Carbon\Carbon::today();

        foreach ($diemDanh as $ngay) {
            if ($today->toDateString() === $ngay) {
                $streak++;
                $today->subDay();
            } else {
                // Nếu hôm nay chưa điểm danh, nhưng ngày gần nhất là hôm qua, vẫn giữ streak
                if ($streak === 0 && $today->copy()->subDay()->toDateString() === $ngay) {
                    $streak++;
                    $today->subDay(2); // Lùi 2 ngày để tiếp tục kiểm tra các ngày trước
                    continue;
                }
                break;
            }
        }

        $phanThuong7 = null;
        $phanThuong30 = null;

        if ($streak >= 7) {
            $phanThuong7 = \App\Models\PhanThuong::firstOrCreate([
                'khach_hang_id' => $user->id,
                'ngay_lien_tuc' => 7
            ], [
                'da_nhan' => false
            ]);
        } else {
            $phanThuong7 = \App\Models\PhanThuong::where('khach_hang_id', $user->id)
                ->where('ngay_lien_tuc', 7)
                ->first();
        }

        if ($streak >= 30) {
            $phanThuong30 = \App\Models\PhanThuong::firstOrCreate([
                'khach_hang_id' => $user->id,
                'ngay_lien_tuc' => 30
            ], [
                'da_nhan' => false
            ]);
        } else {
            $phanThuong30 = \App\Models\PhanThuong::where('khach_hang_id', $user->id)
                ->where('ngay_lien_tuc', 30)
                ->first();
        }

        return response()->json([
            'streak' => $streak,
            'phan_thuong_7' => $phanThuong7 ? (bool)$phanThuong7->da_nhan : false,
            'phan_thuong_30' => $phanThuong30 ? (bool)$phanThuong30->da_nhan : false,
        ]);
    }

    public function nhanPhanThuong(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        $request->validate([
            'ngay_lien_tuc' => 'required|in:7,30'
        ]);

        $phanThuong = PhanThuong::where('khach_hang_id', $user->id)
            ->where('ngay_lien_tuc', $request->ngay_lien_tuc)
            ->first();

        if (!$phanThuong || $phanThuong->da_nhan) {
            return response()->json(['message' => 'Phần thưởng đã nhận hoặc không tồn tại'], 400);
        }

        $phanThuong->update(['da_nhan' => true]);

        // Tạo mã giảm giá theo định dạng GD-YYYYMMDD-XXXX
        $couponCode = 'GD-' . Carbon::now()->format('Ymd') . '-' . Str::random(4); // Ví dụ: GD-20250416-ABCD

        // Tạo coupon tự động
        $coupon = Coupon::create([
            'code' => $couponCode,
            'value' => $request->ngay_lien_tuc == 30 ? 100 : 50,
            'type' => 'percent',
            'expiry_date' => now()->addDays(30),
            'user_id' => $user->id,
        ]);

        Mail::to($user->email)->send(new CouponAwardedMail($coupon));

        return response()->json([
            'message' => 'Kiểm tra email để nhận mã giảm giá',
            'coupon' => $coupon
        ]);
    }


    public function danhDauHoanThanhFree(Request $request)
    {
        $request->validate([
            'bai_hoc_id_free' => 'required|exists:bai_hoc_frees,id'
        ]);

        $user = Auth::guard('sanctum')->user();

        $tienDo = TienDoHocTap::updateOrCreate(
            [
                'khach_hang_id' => $user->id,
                'bai_hoc_id_free' => $request->bai_hoc_id_free,
            ],
            [
                'da_hoan_thanh' => true
            ]
        );

        DiemDanh::firstOrCreate([
            'khach_hang_id' => $user->id,
            'ngay' => now()->toDateString(), // dạng yyyy-mm-dd
        ]);

        app(\App\Services\LeaderboardService::class)->checkForRankChange();

        Log::info('Tiến độ học tập đã cập nhật: ', $tienDo->toArray());

        return response()->json(['message' => 'Đã lưu tiến độ']);
    }

    public function layTienDoKhoaHocFree($idKhoaHoc)
    {
        $userId = Auth::guard('sanctum')->user()->id;

        // Tổng số bài học trong khóa học
        $tongBai = BaiHocFree::where('id_khoa_hoc_free', $idKhoaHoc)->count();

        // Số bài học đã hoàn thành
        $daHoc = TienDoHocTap::where('khach_hang_id', $userId)
            ->whereHas('baiHocFree', function ($q) use ($idKhoaHoc) {
                $q->where('id_khoa_hoc_free', $idKhoaHoc);
            })->count();

        // Danh sách ID các bài học đã hoàn thành
        $completedLessons = TienDoHocTap::where('khach_hang_id', $userId)
            ->whereHas('baiHocFree', function ($q) use ($idKhoaHoc) {
                $q->where('id_khoa_hoc_free', $idKhoaHoc);
            })
            ->pluck('bai_hoc_id_free')
            ->toArray();

        // Tính phần trăm tiến độ
        $phanTram = $tongBai > 0 ? round(($daHoc / $tongBai) * 100) : 0;

        Log::info('Tiến độ học tập: ', [
            'tong_bai' => $tongBai,
            'da_hoc' => $daHoc,
            'phan_tram' => $phanTram,
            'completed_lessons' => $completedLessons
        ]);

        return response()->json([
            'phan_tram' => $phanTram,
            'da_hoc' => $daHoc,
            'tong_bai' => $tongBai,
            'completed_lessons' => $completedLessons // Trả về danh sách bài học đã hoàn thành
        ]);
    }

    public function fakeDiemDanh(Request $request)
    {
        $request->validate([
            'ngay' => 'required|date',
        ]);

        $user = Auth::guard('sanctum')->user();

        $created = DiemDanh::firstOrCreate([
            'khach_hang_id' => $user->id,
            'ngay' => $request->ngay,
        ]);

        app(\App\Services\LeaderboardService::class)->checkForRankChange();

        return response()->json([
            'message' => 'Đã tạo điểm danh giả lập',
            'data' => $created
        ]);
    }

    public function bangXepHang()
    {
        $khachHangs = KhachHang::select('id', 'ho_va_ten')
            ->withCount(['tienDo as bai_hoan_thanh' => function ($q) {
                $q->where('da_hoan_thanh', true);
            }])
            ->get()
            ->map(function ($kh) {
                // Tính streak
                $ngays = DiemDanh::where('khach_hang_id', $kh->id)
                    ->orderBy('ngay', 'desc')
                    ->pluck('ngay')
                    ->map(fn($d) => \Carbon\Carbon::parse($d))
                    ->sortDesc()
                    ->values();

                $streak = 0;
                $today = \Carbon\Carbon::today();

                foreach ($ngays as $ngay) {
                    if ($ngay->equalTo($today)) {
                        $streak++;
                        $today->subDay();
                    } else {
                        // Nếu hôm nay chưa điểm danh, nhưng ngày gần nhất là hôm qua, vẫn giữ streak
                        if ($streak === 0 && $ngay->equalTo($today->copy()->subDay())) {
                            $streak++;
                            $today->subDay(2);
                            continue;
                        }
                        break;
                    }
                }

                return [
                    'id' => $kh->id,
                    'ho_va_ten' => $kh->ho_va_ten,
                    'bai_hoan_thanh' => $kh->bai_hoan_thanh,
                    'streak' => $streak
                ];
            })
            // Sắp xếp ưu tiên streak, nếu bằng thì ưu tiên bài hoàn thành
            ->sortByDesc(function ($item) {
                return [$item['streak'], $item['bai_hoan_thanh']];
            })
            ->values();

        return response()->json($khachHangs);
    }

    public function testMail()
    {
        app(LeaderboardService::class)->checkForRankChange();
        return response()->json(['message' => 'Đã kiểm tra và gửi mail nếu có người sắp vượt top 1!']);
    }
}
