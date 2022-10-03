<?= $this->session->flashdata('msg'); ?>
<div class="row">
	<div class="col-md-4">
		<div class="card">
			<div class="card-body">
				<div style="align-content: center;">
					<img src="<?= $qr->qr ?? "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRDLK8bTm-7k0oHPwkmDSx89jg7mF4wLHsonQ&usqp=CAU" ?>" class="rounded mx-auto d-block" alt="">
					<a href="<?= site_url('admin/tes_wa') ?>" class="btn btn-success">Tes Message</a>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-8">
		<div class="card">
			<div class="card-body">
				<h6>Pengaturan Whatsapp Notifikasi</h6>
				<form action="<?= site_url('admin/update_setting') ?>" method="POST">
					<input type="hidden" name="type" id="" value="whatsapp">
					<label for="">Url Server</label>
					<input type="text" class="form-control" name="server_autonotif" value="<?= get_settings('server_autonotif') ?>">
					<label for="">No Admin <small class="text-danger">Penerima Notif</small></label>
					<input type="text" class="form-control" name="phone" value="<?= get_settings('phone') ?>">
					<div class="my-3">
						<button type="submit" class="btn btn-primary">Simpan</button>
					</div>
				</form>

			</div>
		</div>
		<div class="card">

			<div class="card-body">
				<form action="<?= site_url('admin/update_notif') ?>" method="POST">
					<div class="p-2">
						<span class="badge badge-danger">Notif Whatsapp Siswa</span>
					</div>
					<label for="">Register (Siswa)</label>
					<textarea name="register" id="" rows="6" class="form-control"><?= get_notif('register') ?></textarea>
					<label for="">Pembayaran (Siswa)</label>
					<textarea name="pembayaran" id="" rows="6" class="form-control"><?= get_notif('pembayaran') ?></textarea>
					<label for="">Verif Pembayaran (Siswa)</label>
					<textarea name="verif_pembayaran" id="" rows="6" class="form-control"><?= get_notif('verif_pembayaran') ?></textarea>
					<label for="">Diterima (Siswa)</label>
					<textarea name="lulus" id="" rows="6" class="form-control"><?= get_notif('lulus') ?></textarea>
					<label for="">Ditolak (Siswa)</label>
					<textarea name="ditolak" id="" rows="6" class="form-control"><?= get_notif('ditolak') ?></textarea>
					<div class="p-2">
						<span class="badge badge-info">Notif Whatsapp Admin</span>
					</div>
					<label for="">Register (Admin)</label>
					<textarea name="admin_register" id="" rows="6" class="form-control"><?= get_notif('admin_register') ?></textarea>

					<div class="form-group mt-2">
						<button type="submit" class="btn btn-success">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
