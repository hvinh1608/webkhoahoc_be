<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quên mật khẩu</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f2f5f9;
            margin: 0;
            padding: 0;
        }
        .email-container {
            max-width: 650px;
            margin: 50px auto;
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            border: 1px solid #e0e0e0;
        }
        .email-header {
            background: linear-gradient(to right, #0066ff, #3399ff);
            color: white;
            text-align: center;
            padding: 40px 30px;
        }
        .email-header img {
            width: 90px;
            margin-bottom: 15px;
            border-radius: 50%;
        }
        .email-header h1 {
            margin: 0;
            font-size: 28px;
            font-weight: 700;
        }
        .email-body {
            padding: 35px 30px;
            color: #333;
            line-height: 1.7;
        }
        .email-body p {
            margin: 15px 0;
            font-size: 16px;
        }
        .email-body strong {
            color: #007BFF;
        }
        .email-body .btn {
            display: inline-block;
            margin: 30px 0;
            padding: 14px 30px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            font-size: 16px;
            font-weight: 600;
            border-radius: 6px;
            box-shadow: 0 4px 10px rgba(0, 123, 255, 0.3);
            transition: background-color 0.3s ease;
        }
        .email-body .btn:hover {
            background-color: #0056b3;
        }
        .email-footer {
            background-color: #f9f9f9;
            text-align: center;
            padding: 25px 20px;
            font-size: 14px;
            color: #777;
            border-top: 1px solid #e0e0e0;
        }
        .email-footer a {
            color: #007BFF;
            text-decoration: none;
        }
        .email-footer a:hover {
            text-decoration: underline;
        }
        @media (max-width: 600px) {
            .email-container {
                margin: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <img src="https://cdn-icons-png.flaticon.com/512/3178/3178158.png" alt="Quên mật khẩu">
            <h1>Yêu cầu quên mật khẩu</h1>
        </div>
        <div class="email-body">
            <p>Xin chào <strong>{{ $data['ho_va_ten'] }}</strong>,</p>
            <p>Chúng tôi đã nhận được yêu cầu đặt lại mật khẩu từ bạn.</p>
            <p>Để tiếp tục, vui lòng nhấn vào nút bên dưới:</p>
            <div style="text-align: center;">
                <a class="btn" href="{{ $data['link'] }}">Đặt lại mật khẩu</a>
            </div>
            <p>Nếu bạn không yêu cầu điều này, vui lòng bỏ qua email hoặc liên hệ với chúng tôi để được hỗ trợ.</p>
        </div>
        <div class="email-footer">
            <p>Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi.</p>
            <p>Mọi thông tin xin liên hệ: <a href="mailto:support@dzfullstack.com">support@dzfullstack.com</a> | Hotline: 0335-446-435</p>
            <p>© 2025 DZFullstack. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
