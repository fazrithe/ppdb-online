<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $name ?></title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
	<script src="<?php echo base_url('assets/backend/js/jquery-3.3.1.min.js'); ?>"></script>
	<style>
		@import url("https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap");

		@font-face {
			font-family: AstroSpace;
			src: url(/fonts/AstroSpace.ttf);
		}

		body {
			margin: 0;
			padding: 0;
			font-family: "Montserrat", sans-serif;
			background-color: #fff;
		}

		header {
			background-color: <?= $color ?>;
		}

		.main-nav {
			height: 90px;
		}

		.logo {
			color: white;
			line-height: 90px;
			font-size: 30px;
			font-weight: bold;
			text-decoration: none;
			margin-left: 30px;
			font-family: "AstroSpace", sans-serif;
		}

		.navlinks {
			list-style: none;
			float: right;
			line-height: 90px;
			margin: 0;
			padding: 0;
		}

		.navlinks li {
			display: inline-block;
			margin: 0px 20px;
		}

		.navlinks li a {
			color: white;
			text-decoration: none;
			font-size: 18px;
			transition: all 0.3s linear 0s;
			text-transform: uppercase;
		}

		.navlinks li a:hover {
			color: #7ebcb9;
			padding-bottom: 7px;
			border-bottom: 2px solid #7ebcb9;
		}

		li a.contact {
			background-color: #EA8907;
			padding: 9px 20px;
			border-radius: 50px;
			transition: all 0.3s ease 0s;
			border-bottom: none;
		}

		li a.contact:hover {
			background-color: #F59C25;
			color: white;
			border-bottom: none;
		}

		#check {
			display: none;
		}

		.menu-btn {
			font-size: 25px;
			color: white;
			float: right;
			line-height: 90px;
			margin-right: 40px;
			display: none;
			cursor: pointer;
		}

		@media (max-width: 800px) {
			.navlinks {
				position: fixed;
				width: 100%;
				height: 100vh;
				text-align: center;
				transition: all 0.5s;
				right: -100%;
				background: #222831;
			}

			.navlinks li {
				display: block;
			}

			.navlinks li a {
				font-size: 20px;
			}

			.navlinks li a:hover {
				border-bottom: none;
			}

			.menu-btn {
				display: block;
			}

			#check:checked~.navlinks {
				right: 0;
			}
		}

		@media (max-width: 360px) {
			.logo {
				margin-left: 10px;
				font-size: 25px;
			}

			.menu-btn {
				margin-right: 10px;
				font-size: 25px;
			}

			.menu-btn:focus {
				color: blue;
			}
		}
	</style>
</head>

<body>
	<header>
		<nav class="main-nav">
			<input type="checkbox" id="check" />
			<label for="check" class="menu-btn">
				<i class="fas fa-bars"></i>
			</label>
			<a href="<?= base_url() ?>" class="logo text-white" style="text-decoration:none"><?= strtoupper($name) ?></a>
			<ul class="navlinks">
				<!-- <li><a href="#">Services</a></li>
				<li><a href="#">Projects</a></li>
				<li><a href="#">About</a></li> -->
				<li><a href="#" class="contact"><?= date('Y-m-d H:i') ?></a></li>
			</ul>
		</nav>
	</header>

	<?php
	include $page_name . '.php';
	?>
	<!-- Modal -->
	<div class="modal fade" id="btn" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-body" style="background: url('https://img.freepik.com/premium-photo/leaves-twig-corner-white-background_23-2148217806.jpg');">
					<div class="row">
						<div class="col-md-12 text-center">
							<div class="mb-2">
								<img src="https://www.seekpng.com/png/full/356-3562377_personal-user.png" alt="" width="100px">
							</div>
							<span class="">Silahkan daftar jika anda belum mempunyai akun login.</span>
							<div class="p-3">
								<form action="<?= site_url('home/daftar') ?>" action="POST">
									<input type="hidden" name="jenjang" value="<?= $jenjang ?>">
									<input type="hidden" name="id_jenjang" value="<?= $id_jenjang ?>">
									<button type="submit" class="btn btn-primary btn-sm">Daftar Akun</button>
									<a href="<?= base_url('login') ?>" class="btn btn-info btn-sm">Login</a>
								</form>
								<!-- <a href="<?= base_url('home/daftar/?id=' . $jenjang) ?>" class="btn btn-primary btn-sm">Register</a> -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Footer -->
	<footer class="page-footer font-small blue pt-4">
		<!-- Copyright -->
		<div class="footer-copyright text-center py-3">© <?= date('Y') ?> Copyright
			<a href="<?= base_url() ?>">Sekolah Budi Agung - Jakarta</a>
		</div>
		<!-- Copyright -->

	</footer>
	<!-- Footer -->
	<script src="<?= base_url() ?>assets/backend/js/jquery-3.3.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
	<script>
		$(window).on('load', function() {
			$('#loading').hide();
		})
	</script>
</body>

</html>
