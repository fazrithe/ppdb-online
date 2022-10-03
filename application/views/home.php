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

	<link rel="stylesheet" href="<?php echo base_url() . 'assets/frontend/new/assets/css/animate.css'; ?>">
    <link rel="stylesheet" href="<?php echo base_url() . 'assets/frontend/new/assets/css/bootstrap.min.css'; ?>">
    <link rel="stylesheet" href="<?php echo base_url() . 'assets/frontend/new/assets/css/icofont.min.css'; ?>">
    <link rel="stylesheet" href="<?php echo base_url() . 'assets/frontend/new/assets/css/swiper.min.css'; ?>">
    <link rel="stylesheet" href="<?php echo base_url() . 'assets/frontend/new/assets/css/lightcase.css'; ?>">
    <link rel="stylesheet" href="<?php echo base_url() . 'assets/frontend/new/assets/css/style.css'; ?>">
    <style>
        .bg-home {
            background-repeat: no-repeat;
            background-size: cover;
            background: 
				linear-gradient(
				  rgba(13, 110, 255, 0.7),
				  rgba(255, 212, 14, 0.7)
				),
			    url('assets/frontend/new/assets/images/bg-img/bg.jpg') no-repeat;
			background-size: cover;
        }
		.fill-button{
			position:absolute;
			left:50%;
			top:50%;
			transform: translate(-50%,-50%);
		}

		.btn {
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
	<body class="bg-home">

    <!-- preloader start here -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- preloader ending here -->


    <!-- scrollToTop start here -->
    <a href="#" class="scrollToTop"><i class="icofont-rounded-up"></i></a>
    <!-- scrollToTop ending here -->


    <!-- header section start here -->
    <header class="header-section style-2">
        <div class="header-bottom">
            <div class="header-wrapper">
                <div class="logo-search-acte">
                    <div class="logo">
                        <a href="<?= site_url('/') ?>"><img src="<?php echo base_url() . 'assets/frontend/new/assets/images/logo/logo sekolah.png'; ?>" alt="logo"></a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header section ending here -->
      <!-- category section start here -->
      <div class="category-section padding-tb">
        <div class="container mt-4">
            <div class="section-header text-center">
                <span class="subtitle">Selamat Datang di PPDB Online</span>
                <h2 class="title">SEKOLAH BUDI AGUNG - JAKARTA</h2>
                <p class="subtitle">Tahuan Ajaran 2022-2023</p>
            </div>
            <div class="section-wrapper">
                <div class="links row g-4 justify-content-center row-cols-xl-6 row-cols-md-3 row-cols-sm-2 row-cols-1">
                    <div class="col" id="circle">
                        <div class="category-item text-center">
                            <div class="category-inner">
								<a href="<?= site_url('ppdb/tk') ?>">
                                <div class="category-thumb">
                                    <img src="<?php echo base_url() . 'assets/frontend/new/assets/images/logo/TK.png'; ?>" alt="category">
                                </div>
                                <div class="category-content">
                                    <a href="<?= site_url('ppdb/tk') ?>" class="btn btn-warning">TK</a>
                                </div>
								</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="category-item text-center">
                            <div class="category-inner">
							<a href="<?= site_url('ppdb/sd') ?>">
                                <div class="category-thumb">
                                    <img src="<?php echo base_url() . 'assets/frontend/new/assets/images/logo/SD.png'; ?>" alt="category">
                                </div>
                                <div class="category-content">
									<a href="<?= site_url('ppdb/sd') ?>" class="btn btn-danger">SD</a>
                                </div>
							</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="category-item text-center">
                            <div class="category-inner">
							<a href="<?= site_url('ppdb/smp') ?>">
                                <div class="category-thumb">
                                    <img src="<?php echo base_url() . 'assets/frontend/new/assets/images/logo/SMP.png'; ?>" alt="category">
                                </div>
                                <div class="category-content">
									<a href="<?= site_url('ppdb/smp') ?>" class="btn btn-primary">SMP</a>
                                </div>
							</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="category-item text-center">
                            <div class="category-inner">
							<a href="<?= site_url('ppdb/sma') ?>">
                                <div class="category-thumb">
                                    <img src="<?php echo base_url() . 'assets/frontend/new/assets/images/logo/SMA.png'; ?>" alt="category">
                                </div>
                                <div class="category-content">
									<a href="<?= site_url('ppdb/sma') ?>" class="btn btn-secondary">SMA</a>
                                </div>
							</a>
						</div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="category-item text-center">
                            <div class="category-inner">
							<a href="<?= site_url('ppdb/smk') ?>">
                                <div class="category-thumb">
                                    <img src="<?php echo base_url() . 'assets/frontend/new/assets/images/logo/SMK.png'; ?>" alt="category">
                                </div>
                                <div class="category-content">
									<a href="<?= site_url('ppdb/smk') ?>" class="btn btn-dark">SMK</a>
                                </div>
							</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
	<script src="<?php echo base_url() . 'assets/frontend/new/assets/js/jquery.js'; ?>"></script>
    <script src="<?php echo base_url() . 'assets/frontend/new/assets/js/bootstrap.min.js'; ?>"></script>
    <script src="<?php echo base_url() . 'assets/frontend/new/assets/js/swiper.min.js'; ?>"></script>
    <script src="<?php echo base_url() . 'assets/frontend/new/assets/js/progress.js'; ?>"></script>
    <script src="<?php echo base_url() . 'assets/frontend/new/assets/js/lightcase.js'; ?>"></script>
    <script src="<?php echo base_url() . 'assets/frontend/new/assets/js/counter-up.js'; ?>"></script>
    <script src="<?php echo base_url() . 'assets/frontend/new/assets/js/isotope.pkgd.js'; ?>"></script>
    <script src="<?php echo base_url() . 'assets/frontend/new/assets/js/functions.js'; ?>"></script>
    <script src="<?php echo base_url() . 'assets/frontend/new/assets/js/animation.js'; ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.2.6/gsap.min.js"></script>
    <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/circletype@2.3.0/dist/circletype.min.js"></script>
</html>
