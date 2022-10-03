<?php
$s_formulir = $siswa->s_formulir;
$s_berkas = $siswa->s_berkas;
$s_pembayaran = $siswa->s_pembayaran;
$s_lampiran = $siswa->s_lampiran;
?>
<?= $this->session->flashdata('msg'); ?>
<style>
	tbody,
	td,
	tfoot,
	th,
	thead,
	tr {
		padding: 7px;
	}
</style>
<div class="row">
	<div class="col-md-6">
		<div class="row">
			<div class="col-xs-6">
				<div class="card">
					<div class="card-header bg-light">
						<h6>Profile Siswa</h6>
					</div>
					<div class="card-body">
						<div class="text-center p-3">
							<img src="<?= $siswa->image ?? site_url('assets/images/foto/noimg.png') ?>" alt="" width="250px">
						</div>
						<form action="<?= site_url('admin/u_siswa') ?>" method="POST">
						    <input type="hidden" value="<?= $siswa->id_siswa ?>" name="id">
						<table width="80%">
							<tr>
								<td>NO.REG</td>
								<td>:</td>
								<td><?= $siswa->noreg ?></td>
							</tr>
							<tr>
									<td>NISN</td>
									<td>:</td>
									<td><input type="text" name="nisn" value="<?= $siswa->nisn ?>"></td>
								</tr>
								<tr>
									<td>NO.Ijazah</td>
									<td>:</td>
									<td><input type="text" name="ijazah" value="<?= $siswa->no_ijazah ?>"></td>
								</tr>

							<tr>
								<td>Nama</td>
								<td>:</td>
								<td><?= $siswa->nama ?></td>
							</tr>
							<tr>
								<td>Jenis Kelamin</td>
								<td>:</td>
								<td><?= $siswa->jenis ?></td>
							</tr>
							<tr>
								<td>Agama</td>
								<td>:</td>
								<td><?= $siswa->agama ?></td>
							</tr>
							<tr>
								<td>Phone</td>
								<td>:</td>
								<td><?= $siswa->hp ?></td>
							</tr>
							<tr>
								<td>Tempat Lahir</td>
								<td>:</td>
								<td><?= $siswa->tempat_lahir ?></td>
							</tr>
							<tr>
								<td>Tanggal Lahir</td>
								<td>:</td>
								<td><?= tanggal($siswa->tanggal_lahir) ?></td>
							</tr>
							<tr>
								<td>Alamat</td>
								<td>:</td>
								<td><?= $siswa->alamat ?></td>
							</tr>
							<tr>
								<td>Anak Ke</td>
								<td>:</td>
								<td><?= $siswa->anak_ke ?></td>
							</tr>
							<tr>
								<td>Status Anak</td>
								<td>:</td>
								<td><?= $siswa->status_anak ?></td>
							</tr>
							<tr>
								<td>Pendidikan Ayah</td>
								<td>:</td>
								<td><?= $siswa->pendidikan_ayah ?></td>
							</tr>
							<tr>
								<td>Pekerjaan Ayah</td>
								<td>:</td>
								<td><?= $siswa->pekerjaan_ayah ?></td>
							</tr>
							<tr>
								<td>Nama Ibu</td>
								<td>:</td>
								<td><?= $siswa->nama_ibu ?></td>
							</tr>
							<tr>
								<td>Pendidikan Ibu</td>
								<td>:</td>
								<td><?= $siswa->pendidikan_ibu ?></td>
							</tr>
							<tr>
								<td>Pekerjaan Ibu</td>
								<td>:</td>
								<td><?= $siswa->pekerjaan_ibu ?></td>
							</tr>
							<tr>
								<td>Alamat Ortu</td>
								<td>:</td>
								<td><?= $siswa->alamat_ortu ?></td>
							</tr>
							<tr>
								<td>Nama Ayah</td>
								<td>:</td>
								<td><?= $siswa->nama_ayah ?></td>
							</tr>
							<!--<tr>
								<td>Asal Sekolah</td>
								<td>:</td>
								<td><?= $siswa->sekolah_asal ?></td>
							</tr>-->
							<tr>
									<td>NO.Ijazah</td>
									<td>:</td>
									<td><input type="text" name="sekolah_asal" value="<?= $siswa->sekolah_asal ?>"></td>
							</tr>
						</table>
						<button type="submit" class="btn btn-sm btn-info">Update</button>
						</form>
					</div>
					<div class="card-footer">
						<form action="<?= site_url('download/pdf/formulir') ?>" method="POST">
							<input type="hidden" name="user_id" value="<?= $siswa->user_id ?>">
							<button type="submit" class="btn btn-danger"><i class="material-icons">picture_as_pdf</i> Print Formulir</button>
						</form>
					</div>
				</div>
			</div>
			<div class="col-xs-6">
				<?php
				if ($siswa->status == 0 ) : ?>
					<?php if ($siswa->s_pembayaran == 0) : ?>
						<?= '<script>
	                            Swal.fire(
	                            	"Info",
	                            	"Menunggu Konfirmasi Pembayaran",
	                            	"info"
	                                        )
                                </script>'; ?>
						<div class="my-2">
							<form action="<?= site_url('admin/approve_pembayaran') ?>" method="POST">
								<input type="hidden" name="user_id" value="<?= $siswa->id ?>">
								<div class="d-grid gap-2 mt-3">
									<button type="submit" id="pembayaran" class="btn btn-success"><i class="material-icons">payments</i>Approve Pembayaran</button>
								</div>
							</form>
						</div>
					<?php endif; ?>
					<?= '<script>
	Swal.fire(
		"Info",
		"Segera memeriksa bukti transfer dan mengklik approve",
		"info"
	)
