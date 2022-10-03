<div class="row justify-content-center pt-5">
	<div class="col-md-6">
		<div class="card">
			<div class="card-header text-center">
				<h5 class="card-title">Silahkan upload semua berkas terlebih dahulu.</h5>
			</div>
			<div class="card-body">
				<?php if ($berkas->kk == null) : ?>
					<div id="dropzone">
						<form action="<?= base_url('upload/uploadKK') ?>" class="dropzone needsclick" id="uploadKK">
							<div class="dz-message needsclick">
								<button type="button" class="dz-button">Drop files here or click to upload.</button><br />
								<span class="note needsclick">(Upload Kartu Keluarga Disini.)</span>
							</div>
						</form>
					</div>
					<br>
				<?php endif; ?>
				<?php if ($berkas->akte == null) : ?>
					<div id="dropzone">
						<form action="<?= base_url('upload/uploadAL') ?>" class="dropzone needsclick" id="uploadAL">
							<div class="dz-message needsclick">
								<button type="button" class="dz-button">Drop files here or click to upload.</button><br />
								<span class="note needsclick">(Upload Akta Lahir Disini.)</span>
							</div>
						</form>
					</div>
					<br>
				<?php endif; ?>
				<?php if ($berkas->ijazah == null) : ?>
					<div id="dropzone">
						<form action="<?= base_url('upload/uploadIZ') ?>" class="dropzone needsclick" id="uploadIZ">
							<div class="dz-message needsclick">
								<button type="button" class="dz-button">Drop files here or click to upload.</button><br />
								<span class="note needsclick">(Upload Ijazah Disini.)</span>
							</div>
						</form>
					</div>
					<br>
				<?php endif; ?>
				<?php if ($berkas->kip == null) : ?>
					<div id="dropzone">
						<form action="<?= base_url('upload/uploadKIP') ?>" class="dropzone needsclick" id="uploadKIP">
							<div class="dz-message needsclick">
								<button type="button" class="dz-button">Drop files here or click to upload.</button><br />
								<span class="note needsclick">(Upload KIP Disini.)</span>
							</div>
						</form>
					</div>
					<br>
				<?php endif; ?>
				<?php if ($berkas->raport_1 == null) : ?>
					<div id="dropzone">
						<form action="<?= base_url('upload/raport1') ?>" class="dropzone needsclick" id="uploadR1">
							<div class="dz-message needsclick">
								<button type="button" class="dz-button">Drop files here or click to upload.</button><br />
								<span class="note needsclick">(Upload Raport Semester 1 Disini.)</span>
							</div>
						</form>
					</div>
					<br>
				<?php endif; ?>
				<?php if ($berkas->raport_2 == null) : ?>
					<div id="dropzone">
						<form action="<?= base_url('upload/raport2') ?>" class="dropzone needsclick" id="uploadR2">
							<div class="dz-message needsclick">
								<button type="button" class="dz-button">Drop files here or click to upload.</button><br />
								<span class="note needsclick">(Upload Raport Semester 2 Disini.)</span>
							</div>
						</form>
					</div>
					<br>
				<?php endif; ?>
				<div class="text-center">
					<a href="<?= site_url('siswa/konfrim_berkas') ?>" class="btn btn-danger btn-sm"><i class="material-icons">save</i> Konfirmasi Berkas</a>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="<?= base_url('assets/backend/') ?>plugins/dropzone/min/dropzone.min.js"></script>
