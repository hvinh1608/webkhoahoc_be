<template>
    <div class="row">
        <template v-for="(v, k) in list" :key="k">
            <div class="col-lg-4 d-flex">
                <div class="card flex-fill">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title" :class="{'text-danger' : !v.dap_an}">{{ v.cau_hoi }}</h5>
                        <hr class="mt-auto">
                        <div class="input-group">
                            <div class="input-group-text">
                                <input v-model="v.dap_an" class="form-check-input" value="1" type="radio"
                                    :name="'flexRadioDefault' + k">
                            </div>
                            <label class="form-control">{{ v.dap_an_1 }}</label>
                        </div>
                        <div class="input-group mt-2">
                            <div class="input-group-text">
                                <input v-model="v.dap_an" class="form-check-input" value="2" type="radio"
                                    :name="'flexRadioDefault' + k">
                            </div>
                            <label class="form-control">{{ v.dap_an_2 }}</label>
                        </div>
                        <div class="input-group mt-2">
                            <div class="input-group-text">
                                <input v-model="v.dap_an" class="form-check-input" value="3" type="radio"
                                    :name="'flexRadioDefault' + k">
                            </div>
                            <label class="form-control">{{ v.dap_an_3 }}</label>
                        </div>
                        <div class="input-group mt-2">
                            <div class="input-group-text">
                                <input v-model="v.dap_an" class="form-check-input" value="4" type="radio"
                                    :name="'flexRadioDefault' + k">
                            </div>
                            <label class="form-control">{{ v.dap_an_4 }}</label>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <button v-on:click="nopBai()" class="btn btn-danger w-100"><h4 class="mt-2 text-white">NỘP BÀI</h4></button>
        </div>
    </div>
</template>
<script>
import axios from 'axios';
export default {
    data() {
        return {
            list: [],
        }
    },
    mounted() {
        this.loadTracNghiem();
    },
    methods: {
        loadTracNghiem() {
            axios
                .get("http://127.0.0.1:8000/api/trac-nghiem/data-open", {
                    headers : {
                        Authorization: 'Bearer ' + localStorage.getItem("key_khach_hang")
                    }
                })
                .then((res) => {
                    this.list = res.data.data;
                })
        },
        nopBai()
        {
            let payload = {
                'list' : this.list
            }
            axios
                .post("http://127.0.0.1:8000/api/trac-nghiem/nop-bai", payload, {
                    headers : {
                        Authorization: 'Bearer ' + localStorage.getItem("key_khach_hang")
                    }
                })
                .then((res) => {
                    
                })
                .catch((res) => {
                    const list = Object.values(res.response.data.errors);
                    list.forEach((v, i) => {
                        this.$toast.error(v[0]);
                    });
                })
        }
    },
}
</script>
<style></style>