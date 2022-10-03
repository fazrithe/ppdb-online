<?= $this->session->flashdata('msg') ?>
<div class="row">
	<div class="col">
		<div class="card">
			<div class="card-body">
				<table id="example" class="display" style="width:100%">
					<thead>
						<tr>
							<th>No</th>
							<th>No.REG</th>
							<th>Nama</th>
							<th>Kelas</th>
							<th>Phone</th>
							<th>Tanggal</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1;
						foreach ($siswa as $v) : ?>
							<tr>
								<td><?= $no ?></td>
								<td><?= $v->noreg ?></td>
								<td><?= $v->nama ?></td>
								<td><?= $v->nama_kelas ?></td>
								<td><?= $v->hp ?></td>
								<td><?= tanggal($v->created_at) ?></td>
								<td>
									<form action="<?= site_url('admin/follow') ?>" method="POST">
										<input type="hidden" name="nama" id="" value="<?= $v->nama ?>">
										<input type="hidden" name="no" id="" value="<?= $v->hp ?>">
										<button type="submit" class="btn btn-sm btn-success"><i class="material-icons">schedule_send</i> Follow Up</button>
									</form>
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
