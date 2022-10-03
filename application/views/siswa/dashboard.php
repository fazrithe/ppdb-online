<?= $this->session->flashdata('msg'); ?>
<div class="row pt-2">
	<div class="col-xl-12">
		<?php if ($register->row('status') == 0) : ?>
			<div class="alert alert-custom alert-indicator-left indicator-success" role="alert">
				<div class="alert-content">
					<span class="alert-title">Pembayaran!</span>
					<span class="alert-text">Halo, <b><?= $this->session->userdata('name'); ?></b> Pembayaran anda sudah <b class="text-success">LUNAS</b> ! </span>
				</div>
			</div>
		<?php elseif ($register->row('status') == 2) : ?>
			<div class="alert alert-custom alert-indicator-left indicator-warning" role="alert">
				<div class="alert-content">
					<span class="alert-title">Setujui!</span>
					<span class="alert-text">Silahkan menyetujui surat pernyataan! </span>
				</div>
			</div>
		<?php elseif ($register->row('status') == 1) : ?>
			<div class="alert alert-custom alert-indicator-left indicator-success" role="alert">
				<div class="alert-content">
					<span class="alert-title">Selamat!</span>
					<span class="alert-text">Anda telah menyelesaikan tahapan seleksi administrasi PPDB ! </span>
				</div>
			</div>
		<?php endif; ?>
	</div>
</div>

<div class="row">
	<div class="col-md-6">
		<div class="card shadow">
			<div class="card-header">NO.REG : <?= $siswa->noreg ?></div>
			<div class="card-body">
				<div class="text-center p-3">
					<img src="<?= $this->ardesign->profile() ?>" alt="" width="300px">
				</div>
				<form action="<?= site_url('siswa/update_formulir') ?>" method="POST">
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
						<label for="hp" class="col-sm-3 col-form-label">Telpon</label>
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
							<input type="number" name="anak_ke" class="form-control" value="<?= $siswa->anak_ke ?>" placeholder="1">
						</div>
					</div>
					<div class="row mb-3">
						<label for="status_anak" class="col-sm-3 col-form-label">Status Anak</label>
						<div class="col-sm-9">
							<input type="text" name="status_anak" class="form-control" value="<?= $siswa->status_anak ?>" placeholder="Anak Kandung">
						</div>
					</div>
					<hr>
					<div class="row mb-3">
						<label for="nama_ayah" class="col-sm-3 col-form-label">Nama Ayah</label>
						<div class="col-sm-9">
							<input type="text" name="nama_ayah" class="form-control" value="<?= $siswa->nama_ayah ?>">
						</div>
					</div>
					<div class="row mb-3">
						<label for="pendidikan_ayah" class="col-sm-3 col-form-label">Pendidikan Ayah</label>
						<div class="col-sm-9">
							<input type="text" name="pendidikan_ayah" class="form-control" value="<?= $siswa->pendidikan_ayah ?>">
						</div>
					</div>
					<div class="row mb-3">
						<label for="pekerjaan_ayah" class="col-sm-3 col-form-label">Pekerjaan Ayah</label>
						<div class="col-sm-9">
							<input type="text" name="pekerjaan_ayah" class="form-control" value="<?= $siswa->pekerjaan_ayah ?>">
						</div>
					</div>
					<div class="row mb-3">
						<label for="nama_ibu" class="col-sm-3 col-form-label">Nama Ibu</label>
						<div class="col-sm-9">
							<input type="text" name="nama_ibu" class="form-control" value="<?= $siswa->nama_ibu ?>">
						</div>
					</div>
					<div class="row mb-3">
						<label for="pendidikan_ibu" class="col-sm-3 col-form-label">Pendidikan Ibu</label>
						<div class="col-sm-9">
							<input type="text" name="pendidikan_ibu" class="form-control" value="<?= $siswa->pendidikan_ibu ?>">
						</div>
					</div>
					<div class="row mb-3">
						<label for="pekerjaan_ibu" class="col-sm-3 col-form-label">Pekerjaan Ibu</label>
						<div class="col-sm-9">
							<input type="text" name="pekerjaan_ibu" class="form-control" value="<?= $siswa->pekerjaan_ibu ?>">
						</div>
					</div>
					<div class="row mb-3">
						<label for="alamat_ortu" class="col-sm-3 col-form-label">Alamat Ortu</label>
						<div class="col-sm-9">
							<textarea name="alamat_ortu" class="form-control" ows="30"><?= $siswa->alamat_ortu ?></textarea>
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
					<?php if ($register->row('status') == 2) : ?>
						<hr>
						<div class="row mb-3 justify-content-center">
							<div class="col-sm-10">
								<button type="submit" class="btn btn-md btn-primary">Update Data</button>
							</div>
						</div>
					<?php endif ?>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<?php if ($register->row('status') == 0) : ?>
			<?php
			include_once('status/pending.php');
			?>
		<?php elseif ($register->row('status') == 2) : ?>
			<?php
			include_once('status/revisi.php');
			?>
		<?php elseif ($register->row('status') == 3) : ?>
			<?php
			include_once('status/ditolak.php');
			?>
		<?php elseif ($register->row('status') == 1) : ?>
			<?php
			include_once('status/lulus.php');
			?>
		<?php endif; ?>
	</div>
</div>
<script src="<?= base_url('assets/backend/') ?>plugins/dropzone/min/dropzone.min.js"></script>
<script type="text/javascript">
	function printDiv(divName) {
		console.log(divName)
		var printContents = document.getElementById(divName).innerHTML;
		var originalContents = document.body.innerHTML;

		document.body.innerHTML = printContents;

		window.print();

		document.body.innerHTML = originalContents;
	}
</script>
