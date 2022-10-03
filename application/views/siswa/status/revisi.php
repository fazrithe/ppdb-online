<?php if ($register->row('s_lampiran') == 1) : ?>
	<script>
		Swal.fire(
			"Informasi",
			"Menunggu konfirmasi dari admin",
			"info"
		)
	</script>
<?php elseif ($register->row('s_lampiran') == 0) : ?>
	<script>
		Swal.fire(
			"Informasi",
			"Silahkan perbaharui berkas  & Menyetujui surat pernyataan",
			"info"
		)
	</script>
<?php endif; ?>
<div class="card widget widget-info shadow">
	<div class="card-body">
		<div class="widget-info-container">
			<div class="widget-info-image" style="background: url('https://assets.pikiran-rakyat.com/crop/0x0:0x0/750x500/photo/2022/02/11/630498307.png"></div>
			<h5 class="widget-info-title">Perbaharui berkas anda</h5>
			<p class="widget-info-text">Silahkan perbaharui berkas sesuai informasi yg dikirim via whatsapp.</p>
			<button class="btn btn-info" type="button" disabled>
				<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
				Lakukan update berkas...
			</button>
		</div>
	</div>
</div>
<?php
if ($register->row('s_lampiran') == 0) : ?>
	<div class="card widget widget-info shadow">
		<div class="card-body">
			<div class="widget-info-container">
				<div class="widget-info-image" style="background: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSSSyUNMG8AjC0bOFd70rrrvkHGJ6h9L6yB5Q&usqp=CAU"></div>
				<h5 class="widget-info-title">Surat Pernyataan</h5>
				<p class="widget-info-text">Silahkan untuk menyetujui Surat Pernyataan.</p>
				<button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal" type="button">Lampiran</button>
				
			</div>
		</div>
	</div>
<?php else : ?>
	<div class="card widget widget-info shadow">
		<div class="card-body">
			<div class="widget-info-container">
				<div class="widget-info-image" style="background: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSSSyUNMG8AjC0bOFd70rrrvkHGJ6h9L6yB5Q&usqp=CAU"></div>
				<h5 class="widget-info-title">Surat Pernyataan</h5>
				<p class="widget-info-text">Anda sudah menyetujui Surat Pernyataan.</p>
				<button class="btn btn-warning" type="button" disabled>Selamat</button>
			</div>
		</div>
	</div>
<?php endif; ?>