</script>'; ?>
					
					<?php elseif ($siswa->status == 2):?>
					<div class="card">
						<div class="card-header bg-info">
							<h6 class="text-white">Status Siswa</h6>
						</div>

						<div class="card-body">
							<form action="<?= site_url('admin/lulus') ?>" method="POST">
								<input type="hidden" name="user_id" value="<?= $siswa->id ?>">
								<label for="">Status Siswa</label>
								<select name="status" id="" class="form-control" required>
									<option value="">:: Pilih Status</option>
									<option value="1">Diterima</option>
									<option value="3">Ditolak</option>
								</select>
								<div class="d-grid gap-2 mt-3">
									<button type="submit" id="pembayaran" class="btn btn-primary"><i class="material-icons">check_circle</i>Update Status Siswa</button>
								</div>
							</form>
						</div>
					</div>
					<?= '<script>
	Swal.fire(
		"Info",
		"Segera memeriksa surat pernyataan siswa",
		"info"
	)
</script>'; ?>
					<?php elseif ($siswa->status == 3):?>
					<div class="alert alert-custom alert-indicator-top indicator-danger" role="alert">
    <div class="alert-content">
        <span class="alert-title">Info!</span>
        <span class="alert-text">Satatus Siswa Ditolak</span>
    </div>
</div>
<?php elseif ($siswa->status == 1):?>
					<div class="alert alert-custom alert-indicator-top indicator-success" role="alert">
    <div class="alert-content">
        <span class="alert-title">Info!</span>
        <span class="alert-text">Status Siswa LULUS !</span>
    </div>
</div>
				<?php endif; ?>
