<?= '<script>
	Swal.fire(
		"LULUS",
		"Selamat anda LULUS",
		"success"
	)
</script>'; ?>
<style type="text/css">
	.dash {
		border: 0 none;
		border-top: 1px dashed #000;
		background: none;
		height: 0;
	}
</style>
<div class="card widget widget-info shadow">
	<div class="card-body">
		<div class="widget-info-container">
			<div class="widget-info-image" style="background: url('https://assets.pikiran-rakyat.com/crop/0x0:0x0/750x500/photo/2022/02/11/630498307.png"></div>
			<h5 class="widget-info-title">LULUS ADMINISTRASI</h5>
			<p class="widget-info-text">Selamat, <b><?= $this->session->userdata('name'); ?></b> Anda *DITERIMA* dan telah menyelesaikan tahapan seleksi administrasi PPDB di Sekolah Budi Agung - Jakarta.</p>
			<button class="btn btn-success" type="button" disabled>
				<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
				LULUS !
			</button>
		</div>
	</div>
</div>
<div class="card">
	<div class="card-body" id="struk">
		<div class="text-center">
			<img src="https://www.freeiconspng.com/thumbs/success-icon/success-icon-10.png" width="100px">
			<p class="mt-4"><b>Bukti Pembayaran</b></p>
			<hr class="dash">
		</div>

		<div class="col" style="display: flex; border-bottom: 1px dashed #000; padding-bottom: 10px; margin-bottom: 10px;">
			<div class="order-id" style="flex: 1; width: 50%;">
				<small style="font-size: 3mm;">NO REG</small>
				<span style="display: block; font-size: 3.6mm; font-weight: 700; word-break: break-word;"><?= $siswa->noreg ?></span>
			</div>
			<div class="order-date" style="flex: 1; width: 50%; text-align: right; border-left: 1px dashed #000; padding: 0 10px;">
				<small style="font-size: 3mm;">Tgl. Approve</small>
				<span style="display: block; font-size: 3.6mm; font-weight: 700; word-break: break-word;"><?= tanggal($siswa->date) ?></span>
			</div>
			<style>
				.col>.order-date {
					text-align: right;
					padding: 0 0 0 10px !important;
				}
			</style>
		</div>
		<div class="col" style="display: flex; border-bottom: 1px dashed #000; padding-bottom: 10px; margin-bottom: 10px;">
			<div class="order-nama" style="flex: 1; width: 50%;">
				<small style="font-size: 3mm;">Nama Lengkap</small>
				<span style="display: block; font-size: 3.6mm; font-weight: 700; word-break: break-word;"><?= $siswa->nama ?></span>
			</div>
			<div class="order-nowa" style="flex: 1; width: 50%; border-left: 1px dashed #000; text-align: right;">
				<small style="font-size: 3mm;">No WhatsApp</small>
				<span style="display: block; font-size: 3.6mm; font-weight: 700; word-break: break-word;"><?= $siswa->hp ?></span>
			</div>
		</div>
		<div class="col col-alamat" style="display: flex; padding-bottom: 10px; margin-bottom: 0px;">
			<div class="order-alamat" style="flex: 1; padding-left: 0!important; padding-right: 0!important;">
				<small style="font-size: 3mm;">Alamat</small>
				<span style="display: block; font-size: 3.6mm; font-weight: 700; word-break: break-word;"><?= $siswa->alamat ?></span>
			</div>
		</div>
		<div id="table">
			<table style="width: 100%; border-collapse: collapse; margin-bottom: 10px;">
				<tr class="tabletitle" style="background: #EEE; text-transform: uppercase; border-bottom: 2px solid #000; height: 10mm; font-weight: 700; font-size: 3.6mm;">
					<td style="width: 40%;">Item</td>
					<td></td>
					<td>Subtotal</td>
				</tr>
				<tr class="item" style="border-bottom: 1px solid #ccc;">
					<td class="tableitem" style="padding: 10px 0;"><strong style="display: block;">Pembayaran PPDB</strong></td>
					<td></td>
					<td class="tableitem" style="padding: 10px 0;"><?= rupiah(get_settings('biaya')) ?></td>
				</tr>
				<tr class="tabletitle subtotal" style="background: #EEE; height: 6mm; border-top: 2px solid #000;">
					<td></td>
					<td>Subtotal</td>
					<td><?= rupiah(get_settings('biaya')) ?></td>
				</tr>

				<tr class="tabletitle total" style="background: #EEE; height: 6mm; font-weight: 700;">
					<td></td>
					<td>Total</td>
					<td><?= rupiah(get_settings('biaya')) ?></td>
				</tr>
			</table>
		</div>
	</div>
	<div class="card-footer text-center" style="">
		<form action="<?= site_url('download/pdf/pernyataan') ?>" method="POST">
			<input type="hidden" name="user_id" value="<?= $this->session->userdata('user_id'); ?>">
			<button onclick="printDiv('struk')" class="btn btn-primary"><i class="material-icons">print</i> Print Invoice</button>
			<button type="submit" class="btn btn-danger"><i class="material-icons">picture_as_pdf</i> Print Pernyataan</button>
		</form>
		<div class="text-center pt-4">
			<form action="<?= site_url('download/pdf/formulir') ?>" method="POST">
				<input type="hidden" name="user_id" value="<?= $this->session->userdata('user_id'); ?>">
				<button type="submit" class="btn btn-warning"><i class="material-icons">picture_as_pdf</i> Donwload Formulir</button>
			</form>
		</div>

	</div>