<div class="card shadow">
	<div class="card-body">
		<p>Note : Gambar otomatis tersimpan</p>
		<div class="table-responsive-lg">
			<table class="table">
				<tr style="vertical-align:middle">
					<td>
						<a data-fslightbox="gallery" href="<?= base_url('assets/images/berkas/') . $siswa->kk ?>">
							<img src="<?= base_url('assets/images/berkas/') . $siswa->kk ?>" width="150px">
						</a>
					</td>
					<td>:</td>
					<td>
						Kartu Keluarga
						<div id="dropzone">
							<form action="<?= base_url('upload/uploadKK') ?>" class="dropzone needsclick" id="uploadKK">
								<div class="dz-message needsclick">
									<button type="button" class="dz-button">Drop files here or click to upload.</button><br />
									<span class="note needsclick">(Upload Kartu Keluarga Disini.)</span>
								</div>
							</form>
						</div>
					</td>
				</tr>

				<tr style="vertical-align:middle">
					<td>
						<a data-fslightbox="gallery" href="<?= base_url('assets/images/berkas/') . $siswa->ijazah ?>">
							<img src="<?= base_url('assets/images/berkas/') . $siswa->ijazah ?>" width="150px">
						</a>
					</td>
					<td>:</td>
					<td>
						Kartu Ijazah
						<div id="dropzone">
							<form action="<?= base_url('upload/uploadIZ') ?>" class="dropzone needsclick" id="uploadIZ">
								<div class="dz-message needsclick">
									<button type="button" class="dz-button">Drop files here or click to upload.</button><br />
									<span class="note needsclick">(Upload Ijazah Disini.)</span>
								</div>
							</form>
						</div>
					</td>
				</tr>
				<tr style="vertical-align:middle">
					<td>
						<a data-fslightbox="gallery" href="<?= base_url('assets/images/berkas/') . $siswa->kip ?>">
							<img src="<?= base_url('assets/images/berkas/') . $siswa->kip ?>" width="150px">
						</a>
					</td>
					<td>:</td>
					<td>
						Kartu KIP
						<div id="dropzone">
							<form action="<?= base_url('upload/uploadKIP') ?>" class="dropzone needsclick" id="uploadKIP">
								<div class="dz-message needsclick">
									<button type="button" class="dz-button">Drop files here or click to upload.</button><br />
									<span class="note needsclick">(Upload KIP Disini.)</span>
								</div>
							</form>
						</div>
					</td>
				</tr>
				<tr style="vertical-align:middle">
					<td>
						<a data-fslightbox="gallery" href="<?= base_url('assets/images/berkas/') . $siswa->akte ?>">
							<img src="<?= base_url('assets/images/berkas/') . $siswa->akte ?>" width="150px">
						</a>
					</td>
					<td>:</td>
					<td>
						Kartu Akte
						<div id="dropzone">
							<form action="<?= base_url('upload/uploadAL') ?>" class="dropzone needsclick" id="uploadAL">
								<div class="dz-message needsclick">
									<button type="button" class="dz-button">Drop files here or click to upload.</button><br />
									<span class="note needsclick">(Upload Akta Lahir Disini.)</span>
								</div>
							</form>
						</div>
					</td>
				</tr>
				<tr style="vertical-align:middle">
					<td>
						<a data-fslightbox="gallery" href="<?= base_url('assets/images/berkas/') . $siswa->raport_1 ?>">
							<img src="<?= base_url('assets/images/berkas/') . $siswa->raport_1 ?>" width="150px">
						</a>
					</td>
					<td>:</td>
					<td>
						Raport Semester 1
						<div id="dropzone">
							<form action="<?= base_url('upload/raport1') ?>" class="dropzone needsclick" id="uploadR1">
								<div class="dz-message needsclick">
									<button type="button" class="dz-button">Drop files here or click to upload.</button><br />
									<span class="note needsclick">(Upload Raport Semester 1 Disini.)</span>
								</div>
							</form>
						</div>
					</td>
				</tr>
				<tr style="vertical-align:middle">
					<td>
						<a data-fslightbox="gallery" href="<?= base_url('assets/images/berkas/') . $siswa->raport_2 ?>">
							<img src="<?= base_url('assets/images/berkas/') . $siswa->raport_2 ?>" width="150px">
						</a>
					</td>
					<td>:</td>
					<td>
						Raport Semeseter 2
						<div id="dropzone">
							<form action="<?= base_url('upload/raport2') ?>" class="dropzone needsclick" id="uploadR2">
								<div class="dz-message needsclick">
									<button type="button" class="dz-button">Drop files here or click to upload.</button><br />
									<span class="note needsclick">(Upload Raport Semester 2 Disini.)</span>
								</div>
							</form>
						</div>
					</td>
				</tr>
			</table>
		</div>

	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
					<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
						<div class="modal-content">
							<div class="modal-body">
								<div class="text-center">
									<h5>Surat Pernyataan Orang Tua / Wali</h5>
								</div>
								<div style="text-align: left;">
									<table width="50%">
										<tr>
											<td>Nama Orangtua</td>
											<td>:</td>
											<td><?= $siswa->nama_ayah ?></td>
										</tr>
										<tr>
											<td>Nama Siswa</td>
											<td>:</td>
											<td><?= $siswa->nama ?></td>
										</tr>
										<tr>
											<td>Nama Unit</td>
											<td>:</td>
											<td><?= $siswa->nama_kelas ?></td>
										</tr>
										<tr>
											<td>Alamat</td>
											<td>:</td>
											<td><?= $siswa->alamat ?></td>
										</tr>
										<tr>
											<td>No Telpon</td>
											<td>:</td>
											<td><?= $siswa->hp ?></td>
										</tr>
									</table>
								</div>
								<hr>
								<div class="mt-3">
									<h6>Menyatakan</h6>
									<div style="text-align: left;">
										<span>Bahwa saya selaku orang tua / wali dari peserta didik diatas, menyatakan dengan ini sesungguhnya, bahwa selama disekolah ini:</span>
									</div>
								</div>
								<div style="text-align: left;" class="p-4">
								<table width="100%">
									<tr>
										<td style="width: 3%; vertical-align: top;">1.</td>
										<td style="width: 97%; vertical-align: top;">Bersedia membimbing dan mengawasi calon siswa tersebut diatas untuk mentaati dan mematuhi pelaksanaan Wiyatamandala, termasuk pakaian seragam sekolah, OSIS dan kegiatan hari – hari pertama masuk sekolah, serta Tata Tertib Sekolah.</td>
									</tr>
									<tr>
										<td style="vertical-align: top;">2.</td>
										<td style="vertical-align: top;">
											Siswa tersebut akan mengikuti Pendidikan Agama Buddha / Kristen / Katholik / Islam / Hindu.
										</td>
									</tr>
									<tr>
										<td style="vertical-align: top;">3.</td>
										<td style="vertical-align: top;">
											Tidak keberatan siswa tersebut diatas menerima sanksi antara lain :
										</td>
									</tr>
									<tr>
										<td style="text-align: right;">a.</td>
										<td>Tidak diperkenankan mengikuti pelajaran selama jangka waktu tertentu</td>
									</tr>
									<tr>
										<td style="text-align: right;">b.</td>
										<td>Dikembalikan kepada saya. Apabila saya tidak membimbing dan mengawasinya sehingga siswa tersebut tidak mentaati ketentuan yang ditetapkan oleh sekolah.</td>
									</tr>
									<!--<tr>
										<td></td>
										<td>
											Apabila saya tidak membingbing dan mengawasi sehingga siswa tersebut tidak mentaati ketentuan yang di tetapkan pihak sekolah
										</td>
									</tr>-->
								</table>
								<div class="p-3">
									<!--<small class="text-muted ">Demikian surat pernytaan ini kami buat dengan sebenarnya dan penuh rasa tanggung jawab.</small>-->
									<td>Demikian Surat Pernyataan ini kami buat dengan sebenarnya dan penuh rasa tanggung jawab.</td>
								</div>
							</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
								<a href="<?= site_url('siswa/lampiran') ?>" class="btn btn-primary">Setuju</a>
							</div>
						</div>
					</div>
				</div>