<div class="text-left">
						<span>Note:</span>
						<form action="<?= site_url('send/note') ?>" method="POST">
							<input type="hidden" name="no" value="<?= $siswa->hp ?>">
							<textarea name="message" id="" cols="30" rows="5" class="form-control"></textarea>
							<div class="mt-3">
								<button type="submit" class="btn btn-success">Kirim Whatsapp</button>
							</div>
						</form>
					</div>
			</div>
		</div>
	</div>

	<div class="col-md-6">
		<div class="row">
			<div class="card-xs-12">
				<div class="card">
					<div class="card-header bg-primary">
						<h6 class="text-white">Berkas Siswa </h6>
					</div>
					<div class="card-body">
						<?php
						if ($s_berkas == 0) : ?>
							<div class="text-center">
								<span>Belum ada berkas</span>
							</div>
						<?php else : ?>
							<div class="table-responsive-lg">
								<table class="table">
									<tr style="vertical-align:middle">
										<td>Kartu Keluarga</td>
										<td>:</td>
										<td>
											<a data-fslightbox="gallery" href="<?= base_url('assets/images/berkas/') . $siswa->kk ?>">
												<img src="<?= base_url('assets/images/berkas/') . $siswa->kk ?>" width="150px">
											</a>
										</td>
									</tr>
									<tr style="vertical-align:middle">
										<td>Ijazah</td>
										<td>:</td>
										<td>
											<a data-fslightbox="gallery" href="<?= base_url('assets/images/berkas/') . $siswa->ijazah ?>">
												<img src="<?= base_url('assets/images/berkas/') . $siswa->ijazah ?>" width="150px">
											</a>
										</td>
									</tr>
									<tr style="vertical-align:middle">
										<td>Kartu KIP</td>
										<td>:</td>
										<td>
											<a data-fslightbox="gallery" href="<?= base_url('assets/images/berkas/') . $siswa->kip ?>">
												<img src="<?= base_url('assets/images/berkas/') . $siswa->kip ?>" width="150px">
											</a>
										</td>
									</tr>
									<tr style="vertical-align:middle">
										<td>Akte Kelahiran</td>
										<td>:</td>
										<td>
											<a data-fslightbox="gallery" href="<?= base_url('assets/images/berkas/') . $siswa->akte ?>">
												<img src="<?= base_url('assets/images/berkas/') . $siswa->akte ?>" width="150px">
											</a>
										</td>
									</tr>
									<tr style="vertical-align:middle">
										<td>Raport Semester 1</td>
										<td>:</td>
										<td>
											<a data-fslightbox="gallery" href="<?= base_url('assets/images/berkas/') . $siswa->raport_1 ?>">
												<img src="<?= base_url('assets/images/berkas/') . $siswa->raport_1 ?>" width="150px">
											</a>
										</td>
									</tr>
									<tr style="vertical-align:middle">
										<td>Raport Semeseter 2</td>
										<td>:</td>
										<td>
											<a data-fslightbox="gallery" href="<?= base_url('assets/images/berkas/') . $siswa->raport_2 ?>">
												<img src="<?= base_url('assets/images/berkas/') . $siswa->raport_2 ?>" width="150px">
											</a>
										</td>
									</tr>
								</table>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="card-xs-12">
				<div class="card">
					<div class="card-header bg-danger ">
						<h6 class="text-white">Pembayaran Siswa </h6>
					</div>
					<div class="card-body">
						<?php
						if ($siswa->pembayaran == null) : ?>
							<div class="text-center">
								<span>Belum melakukan pembayaran</span>
							</div>
						<?php else : ?>
							<div class="table-responsive-lg">
								<table class="table">
									<tr style="vertical-align:middle">
										<td>Bukti Pembayaran</td>
										<td>:</td>
										<td>
											<a data-fslightbox="gallery" href="<?= base_url('assets/images/berkas/') . $siswa->pembayaran ?>">
												<img src="<?= base_url('assets/images/berkas/') . $siswa->pembayaran ?>" width="150px">
											</a>
										</td>
									</tr>
								</table>
							</div>
							<form action="<?= site_url('download/pdf/pembayaran') ?>" method="POST">
								<input type="hidden" name="user_id" value="<?= $siswa->user_id ?>">
								<button type="submit" class="btn btn-danger"><i class="material-icons">picture_as_pdf</i> Print Pembayaran</button>
							</form>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="card-xs-12">
				<div class="card">
					<div class="card-header bg-warning ">
						<h6 class="text-white">Surat Pernyataan </h6>
					</div>
					<div class="card-body">
						<?php
						if ($s_lampiran == 0) : ?>
							<div class="text-center">
								<img src="<?= site_url('assets/img/pending.png') ?>" alt="" width="250px">
							</div>
						<?php else : ?>
							<div class="text-center">
								<img src="<?= site_url('assets/img/setuju.png') ?>" alt="" width="250px">
								<form action="<?= site_url('download/pdf/pernyataan') ?>" method="POST">
									<input type="hidden" name="user_id" value="<?= $siswa->user_id ?>">
									<button type="submit" class="btn btn-danger"><i class="material-icons">picture_as_pdf</i> Print Pernyataan</button>
								</form>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
