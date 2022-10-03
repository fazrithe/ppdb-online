<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Sign Up Signin Form Template Example</title>
  <link rel="stylesheet" href="<?= site_url('assets/signup/') ?>style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<html lang="en">
<head>
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link href="<?= site_url('assets/backend/') ?>plugins/perfectscroll/perfect-scrollbar.css" rel="stylesheet">
	<link href="<?= site_url('assets/backend/') ?>plugins/pace/pace.css" rel="stylesheet">


	<!-- Theme Styles -->
	<link href="<?= site_url('assets/backend/') ?>css/horizontal-menu/horizontal-menu.css" rel="stylesheet">
	<link href="<?= site_url('assets/backend/') ?>css/custom.css" rel="stylesheet">

	<link rel="icon" type="image/png" sizes="32x32" href="<?= site_url('assets/backend/') ?>images/neptune.png" />
	<link rel="icon" type="image/png" sizes="16x16" href="<?= site_url('assets/backend/') ?>images/neptune.png" />
  
</head>

<body>
<div id="form">
  <div class="container">
    <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-md-8 col-md-offset-2">
      <div id="userform">
		<div align="left" style="padding-left:10px; padding-top:10px;">
          <img src="<?= site_url('assets/images/logo/SC-2209239550.png') ?>" alt="" width="15%" class="rounded mx-auto d-block img-fluid w-75"><a href="#signup"  role="tab" data-toggle="tab"><font size="5">PPDB <?= strtoupper($jenjang) ?></font></a>
		</div>
		  <div class="tab-content">
          <div class="tab-pane fade active in" id="signup">
		  <p class="auth-description">Login jika sudah punya akun. <a href="<?= site_url('login') ?>">Sign In</a></p>
            <form id="signup">
              <div class="row">
                <div class="col-xs-12 col-sm-6">
                  <div class="form-group">
				  <select class="form-control m-b-md" name="jenjang" id="jenjang">
								<?php foreach ($jurusan as $v) : ?>
									<option value="<?= $v->id ?>" <?= $v->nama_jenjang == strtoupper($jenjang) ? "selected" : "" ?>><?= $v->nama_jenjang ?></option>
								<?php endforeach ?>
							</select>
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                  <div class="form-group">
				  <select class="form-control m-b-md" name="kelas" id="kelas" require>
				  <option value="" selected>Kelas</option>
								<?php foreach ($kelas as $v) : ?>
									<option value="<?= $v->id_kelas ?>"><?= $v->nama_kelas ?></option>
								<?php endforeach ?>
							</select>
                  </div>
                </div>
              </div>
			  <div class="form-group">
			  <label>Nama Lengkap<span class="req"></span> </label>
			  <input type="email" class="form-control" id="nama" aria-describedby="nama" onBlur="javascript:{this.value = this.value.toUpperCase();}" placeholder="Nama Lengkap">
              </div>
              <div class="form-group">
                <label>Tempat Lahir<span class="req">*</span> </label>
                <input type="text" class="form-control m-b-md" id="tempat_lahir" aria-describedby="tempat_lahir" onBlur="javascript:{this.value = this.value.toUpperCase();}" placeholder="Tempat Lahir">
                <p class="help-block text-danger"></p>
              </div>
			  <div class="form-group">
                <label><span class="req"></span> </label>
                <input type="date" class="form-control m-b-md" id="tanggal_lahir" aria-describedby="tanggal_lahir" placeholder="">
                <p class="help-block text-danger"></p>
              </div>
			  <div class="form-group">
                <label>Alamat<span class="req"></span> </label>
                <textarea name="alamat" id="alamat" rows="3" class="form-control m-b-md" placeholder="Alamat Lengkap"></textarea>
                <p class="help-block text-danger"></p>
              </div>
			  <div class="row">
                <div class="col-xs-12 col-sm-6">
                  <div class="form-group">
				  <label><span class="req"></span> </label>
				  <select name="agama" id="agama" class="form-control m-b-md">
								<option value="">-- Pilih Agama --</option>
								<option value="Islam">Islam</option>
								<option value="Kristen">Kristen</option>
								<option value="Katolik">Katholik</option>
								<option value="Hindu">Hindu</option>
								<option value="Buddha">Buddha</option>
								<option value="Konghucu">Konghucu</option>
							</select>
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                  <div class="form-group">
				  <label><span class="req"></span> </label>
				  <select name="jk" class="form-control m-b-md" id="jk">
								<option value="">-- Pilih Jenis kelamin --</option>
								<option value="L">Laki-laki</option>
								<option value="K">Perempuan</option>
							</select>
                  </div>
                </div>
              </div>
			  <div class="row">
                <div class="col-xs-12 col-sm-6">
			  <div class="form-group">
                <p style="color:red"> Gunakan Email Aktif<span class="req">*</span> </p>
                <input type="email" class="form-control m-b-md" id="email" aria-describedby="tanggal_lahir" placeholder="Email">
                <p class="help-block text-danger"></p>
              </div>
				</div>
				<div class="col-xs-12 col-sm-6">
              <div class="form-group">
                <p style="color:red"> Gunakan awalan 6281xxxxxxx<span class="req">*</span> </p>
                <input type="text" class="form-control m-b-md" id="phone" aria-describedby="tanggal_lahir" placeholder="Gunakan awalan 6281xxxxxxx">
                <p class="help-block text-danger"></p>
              </div>
				</div>
			  </div>
              <div class="mrgn-30-top">
			  <div class="auth-submit">
				<div id="loading" class="text-center" style="display: none;">
					<div class="loader"></div>
					<span>Loading ...</span>
				</div>
				<button type="button" id="btn_add" class="btn btn-primary">Daftar Sekarang</button>
			</div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.container --> 
</div>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
<!-- partial -->
  <script  src="<?= site_url('assets/signup/') ?>script.js"></script>
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
							// Swal.fire(
							// 	'Sorry',
							// 	data,
							// 	'warning'
							// )
						}
					});

				}

			});
		})
	</script>
</body>
</html>
