<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chào Mừng Quý Khách</title>
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

        .email-header img {
            max-width: 90px;
            margin-bottom: 15px;
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

        .email-cta {
            text-align: center;
            margin: 30px 0;
        }

        .email-cta a {
            background-color: #6A82FB;
            color: #ffffff;
            text-decoration: none;
            font-size: 16px;
            font-weight: 600;
            padding: 14px 30px;
            border-radius: 6px;
            box-shadow: 0 4px 12px rgba(106, 130, 251, 0.3);
            transition: background-color 0.3s ease;
        }

        .email-cta a:hover {
            background-color: #5C68E2;
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

            .email-cta a {
                font-size: 15px;
                padding: 12px 24px;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header -->
        <div class="email-header">
            <h1>Chào Mừng Quý Khách</h1>
        </div>

        <!-- Body -->
        <div class="email-body">
            <h4>Xin chào, {{ $data['ho_va_ten'] }}</h4>
            <p>Cảm ơn bạn đã đăng ký tại website của chúng tôi. Chúng tôi rất hân hạnh được đồng hành cùng bạn trong hành trình phát triển bản thân.</p>

            <!-- CTA -->
            <div class="email-cta">
                <a href="{{ $data['link'] }}" target="_blank">Kích Hoạt Tài Khoản</a>
            </div>

            <p>Nếu bạn không thực hiện hành động này, vui lòng bỏ qua email hoặc liên hệ với chúng tôi để được hỗ trợ.</p>
        </div>

        <!-- Footer -->
        <div class="email-footer">
            <p>Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi.</p>
            <p>Mọi thông tin xin liên hệ: <a href="mailto:support@dzfullstack.com">support@dzfullstack.com</a> | Hotline: 0335-446-435</p>
            <p>© 2025 DZFullstack. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
