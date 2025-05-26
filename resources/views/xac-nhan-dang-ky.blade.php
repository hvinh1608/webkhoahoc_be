<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Xác Nhận Đăng Ký</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7fa;
            margin: 0;
            padding: 0;
        }

        .email-container {
            max-width: 600px;
            margin: 40px auto;
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            border: 1px solid #e0e0e0;
        }

        .email-header {
            background: linear-gradient(to right, #00bcd4, #2196f3);
            color: white;
            padding: 40px 30px;
            text-align: center;
        }

        .email-header h1 {
            margin: 0;
            font-size: 26px;
        }

        .email-body {
            padding: 30px 30px;
            color: #333333;
            line-height: 1.6;
        }

        .email-body p {
            font-size: 16px;
            margin: 15px 0;
        }

        .email-body strong {
            color: #2196f3;
        }

        .email-footer {
            background-color: #f9f9f9;
            padding: 20px;
            font-size: 13px;
            text-align: center;
            color: #777777;
            border-top: 1px solid #e0e0e0;
        }

        .email-footer a {
            color: #2196f3;
            text-decoration: none;
        }

        .email-footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header -->
        <div class="email-header">
            <h1>Xác Nhận Đăng Ký Thành Công</h1>
        </div>

        <!-- Body -->
        <div class="email-body">
            <p>Chào bạn,</p>
            <p>Cảm ơn bạn đã đăng ký nhận thông tin khóa học từ <strong>DZFullstack</strong>.</p>
            <p>Chúng tôi sẽ gửi đến bạn những <strong>khóa học mới</strong> và <strong>ưu đãi đặc biệt</strong> qua địa chỉ email: <strong>{{ $email }}</strong></p>
            <p>Nếu có bất kỳ câu hỏi nào, đừng ngần ngại liên hệ với chúng tôi.</p>
            <p>Trân trọng,<br>Đội ngũ <strong>DZFullstack</strong></p>
        </div>

        <!-- Footer -->
        <div class="email-footer">
            <p>Mọi thông tin xin liên hệ: <a href="mailto:support@dzfullstack.com">support@dzfullstack.com</a> | Hotline: 0335-446-435</p>
            <p>© 2025 DZFullstack. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
