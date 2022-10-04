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
	<title>Login Aplikasi PPDB Online</title>

	<!-- Styles -->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
	<link href="<?= site_url('assets/backend/') ?>plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?= site_url('assets/backend/') ?>plugins/perfectscroll/perfect-scrollbar.css" rel="stylesheet">
	<link href="<?= site_url('assets/backend/') ?>plugins/pace/pace.css" rel="stylesheet">
	<link href="<?= site_url() ?>assets/backend/plugins/datatables/datatables.min.css" rel="stylesheet">


	<!-- Theme Styles -->
	<link href="<?= site_url('assets/backend/') ?>css/main.min.css" rel="stylesheet">
	<link href="<?= site_url('assets/backend/') ?>css/custom.css" rel="stylesheet">

	<link rel="icon" type="image/png" sizes="32x32" href="<?= site_url('assets/backend/') ?>images/neptune.png" />
	<link rel="icon" type="image/png" sizes="16x16" href="<?= site_url('assets/backend/') ?>images/neptune.png" />
</head>

<body>
	<div class="app app-auth-sign-in align-content-stretch d-flex flex-wrap justify-content-end">
		<div class="app-auth-background" style="padding:80px;">
		    <!--START-->
            <div class="row">
	<div class="col">
		<div class="card">
		    <div class="card-body">
				<div class="pull-right">
					<form action="<?= site_url('login') ?>" method="POST">
					<div class="row">
						<div class="col-md-6 col-sm-6">
							<label for="jenjang">Jenjang</label>
							<select class="form-control m-b-md" name="jenjang" id="jenjang">
								<option value="0">--Pilih Jenjang--</option>
								<?php foreach ($jurusan as $v) : ?>
									<?php if($v->id == $jenjang_id){ ?>
										<option value="<?= $v->id ?>" selected><?= $v->nama_jenjang ?></option>
									<?php }else{ ?>
										<option value="<?= $v->id ?>"><?= $v->nama_jenjang ?></option>
									<?php }?>
								<?php endforeach ?>
							</select>
						</div>
						<div class="col-md-6 col-sm-6">
							<label for="kelas">Kelas</label>
							<select class="form-control m-b-md" name="kelas" id="kelas">
								<option value="0">--Pilih Kelas--</option>
								<?php foreach ($kelas as $v) : ?>
									<?php if($v->id_kelas == $kelas_id){ ?>
										<option value="<?= $v->id_kelas ?>" selected><?= $v->nama_kelas ?></option>
									<?php }else{ ?>
										<option value="<?= $v->id_kelas ?>"><?= $v->nama_kelas ?></option>
									<?php }?>
								<?php endforeach ?>
							</select>
						</div>
					</div>
					<div class="row mb-4">
						<div class="col-3">
						<button type="submit" class="btn btn-primary">Sign in</button>
						</div>
					</div>
					</form>
				</div>
		        <table id="example" class="display" style="width:100%">
					<thead>
						<tr>
							<th>No</th>
							<th>NO REG</th>
							<th>Nama</th>
							<th>Kelas</th>
							<th>Tanggal</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1;
						foreach ($siswa as $v){ ?>
							<tr>
								<td><?= $no ?></td>
								<td>
									<spna class="badge badge-primary"><?= $v->noreg ?></spna>
								</td>
								<td><?= $v->nama ?></td>
								<td><?= $v->nama_kelas ?></td>
								<td><?= tanggal($v->created_at) ?></td>
								<td>
									<?php
									if ($v->status == 3) {
										echo '<span class="badge badge-style-light rounded-pill badge-warning">Pending</span>';
									} else {
										echo '<span class="badge badge-style-light rounded-pill badge-success">Approve</span>';
									}
									?>
								</td>
								<?php
								$no++
								?>
							<?php } ?>
							</tr>
					</tbody>
				</table>
		    </div>
		</div>
	</div>
</div>
<!--END-->
		</div>

		<div class="app-auth-container">
			<div class="logo">
				<a href="<?= site_url('login') ?>">PPDB ONLINE</a>
			</div>
			<!-- <p class="auth-description">Please sign-in to your account and continue to the dashboard.<br>Don't have an account? <a href="<?= site_url() ?>">Sign Up</a></p> -->

			<div class="auth-credentials m-b-xxl">
				<form action="<?= site_url('auth/validate_login') ?>" method="POST">
					<label for="signInEmail" class="form-label">Email address</label>
					<input type="email" name="email" class="form-control m-b-md" id="signInEmail" aria-describedby="signInEmail" placeholder="example@gmail.com">

					<label for="signInPassword" class="form-label">Password</label>
					<input type="password" name="password" class="form-control" id="signInPassword" aria-describedby="signInPassword" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
			</div>

			<div class="auth-submit">
				<button type="submit" class="btn btn-primary" id="btn_add">Masuk Sekarang</button>
				<!-- <a href="#" class="auth-forgot-password float-end">Forgot password?</a> -->
			</div>
			<!-- <div class="row justify-content-center">
				<div class="col-md-12">
					<div class="card">
						<div class="card-body">
							<table id="example" class="display" style="width:100%">
								<thead>
									<tr>
										<th>Nama</th>
										<th>Jenjang</th>
										<th>Kelas</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($siswa as $v) : ?>
										<tr>
											<td><?= $v->nama ?></td>
											<td><?= $v->id_jenjang ?></td>
											<td><?= $v->id_kelas ?></td>
											<td><?= $v->status ?></td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div> -->
			</form>

		</div>
	</div>

	<!-- Javascripts -->
	<script src="<?= site_url('assets/backend/') ?>plugins/jquery/jquery-3.5.1.min.js"></script>
	<script src="<?= site_url('assets/backend/') ?>plugins/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?= site_url('assets/backend/') ?>plugins/perfectscroll/perfect-scrollbar.min.js"></script>
	<script src="<?= site_url('assets/backend/') ?>plugins/pace/pace.min.js"></script>
	<script src="<?= base_url() ?>assets/backend/plugins/datatables/datatables.min.js"></script>
	<script src="<?= site_url('assets/backend/') ?>js/pages/datatables.js"></script>
	<script src="<?= site_url('assets/backend/') ?>js/main.min.js"></script>
	<script>
		$(document).ready(function() {
			$('#example').DataTable({
				responsive: true,
			
				ordering: false,
			});

		});
	</script>
</body>

</html>
