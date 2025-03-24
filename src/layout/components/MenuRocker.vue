<template>
	<div class="nav-container primary-menu">
		<div class="mobile-topbar-header">
			<div>
				<img src="../../assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
			</div>
			<div>
				<h4 class="logo-text">Rukada</h4>
			</div>
			<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
			</div>
		</div>
		<nav class="navbar navbar-expand-xl w-100">
			<ul class="navbar-nav justify-content-start flex-grow-1 gap-1">
				
				<li class="nav-item dropdown">
					<a href="javascript:;" class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown">
						<div class="parent-icon"><i class="bx bx-home-circle"></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>
					<ul class="dropdown-menu">
						<li> <a class="dropdown-item" href="index.html"><i class="bx bx-right-arrow-alt"></i>Default</a>
						</li>
						<li> <a class="dropdown-item" href="index.html"><i class="bx bx-right-arrow-alt"></i>Alternate</a>
						</li>
						<li> <a class="dropdown-item" href="index.html"><i class="bx bx-right-arrow-alt"></i>Graphical</a>
						</li>
					</ul>
				</li>

				<li class="nav-item">
					<router-link to="/admin/loai-khoa-hoc">
						<a class="nav-link" href="/admin/loai-khoa-hoc">
							<div class="parent-icon"><i class="fa-solid fa-bookmark"></i>
							</div>
							<div class="menu-title">Loại Khóa Học</div>
						</a>
					</router-link>
				</li>
				<li class="nav-item">
					<router-link to="/admin/bai-viet">
						<a class="nav-link" href="/admin/bai-viet">
							<div class="parent-icon"><i class="fa-solid fa-newspaper"></i>
							</div>
							<div class="menu-title">Bài Viết</div>
						</a>
					</router-link>
				</li>
				<li class="nav-item">
					<router-link to="/admin/khach-hang">
						<a class="nav-link" href="/admin/khach-hang">
							<div class="parent-icon"><i class="fa-solid fa-user-tie"></i>
							</div>
							<div class="menu-title">Khách Hàng</div>
						</a>
					</router-link>
				</li>
				<li class="nav-item">
					<router-link to="/admin/nhan-vien">
						<a class="nav-link" href="/admin/nhan-vien">
							<div class="parent-icon"><i class="fa-solid fa-user"></i>
							</div>
							<div class="menu-title">Nhân Viên</div>
						</a>
					</router-link>
				</li>
				<li class="nav-item">
					<router-link to="/admin/bai-hoc">
						<a class="nav-link" href="/admin/bai-hoc">
							<div class="parent-icon"><i class="fa-solid fa-book"></i>
							</div>
							<div class="menu-title">Bài Học</div>
						</a>
					</router-link>
				</li>
				<li class="nav-item">
					<router-link to="/admin/trac-nghiem">
						<a class="nav-link" href="/admin/trac-nghiem">
							<div class="parent-icon"><i class="fa-solid fa-file-export"></i>
							</div>
							<div class="menu-title">Trắc Nghiệm</div>
						</a>
					</router-link>
				</li>
				<li class="nav-item">
					<router-link to="/admin/phan-quyen">
						<a class="nav-link" href="/admin/phan-quyen">
							<div class="parent-icon"><i class="fa-solid fa-user-lock"></i>
							</div>
							<div class="menu-title">Phân Quyền</div>
						</a>
					</router-link>
				</li>
				<li class="nav-item">
					<router-link to="/admin/lich-su-giao-dich">
						<a class="nav-link" href="/admin/lich-su-giao-dich">
							<div class="parent-icon"><i class="fa-solid fa-clock-rotate-left"></i>
							</div>
							<div class="menu-title">Lịch Sử Giao Dịch</div>
						</a>
					</router-link>
				</li>
				<li class="nav-item">
					<router-link to="/admin/chart">
						<a class="nav-link" href="/admin/chart">
							<div class="parent-icon"><i class="fa-solid fa-chart-line"></i>
							</div>
							<div class="menu-title">Chart</div>
						</a>
					</router-link>
				</li>
			</ul>
		</nav>
	</div>
</template>
<script>
export default {

}
</script>
<style></style>