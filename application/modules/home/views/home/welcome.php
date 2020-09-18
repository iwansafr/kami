<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<style>
	.sign-in-b{
		border-radius: 1.5rem;
		background: white;
		border: 1px black solid;
		vertical-align: center;
		font-size: 3vw;
		width: 50vw;
		text-align: center;
	}
	.sign-in-b:hover{
		background-color: #17a2b8;
	}
</style>
<div class="container mt-5 pt-5">
	<div class="welcome  mt-5 pt-5 mb-5 pb-5 pl-5 pr-5">
		<h3 style="font-size:4vw;font-weight: bold;">Hi, <?php echo !empty($_SESSION[base_url().'_logged_in']['username']) ? $_SESSION[base_url().'_logged_in']['username'] : '{nama_user}'; ?></h3>
		<p style="font-size: 4vw;">Selamat Datang di <b>adsbox</b>,<br>Akun anda telah aktif</p>
	</div>
</div>
<div class="title text-center pl-5 pr-5">
		<div class="container">

			<a href="<?php echo base_url('home/iklan/media') ?>" class="btn btn-sm btn-primary btn-lg" style="color: white;border-radius: 1.5rem;width: 100%;background-color:#0872ba;line-height: 9vw;font-size: 4vw;font-weight: bold;">
				NEXT
			</a>
		</div>
</div>