</div>
<div class="card widget widget-files shadow">
	<div class="card-header">
		<h6>Document Pribadi</h6>
	</div>
	<div class="card-body">
		<div class="widget-files-continer">
			<ul class="widget-files-list list-unstyled">
				<li class="widget-files-list-item">
					<span class="widget-files-list-item-icon">
						<i class="material-icons-outlined">image</i>
					</span>
					<span class="widget-files-list-item-content">
						<span class="widget-files-list-item-title">KARTU KELUARGA</span>
						<span class="widget-files-list-item-size"><?= $siswa->kk ?></span>
					</span>
					<a href="<?= base_url('assets/images/berkas/') . $siswa->kk ?>" target="_blank" class="widget-files-list-item-download-btn">
						<i class="material-icons-outlined">
							download
						</i>
					</a>
				</li>
				<li class="widget-files-list-item">
					<span class="widget-files-list-item-icon">
						<i class="material-icons-outlined">image</i>
					</span>
					<span class="widget-files-list-item-content">
						<span class="widget-files-list-item-title">IJAZAH</span>
						<span class="widget-files-list-item-size"><?= $siswa->ijazah ?></span>
					</span>
					<a href="<?= base_url('assets/images/berkas/') . $siswa->ijazah ?>" target="_blank" class="widget-files-list-item-download-btn">
						<i class="material-icons-outlined">
							download
						</i>
					</a>
				</li>
				<li class="widget-files-list-item">
					<span class="widget-files-list-item-icon">
						<i class="material-icons-outlined">image</i>
					</span>
					<span class="widget-files-list-item-content">
						<span class="widget-files-list-item-title">KIP</span>
						<span class="widget-files-list-item-size"><?= $siswa->kip ?></span>
					</span>
					<a href="<?= base_url('assets/images/berkas/') . $siswa->kip ?>" target="_blank" class="widget-files-list-item-download-btn">
						<i class="material-icons-outlined">
							download
						</i>
					</a>
				</li>
				<li class="widget-files-list-item">
					<span class="widget-files-list-item-icon">
						<i class="material-icons-outlined">image</i>
					</span>
					<span class="widget-files-list-item-content">
						<span class="widget-files-list-item-title">AKTA KELAHIRAN</span>
						<span class="widget-files-list-item-size"><?= $siswa->akte ?></span>
					</span>
					<a href="<?= base_url('assets/images/berkas/') . $siswa->akte ?>" target="_blank" class="widget-files-list-item-download-btn">
						<i class="material-icons-outlined">
							download
						</i>
					</a>
				</li>
				<li class="widget-files-list-item">
					<span class="widget-files-list-item-icon">
						<i class="material-icons-outlined">image</i>
					</span>
					<span class="widget-files-list-item-content">
						<span class="widget-files-list-item-title">RAPORT SEMESTER 1</span>
						<span class="widget-files-list-item-size"><?= $siswa->raport_1 ?></span>
					</span>
					<a href="<?= base_url('assets/images/berkas/') . $siswa->raport_1 ?>" target="_blank" class="widget-files-list-item-download-btn">
						<i class="material-icons-outlined">
							download
						</i>
					</a>
				</li>
				<li class="widget-files-list-item">
					<span class="widget-files-list-item-icon">
						<i class="material-icons-outlined">image</i>
					</span>
					<span class="widget-files-list-item-content">
						<span class="widget-files-list-item-title">RAPORT SEMESTER 2</span>
						<span class="widget-files-list-item-size"><?= $siswa->raport_2 ?></span>
					</span>
					<a href="<?= base_url('assets/images/berkas/') . $siswa->raport_2 ?>" target="_blank" class="widget-files-list-item-download-btn">
						<i class="material-icons-outlined">
							download
						</i>
					</a>
				</li>
			</ul>
		</div>
	</div>
</div>
