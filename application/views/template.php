<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Admin Dashboard Template">
	<meta name="keywords" content="admin,dashboard">
	<meta name="author" content="stacks">
	<!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<!-- Title -->
	<title>Dashboard Siswa</title>

	<!-- Styles -->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
	<link href="<?= site_url('assets/backend/') ?>plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?= site_url('assets/backend/') ?>plugins/perfectscroll/perfect-scrollbar.css" rel="stylesheet">
	<link href="<?= site_url('assets/backend/') ?>plugins/pace/pace.css" rel="stylesheet">


	<!-- Theme Styles -->
	<link href="<?= site_url('assets/backend/') ?>css/main.min.css" rel="stylesheet">
	<link href="<?= site_url('assets/backend/') ?>css/horizontal-menu/horizontal-menu.css" rel="stylesheet">
	<link href="<?= site_url('assets/backend/') ?>css/custom.css" rel="stylesheet">
	<link href="<?= base_url('assets/backend/') ?>plugins/dropzone/min/dropzone.min.css" rel="stylesheet">

	<link rel="icon" type="image/png" sizes="32x32" href="<?= site_url('assets/backend/') ?>images/neptune.png" />
	<link rel="icon" type="image/png" sizes="16x16" href="<?= site_url('assets/backend/') ?>images/neptune.png" />
	<script src="<?= site_url('assets/backend/') ?>plugins/jquery/jquery-3.5.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>
</head>

<body>
	<div class="app horizontal-menu align-content-stretch d-flex flex-wrap">
		<div class="app-container">
			<div class="search container">
				<form>
					<input class="form-control" type="text" placeholder="Type here..." aria-label="Search">
				</form>
				<a href="#" class="toggle-search"><i class="material-icons">close</i></a>
			</div>
			<div class="app-header">
				<nav class="navbar navbar-light navbar-expand-lg container">
					<div class="container-fluid">
						<div class="navbar-nav" id="navbarNav">
							<div class="logo">
								<a href="#">Dashboard</a>
							</div>
							<ul class="navbar-nav">
								<li class="nav-item">
									<a class="nav-link hide-sidebar-toggle-button" href="#"><i class="material-icons">last_page</i></a>
								</li>
							</ul>
						</div>
						<div class="d-flex">
							<ul class="navbar-nav">
								<li class="nav-item hidden-on-mobile">
									<a class="nav-link language-dropdown-toggle" href="<?= site_url('siswa/profile') ?>"><img src="<?= $this->ardesign->profile() ?>" alt=""></a>
								</li>
							</ul>
						</div>
					</div>
				</nav>
			</div>

			<div class="app-menu">
				<div class="container">
					<ul class="menu-list">
						<li class="">
							<a href="<?= base_url('siswa') ?>" class="">Dashboard</a>
						</li>
						<li class="">
							<a href="<?= base_url('siswa/profile') ?>" class="">Profile</a>
						</li>
						<li class="">
							<a href="<?= base_url('auth/logout') ?>" class="">Logout</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="app-content">
				<div class="content-wrapper">
					<div class="container">
						<?php echo $contents; ?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Javascripts -->

	<script src="<?= site_url('assets/backend/') ?>plugins/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?= site_url('assets/backend/') ?>plugins/perfectscroll/perfect-scrollbar.min.js"></script>
	<script src="<?= site_url('assets/backend/') ?>plugins/pace/pace.min.js"></script>
	<script src="<?= site_url('assets/backend/') ?>js/main.min.js"></script>
	<script src="<?= site_url('assets/backend/') ?>js/custom.js"></script>
	<!-- <script src="<?= site_url('assets/backend/') ?>js/pages/dashboard.js"></script> -->
</body>

</html>
