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
	<title>Login Administrator</title>

	<!-- Styles -->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
	<link href="<?= base_url() ?>assets/backend/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?= base_url() ?>assets/backend/plugins/perfectscroll/perfect-scrollbar.css" rel="stylesheet">
	<link href="<?= base_url() ?>assets/backend/plugins/pace/pace.css" rel="stylesheet">


	<!-- Theme Styles -->
	<link href="<?= base_url() ?>assets/backend/css/main.min.css" rel="stylesheet">
	<link href="<?= base_url() ?>assets/backend/css/custom.css" rel="stylesheet">



</head>

<body>
	<div class="app app-auth-sign-in align-content-stretch d-flex flex-wrap justify-content-end">
		<div class="app-auth-background"></div>
		<div class="app-auth-container">
			<div class="logo">
				<a href="<?php echo base_url() . 'administrator' ?>">PPDB ONLINE | Login Administrator</a>
			</div>
			<p class="auth-description">Please sign-in to your account and continue to the dashboard.</p>

			<div class="auth-credentials m-b-xxl">
				<label for="email" class="form-label">Email</label>
				<input type="email" class="form-control m-b-md" id="email" name="email" aria-describedby="email" placeholder="Ex : admin@admin.com" autocomplete="off" autofocus>

				<label for="password" class="form-label">Password</label>
				<input type="password" class="form-control" id="password" name="password" aria-describedby="password" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
			</div>

			<div class="auth-submit">
				<button class="btn btn-primary btn-login">Masuk Sekarang</button>
				<a href="<?= site_url('./reset') ?>" class="auth-forgot-password float-end">Forgot password?</a>
			</div>
		</div>
	</div>

	<!-- Javascripts -->
	<script src="<?= base_url() ?>assets/backend/plugins/jquery/jquery-3.5.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>
	<script src="<?= base_url() ?>assets/backend/plugins/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?= base_url() ?>assets/backend/plugins/perfectscroll/perfect-scrollbar.min.js"></script>
	<script src="<?= base_url() ?>assets/backend/plugins/pace/pace.min.js"></script>
	<script src="<?= base_url() ?>assets/backend/js/main.min.js"></script>
	<script src="<?= base_url() ?>assets/backend/js/custom.js"></script>
	<script>
		$(document).ready(function() {

			$(".btn-login").click(function() {

				var email = $("#email").val();
				var password = $("#password").val();

				if (email.length == "") {

					Swal.fire({
						type: 'warning',
						title: 'Oops...',
						text: 'Email Wajib Diisi !'
					});

				} else if (password.length == "") {

					Swal.fire({
						type: 'warning',
						title: 'Oops...',
						text: 'Password Wajib Diisi !'
					});

				} else {

					$.ajax({

						url: "<?= site_url('auth/validate_admin') ?>",
						type: "POST",
						data: {
							"email": email,
							"password": password
						},

						success: function(response) {
							console.log(response.status)
							if (response.status == true) {

								Swal.fire({
										type: 'success',
										title: 'Login Berhasil!',
										text: response.msg,
										timer: 3000,
										showCancelButton: false,
										showConfirmButton: false
									})
									.then(function() {
										window.location.href = "<?= site_url('admin') ?>";
									});

							} else {

								Swal.fire({
									type: 'error',
									title: 'Login Gagal!',
									text: response.msg
								});


							}

							console.log(response);

						},

						error: function(response) {
							console.log(response);

							Swal.fire({
								type: 'error',
								title: 'Opps!',
								text: 'server error!'
							});


						}

					});

				}

			});

		});
	</script>
</body>

</html>
