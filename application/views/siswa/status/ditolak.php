<?= '<script>
	Swal.fire(
		"Ditolak",
		"Maaf pendaftaran PPDB anda ditolak",
		"danger"
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
			<h5 class="widget-info-title">Ditolak</h5>
			<p class="widget-info-text">Halo, <b><?= $this->session->userdata('name'); ?></b> status pendaftaran anda Ditolak.</p>
			<button class="btn btn-danger" type="button" disabled>
				<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
				Ditolak !
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
	<div class="card-footer" style="text-align: right;">
		<form action="<?= site_url('download/pdf/pernyataan') ?>" method="POST">
			<input type="hidden" name="user_id" value="<?= $this->session->userdata('user_id'); ?>">
			<button onclick="printDiv('struk')" class="btn btn-primary"><i class="material-icons">print</i> Print</button>
			<button type="submit" class="btn btn-danger"><i class="material-icons">picture_as_pdf</i> Print Pernyataan</button>
		</form>
		<!-- <a href="<?= site_url('download/pembayaran/') . $siswa->id_siswa; ?>" target="_blank" class="btn btn-danger"><i class="material-icons">picture_as_pdf</i> Download</a> -->
	</div>
</div>
