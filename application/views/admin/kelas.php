<div class="row">
	<div class="col-md-6">
		<div class="card">
			<div class="card-header">
				<span>Add Kelas</span>
			</div>
			<div class="card-body">
				<form class="row g-3" action="<?= site_url('admin/add_kelas') ?>" method="POST">
					<div class="col-md-6">
						<select class="form-control" name="id_jenjang" id="jenjang">
							<option value="">:: Pilih Jenjang</option>
							<?php foreach ($jenjang as $v) : ?>
								<option value="<?= $v->id ?>"><?= $v->nama_jenjang ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="col-md-6">
						<input type="text" name="nama_kelas" placeholder="Kelas 1" class="form-control">
					</div>

					<div class="col-md-12">
						<button type="submit" class="btn btn-primary btn-sm">Tambah Kelas</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="page-description text-center">
			<h3>Sekolah Budi Agung - Jakarta</h3>
			<!--<h6>Jl.Cigeureung ,Indinhiang 46151</h6>-->
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
							<th>Nama Kelas</th>
							<th>Nama Jenjang</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1;
						foreach ($kelas as $v) : ?>
							<tr>
								<td><?= $no ?></td>
								<td><?= $v->nama_kelas ?></td>
								<td><?= $v->nama_jenjang ?></td>
								<td><button class="btn btn-sm btn-danger">Delete</button></td>
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
