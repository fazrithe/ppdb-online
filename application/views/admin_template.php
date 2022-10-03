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
	<title>Dashboard PPDB</title>

	<!-- Styles -->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
	<link href="<?= base_url() ?>assets/backend/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?= base_url() ?>assets/backend/plugins/perfectscroll/perfect-scrollbar.css" rel="stylesheet">
	<link href="<?= base_url() ?>assets/backend/plugins/pace/pace.css" rel="stylesheet">
	<link href="<?= base_url() ?>assets/backend/plugins/flatpickr/flatpickr.min.css" rel="stylesheet">
	<link href="<?= base_url() ?>assets/backend/plugins/datatables/datatables.min.css" rel="stylesheet">
	<link href="<?= base_url() ?>assets/backend/plugins/summernote/summernote-lite.min.css" rel="stylesheet">
	<link href="<?= base_url() ?>assets/backend/plugins/dropzone/min/dropzone.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">
	<!-- Theme Styles -->
	<link href="<?= base_url() ?>assets/backend/css/main.min.css" rel="stylesheet">
	<link href="<?= base_url() ?>assets/backend/css/custom.css" rel="stylesheet">

	<link rel="icon" type="image/png" sizes="32x32" href="<?= base_url() ?>assets/backend/images/neptune.png" />
	<link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>assets/backend/images/neptune.png" />
	<script src="<?= base_url() ?>assets/backend/plugins/jquery/jquery-3.5.1.min.js"></script>
	<script src="<?= base_url() ?>assets/backend/js/pages/text-editor.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>
</head>

<body>
	<div class="app align-content-stretch d-flex flex-wrap">
		<div class="app-sidebar">
			<div class="logo">
				<a href="<?= base_url() ?>" class="logo-icon"><span class="logo-text">PPDB</span></a>
				<div class="sidebar-user-switcher user-activity-online">
					<a href="#">
						<img src="<?= $this->ardesign->profile() ?>">
						<span class="activity-indicator"></span>
						<span class="user-info-text"><?= $this->session->userdata('role_id') == 1 ? "Administartor" : "Petugas" ?><br><span class="user-state-info">Active</span></span>
					</a>
				</div>
			</div>
			<?php $this->load->view('layouts/sidebar'); ?>

		</div>
		<div class="app-container">
			<div class="search">
				<form>
					<input class="form-control" type="text" placeholder="Type here..." aria-label="Search">
				</form>
				<a href="#" class="toggle-search"><i class="material-icons">close</i></a>
			</div>
			<?php $this->load->view('layouts/header'); ?>
			<div class="app-content">
				<div class="content-wrapper">
					<?= $contents; ?>
				</div>
			</div>
		</div>
	</div>

	<!-- Javascripts -->

	<script src="<?= base_url() ?>assets/backend/plugins/bootstrap/js/bootstrap.min.js"></script>
	<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
	<script src="<?= base_url() ?>assets/backend/plugins/perfectscroll/perfect-scrollbar.min.js"></script>
	<script src="<?= base_url() ?>assets/backend/plugins/pace/pace.min.js"></script>
	<script src="<?= base_url() ?>assets/backend/js/main.min.js"></script>
	<script src="<?= base_url() ?>assets/backend/plugins/dropzone/min/dropzone.min.js"></script>
	<script src="<?= base_url() ?>assets/backend/js/custom.js"></script>
	<script src="<?= base_url() ?>assets/backend/plugins/summernote/summernote-lite.min.js"></script>
	<script src="<?= base_url() ?>assets/backend/plugins/datatables/datatables.min.js"></script>
	<script src="<?= base_url() ?>assets/backend/js/pages/dashboard.js"></script>
	<script src="<?= base_url() ?>assets/backend/plugins/flatpickr/flatpickr.js"></script>
	<script src="<?= base_url() ?>assets/backend/js/pages/datepickers.js"></script>
	<script src="<?= base_url() ?>assets/backend/js/pages/datatables.js"></script>
	<script src="<?= base_url() ?>assets/backend/js/pages/text-editor.js"></script>
	<script src="<?= base_url() ?>assets/backend/plugins/highlight/highlight.pack.js"></script>
	<script src="<?= base_url() ?>assets/backend/plugins/lightbox/fslightbox.js"></script>
	<script src="<?= base_url() ?>assets/backend/js/pages/lightbox.js"></script>
	<script src="<?= base_url() ?>assets/backend/js/pages/widgets.js"></script>

	<script>
		$(".flatpickr1").flatpickr();
	</script>
	<script>
		$(document).ready(function() {
			$('#example').DataTable({
				responsive: true
			});

		});
	</script>
</body>

</html>
