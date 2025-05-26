<template>
	<div class="topbar d-flex align-items-center">
		<nav class="navbar navbar-expand">
			<router-link to="/">
				<div class="topbar-logo-header d-flex align-items-center">
						<img src="https://dzfullstack.com/assets/images/logo-img.png" class="logo-icon" style="width: 70px;"
							alt="logo icon">
						<h4 class="mt-3 ms-2">DZFULLSTACK</h4>
				</div>
			</router-link>
			<div class="mobile-toggle-menu"><i class='bx bx-menu'></i></div>
			<div class="search-bar flex-grow-1">
				<div class="position-relative search-bar-box input-group w-100">
					<input type="text" class="form-control search-control border border-1 border-secondary radius-30"
						placeholder="Search..."> <span
						class="position-absolute top-50 search-show translate-middle-y"><i
							class='bx bx-search'></i></span>
					<span class="position-absolute top-50 search-close translate-middle-y"><i
							class='bx bx-x'></i></span>
					<button class="btn btn-outline-secondary radius-30" type="button" id="button-addon2">Tìm
						Kiếm</button>
				</div>
			</div>
			<div class="user-box dropdown">
				<template v-if="user.check">
					<a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#"
						role="button" data-bs-toggle="dropdown" aria-expanded="false">
						<img src="https://dzfullstack.com/assets/images/logo-img.png" class="user-img" alt="user avatar">
						<div class="user-info ps-3">
							<p class="user-name mb-0">{{ user.name }}</p>
							<p class="designattion mb-0">{{ user.email }}</p>
						</div>
					</a>
					<ul class="dropdown-menu dropdown-menu-end">
						<li>
							<router-link to="/profile">
								<a class="dropdown-item" href="/profile"><i class="bx bx-user"></i><span>Profile</span></a>
							</router-link>
						</li>
						<li><a v-on:click="logout()" class="dropdown-item" href="javascript:;"><i
									class='bx bx-log-out-circle'></i><span>Đăng Xuất</span></a>
						</li>
						<li><a v-on:click="logoutAll()" class="dropdown-item" href="javascript:;"><i
									class='bx bx-log-out-circle'></i><span>Đăng Xuất Tất Cả</span></a>
						</li>
					</ul>
				</template>
				<template v-else>
					<router-link to="/khach-hang/dang-nhap">
						<button type="button" class="btn btn-outline-dark px-5 radius-30 me-2 d-flex align-items-center"><i
							class="fa-regular fa-user me-2"></i>Đăng Nhập</button>
					</router-link>
					<router-link to="/khach-hang/dang-ky">
						<button type="button" class="btn btn-dark px-5 radius-30 d-flex align-items-center"><i
								class="fa-solid fa-arrow-right-to-bracket me-2"></i>Đăng Ký</button>
					</router-link>
				</template>
			</div>
		</nav>
	</div>
</template>
<script>
import axios from 'axios';
export default {
	data() {
		return {
			user: {},
		}
	},
	mounted() {
		this.user = {
			name: localStorage.getItem("name_kh"),
			email: localStorage.getItem("email_kh"),
			check: localStorage.getItem("check_kh")
		};
	},
	methods: {
		logout(){
			axios
				.get('http://127.0.0.1:8000/api/khach-hang/logout', {
                    headers : {
                        Authorization: 'Bearer ' + localStorage.getItem("key_khach_hang")
                    }
                })
				.then((res)=>{
					if(res.data.status){
						localStorage.removeItem('key_khach_hang');
						localStorage.removeItem("name_kh");
						localStorage.removeItem("email_kh");
						localStorage.removeItem("check_kh");
						this.$toast.success(res.data.message);
						this.$router.push('/')
					}else{
						this.$toast.error('Có lỗi xảy ra')
					}
				})
		},
		logoutAll(){
			axios
				.get('http://127.0.0.1:8000/api/khach-hang/logout-all', {
                    headers : {
                        Authorization: 'Bearer ' + localStorage.getItem("key_khach_hang")
                    }
                })
				.then((res)=>{
					if(res.data.status){
						localStorage.removeItem('key_khach_hang');
						localStorage.removeItem("name_kh");
						localStorage.removeItem("email_kh");
						localStorage.removeItem("check_kh");
						this.$toast.success(res.data.message);
						this.$router.push('/')
					}else{
						this.$toast.error(res.data.message)
					}
				})
				.catch((res) =>{
					this.$toast.error('Đã xảy ra lỗi')
				})
		}	
	},
}
</script>
<style></style>