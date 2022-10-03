<div class="app-header">
	<nav class="navbar navbar-light navbar-expand-lg">
		<div class="container-fluid">
			<div class="navbar-nav" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link hide-sidebar-toggle-button" href="#"><i class="material-icons">first_page</i></a>
					</li>
				</ul>
			</div>
			<div class="d-flex">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link toggle-search" href="#"><i class="material-icons">search</i></a>
					</li>
					<li class="nav-item hidden-on-mobile">
						<a class="nav-link language-dropdown-toggle" href="#" id="languageDropDown" data-bs-toggle="dropdown"><img src="<?= $this->ardesign->profile() ?>" alt=""></a>
						<ul class="dropdown-menu dropdown-menu-end language-dropdown" aria-labelledby="languageDropDown">
							<li><a class="dropdown-item" href="<?= site_url('auth/logout') ?>">Sign Out</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>
</div>
