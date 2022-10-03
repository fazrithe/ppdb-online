<div class="row">
	<div class="col">
		<div class="card">
			<div class="card-body">
				<div class="form-group mb-2">
					<a href="<?= site_url('download/siswa_ditolak') ?>" class="btn btn-danger">Download Siswa Ditolak</a>
				</div>
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
									if ($v->status == 3) {
										echo '<span class="badge badge-style-light rounded-pill badge-danger">Ditolak</span>';
									} else {
										echo '<span class="badge badge-style-light rounded-pill badge-success">Approve</span>';
									}
									?>
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
