<html>

<head>
    <style>
        /* Reset các kiểu mặc định của trình duyệt */
        body,
        html {
            margin: 0;
            padding: 0;
            height: 100%;
            width: 100%;
        }

        /* Căn giữa toàn bộ trang */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f4f7fc;
        }

        /* Chứng chỉ với kiểu dáng đẹp, căn giữa */
        .certificate {
            width: 70%;
            /* Đặt chiều rộng chứng chỉ, có thể điều chỉnh */
            max-width: 800px;
            /* Đảm bảo chứng chỉ không quá rộng */
            padding: 40px;
            border: 15px solid #4caf50;
            border-radius: 20px;
            background-color: white;
            text-align: center;
            box-sizing: border-box;
            position: relative;
            margin: 20px;
        }

        /* Tiêu đề chứng chỉ */
        .title {
            font-size: 35px;
            font-weight: bold;
            color: #4caf50;
            margin-bottom: 20px;
        }

        /* Tên người dùng và khóa học */
        .name {
            font-size: 38px;
            font-weight: bold;
            color: #333;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        /* Phần chân chứng chỉ */
        .footer {
            margin-top: 40px;
            font-size: 18px;
            color: #777;
            font-style: italic;
        }

        /* Tạo một đường kẻ để phân tách */
        .line {
            margin: 30px auto;
            width: 100px;
            border-top: 2px solid #4caf50;
        }

        /* Chữ ký người cấp chứng chỉ */
        .signature {
            font-size: 20px;
            margin-top: 30px;
            color: #333;
        }

        /* Ngày cấp chứng chỉ */
        .date {
            font-size: 18px;
            color: #777;
            margin-top: 10px;
        }

        @font-face {
            font-family: 'DejaVu Sans';
            src: url('{{ storage_path('fonts/DejaVuSans.ttf') }}') format('truetype');
        }

        body {
            font-family: 'DejaVu Sans', sans-serif;
        }
    </style>
</head>

<body>
    <div class="certificate">
        <div class="title">Chứng chỉ hoàn thành khóa học</div>
        <p>Chứng nhận rằng</p>
        <div class="name">{{ $tenNguoiDung }}</div>
        <p>đã hoàn thành khóa học</p>
        <div class="name">{{ $tenKhoaHoc }}</div>
        <p>vào ngày {{ $ngayHoanThanh }}</p>

        <div class="line"></div>

        <div class="footer">Cảm ơn bạn đã tham gia khóa học của chúng tôi!</div>

        <div class="signature">Giám đốc Chương Trình</div>
        <div class="date">Ngày {{ $ngayHoanThanh }}</div>
    </div>
</body>

</html>
