<div class="wrapper">
	<nav id="sidebar">
		<div id="dismiss">
			<i class="fa fa-arrow-right"></i>
		</div>
		<div class="sidebar-header">
			<img src="<?php echo base_url('images/logo.png') ?>" class="img img-fluid" width="50" alt="">
		</div>

		<ul class="list-unstyled components">
			<li class="active">
				<a href="#pageSubmenu" id="mainMenu" data-toggle="collapse" aria-expanded="false">Menu Utama <i
						class="fa fa-caret-down pull-right"></i></a>

			</li>
			<ul class="collapse list-unstyled" id="pageSubmenu">
				<li><a href="#">Out Of Home Media</a></li>
				<li><a href="#">Iklan Koran</a></li>
				<li><a href="#">Iklan Radio</a></li>
				<li><a href="#">Social Media Campaign</a></li>
				<li><a href="#">Digital Print</a></li>
			</ul>
			<li>
				<a href="#">Tentang Kami</a>
				<a href="#">Kontak</a>
				<a href="<?php echo base_url('home/logout') ?>">Logout</a>
			</li>
		</ul>

		<ul class="list-unstyled CTAs">
		</ul>
	</nav>
	<div id="content">
		<?php 
		$style = empty($hide_menu) ? ' text-align: center;display: block;' : '';
		
		?>
		<nav class="navbar <?php echo $class ?> navbar-light bg-light"
			style="background-color: white!important;max-height: 100%;<?php echo $style ?>">
			<a class="navbar-brand" href="<?php echo base_url(); ?>" style="padding-bottom: 0;">
				<img src="<?php echo base_url('images/logo.png') ?>" width="50" alt="">
			</a>
			<?php if ($hide_menu): ?>
			<button class="navbar-toggler" type="button" data-toggle="collapse" id="sidebarCollapse"
				data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
				aria-label="Toggle navigation" style="border-color: rgba(0,0,0,0);">
				<span class="navbar-toggler-icon font-weight-bold" style="height: 5vw;"></span>
			</button>
			<?php endif ?>
		</nav>
	</div>
</div>

<div class="overlay"></div>