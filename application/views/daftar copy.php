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
	<title>DAFTAR AKUN PPDB <?= strtoupper($jenjang) ?></title>

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

	<link rel="icon" type="image/png" sizes="32x32" href="<?= site_url('assets/backend/') ?>images/neptune.png" />
	<link rel="icon" type="image/png" sizes="16x16" href="<?= site_url('assets/backend/') ?>images/neptune.png" />

</head>

<body>
	<div class="app horizontal-menu app-auth-sign-up align-content-stretch d-flex flex-wrap justify-content-end">
		<div class="app-auth-background">

		</div>
		<div class="app-auth-container">
			<div class="logo">
				<a href="#">PPDB <?= strtoupper($jenjang) ?></a>
			</div>
			<p class="auth-description">Login jika sudah punya akun. <a href="<?= site_url('login') ?>">Sign In</a></p>

			<div class="auth-credentials m-b-xxl" id="blockui">
				<form id="form">
					<div class="row">
						<div class="col-md-6 col-sm-6">
							<label for="jenjang">Jenjang</label>
							<select class="form-control m-b-md" name="jenjang" id="jenjang">
								<?php foreach ($jurusan as $v) : ?>
									<option value="<?= $v->id ?>" <?= $v->nama_jenjang == strtoupper($jenjang) ? "selected" : "" ?>><?= $v->nama_jenjang ?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="col-md-6 col-sm-6">
							<label for="kelas">Kelas</label>
							<select class="form-control m-b-md" name="kelas" id="kelas">
								<?php foreach ($kelas as $v) : ?>
									<option value="<?= $v->id_kelas ?>"><?= $v->nama_kelas ?></option>
								<?php endforeach ?>
							</select>
						</div>
					</div>
					<!-- <label for="nama" class="form-label">Nama</label> -->
					<input type="email" class="form-control m-b-md" id="nama" aria-describedby="nama" onBlur="javascript:{this.value = this.value.toUpperCase();}" placeholder="Nama Lengkap">

					<!-- <label for="tempat_lahir" class="form-label">Tempat Lahir</label> -->
					<input type="text" class="form-control m-b-md" id="tempat_lahir" aria-describedby="tempat_lahir" onBlur="javascript:{this.value = this.value.toUpperCase();}" placeholder="Tempat Lahir">

					<!-- <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label> -->
					<input type="date" class="form-control m-b-md" id="tanggal_lahir" aria-describedby="tanggal_lahir" placeholder="">


					<!-- <label for="alamat" class="form-label">Alamat</label> -->
					<textarea name="alamat" id="alamat" rows="3" class="form-control m-b-md" placeholder="Alamat Lengkap"></textarea>

					<div class="row">
						<div class="col-md-6">
							<!-- <label for="agama">Agama</label> -->
							<select name="agama" id="agama" class="form-control m-b-md">
								<option value="">-- Pilih Agama --</option>
								<option value="Islam">Islam</option>
								<option value="Kristen">Kristen</option>
								<option value="Katolik">Katholik</option>
								<option value="Hindu">Hindu</option>
								<option value="Buddha">Buddha</option>
								<option value="Konghucu">Konghucu</option>
							</select>
						</div>
						<div class="col-md-6">
							<!-- <label for="jk">Jenis Kelamin</label> -->
							<select name="jk" class="form-control m-b-md" id="jk">
								<option value="">-- Pilih Jenis kelamin --</option>
								<option value="L">Laki-laki</option>
								<option value="K">Perempuan</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6"><small class="text-danger">Gunakan Email Aktif</small>
							<input type="email" class="form-control m-b-md" id="email" aria-describedby="tanggal_lahir" placeholder="Email">
							
						</div>
						<div class="col-md-6"><small class="text-danger">Gunakan awalan 6281xxxxxxx</small>
							<input type="text" class="form-control m-b-md" id="phone" aria-describedby="tanggal_lahir" placeholder="6289xxxxxxx">
							
						</div>
					</div>
			</div>
			<div class="auth-submit">
				<div id="loading" class="text-center" style="display: none;">
					<div class="loader"></div>
					<span>Loading ...</span>
				</div>
				<button type="button" id="btn_add" class="btn btn-primary">Daftar Sekarang</button>
			</div>
			</form>
		</div>
	</div>

	<!-- Javascripts -->
	<script src="<?= site_url('assets/backend/') ?>plugins/jquery/jquery-3.5.1.min.js"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="<?= site_url('assets/backend/') ?>plugins/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?= site_url('assets/backend/') ?>plugins/perfectscroll/perfect-scrollbar.min.js"></script>
	<script src="<?= site_url('assets/backend/') ?>plugins/pace/pace.min.js"></script>
	<script src="<?= site_url('assets/backend/') ?>js/main.min.js"></script>
	<script src="<?= site_url('assets/backend/') ?>js/custom.js"></script>
	<script>
		$(document).ready(function() {
			$('#jenjang').attr("style", "pointer-events: none;");
			$(document).on("click", "#btn_add", function(e) {
				if ($('#nama').val() == "" && $('#tempat_lahir').val() == "" || $('#tanggal_lahir').val() == "" || $('#alamat').val() == "" || $('#agama').val() == "" || $('#jk').val() == "" || $('#email').val() == "" || $('#phone').val() == "") {
					Swal.fire(
						'Warning',
						'Lengkapi form registrasi',
						'warning'
					)
				} else {
					var formData = {
						'jenjang': $('#jenjang').val(),
						'kelas': $('#kelas').val(),
						'nama': $('#nama').val(),
						'tempat_lahir': $('#tempat_lahir').val(),
						'tanggal_lahir': $('#tanggal_lahir').val(),
						'alamat': $('#alamat').val(),
						'agama': $('#agama').val(),
						'jk': $('#jk').val(),
						'email': $('#email').val(),
						'phone': $('#phone').val(),
					}
					$.ajax({
						type: "POST",
						url: "<?= site_url('home/prosesdaftar') ?>",
						data: formData,
						dataType: 'json',
						beforeSend: function() {
							$('#loading').show();
						},
						success: function(data) {

							if (data.status == true) {
								$('#loading').hide();
								$('#form')[0].reset();
								$("#btn_add").prop("disabled", true);
								Swal.fire(
									'Success',
									data.message,
									'success'
								)
							} else {
								$('#loading').hide();
								Swal.fire(
									'Sorry',
									data.message,
									'warning'
								)
							}

						},
						error: function(data) {
							Swal.fire(
								'Sorry',
								data,
								'warning'
							)
						}
					});

				}

			});
		})
	</script>
</body>

</html>
