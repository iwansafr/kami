<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<style type="text/css">
	body {
		background-color: white !important;
	}
</style>
<link rel="stylesheet" href="http://localhost/esg/templates/property/css/magnific-popup.css" type="text/css">
<div class="divider"></div>
<div class="content_top" style="margin-top: 90px;">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb main_color btn-default" style="padding: 2%;margin-bottom: 0;border-radius: 0;">
			<li class="breadcrumb-item"><a href="<?php echo base_url('home/iklan') ?>" style="color: white;font-size: 4vw;"><i class="fa fa-arrow-left"></i></a></li>
			<span class="ml-2" style="font-size: 4vw;padding-top: 1vw;"><?php echo $data['jalan'] ?> / <?php echo $data['kota'] ?></span>
		</ol>
	</nav>
</div>
<center>
	<img src="<?php echo image_module('iklan', $data['id'] . '/' . $data['map_image']) ?>" class="border img img-fluid m-auto" alt="">
</center>
<div class="review container-fluid">
	<div class="row">
		<div class="col">
			<div class="views mb-2 mt-1">
				<small class="text-primary"><i class="fa fa-eye"></i> <?php echo $data['views'] ?> views</small>
			</div>
			<table class="table table-sm">
				<tr style="border-bottom: dotted 3px #F0F0F0; border-top: dotted 3px white;">
					<td style="font-size: 12px;">
						<small>UKURAN</small>
					</td>
					<td>:</td>
					<td style="font-size: 14px;">
						<?php echo $ukuran[$data['ukuran']] ?> Meter
					</td>
				</tr>
				<tr style="border-bottom: dotted 3px #F0F0F0;">
					<td style="font-size: 12px;">
						<small>DIMENSI</small>
					</td>
					<td>:</td>
					<td style="font-size: 14px;">
						<?php echo $dimensi[$data['dimensi']] ?>
					</td>
				</tr>
				<tr style="border-bottom: dotted 3px #F0F0F0;">
					<td style="font-size: 12px;">
						<small>LIGHT</small>
					</td>
					<td>:</td>
					<td style="font-size: 14px;">
						<?php echo $light[$data['light']] ?>
					</td>
				</tr>
			</table>
		</div>
		<div class="col">
			<div class="rating text-right mb-3 mt-1" style="font-size: 3vw;">
				<?php $status_badge = empty($data['status']) ? 'danger' : 'success'; ?>
				<span class="badge badge-<?php echo $status_badge; ?> pull-right mt-1" style="width: 20vw; font-size: 3vw;"><?php echo $status[$data['status']] ?></span>
			</div>
			<br>
			<div class="description pl-3" style="min-height: 100px;">
				<i class="fa fa-map-marker" style="position: absolute;top: 40%;left: 0;font-size: 24px;"></i>
				<span style="font-size: 16px;">
					< 50 Meter</span> <p class="text-muted" style="font-size: 12px;">
						<small><?php echo $data['alamat'] ?></small>
						</p>
			</div>
		</div>
	</div>
</div>
<div class="location container-fluid" style="font-size: 3vw;">
	<i class="fa fa-arrow-right" style="font-size: 3vw;"></i>| <span class="text-muted" style="font-size: 3vw;">View menuju <?php echo $data['jalan'] ?></span>
	<p class="mt-2">
		<img src="<?php echo base_url(); ?>images/g-map.png" style="height: 3vw;"> <span class="text-muted" style="font-size: 3vw;padding-top: 2vw;"> Lihat di Map</span>
	</p>
</div>
<div class="gallery container-fluid">
	<?php if (!empty($data['gallery'])) : ?>
		<?php $gallery = json_decode($data['gallery'], 1) ?>
		<i class="fa fa-image" style="font-size: 3vw;"></i> <span style="font-size: 3vw;"> Gallery</span>
		<div class="scrollimages gallery">
			<?php foreach ($gallery as $key => $value) : ?>
				<a href="<?php echo image_module('iklan', 'gallery/' . $data['id'] . '/' . $value) ?>" class="gallery_item" style="padding-right: 0;">
					<img src="<?php echo image_module('iklan', 'gallery/' . $data['id'] . '/' . $value) ?>" style="object-fit: cover; height: 40vw;width: 32vw;">
				</a>
			<?php endforeach ?>
		</div>
	<?php endif ?>
	<hr>
	<div class="order container-fluid">
		<div class="form-group">
			<?php if (!empty($data['status'])) : ?>
				<a href="<?php echo base_url('home/sewa/' . $data['id']) ?>" class="btn btn-primary rounded w-100" style="background-color:#0872ba;">SEWA LOKASI</a>
			<?php else : ?>
				<a href="#disable_sewa_lokasi" id="disable_sewa_lokasi" class="btn btn-secondary rounded w-100">SEWA LOKASI</a>
			<?php endif ?>
		</div>
		<div class="form-group">
			<a href="https://wa.me/6282221357390" class="btn btn-success rounded w-100">ONLINE CHAT</a>
		</div>
	</div>
</div>
<br>
<br>
<br>