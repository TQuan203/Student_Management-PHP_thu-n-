<?php
include "DB_connection.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Welcome to BK TeachingLearning System -->
	<title>
		<?php
		$title = "ULSA Student Management System";
		include "header.php";
		?>
	</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
	<link rel="stylesheet" href="css/style2.css">
	<link rel="icon" href="imgs/icon">
</head>

<body class="body-home">
	<div class="black-fill"><br /> <br />
		<div class="container">
			<nav class="navbar navbar-expand-lg bg-light" id="homeNav">
				<div class="container-fluid">
					<a class="navbar-brand" href="#">
						<img src="imgs/logo2.png" width="40">
					</a>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav me-auto mb-2 mb-lg-0">
							<li class="nav-item">
								<a class="nav-link active" aria-current="page" href="#">Trang chủ</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#about">Giới thiệu</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#contact">Liên hệ</a>
							</li>
						</ul>
						<ul class="navbar-nav me-right mb-2 mb-lg-0">
							<?php
							if (isset($_SESSION['tucach'])) {
								if ($_SESSION['tucach'] == 'Admin') {
									$href_query = "./Admin/index.php";
								} else if ($_SESSION['tucach'] == 'GiangVien') {
									$href_query = "./GiangVien/index.php";
								} else if ($_SESSION['tucach'] == 'SinhVien') {
									$href_query = "./SinhVien/index.php";
								}
							?>
								<li class="nav-item">
									<a class="nav-link" href="<?php echo $href_query; ?>">Trang cá nhân</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="index_logout.php">Đăng xuất</a>
								</li>
							<?php
							} else { ?>
								<li class="nav-item">
									<a class="nav-link" href="login.php">Đăng nhập</a>
								</li>
							<?php } ?>
						</ul>
					</div>
				</div>
			</nav>
			<section class="welcome-text d-flex justify-content-center align-items-center flex-column">
				<img src="imgs/logo2.png">
				<h4>ULSA Student Management System</h4>
				<p></p>
			</section>
			<section id="about" class="d-flex justify-content-center align-items-center flex-column">
				<div class="card mb-3 card-1">
					<div class="row g-0">
						<div class="col-md-4">
							<img src="imgs/logo2.png" alt="logo" class="img-fluid rounded-start">
						</div>
						<div class="col-md-8">
							<div class="card-body">
								<h5 class="card-title">Giới thiệu</h5>
								<p class="card-text">Về trường Đại học Lao Động & Xã Hội</p>
								<p class="card-text"><small class="text-muted">Trường Đại học Lao động - Xã hội là trường đại học công lập được thành lập trên cơ sở Trường Cao đẳng Lao động - Xã hội theo Quyết định số 26/2005/QĐ-TTg ngày 31/1/2005 của Thủ tướng Chính phủ[1] chịu sự lãnh đạo và quản lý trực tiếp của Bộ Lao động - Thương binh và Xã hội và chịu sự quản lý về chuyên môn của Bộ Giáo dục và Đào tạo. Trụ sở chính của trường được đặt tại số 43 đường Trần Duy Hưng, phường Trung Hòa, quận Cầu Giấy, thành phố Hà Nội. Năm thành lập trường được chọn là năm 1961. Ngày truyền thống của Trường là ngày 27 tháng 5.</small></p>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section id="contact" class="d-flex justify-content-center align-items-center flex-column">
				<div class="card mb-3 card-1">
					<div class="row g-0">
						<div class="col-md-4">
							<img src="imgs/logo2.png" alt="logo" class="img-fluid rounded-start">
						</div>
						<div class="col-md-8">
							<div class="card-body">
								<h5 class="card-title">Liên hệ</h5><br/>
								
								<p class="card-text"><span class="material-symbols-outlined">
										call
									</span> 043.5564584</p>
								<p class="card-text"><span class="material-symbols-outlined">
										home
									</span>43 Trần Duy Hưng, Trung Hòa, Cầu Giấy, Hà Nội</p>
								<p class="card-text"><small class="text-muted">ULSA</small></p>
							</div>
						</div>
					</div>
				</div>
			</section>
			<?php include "footer.php"; ?>

		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>