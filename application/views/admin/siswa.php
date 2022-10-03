<div class="row">
	<div class="col-md-6">
		<div class="card">
			<div class="card-header">
				<span>Pilih Jenjang</span>
			</div>
			<div class="card-body">
				<form class="row g-3" action="<?= site_url('admin/siswa') ?>" method="POST">
					<div class="col-md-6">
						<select class="form-control" name="id_jenjang" id="jenjang">
							<option value="">:: Pilih Jenjang</option>
							<?php foreach ($jenjang as $v) : ?>
								<option value="<?= $v->id ?>"><?= $v->nama_jenjang ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="col-md-6">
						<select class="form-control" name="id_kelas" id="kelas">
							<option value="">:: Pilih Kelas</option>
						</select>
					</div>

					<div class="col-md-12">
						<button type="submit" class="btn btn-success">Cari Siswa</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="page-description text-center">
			<h3><?= get_settings('school_name') ?></h3>
			<h6><?= get_settings('school_addres') ?></h6>
		</div>
	</div>
</div>

<div class="row">
	<div class="col">
		<div class="card">
			<div class="card-body">
				<table id="example" class="display" style="width:100%">
					<thead>
						<tr>
							<th>No</th>
							<th>NO REG</th>
							<th>NISN</th>
							<th>Nama</th>
							<th>Kelas</th>
							<th>Formulir</th>
							<th>Berkas</th>
							<th>Pembayaran</th>
							<th>Tanggal</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1;
						foreach ($siswa as $v) : ?>
							<tr>
								<td><?= $no ?></td>
								<td>
									<spna class="badge badge-primary"><?= $v->noreg ?></spna>
								</td>
								<td><?= $v->nisn ?></td>
								<td><?= $v->nama ?></td>
								<td><?= $v->nama_kelas ?></td>
								<td>
									<?php
									if ($v->s_formulir == 0) {
										echo '<span class="badge badge-style-light rounded-pill badge-danger">Belum Lengkap</span>';
									} else {
										echo '<span class="badge badge-style-light rounded-pill badge-primary">Lengkap</span>';
									}
									?>
								</td>
								<td>
									<?php
									if ($v->s_berkas == 0) {
										echo '<span class="badge badge-style-light rounded-pill badge-danger">Belum Lengkap</span>';
									} else {
										echo '<span class="badge badge-style-light rounded-pill badge-primary">Lengkap</span>';
									}
									?>
								</td>
								<td>
									<?php
									if ($v->s_pembayaran == 0) {
										echo '<span class="badge badge-style-light rounded-pill badge-danger">Belum Lunas</span>';
									} else {
										echo '<span class="badge badge-style-light rounded-pill badge-primary">Lunas</span>';
									}
									?>
								</td>
								<td><?= tanggal($v->created_at) ?></td>
								<td>
									<?php
									if ($v->status == 1) {
										echo '<span class="badge badge-style-light rounded-pill badge-success">Approve</span>';
									} else {
										echo '<span class="badge badge-style-light rounded-pill badge-warning">Pending</span>';
									}
									?>
								</td>
								<td>
									<?php
									if ($v->s_formulir == 0) : ?>
										<button class="btn btn-sm btn-success">Follow Up</button>
									<?php elseif ($v->s_formulir == 1 && $v->s_berkas == 1 && $v->s_pembayaran == 1) : ?>
										<!-- <span class="badge badge-dark">Selesai</span> -->
										<form action="<?= site_url('admin/delete_siswa') ?>" method="POST">
											<input type="hidden" name="user_id" value="<?= $v->user_id ?>">
											<a href="<?= site_url('admin/detail_siswa/' . $v->user_id) ?>" class="btn btn-sm btn-info"><i class="material-icons">info</i> Detail</a>
											<button type="submit" class="btn btn-sm btn-danger"><i class="material-icons">delete_outline</i> Delete</button>
										</form>
									<?php else : ?>
										<form action="<?= site_url('admin/delete_siswa') ?>" method="POST">
											<input type="hidden" name="user_id" value="<?= $v->user_id ?>">
											<a href="<?= site_url('admin/detail_siswa/' . $v->user_id) ?>" class="btn btn-sm btn-info"><i class="material-icons">info</i> Detail</a>
											<button type="submit" class="btn btn-sm btn-danger"><i class="material-icons">delete_outline</i> Delete</button>
										</form>
										<!-- <button class="btn btn-sm btn-info"><i class="material-icons">info</i> Detail</button> -->
									<?php endif; ?>
								</td>
								<?php
								$no++
								?>
							<?php endforeach ?>
							</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {

		$("#jenjang").change(function() {
			var id_jenjang = $(this).val();
			$.ajax({
				type: "POST",
				dataType: "html",
				url: "<?= site_url('admin/getKelas') ?>",
				data: {
					id_jenjang: id_jenjang
				},
				success: function(msg) {
					// console.log(msg)
					$("select#kelas").html(msg);
				}
			});
		});

	})
</script>
