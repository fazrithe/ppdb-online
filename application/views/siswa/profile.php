<div class="row">
	<div class="col">
		<div class="page-description page-description-tabbed">
			<h1>Settings</h1>

			<ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
				<li class="nav-item" role="presentation">
					<button class="nav-link active" id="account-tab" data-bs-toggle="tab" data-bs-target="#account" type="button" role="tab" aria-controls="hoaccountme" aria-selected="true">Account</button>
				</li>
				<li class="nav-item" role="presentation">
					<button class="nav-link" id="security-tab" data-bs-toggle="tab" data-bs-target="#security" type="button" role="tab" aria-controls="security" aria-selected="false">Security</button>
				</li>
			</ul>
		</div>
	</div>
</div>
<div class="row">
	<div class="col">
		<div class="tab-content" id="myTabContent">
			<div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
				<div class="card">
					<div class="card-body">

						<form id="form-siswa">
							<div class="row">
								<div class="col-md-6">
									<label for="nisn" class="form-label">NISN</label>
									<input type="text" class="form-control" id="nisn" aria-describedby="nisn" name="nisn" value="" readonly>
								</div>
								<div class="col-md-6">
									<label for="nomor" class="form-label">Phone Number</label>
									<input type="text" class="form-control" id="nomor" name="nomor" placeholder="(xxx) xxx-xxxx" readonly>
								</div>
							</div>
							<div class="row m-t-lg">
								<div class="col-md-6">
									<label for="nama" class="form-label">Nama Lengkap</label>
									<input type="text" class="form-control" id="nama" name="nama" placeholder="John" readonly>
								</div>
								<div class="col-md-6">
									<label for="email" class="form-label">Email</label>
									<input type="email" class="form-control" id="email" name="email" placeholder="Ex : example@gmail.com" readonly>
								</div>
							</div>
						</form>
						<br>
						<div id="dropzone ">
							<form action="<?= base_url('account/fotoUpload') ?>" class="dropzone needsclick" id="fileupload">
								<div class="dz-message needsclick">
									<button type="button" class="dz-button">Drop files here or click to upload.</button><br />
									<span class="note needsclick">(Upload Foto Profile Disini.)</span>
								</div>
							</form>
						</div>
						<div class="row m-t-lg">
							<div class="col">
								<button type="button" class="btn btn-primary m-t-sm" id="btn-proses" onclick="update()">Update Data</button>
							</div>
						</div>

					</div>
				</div>
			</div>
			<div class="tab-pane fade" id="security" role="tabpanel" aria-labelledby="security-tab">
				<div class="card">
					<div class="card-body">
						<div class="settings-security-two-factor">
							<h5>Two-Factor Authentication</h5>
							<span>Two-factor authentication is automatically enabled on your account, for security reasons we require all users to authenticate with SMS code or authorized third-party auth apps. Read more about our security policy <a href="#">here</a>.</span>
						</div>
						<div class="row m-t-xxl">
							<div class="col-md-6">
								<label for="settingsNewPassword" class="form-label">New Password</label>
								<input type="password" id="pswd1" class="form-control" name="password" aria-describedby="settingsNewPassword" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
							</div>
						</div>
						<div class="row m-t-xxl">
							<div class="col-md-6">
								<label for="settingsConfirmPassword" class="form-label">Confirm Password</label>
								<input type="password" id="pswd2" class="form-control" name="new" aria-describedby="settingsConfirmPassword" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
							</div>
						</div>
						<div class="row m-t-lg">
							<div class="col">
								<button class="btn btn-primary m-t-sm" id="btn-prosesPass" onclick="matchPassword()">Change Password</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="<?= base_url('assets/backend/') ?>plugins/dropzone/min/dropzone.min.js"></script>
<script type="text/javascript">
	let status; // Menampung status "tambah, edit dan hapus"
	let url; // Menampung url untuk save dan update
	let form_siswa = 'form-siswa';
	let nisn = $("#nisn").val();
	$(document).ready(function() {
		console.log(nisn)
		tampil_siswa();
	});

	function tampil_siswa() {
		$.ajax({
			url: "<?= site_url('account/get_siswa') ?>",
			type: "POST",
			dataType: "JSON",
			success: function(res) {
				console.log(res)
				$('#nisn').val(res.data.nisn);
				$('#email').val(res.data.email);
				$('#nomor').val(res.data.phone);
				$('#nama').val(res.data.fullname);

			}
		})
	}

	function clear_form() {
		$('#' + form_siswa)[0].reset();
	}

	function update() {
		$.ajax({
			url: "<?= base_url('account/update_account'); ?>",
			type: "POST",
			dataType: "JSON",
			data: $('#' + form_siswa).serialize(),
			success: function(x) {
				if (x.status == true) {
					Swal.fire({
						type: 'success',
						title: 'Berhasil!',
						text: x.msg
					});
				}
			}
		});
	}

	function matchPassword() {
		var pw1 = $("#pswd1").val();
		var pw2 = $("#pswd2").val();
		if (pw1.length == "") {
			Swal.fire({
				type: 'info',
				title: 'Info!',
				text: '**Fill the password please!'
			});
			return false;
		} else if (pw2.length == "") {
			Swal.fire({
				type: 'info',
				title: 'Info!',
				text: '**Fill the password please!'
			});
			return false;
		} else if (pw2.length < 8) {
			Swal.fire({
				type: 'info',
				title: 'Info!',
				text: 'Password min 8 characters'
			});
			return false;
		} else if (pw1 != pw2) {
			Swal.fire({
				type: 'error',
				title: 'Sory..!',
				text: 'Passwords did not match'
			});
		} else {
			$.ajax({
				url: "<?= site_url('account/updatePass') ?>",
				type: "POST",
				dataType: "JSON",
				data: {
					"password": pw2,
				},
				success: function(res) {
					if (res.status == true) {

						Swal.fire({
								type: 'success',
								title: 'Berhasil!',
								text: res.msg,
								timer: 3000,
								showCancelButton: false,
								showConfirmButton: false
							})
							.then(function() {
								window.location.href = "<?= site_url('login') ?>";
							});

					}
				},
				error: function(res) {
					console.log(res.status);
					$('.preloader').hide();
					Swal.fire({
						type: 'error',
						title: 'Opps!',
						text: 'server error!'
					});
				}

			})
		}
	}
</script>
