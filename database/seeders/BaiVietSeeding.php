<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BaiVietSeeding extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $startDate  = Carbon::create(2024, 10, 1);
        $endDate    = Carbon::create(2024, 12, 1);
        DB::table('bai_viets')->delete();
        DB::table('bai_viets')->truncate();
        DB::table('bai_viets')->insert([
            [
                'tieu_de' => 'Tôi đã viết Chrome extension đầu tiên của mình bằng Github Copilot như thế nào?',
                'slug_tieu_de' => 'toi-da-viet-chrome-extension-dau-tien-cua-minh-bang-github-copilot-nhu-the-nao',
                'hinh_anh' => 'https://files.fullstack.edu.vn/f8-prod/blog_posts/9976/65fa652ce3a64.jpg',
                'mo_ta_ngan' => 'Hướng dẫn viết Chrome extension đầu tiên bằng Github Copilot.',
                'noi_dung' => '<ol>
                    <li>Cấu trúc thư mục cơ bản của một extension.</li>
                    <li>Cách tạo manifest.json để khai báo thông tin extension.</li>
                    <li>Viết file background script và content script.</li>
                    <li>Làm thế nào để Copilot gợi ý code một cách thông minh.</li>
                    <li>Debug và đóng gói extension để chạy thử.</li>
                </ol>',
                'tinh_trang' => 1,
                'id_chuyen_muc' => 1,
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'tieu_de' => 'Hành trình trở thành lập trình viên Fullstack từ con số 0',
                'slug_tieu_de' => 'hanh-trinh-tro-thanh-lap-trinh-vien-fullstack-tu-con-so-0',
                'hinh_anh' => 'https://files.fullstack.edu.vn/f8-prod/blog_posts/279/6153f692d366e.jpg',
                'mo_ta_ngan' => 'Chia sẻ lộ trình học tập để trở thành một lập trình viên Fullstack chuyên nghiệp.',
                'noi_dung' => '<ol>
                    <li>Học về HTML, CSS, và JavaScript.</li>
                    <li>Làm quen với các framework Frontend như Vue.js hoặc React.</li>
                    <li>Học về Backend với Node.js và Express.js hoặc Laravel.</li>
                    <li>Hiểu về database: SQL (MySQL, PostgreSQL) và NoSQL (MongoDB).</li>
                    <li>Triển khai dự án thực tế và làm quen với DevOps.</li>
                </ol>',
                'tinh_trang' => 1,
                'id_chuyen_muc' => 1,
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'tieu_de' => 'Những công nghệ quan trọng trong Fullstack Development',
                'slug_tieu_de' => 'nhung-cong-nghe-quan-trong-trong-fullstack-development',
                'hinh_anh' => 'https://files.fullstack.edu.vn/f8-prod/blog_posts/107/613a1f3685814.png',
                'mo_ta_ngan' => 'Tổng hợp các công nghệ quan trọng mà một lập trình viên Fullstack cần nắm vững.',
                'noi_dung' => '<ol>
                    <li>HTML, CSS, JavaScript.</li>
                    <li>Frontend Frameworks: React, Vue.js, Angular.</li>
                    <li>Backend Frameworks: Node.js, Express.js, Laravel, Django.</li>
                    <li>Cơ sở dữ liệu: MySQL, PostgreSQL, MongoDB.</li>
                    <li>Authentication & Authorization: JWT, OAuth.</li>
                    <li>DevOps & Deployment: Docker, Kubernetes, AWS.</li>
                    <li>CI/CD: GitHub Actions, Jenkins.</li>
                </ol>',
                'tinh_trang' => 1,
                'id_chuyen_muc' => 2,
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'tieu_de' => 'So sánh giữa Fullstack, Frontend và Backend Developer',
                'slug_tieu_de' => 'so-sanh-giua-fullstack-frontend-va-backend-developer',
                'hinh_anh' => 'https://files.fullstack.edu.vn/f8-prod/blog_posts/791/615de64de7e8f.jpg',
                'mo_ta_ngan' => 'Tìm hiểu sự khác nhau giữa các vị trí lập trình viên Fullstack, Frontend và Backend.',
                'noi_dung' => '<ol>
                    <li>Frontend Developer: Chuyên về giao diện người dùng.</li>
                    <li>Backend Developer: Xử lý logic phía server và quản lý database.</li>
                    <li>Fullstack Developer: Kết hợp cả Frontend và Backend.</li>
                </ol>',
                'tinh_trang' => 1,
                'id_chuyen_muc' => 2,
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'tieu_de' => 'Xây dựng một ứng dụng web Fullstack với Vue.js và Laravel',
                'slug_tieu_de' => 'xay-dung-ung-dung-web-fullstack-voi-vuejs-va-laravel',
                'hinh_anh' => 'https://files.fullstack.edu.vn/f8-prod/courses/7.png',
                'mo_ta_ngan' => 'Hướng dẫn xây dựng một ứng dụng web Fullstack hoàn chỉnh với Vue.js và Laravel.',
                'noi_dung' => '<ol>
                    <li>Cài đặt Laravel.</li>
                    <li>Tạo API với Laravel.</li>
                    <li>Cài đặt Vue.js.</li>
                    <li>Xây dựng giao diện.</li>
                    <li>Triển khai ứng dụng.</li>
                </ol>',
                'tinh_trang' => 1,
                'id_chuyen_muc' => 3,
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'tieu_de' => 'Cách tối ưu hiệu suất cho ứng dụng Fullstack',
                'slug_tieu_de' => 'cach-toi-uu-hieu-suat-cho-ung-dung-fullstack',
                'hinh_anh' => 'https://files.fullstack.edu.vn/f8-prod/courses/2.png',
                'mo_ta_ngan' => 'Hướng dẫn tối ưu hóa hiệu suất cho ứng dụng Fullstack với các mẹo hữu ích.',
                'noi_dung' => '<ol>
                    <li>Sử dụng bộ nhớ đệm (Caching).</li>
                    <li>Lazy Loading.</li>
                    <li>Tối ưu truy vấn database.</li>
                    <li>Giảm kích thước file JavaScript và CSS.</li>
                    <li>Tối ưu Server Response.</li>
                    <li>Sử dụng CDN.</li>
                    <li>Kiểm tra hiệu suất với Lighthouse.</li>
                </ol>',
                'tinh_trang' => 1,
                'id_chuyen_muc' => 3,
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'tieu_de' => 'Các bước học lập trình hiệu quả cho người mới bắt đầu',
                'slug_tieu_de' => 'cac-buoc-hoc-lap-trinh-hieu-qua-cho-nguoi-moi-bat-dau',
                'hinh_anh' => 'https://it.ctim.edu.vn/uploads/images/T11_2021/114212_Ngon-ngu-lap-trinh-la-gi-1.jpg',
                'mo_ta_ngan' => 'Gợi ý lộ trình học lập trình hiệu quả từ con số 0.',
                'noi_dung' => '<ul><li>Xác định mục tiêu học lập trình: Bạn cần rõ ràng về mục tiêu học lập trình để không bị mất phương hướng. Mục tiêu có thể là học để làm việc với một công nghệ cụ thể, phát triển sản phẩm, hoặc thậm chí tạo ra một công ty riêng.</li><li>Chọn ngôn ngữ phù hợp: Tùy thuộc vào mục tiêu, bạn nên chọn ngôn ngữ lập trình phù hợp. Nếu bạn muốn phát triển web, hãy bắt đầu với JavaScript hoặc Python. Nếu bạn muốn làm việc với các ứng dụng di động, hãy tìm hiểu Swift (iOS) hoặc Kotlin (Android).</li><li>Thực hành qua các bài tập: Đọc lý thuyết là quan trọng, nhưng việc thực hành là chìa khóa để bạn nắm vững kỹ năng lập trình. Thực hành giải quyết các bài toán, viết mã, và tạo dự án thực tế.</li><li>Tham gia dự án thực tế: Khi bạn cảm thấy tự tin, hãy bắt đầu tham gia các dự án thực tế. Bạn có thể làm các dự án cá nhân hoặc tham gia vào các dự án mã nguồn mở để tích lũy kinh nghiệm và mở rộng mối quan hệ trong ngành công nghiệp phần mềm.</li></ul>',
                'tinh_trang' => 1,
                'id_chuyen_muc' => 1,
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'tieu_de' => 'REST API là gì? Cách hoạt động của nó ra sao?',
                'slug_tieu_de' => 'rest-api-la-gi-cach-hoat-dong-cua-no-ra-sao',
                'hinh_anh' => 'https://img.timviec.com.vn/2023/03/restful-api-la-gi-1.jpg',
                'mo_ta_ngan' => 'Giới thiệu về REST API và cách ứng dụng trong lập trình.',
                'noi_dung' => '<ul><li>Khái niệm REST API: REST (Representational State Transfer) là một kiến trúc phần mềm dựa trên các nguyên lý của HTTP. Nó cho phép các hệ thống giao tiếp với nhau qua các phương thức HTTP như GET, POST, PUT, DELETE. RESTful API giúp tách biệt frontend và backend, tạo ra sự linh hoạt trong việc phát triển ứng dụng.</li><li>HTTP methods cơ bản: Các phương thức cơ bản mà REST API sử dụng bao gồm GET (lấy dữ liệu), POST (gửi dữ liệu), PUT (cập nhật dữ liệu), và DELETE (xóa dữ liệu). Việc hiểu và sử dụng chính xác các phương thức này là rất quan trọng trong việc xây dựng một API hiệu quả.</li><li>Cách định nghĩa endpoint: Endpoint là các địa chỉ URL mà client sẽ gọi để tương tác với API. Ví dụ: `GET /users` để lấy danh sách người dùng, `POST /users` để tạo người dùng mới. Việc định nghĩa các endpoint hợp lý sẽ giúp API dễ sử dụng và bảo trì hơn.</li></ul>',
                'tinh_trang' => 1,
                'id_chuyen_muc' => 1,
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'tieu_de' => 'Vue.js và React: Nên chọn cái nào cho dự án của bạn?',
                'slug_tieu_de' => 'vuejs-va-react-nen-chon-cai-nao-cho-du-an-cua-ban',
                'hinh_anh' => 'https://images.viblo.asia/205eec97-3923-4360-a74b-d6c7963b4ced.jpg',
                'mo_ta_ngan' => 'So sánh giữa hai framework phổ biến: Vue.js và React.',
                'noi_dung' => '<ul><li>Ưu nhược điểm của Vue.js: Vue.js được biết đến là một framework nhẹ, dễ học và sử dụng. Với hệ thống phản ứng dữ liệu và cấu trúc đơn giản, Vue.js phù hợp với các dự án vừa và nhỏ. Tuy nhiên, khi dự án trở nên lớn, Vue.js có thể gặp khó khăn trong việc mở rộng.</li><li>Ưu nhược điểm của React: React, mặc dù ban đầu khó học hơn Vue, nhưng lại rất mạnh mẽ và có thể sử dụng cho các ứng dụng phức tạp. React sử dụng JSX, giúp việc xây dựng giao diện trở nên linh hoạt hơn. Một số nhược điểm của React là việc quản lý trạng thái phức tạp và cần thêm các thư viện bên ngoài để xử lý routing, state management, v.v.</li><li>Trường hợp nên dùng từng cái: Nếu dự án của bạn nhỏ và cần phát triển nhanh, Vue.js có thể là lựa chọn tuyệt vời. Nếu bạn cần xây dựng một ứng dụng lớn với nhiều tính năng, React sẽ cung cấp một hệ sinh thái mạnh mẽ và linh hoạt hơn.</li></ul>',
                'tinh_trang' => 1,
                'id_chuyen_muc' => 2,
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'tieu_de' => 'Hướng dẫn sử dụng Git và GitHub cho người mới',
                'slug_tieu_de' => 'huong-dan-su-dung-git-va-github-cho-nguoi-moi',
                'hinh_anh' => 'https://i.ytimg.com/vi/ENz7elfJPQQ/maxresdefault.jpg',
                'mo_ta_ngan' => 'Tìm hiểu các thao tác Git cơ bản để quản lý mã nguồn hiệu quả.',
                'noi_dung' => '<ul><li>Git init, add, commit, push: Git giúp bạn quản lý mã nguồn và theo dõi sự thay đổi của dự án. `git init` tạo một repository mới, `git add` thêm các thay đổi vào staging area, `git commit` ghi lại một phiên bản mới, và `git push` gửi các thay đổi lên remote repository như GitHub.</li><li>Branch và merge: Git hỗ trợ việc tạo nhánh (branch) để làm việc riêng biệt mà không làm ảnh hưởng đến nhánh chính (master). Sau khi hoàn thành công việc, bạn có thể merge các thay đổi vào nhánh chính.</li><li>Pull request và collaboration: Khi làm việc nhóm, bạn sẽ tạo pull request để yêu cầu ghép các thay đổi vào nhánh chính. Việc này giúp nhóm kiểm tra và thảo luận về mã nguồn trước khi hợp nhất.</li></ul>',
                'tinh_trang' => 1,
                'id_chuyen_muc' => 2,
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'tieu_de' => 'Kết nối frontend với backend bằng Axios',
                'slug_tieu_de' => 'ket-noi-frontend-voi-backend-bang-axios',
                'hinh_anh' => 'https://image.vietnix.vn/wp-content/uploads/2024/07/Axios.jpg',
                'mo_ta_ngan' => 'Cách dùng Axios để gọi API trong các ứng dụng web.',
                'noi_dung' => '<ul><li>Giới thiệu Axios: Axios là một thư viện JavaScript dùng để thực hiện các cuộc gọi HTTP, rất hữu ích trong việc kết nối frontend và backend. Axios hỗ trợ promise, giúp xử lý các cuộc gọi không đồng bộ một cách dễ dàng.</li><li>GET, POST, PUT, DELETE với Axios: Bạn có thể sử dụng Axios để thực hiện các phương thức HTTP như GET (lấy dữ liệu), POST (gửi dữ liệu), PUT (cập nhật dữ liệu) và DELETE (xóa dữ liệu).</li><li>Xử lý lỗi và loading: Axios hỗ trợ xử lý lỗi và trạng thái loading khi gửi yêu cầu HTTP, giúp người dùng có trải nghiệm mượt mà hơn khi ứng dụng đang tải dữ liệu.</li></ul>',
                'tinh_trang' => 1,
                'id_chuyen_muc' => 3,
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'tieu_de' => 'Authentication và Authorization khác nhau thế nào?',
                'slug_tieu_de' => 'authentication-va-authorization-khac-nhau-the-nao',
                'hinh_anh' => 'https://cdn.bap-software.net/2024/02/06163413/Authentication5-e1708480549831.jpg',
                'mo_ta_ngan' => 'Phân biệt rõ ràng giữa xác thực và phân quyền.',
                'noi_dung' => '<ul><li>Authentication: Xác minh danh tính người dùng. Ví dụ, khi bạn đăng nhập vào một hệ thống, hệ thống cần xác thực tên người dùng và mật khẩu để đảm bảo bạn là ai.</li><li>Authorization: Phân quyền truy cập cho người dùng sau khi đã xác thực. Sau khi bạn đăng nhập, hệ thống sẽ kiểm tra bạn có quyền truy cập vào tài nguyên cụ thể hay không.</li><li>Các kỹ thuật phổ biến: JWT (JSON Web Token) và session là những kỹ thuật phổ biến dùng trong xác thực và phân quyền. JWT cho phép xác thực không cần duy trì session server, trong khi session yêu cầu lưu trữ thông tin trên server.</li></ul>',
                'tinh_trang' => 1,
                'id_chuyen_muc' => 3,
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'tieu_de' => 'Làm thế nào để viết code sạch?',
                'slug_tieu_de' => 'lam-the-nao-de-viet-code-sach',
                'hinh_anh' => 'https://topdev.vn/blog/wp-content/uploads/2021/05/clean-code.jpg',
                'mo_ta_ngan' => 'Các nguyên tắc giúp bạn viết mã dễ đọc và dễ bảo trì.',
                'noi_dung' => '<ul><li>Đặt tên biến rõ ràng: Tên biến nên phản ánh chính xác mục đích của nó. Điều này giúp code dễ hiểu và giảm thiểu khả năng lỗi khi bảo trì mã.</li><li>Viết hàm ngắn gọn: Hàm chỉ nên làm một việc và làm tốt việc đó. Điều này giúp giảm thiểu sự phụ thuộc giữa các phần của mã và tăng tính dễ bảo trì.</li><li>Tuân thủ nguyên tắc SOLID: Đây là bộ nguyên tắc quan trọng trong lập trình hướng đối tượng, giúp tạo ra mã nguồn dễ bảo trì và dễ mở rộng.</li></ul>',
                'tinh_trang' => 1,
                'id_chuyen_muc' => 1,
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'tieu_de' => 'Làm quen với Docker cho lập trình viên web',
                'slug_tieu_de' => 'lam-quen-voi-docker-cho-lap-trinh-vien-web',
                'hinh_anh' => 'https://www.citd.vn/wp-content/uploads/2020/06/docker-scaled.jpg',
                'mo_ta_ngan' => 'Giới thiệu cơ bản về Docker và ứng dụng trong lập trình.',
                'noi_dung' => '<ul><li>Khái niệm container và image: Docker sử dụng container để đóng gói ứng dụng và môi trường chạy của nó. Docker image là một bản sao của môi trường container, giúp dễ dàng triển khai ứng dụng ở bất kỳ đâu.</li><li>Dockerfile và docker-compose: Dockerfile là tệp cấu hình cho việc tạo Docker image. Docker-compose giúp bạn quản lý nhiều container cùng lúc trong một dự án, giúp đơn giản hóa việc phát triển và triển khai ứng dụng.</li><li>Triển khai app với Docker: Với Docker, bạn có thể triển khai ứng dụng của mình trên bất kỳ môi trường nào mà không lo về sự khác biệt giữa các máy chủ.</li></ul>',
                'tinh_trang' => 1,
                'id_chuyen_muc' => 2,
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'tieu_de' => 'Tạo một ứng dụng Todo với Laravel API và Vue 3',
                'slug_tieu_de' => 'tao-mot-ung-dung-todo-voi-laravel-api-va-vue-3',
                'hinh_anh' => 'https://i.ytimg.com/vi/XsgVCbzb78M/maxresdefault.jpg',
                'mo_ta_ngan' => 'Dự án thực tế giúp luyện tập kết nối frontend và backend.',
                'noi_dung' => '<ol><li>Laravel API: CRUD Todo.</li><li>Vue 3: Composition API.</li><li>Kết nối Axios và hiển thị Todo.</li></ol>',
                'tinh_trang' => 1,
                'id_chuyen_muc' => 3,
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'tieu_de' => 'Tại sao nên học lập trình hướng đối tượng (OOP)?',
                'slug_tieu_de' => 'tai-sao-nen-hoc-lap-trinh-huong-doi-tuong',
                'hinh_anh' => 'https://website-dev.hn.ss.bfcplatform.vn/Bvyoj_Btp_N9_G_Dw3_Bx_O_Sxf_OX_Czzqmv_PN_Bl4_XXG_7_Pi_W791iin_Qd_a71b2790be.jpg',
                'mo_ta_ngan' => 'Tìm hiểu về OOP và lợi ích khi sử dụng trong các dự án lớn.',
                'noi_dung' => '<ul><li>Khái niệm class, object: OOP cho phép bạn mô tả các đối tượng trong thế giới thực dưới dạng các class và object, giúp tăng tính mô-đun và tái sử dụng mã nguồn.</li><li>Tính kế thừa, đóng gói, đa hình: OOP hỗ trợ kế thừa (inheritance), cho phép tạo ra các lớp con từ lớp cha; đóng gói (encapsulation) giúp ẩn các chi tiết thực thi; và đa hình (polymorphism) cho phép đối tượng có thể biểu diễn nhiều hành vi khác nhau.</li><li>Áp dụng OOP trong Laravel: Laravel là một framework PHP mạnh mẽ và sử dụng OOP để tổ chức mã nguồn. Bạn có thể tận dụng các tính năng như controller, model, và service để tạo ra các ứng dụng dễ bảo trì và mở rộng.</li></ul>',
                'tinh_trang' => 1,
                'id_chuyen_muc' => 1,
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
        ]);
    }
}
