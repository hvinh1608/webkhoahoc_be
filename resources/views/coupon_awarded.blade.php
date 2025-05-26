<div
    style="max-width: 500px; margin: 40px auto; background-color: #fef3c7; border: 2px dashed #f59e0b; border-radius: 16px; padding: 24px; text-align: center; font-family: 'Segoe UI', sans-serif;">
    <div style="font-size: 20px; font-weight: bold; color: #b45309; margin-bottom: 16px;">
        🎁 MÃ GIẢM GIÁ ĐẶC BIỆT 🎁
    </div>

    <div
        style="font-size: 28px; font-weight: bold; background-color: #fff7ed; padding: 14px 24px; border-radius: 8px; border: 2px dashed #f97316; color: #d97706; margin-bottom: 18px; display: inline-block;">
        {{ $coupon->code }}
    </div>

    <div style="font-size: 16px; color: #78350f; margin-bottom: 12px;">
        <p style="margin: 8px 0;"><b>Giá trị:</b> {{ $coupon->value }}%</p>
        <p style="margin: 8px 0;"><b>Hạn sử dụng:</b> {{ \Carbon\Carbon::parse($coupon->expiry_date)->format('d/m/Y') }}
        </p>
    </div>

    <div style="font-size: 13px; color: #92400e; margin-top: 16px;">
        DZFullStack - Ưu đãi chỉ dành riêng cho bạn!
    </div>
</div>
