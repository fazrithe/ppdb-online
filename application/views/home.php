<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="favicon" href="<?php echo base_url() . 'assets/frontend/default/img/icons/favicon.ico' ?>">
	<link rel="apple-touch-icon" href="<?php echo base_url() . 'assets/frontend/default/img/icons/icon.png'; ?>">


	<link rel="stylesheet" href="<?php echo base_url() . 'assets/frontend/default/css/jquery.webui-popover.min.css'; ?>">
	<link rel="stylesheet" href="<?php echo base_url() . 'assets/frontend/default/css/slick.css'; ?>">
	<link rel="stylesheet" href="<?php echo base_url() . 'assets/frontend/default/css/slick-theme.css'; ?>">


	<!-- font awesome 5 -->
	<link rel="stylesheet" href="<?php echo base_url() . 'assets/frontend/default/css/fontawesome-all.min.css'; ?>">

	<link rel="stylesheet" href="<?php echo base_url() . 'assets/frontend/default/css/bootstrap.min.css'; ?>">

	<link rel="stylesheet" href="<?php echo base_url() . 'assets/frontend/default/css/main.css'; ?>">
	<link rel="stylesheet" href="<?php echo base_url() . 'assets/frontend/default/css/responsive.css'; ?>">
	<link rel="stylesheet" href="<?php echo base_url() . 'assets/frontend/default/css/custom.css'; ?>">
	<link rel="stylesheet" href="<?php echo base_url() . 'assets/frontend/default/css/tagify.css'; ?>">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400;1,500&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="<?php echo base_url() . 'assets/global/toastr/toastr.css' ?>">
	<script src="<?php echo base_url('assets/backend/js/jquery-3.3.1.min.js'); ?>"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<title>Home</title>
	<style>
		.bg {
			background: url(<?= site_url('uploads/system/bg.png') ?> );
			background-position: center top;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
		}

		.centered {
			position: fixed;
			top: 50%;
			left: 50%;
			/* bring your own prefixes */
			transform: translate(-50%, -50%);
		}

		.swal2-popup {
			background-color: #0FC1D7;
		}

		/** Responsive Layout **/
		@media (min-width: 992px) {
			.col-md-1-5 {
				width: 20%;
			}

			.col-md-2-5 {
				width: 40%;
			}

			.col-md-3-5 {
				width: 60%;
			}

			.col-md-4-5 {
				width: 80%;
			}

			.col-md-5-5 {
				width: 100%;
			}
		}

		@media (min-width: 1200px) {
			.col-lg-1-5 {
				width: 20%;
			}

			.col-lg-2-5 {
				width: 40%;
			}

			.col-lg-3-5 {
				width: 60%;
			}

			.col-lg-4-5 {
				width: 80%;
			}

			.col-lg-5-5 {
				width: 100%;
			}
		}

		@media (min-width: 768px) {
			.col-sm-1-5 {
				width: 20%;
			}

			.col-sm-2-5 {
				width: 40%;
			}

			.col-sm-3-5 {
				width: 60%;
			}

			.col-sm-4-5 {
				width: 80%;
			}

			.col-sm-5-5 {
				width: 100%;
			}
		}




		/* styling */
		.show-grid [class^=col-] span,
		.container-fluid .show-grid [class^=col-] {
			display: block;
			padding-top: 10px;
			padding-bottom: 10px;
			background-color: #eee;
			background-color: rgba(86, 61, 124, .15);
			text-align: center;
			border: 1px solid #ddd;
			border: 1px solid rgba(86, 61, 124, .2);
		}

		[class^=col-] {
			margin-bottom: 30px;
		}

		.btn {
			width: 90px;
			border: none;
			font-family: inherit;
			font-size: inherit;
			color: inherit;
			background: none;
			cursor: pointer;
			display: inline-block;
			margin: 15px 30px;
			text-transform: uppercase;
			letter-spacing: 1px;
			font-weight: 700;
			outline: none;
			position: relative;
			-webkit-transition: all 1s;
			-moz-transition: all 1s;
			transition: all 1s;
		}
		.btn {
			border: 3px solid red;
			color: red;
		}
		.btn:hover {
			color: #fff;
		}
		.btn::after {
			content: '';
			position: absolute;
			z-index: -1;
			-webkit-transition: all 1s;
			-moz-transition: all 1s;
			transition: all 1s;
		}
		.btn:after {
			width: 0%;
			height: 100%;
			top: 0;
			left: 0;
			background: red;
		}
		.btn:hover:after, .btn:active:after {
			width: 100%;
		}
	</style>
</head>

