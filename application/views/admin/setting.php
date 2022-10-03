<?= $this->session->flashdata('msg'); ?>
<div class="row">
	<div class="col">
		<div class="card">
			<div class="card-body">
				<div class="text-center p-5">
					<img src="<?= site_url('assets/images/logo/') . get_settings('logo') ?>" alt="" width="150px">
					<h3><?= get_settings('school_name') ?></h3>
					<span><?= get_settings('school_addres') ?></span>
				</div>
				<div class="row mb-3">
					<label for="inputEmail3" class="col-sm-2 col-form-label">Logo Sekolah</label>
					<div class="col-sm-10">
						<div id="dropzone">
							<form action="<?= base_url('upload/logo') ?>" class="dropzone needsclick" id="logo">
								<div class="dz-message needsclick">
									<button type="button" class="dz-button">Drop files here or click to upload.</button><br />
									<span class="note needsclick">(Upload Logo Sekolah Disini.)</span>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!--<div class="row mb-3">
					<label for="inputEmail3" class="col-sm-2 col-form-label">Foto Kepsek</label>
					<div class="col-sm-10">
						<div id="dropzone">
							<form action="<?= base_url('upload/kepsek') ?>" class="dropzone needsclick" id="kepsek">
								<div class="dz-message needsclick">
									<button type="button" class="dz-button">Drop files here or click to upload.</button><br />
									<span class="note needsclick">(Upload Foto Kepsek Disini.)</span>
								</div>
							</form>
						</div>
					</div>
				</div>-->
				<form action="<?= site_url('admin/update_setting') ?>" method="POST">
					<div class="row mb-3">
						<label for="inputEmail3" class="col-sm-2 col-form-label">Sytem Name</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" value="<?= get_settings('system_name') ?>" name="system_name" class="form-control">
						</div>
					</div>

					<div class="row mb-3">
						<label for="inputEmail3" class="col-sm-2 col-form-label">Sytem Title</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" value="<?= get_settings('system_title') ?>" name="system_title" class="form-control">
						</div>
					</div>

					<div class="row mb-3">
						<label for="inputEmail3" class="col-sm-2 col-form-label">Sytem Email</label>
						<div class="col-sm-10">
							<input type="email" class="form-control" value="<?= get_settings('system_email') ?>" name="system_email" class="form-control">
						</div>
					</div>

					<div class="row mb-3">
						<label for="inputEmail3" class="col-sm-2 col-form-label">Tahun Ajaran</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" value="<?= get_settings('tahun_ajar') ?>" name="tahun_ajar" class="form-control" placeholder="22/23">
						</div>
					</div>

					<div class="row mb-3">
						<label for="inputEmail3" class="col-sm-2 col-form-label">School Name</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" value="<?= get_settings('school_name') ?>" name="school_name" class="form-control">
						</div>
					</div>

					<div class="row mb-3">
						<label for="inputEmail3" class="col-sm-2 col-form-label">School Address</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" value="<?= get_settings('school_addres') ?>" name="school_addres" class="form-control">
						</div>
					</div>
					<div class="row mb-3">
						<label for="inputEmail3" class="col-sm-2 col-form-label">Biaya Pendaftaran</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" value="<?= get_settings('biaya') ?>" name="biaya" class="form-control">
						</div>
					</div>
					<div class="row mb-3">
						<label for="inputEmail3" class="col-sm-2 col-form-label">Bank Name</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" value="<?= get_settings('bank_name') ?>" name="bank_name" class="form-control">
						</div>
					</div>

					<div class="row mb-3">
						<label for="inputEmail3" class="col-sm-2 col-form-label">Bank Account</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" value="<?= get_settings('bank_account') ?>" name="bank_account" class="form-control">
						</div>
					</div>

					<div class="row mb-3">
						<label for="inputEmail3" class="col-sm-2 col-form-label">Bank Number</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" value="<?= get_settings('bank_number') ?>" name="bank_number" class="form-control">
						</div>
					</div>

					<div class="row mb-3">
						<label for="inputEmail3" class="col-sm-2 col-form-label">Sambutan Kepsek</label>
						<div class="col-sm-10">
							<textarea class="form-control" cols="9" id="sambutan" name="sambutan"><?= get_settings('sambutan') ?></textarea>
						</div>
					</div>
					<div class="my-3">
						<button type="submit" class="btn btn-primary">Update Settings</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="card">
		<div class="card-header">
			<h6>Pengaturan FrondEnd</h6>
		</div>
		<div class="card-body">
			<form action="<?= site_url('upload/upload_banner') ?>" method="POST" enctype="multipart/form-data">
				<img src="<?= site_url('assets/images/banner/') . get_front('banner') ?>" alt="" class="img-fluid">
				<div class="row mb-3">
					<label for="inputEmail3" class="col-sm-2 col-form-label">Banner</label>
					<div class="col-sm-10">
						<input type="file" name="banner" id="" class="form-control">
					</div>
				</div>
				<button type="submit" class="btn btn-primary">Simpan Banner</button>
			</form>
		</div>
	</div>
</div>
<script src="<?= base_url('assets/backend/') ?>plugins/dropzone/min/dropzone.min.js"></script>
<script src="<?= base_url() ?>assets/backend/plugins/summernote/summernote-lite.min.js"></script>
<script type="text/javascript">
	$('#sambutan').summernote({
		height: 200,
		toolbar: [
			['style', ['bold', 'italic', 'underline', 'clear']],
			['fontsize', ['fontsize']],
			['color', ['color']],
			['para', ['ul', 'ol', 'paragraph']],
			// ['insert',['picture']]
		],
	});
</script>
