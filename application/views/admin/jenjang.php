<div class="row">
	<div class="col-md-6">
		<div class="card">
			<div class="card-header">
				<span>Add Jenjang</span>
			</div>
			<div class="card-body">
				<form class="row g-3" action="<?= site_url('admin/add_jenjang') ?>" method="POST">
					<div class="col-md-6">
						<input type="text" name="jenjang" class="form-control">
					</div>

					<div class="col-md-12">
						<button type="submit" class="btn btn-sm btn-primary">Tambah Jenjang</button>
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
							<th>Nama Jenjang</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1;
						foreach ($jenjang as $v) : ?>
							<tr>
								<td><?= $no ?></td>
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
