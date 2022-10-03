<div class="row">
	<div class="col">
		<div class="page-description d-flex align-items-center">
			<div class="page-description-content flex-grow-1">
				<h5>Selamat Datang, <?= $this->session->userdata('name'); ?></h5>
			</div>
			<!-- <div class="page-description-actions">
				<a href="#" class="btn btn-info btn-style-light"><i class="material-icons-outlined">file_download</i>Download</a>
				<a href="#" class="btn btn-warning btn-style-light"><i class="material-icons">add</i>Create</a>
			</div> -->
		</div>
	</div>
</div>

<div class="row">
	<div class="alert alert-custom alert-indicator-left indicator-warning" role="alert">
		<div class="alert-content">
			<span class="alert-title">Lengkapi Formulir Pedaftaran</span>
			<span class="alert-text">Sebelum melanjutkan ke tahap selanjutnya silahkan lengkapi dahulu formulir dibawah ini.</span>
		</div>
	</div>
	<div class="card">
		<div class="card-header text-center">
			<img src="<?= site_url('assets/images/logo/') . get_settings('logo') ?>" alt="" class="img-fluid" width="100px">
			<br>
			<br>
			<h6><?= get_settings('school_name') ?></h6>
			<h2><?= get_settings('system_title') ?></h2>
			<span style="font-weight: 300;"><?= get_settings('school_addres') ?></span>
			<hr>
			<h4>Formulir PPDB</h4>
			<h6>NO.REG : <?= $siswa->noreg ?></h6>
		</div>
		<div class="card-body">
			<form action="<?= site_url('siswa/formulir') ?>" method="POST">
				<input type="hidden" name="id" id="" value="<?= $siswa->id_siswa ?>">
				<div class="row mb-3">
					<label for="nama" class="col-sm-3 col-form-label">Nama</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" value="<?= $siswa->nama ?>" name="nama">
					</div>
				</div>
				<div class="row mb-3">
					<label for="nama" class="col-sm-3 col-form-label">Tempat Lahir</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" value="<?= $siswa->tempat_lahir ?>" name="tempat_lahir">
					</div>
				</div>
				<div class="row mb-3">
					<label for="nama" class="col-sm-3 col-form-label">Tanggal Lahir</label>
					<div class="col-sm-9">
						<input type="date" class="form-control" value="<?= $siswa->tanggal_lahir ?>" name="tanggal_lahir">
					</div>
				</div>
				<div class="row mb-3">
					<label for="nama" class="col-sm-3 col-form-label">Alamat</label>
					<div class="col-sm-9">
						<textarea name="alamat" class="form-control" rows="3"><?= $siswa->alamat ?></textarea>
					</div>
				</div>
				<div class="row mb-3">
					<label for="hp" class="col-sm-3 col-form-label">Telepon</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" value="<?= $siswa->hp ?>" name="hp">
					</div>
				</div>
				<div class="row mb-3">
					<label for="jk" class="col-sm-3 col-form-label">Jenis Kelamin</label>
					<div class="col-sm-9">
						<select name="jk" id="jk" class="form-control">
							<option value="L" <?= $siswa->jenis == "L" ? "selected" : "" ?>>Laki-laki</option>
							<option value="P" <?= $siswa->jenis == "P" ? "selected" : "" ?>>Perempuan</option>
						</select>
					</div>
				</div>
				<div class="row mb-3">
					<label for="anak_ke" class="col-sm-3 col-form-label">Anak Ke-</label>
					<div class="col-sm-9">
						<input type="number" name="anak_ke" class="form-control" value="<?= $siswa->anak_ke ?>" placeholder="1" required>
					</div>
				</div>
				<div class="row mb-3">
					<label for="status_anak" class="col-sm-3 col-form-label">Status Anak</label>
					<div class="col-sm-9">
						<input type="text" name="status_anak" class="form-control" value="<?= $siswa->status_anak ?>" placeholder="Anak Kandung" required>
					</div>
				</div>
				<hr>
				<div class="row mb-3">
					<label for="nama_ayah" class="col-sm-3 col-form-label">Nama Ayah</label>
					<div class="col-sm-9">
						<input type="text" name="nama_ayah" class="form-control" value="<?= $siswa->nama_ayah ?>" required>
					</div>
				</div>
				<div class="row mb-3">
					<label for="pendidikan_ayah" class="col-sm-3 col-form-label">Pendidikan Ayah</label>
					<div class="col-sm-9">
						<input type="text" name="pendidikan_ayah" class="form-control" value="<?= $siswa->pendidikan_ayah ?>" required>
					</div>
				</div>
				<div class="row mb-3">
					<label for="pekerjaan_ayah" class="col-sm-3 col-form-label">Pekerjaan Ayah</label>
					<div class="col-sm-9">
						<input type="text" name="pekerjaan_ayah" class="form-control" value="<?= $siswa->pekerjaan_ayah ?>" required>
					</div>
				</div>
				<div class="row mb-3">
					<label for="nama_ibu" class="col-sm-3 col-form-label">Nama Ibu</label>
					<div class="col-sm-9">
						<input type="text" name="nama_ibu" class="form-control" value="<?= $siswa->nama_ibu ?>" required>
					</div>
				</div>
				<div class="row mb-3">
					<label for="pendidikan_ibu" class="col-sm-3 col-form-label">Pendidikan Ibu</label>
					<div class="col-sm-9">
						<input type="text" name="pendidikan_ibu" class="form-control" value="<?= $siswa->pendidikan_ibu ?>" required>
					</div>
				</div>
				<div class="row mb-3">
					<label for="pekerjaan_ibu" class="col-sm-3 col-form-label">Pekerjaan Ibu</label>
					<div class="col-sm-9">
						<input type="text" name="pekerjaan_ibu" class="form-control" value="<?= $siswa->pekerjaan_ibu ?>" required>
					</div>
				</div>
				<div class="row mb-3">
					<label for="alamat_ortu" class="col-sm-3 col-form-label">Alamat Ortu</label>
					<div class="col-sm-9">
						<textarea name="alamat_ortu" class="form-control" ows="30" required><?= $siswa->alamat_ortu ?></textarea>
					</div>
				</div>
				<hr>
				<div class="row mb-3">
					<label for="nisn" class="col-sm-3 col-form-label">NISN</label>
					<div class="col-sm-9">
						<input type="text" name="nisn" class="form-control" value="<?= $siswa->nisn ?>">
					</div>
				</div>
				<div class="row mb-3">
					<label for="jenjang" class="col-sm-3 col-form-label">Jenjang</label>
					<div class="col-sm-9">
						<select name="jenjang" id="jenjang" class="form-control" disabled>
							<?php foreach ($jenjang as $v) : ?>
								<option value="<?= $v->id ?>" <?= $v->id == $siswa->id_jenjang ? "selected" : "" ?>><?= $v->nama_jenjang ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div class="row mb-3">
					<label for="kelas" class="col-sm-3 col-form-label">Kelas</label>
					<div class="col-sm-9">
						<select name="kelas" id="kelas" class="form-control" disabled>
							<?php foreach ($kelas as $v) : ?>
								<option value="<?= $v->id_kelas ?>" <?= $v->id_kelas == $siswa->id_kelas ? "selected" : "" ?>><?= $v->nama_kelas ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div class="row mb-3">
					<label for="no_ijazah" class="col-sm-3 col-form-label">No.Ijazah</label>
					<div class="col-sm-9">
						<input type="text" name="no_ijazah" class="form-control" value="<?= $siswa->no_ijazah ?>">
					</div>
				</div>
				<div class="row mb-5">
					<label for="sekolah_asal" class="col-sm-3 col-form-label">Sekolah Asal</label>
					<div class="col-sm-9">
						<input type="text" name="sekolah_asal" class="form-control" value="<?= $siswa->sekolah_asal ?>">
					</div>
				</div>
				<hr>
				<div class="row mb-5 justify-content-center">
					<div class="col-sm-6">
						<span class="text-muted">Pernyataan : Saya menyatakan bahwa data yang tertera diatas adalah yang sebenarnya.</span>
					</div>
				</div>
				<div class="row mb-3 justify-content-center">
					<div class="col-sm-6 text-center">
						<button type="submit" class="btn btn-md btn-primary">Simpan Formulir Pendaftaran</button>
					</div>
				</div>
			</form>
		</div>
	</div>

</div>