<body class="h-100 bg">
    <div class="row">
					<div class="col-xl-12 mt-4">
						<img src="<?= site_url('assets/images/banner/') . get_front('banner') ?>" alt="" class="img-fluid" width="500px">
					</div>
				</div>
	<div class="container" style="margin-top:-50px">
		<div class="row text-center">
			<div class="col-md-12 col-sm-12 p-3">
			    
				<h1><font color="blue" face="arial black">Selamat Datang di PPDB Online</font></h1>
				<b><h2><font face="arial black"><h2>SEKOLAH BUDI AGUNG - JAKARTA</font></h2></b>
				<b><h4><p><font color="red" face="comic sans ms">Tahun Ajaran 2023 / 2024</p></b></h4>
			</div>
		</div>
	</div>
	<div class="container">
		<div class=" show-grid">
			<div class="row">
				<div class="col-xs-6 col-sm-1-5 col-lg-2-5">
					<a href="<?= site_url('ppdb/tk') ?>"><img src="<?= site_url('uploads/system/TK.png') ?>" alt="" class="rounded mx-auto d-block img-fluid w-75"></a>
					<div class="category-content text-center">
                        <a href="<?= site_url('ppdb/tk') ?>" class="btn btn-warning">TK</a>
                    </div>
				</div>
				<div class="col-xs-6 col-sm-1-5 col-lg-2-5">
					<a href="<?= site_url('ppdb/sd') ?>"><img src="<?= site_url('uploads/system/SD.png') ?>" alt="" class="rounded mx-auto d-block img-fluid w-75"></a>
					<div class="category-content text-center">
						<a href="<?= site_url('ppdb/sd') ?>" class="btn btn-danger">SD</a>
                    </div>
				</div>
				<div class="col-xs-6 col-sm-1-5 col-lg-1-5">
					<a href="<?= site_url('ppdb/smp') ?>"><img src="<?= site_url('uploads/system/SMP.png') ?>" alt="" class="rounded mx-auto d-block img-fluid w-75"></a>
					<div class="category-content text-center">
						<a href="<?= site_url('ppdb/smp') ?>" class="btn btn-primary">SMP</a>
                    </div>
				</div>
				<div class="col-xs-6 col-sm-1-5 col-lg-3-5">
					<a href="<?= site_url('ppdb/sma') ?>"><img src="<?= site_url('uploads/system/SMA.png') ?>" alt="" class="rounded mx-auto d-block img-fluid w-75"></a>
					<div class="category-content text-center">
						<a href="<?= site_url('ppdb/sma') ?>" class="btn btn-secondary">SMA</a>
                    </div>
				</div>
				<div class="col-xs-6 col-sm-1-5 col-lg-1-5">
					<a href="<?= site_url('ppdb/smk') ?>"><img src="<?= site_url('uploads/system/SMK.png') ?>" alt="" class="rounded mx-auto d-block img-fluid w-75"></a>
					<div class="category-content text-center">
						<a href="<?= site_url('ppdb/smk') ?>" class="btn btn-dark">SMK</a>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<!-- <div class="centered">
		<div class="row justify-content-center">
			<div class="col">
				<a href="<?= site_url('ppdb/tk') ?>"><img src="<?= site_url('uploads/system/TK.png') ?>" alt="" class="rounded mx-auto d-block img-fluid"></a>
				<div class="text-center p-4">
					<h6 style="background-color:#E67817;" class="p-1 rounded text-white">TK</h6>
				</div>
			</div>
			<div class="col">
				<a href="<?= site_url('ppdb/sd') ?>"><img src="<?= site_url('uploads/system/SD.png') ?>" alt="" class="rounded mx-auto d-block img-fluid"></a>
				<div class="text-center p-4">
					<h6 style="background-color:#f60303;" class=" p-1 rounded text-white">SD</h6>
				</div>
			</div>
			<div class="col">
				<a href="<?= site_url('ppdb/smp') ?>"><img src="<?= site_url('uploads/system/SMP.png') ?>" alt="" class="rounded mx-auto d-block img-fluid"></a>
				<div class="text-center p-4">
					<h6 style="background-color:#1f3370;" class=" p-1 rounded text-white">SMP</h6>
				</div>
			</div>
			<div class="col">
				<a href="<?= site_url('ppdb/sma') ?>"><img src="<?= site_url('uploads/system/SMA.png') ?>" alt="" class="rounded mx-auto d-block img-fluid"></a>
				<div class="text-center p-4">
					<h6 style="background-color:#557c99;" class=" p-1 rounded text-white">SMA</h6>
				</div>
			</div>
			<div class="col">
				<a href="<?= site_url('ppdb/smk') ?>"><img src="<?= site_url('uploads/system/SMK.png') ?>" alt="" class="rounded mx-auto d-block img-fluid"></a>
				<div class="text-center p-4">
					<h6 style="background-color:#000000;" class=" p-1 rounded text-white">SMK</h6>
				</div>
			</div>
		</div>
	</div> -->
</body>

</html>
