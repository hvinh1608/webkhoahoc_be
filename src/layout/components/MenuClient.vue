<template>
	<div class="nav-container primary-menu">
		<div class="mobile-topbar-header">
			<div>
				<img src="https://dzfullstack.com/assets/images/logo-img.png" class="logo-icon" alt="logo icon">
			</div>
			<div>
				<h4 class="logo-text">DZFULLSTACK</h4>
			</div>
			<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
			</div>
		</div>
		<nav class="navbar navbar-expand-xl w-100">
			<ul class="navbar-nav justify-content-start flex-grow-1 gap-1">
				<li class="nav-item">
					<router-link to="/">
						<a class="nav-link" href="/">
							<div class="parent-icon"><i class='bx bx-home-circle'></i>
							</div>
							<div class="menu-title">Home</div>
						</a>
					</router-link>
				</li>
				<li class="nav-item">
					<router-link to="/bai-viet">
						<a class="nav-link" href="/bai-viet">
							<div class="parent-icon"><i class="fa-solid fa-newspaper"></i>
							</div>
							<div class="menu-title">Bài Viết</div>
						</a>
					</router-link>
				</li>
				<li class="nav-item">
					<router-link to="/trac-nghiem">
						<a class="nav-link" href="/trac-nghiem">
							<div class="parent-icon"><i class="fa-solid fa-list-check"></i>
							</div>
							<div class="menu-title">Trắc Nghiệm</div>
						</a>
					</router-link>
				</li>
				<li class="nav-item">
					<router-link to="/danh-sach-khoa-hoc">
						<a class="nav-link" href="/danh-sach-khoa-hoc">
							<div class="parent-icon"><i class="fa-solid fa-warehouse"></i>
							</div>
							<div class="menu-title">Danh Sách Khóa Học</div>
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