<nav class='navbar navbar-default navbar-inverse' role='navigation'>
	<div class='container'>
		<div class='navbar-header'>
			<button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#navbar-collapse-1'>
				<span class='sr-only'>Toggle Navigation</span>
				<span class='icon-bar'></span>
				<span class='icon-bar'></span>
				<span class='icon-bar'></span>
			</button>
			<a class='navbar-brand' href='#'>Myweb</a>
		</div>
		<div class='collapse navbar-collapse' id='navbar-collapse-1'>
			<ul class='nav navbar-nav'>
				<li class='dropdown'>
					<a href='#' class='dropdown-toggle' role='button' data-toggle='dropdown'>Menu <b class='caret'></b></a>
					<ul class='dropdown-menu' role='menu'>
						<li><a href="<?php echo site_url('home') ?>">Artikel</a></li>
						<li class='divider'></li>
						<li class='dropdown-submenu'>
							<a tabindex='-1' href='#'>Laporan</a>
							<ul class='dropdown-menu' role='menu'>
								<li><a tabindex='-1' href='<?php echo site_url('home/main_sch_tgl') ?>'>Laporan Per Periode</a></li>
								<li class='divider'></li>
								<li><a href='<?php echo site_url('home/main_sch_aktif') ?>'>Laporan Aktif User</a></li>
							</ul>
						</li>
					</ul>
				</li>
			</ul>
			<ul class='nav navbar-nav navbar-right'>
				<li class='dropdown'>
					<a href='#' class='dropdown-toggle' data-toggle='dropdown'><?php echo $this->session->userdata('username') ?> <b class='caret'></b></a>
					<ul class='dropdown-menu'>
						<li><a href='<?php echo site_url('home/profile') ?>'>My Profile</a></li>
						<li class='divider'></li>
						<li><a href="<?php echo site_url('login/log_out') ?>">Log Out</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</nav>