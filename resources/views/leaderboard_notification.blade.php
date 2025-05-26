<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Thông báo bảng xếp hạng</title>
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #f0f2f5;
            margin: 0;
            padding: 40px 0;
        }

        .wrapper {
            max-width: 600px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.06);
            overflow: hidden;
            border: 1px solid #e5e7eb;
        }

        .header {
            background: #2563eb;
            color: white;
            padding: 20px 28px;
            font-size: 20px;
            font-weight: 600;
            text-align: center;
        }

        .content {
            padding: 28px;
            font-size: 16px;
            line-height: 1.6;
            color: #374151;
        }

        .highlight {
            color: #f59e0b;
            font-weight: 600;
        }

        .button-container {
            text-align: center;
            margin-top: 24px;
        }

        .cta-button {
            background: #3b82f6;
            color: white;
            padding: 12px 24px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
            display: inline-block;
        }

        .cta-button:hover {
            background: #2563eb;
        }

        .footer {
            background: #f9fafb;
            padding: 16px;
            font-size: 13px;
            color: #6b7280;
            text-align: center;
            border-top: 1px solid #e5e7eb;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="header">
        🚀 Cảnh Báo Bảng Xếp Hạng
    </div>

    <div class="content">
        Xin chào <span class="highlight">{{ $tenNguoiNhan }}</span>,
        <br><br>
        Có học viên <span class="highlight">{{ $tenNguoiSapVuot }}</span> đang <strong>sắp vượt qua bạn</strong> trên bảng xếp hạng!
        <br><br>
        Hãy cố gắng hơn nữa để giữ vững vị trí <span class="highlight">top 1</span> nhé!

        <div class="button-container">
            <a href="http://localhost:5173/bang-xep-hang" class="cta-button">Xem bảng xếp hạng</a>
        </div>
    </div>

    <div class="footer">
        Web Khóa Học &copy; {{ date('Y') }} — Chúng tôi luôn đồng hành cùng bạn!
    </div>
</div>
</body>
</html>
