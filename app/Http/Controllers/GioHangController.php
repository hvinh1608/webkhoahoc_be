<?php

namespace App\Http\Controllers;

use App\Models\GioHang;
use App\Models\GioHangItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GioHangController extends Controller
{
    public function getCart(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        $gioHang = \App\Models\GioHang::where('id_khach_hang', $user->id)
            ->with(['items.khoaHoc'])
            ->first();

        if ($gioHang) {
            $items = $gioHang->items->map(function ($item) {
                return [
                    'id_khoa_hoc' => $item->id_khoa_hoc,
                    'ten_khoa_hoc' => $item->khoaHoc->ten_khoa_hoc ?? '',
                    'hinh_anh' => $item->khoaHoc->hinh_anh ?? '',
                    'gia_ban' => $item->gia_ban,
                    'quantity' => $item->quantity,
                    'coupon_code' => $item->coupon_code,
                ];
            });
            return response()->json(['cart' => ['items' => $items]]);
        } else {
            return response()->json(['cart' => ['items' => []]]);
        }
    }

    public function addToCart(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        $gioHang = GioHang::firstOrCreate(['id_khach_hang' => $user->id]);
        $item = GioHangItem::updateOrCreate(
            [
                'gio_hang_id' => $gioHang->id,
                'id_khoa_hoc' => $request->id_khoa_hoc
            ],
            [
                'quantity' => $request->quantity ?? 1,
                'gia_ban' => $request->gia_ban,
                'coupon_code' => $request->coupon_code
            ]
        );
        if ($item->wasRecentlyCreated) {
            return response()->json(['status' => 1, 'item' => $item]);
        } else {
            return response()->json(['status' => 2, 'item' => $item]);
        }
    }

    public function removeFromCart(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        $gioHang = GioHang::where('id_khach_hang', $user->id)->first();
        if ($gioHang) {
            GioHangItem::where('gio_hang_id', $gioHang->id)
                ->where('id_khoa_hoc', $request->id_khoa_hoc)
                ->delete();
        }
        return response()->json(['status' => 1]);
    }

    public function clearCart(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        $gioHang = GioHang::where('id_khach_hang', $user->id)->first();
        if ($gioHang) {
            $gioHang->items()->delete();
        }
        return response()->json(['status' => 1]);
    }
}
