<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Nạp tiền thành công</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f6f6f6;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 480px;
            margin: 40px auto;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 8px #eee;
            padding: 32px 24px;
            border: 1px solid #e0e0e0;
            /* Thêm dòng này để có khung rõ */
        }

        .title {
            color: #2d8f6f;
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 16px;
        }

        .amount {
            color: #2196f3;
            font-size: 28px;
            font-weight: bold;
            margin: 16px 0;
        }

        .content {
            font-size: 16px;
            color: #333;
            margin-bottom: 24px;
        }

        .footer {
            color: #888;
            font-size: 13px;
            text-align: center;
            margin-top: 32px;
        }

        .logo {
            width: 60px;
            margin-bottom: 16px;
        }

        @media (max-width: 600px) {
            .container {
                padding: 16px 4px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        {{-- <img src="https://yourdomain.com/logo.png" class="logo" alt="Logo"> --}}
        <div class="title">Nạp tiền thành công!</div>
        <div class="content">
            Xin chào <strong>{{ $ten_khach_hang }}</strong>,<br>
            Bạn đã nạp thành công số tiền:
        </div>
        <div class="amount">{{ number_format($so_tien) }} VNĐ</div>
        <div class="content">
            Số tiền đã được cộng vào tài khoản của bạn.<br>
            Nếu có thắc mắc, vui lòng liên hệ bộ phận hỗ trợ.
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} WebKhoaHoc. Xin cảm ơn bạn đã sử dụng dịch vụ!
        </div>
    </div>
</body>

</html>
