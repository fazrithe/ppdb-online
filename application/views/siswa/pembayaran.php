<div class="row justify-content-center pt-5">
	<div class="col-md-6">
		<div class="card">
			<div class="card-header"></div>
			<div class="card-body text-center">
				<img src="<?= site_url('assets/img/payment.svg') ?>" class="rounded mx-auto d-block" alt="..." width="200px">
				<div class="p-3">
					<span class="mb-4">Silahkan melakukan pembayaran sejumlah :</span><br><br>
					<div class="p-2">
						<span style="font-size:24px; border-style: dotted; padding:3px;"><?= rupiah(get_settings('biaya')) ?></span>
					</div>
					<div class="row justify-content-center p-3">
						<div class="col-md-8">
							<table class="table table-striped">
								<tr class="text-left">
									<td style="text-align: left;">Nama Bank</td>
									<td>:</td>
									<td style="text-align: left;"><?= get_settings('bank_account') ?></td>
								</tr>
								<tr class="text-left">
									<td style="text-align: left;">Nomor Rekening</td>
									<td>:</td>
									<td style="text-align: left;"><?= get_settings('bank_number') ?></td>
								</tr>
								<tr class="text-left">
									<td style="text-align: left;">Atas Nama</td>
									<td>:</td>
									<td style="text-align: left;"><?= get_settings('bank_name') ?></td>
								</tr>
							</table>
						</div>
					</div>
					<hr>
					<?php
					if ($pembayaran->num_rows() > 0) : ?>
						<div class="alert alert-custom alert-indicator-left indicator-warning" role="alert">
							<div class="alert-content">
								<span class="alert-title">Pending!</span>
								<span class="alert-text">Pembayaran anda masih dalam verifikasi admin!</span>
							</div>
						</div>
					<?php else : ?>
						<button type="button" class="btn btn-primary m-b-sm" data-bs-toggle="modal" data-bs-target="#konfirmasi">
							Konfirmasi Pembayaran
						</button>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="konfirmasi" tabindex="-1" aria-labelledby="exampleModalCenterTitle" style="display: none;" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<h5 class="modal-title text-white" id="konfirmasi">Upload bukti pembayaran</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div id="dropzone">
					<form action="<?= base_url('upload/payment') ?>" class="dropzone needsclick" id="payment">
						<div class="dz-message needsclick">
							<button type="button" class="dz-button">Drop files here or click to upload.</button><br />
							<span class="note needsclick">(Upload Bukti Pembayaran Disini.)</span>
						</div>
					</form>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<a href="<?= site_url('siswa') ?>" class="btn btn-primary">Simpan</a>
			</div>
		</div>
	</div>
</div>
<script src="<?= base_url('assets/backend/') ?>plugins/dropzone/min/dropzone.min.js"></script>
