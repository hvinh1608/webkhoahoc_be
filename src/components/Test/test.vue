<template>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>DANH SÁCH GIAO DỊCH</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr class="text-center">
                                    <th class="align-middle">#</th>
                                    <th class="align-middle">Mã Giao Dịch</th>
                                    <th class="align-middle">Số Tiền Gửi</th>
                                    <th class="align-middle">Số Tiền Nhận</th>
                                    <th class="align-middle">Nội Dung</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-for="(value,index) in list " :key="index">
                                    <tr>
                                        <th class="align-middle">{{ index + 1 }}</th>
                                        <td class="align-middle">{{ value.refNo }}</td>
                                        <td class="align-middle">{{ formatVnd(value.debitAmount) }}</td>
                                        <td class="align-middle">{{ formatVnd(value.creditAmount) }}</td>
                                        <td class="align-middle">{{ value.description }}</td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios';
export default {
    mounted() {
        this.layDuLieu();
    },
    methods: {
        layDuLieu() {
                var payload = {
                    "USERNAME": "",
                    "PASSWORD": "",
                    "DAY_BEGIN": "13/12/2024",
                    "DAY_END": "26/12/2024",
                    "NUMBER_MB": ""
                };
                axios
                    .post("https://api-mb.dzmid.io.vn/mb", payload)
                    .then((response) => {
                        console.log(response.data.data);
                        this.list = response.data.data;
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            },
            formatVnd(amount) {
                return new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(amount);
            }
    },
    data() {
        return {
            
            list : [],
        }
    },
}
</script>
<style></style>