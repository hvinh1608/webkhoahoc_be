<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chào Mừng Bạn</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #F4F6F9;
            color: #333;
        }

        .email-container {
            max-width: 600px;
            margin: 30px auto;
            background-color: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.05);
            border: 1px solid #ddd;
        }

        .email-header {
            background: linear-gradient(135deg, #6A82FB, #FC5C7D);
            color: white;
            text-align: center;
            padding: 40px 30px;
        }

        .email-header h1 {
            font-size: 26px;
            margin: 0;
            font-weight: 700;
        }

        .email-body {
            padding: 30px 30px;
            color: #555;
            line-height: 1.7;
        }

        .email-body h4 {
            font-size: 22px;
            margin-bottom: 15px;
            color: #333;
        }

        .email-body p {
            font-size: 16px;
            margin: 15px 0;
        }

        .email-body ul {
            padding-left: 20px;
        }

        .email-body li {
            margin-bottom: 10px;
        }

        .email-footer {
            background-color: #f9f9f9;
            text-align: center;
            padding: 25px 20px;
            font-size: 13px;
            color: #888;
            border-top: 1px solid #eaeaea;
        }

        .email-footer a {
            color: #6A82FB;
            text-decoration: none;
            margin: 0 5px;
        }

        .email-footer a:hover {
            text-decoration: underline;
        }

        @media (max-width: 600px) {
            .email-container {
                margin: 15px;
            }

            .email-header h1 {
                font-size: 22px;
            }

            .email-body h4 {
                font-size: 20px;
            }

            .email-body p,
            .email-footer {
                font-size: 14px;
            }
        }
    </style>
</head>

<body>
    <div class="email-container">
        <!-- Header -->
        <div class="email-header">
            <h1>Chào mừng bạn đến với DZFullStack</h1>
        </div>

        <!-- Body -->
        <div class="email-body">
            <h4>Xin chào {{ $user->ho_va_ten }},</h4>

            <p>Cảm ơn bạn đã đăng ký và đăng nhập vào hệ thống!</p>
            <p>Dưới đây là một số gợi ý để bạn bắt đầu:</p>
            <ul>
                <li>Khám phá các khóa học miễn phí</li>
                <li>Tham gia nhóm hỗ trợ trên Facebook</li>
                <li>Liên hệ admin nếu cần hỗ trợ kỹ thuật</li>
            </ul>
            <!-- Khuyến mãi -->
            <div
                style="background-color: #fef3c7; border-left: 6px solid #f59e0b; padding: 20px; margin-top: 30px; border-radius: 6px;">
                <h4 style="margin-top: 0; color: #b45309;">🎁 Quà tặng đặc biệt cho bạn!</h4>
                <p>Nhập mã <b style="font-size: 20px; color: #d97706;">{{ $couponCode }}</b> khi thanh toán để được <b>giảm
                        10%</b> cho đơn hàng đầu tiên.</p>
                <p><small>Mã giảm giá có hiệu lực trong vòng 3 ngày kể từ hôm nay.</small></p>
            </div>

            <!-- Thêm ngay dưới đoạn chúc học tập vui vẻ -->
            <div class="email-cta" style="text-align: center; margin-top: 30px;">
                <a href="{{ url('http://localhost:5173/trang-chu') }}" target="_blank"
                    style="background-color: #6A82FB;
              color: #ffffff;
              text-decoration: none;
              font-size: 16px;
              font-weight: 600;
              padding: 14px 30px;
              border-radius: 6px;
              box-shadow: 0 4px 12px rgba(106, 130, 251, 0.3);
              display: inline-block;">
                    Truy cập Trang Chủ
                </a>
            </div>
            <p>Chúc bạn học tập hiệu quả và vui vẻ tại DZFullStack!</p>
        </div>

        <!-- Footer -->
        <div class="email-footer">
            <p>Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi.</p>
            <p>Mọi thông tin xin liên hệ: <a href="mailto:support@dzfullstack.com">support@dzfullstack.com</a> |
                Hotline: 0335-446-435</p>
            <p>© 2025 DZFullStack. All rights reserved.</p>
        </div>
    </div>
</body>

</html>
