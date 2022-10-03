<div class="app-menu">
	<ul class="accordion-menu">
		<li class="sidebar-title">
			Administrator
		</li>
		<li class="active-page">
			<a href="<?= site_url('admin') ?>" class="active"><i class="material-icons-two-tone">dashboard</i>Dashboard</a>
		</li>
		<?php if ($this->session->userdata('role_id') == 1) : ?>
			<li class="">
				<a href="<?= site_url('admin/praregister') ?>" class=""><i class="material-icons-two-tone">how_to_reg</i>Praregister</a>
			</li>

			<li>
				<a href=""><i class="material-icons-two-tone">fact_check</i>PPDB<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
				<ul class="sub-menu">
					<li>
						<a href="<?= site_url('admin/siswa') ?>">Data Pendaftaran</a>
						<a href="<?= site_url('admin/siswa_lulus') ?>">Data Siswa Diterima</a>
						<a href="<?= site_url('admin/siswa_ditolak') ?>">Data Siswa Ditolak</a>
					</li>
				</ul>
			</li>

			<li>
				<a href=""><i class="material-icons-two-tone">receipt</i>Master Data<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
				<ul class="sub-menu">
					<li>
						<a href="<?= site_url('admin/kelas') ?>">Data Kelas</a>
						<a href="<?= site_url('admin/jenjang') ?>">Data Jenjang</a>
					</li>
				</ul>
			</li>
			<!-- <li>
				<a href=""><i class="material-icons-two-tone">receipt</i>Data Siswa<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
				<ul class="sub-menu">
					<li>
						<a href="<?= site_url('admin/siswa') ?>">Siswa Diterima</a>
						<a href="<?= site_url('admin/kelas') ?>">Siswa Ditolak</a>
					</li>
				</ul>
			</li> -->
			<!-- <li>
				<a href=""><i class="material-icons-two-tone">credit_card</i>Transaksi<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
				<ul class="sub-menu">
					<li>
						<a href="<?= site_url('admin/siswa') ?>">Invoice</a>
					</li>
				</ul>
			</li> -->
			<li class="">
				<a href="<?= site_url('admin/whatsapp') ?>" class=""><i class="material-icons-two-tone">circle_notifications</i>Whatsapp</a>
			</li>
			<li class="">
				<a href="<?= site_url('admin/setting') ?>" class=""><i class="material-icons-two-tone">settings_applications</i>Settings</a>
			</li>
		<?php endif ?>
		<li>
			<a href="<?= site_url('auth/logout') ?>" class=""><i class="material-icons-two-tone">logout</i>Sign Out</a>
		</li>
	</ul>
</div>
