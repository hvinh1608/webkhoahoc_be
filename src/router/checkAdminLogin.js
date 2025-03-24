import axios from "axios";

export default function(from, to, next) {
    axios
        .get("http://127.0.0.1:8000/api/admin/nhan-vien/check-login", {
            headers: {
                Authorization: 'Bearer ' + localStorage.getItem("key_admin")
            }
        })
        .then((res) => {
            if (res.data.status) {
                next();
            } else {
                next("/admin/dang-nhap");
                this.$toast.error("Bạn cần đăng nhập trước!!!!");

            }
        });
}