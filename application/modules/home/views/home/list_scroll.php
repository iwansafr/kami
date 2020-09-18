<?php if (!empty($data)): ?>
	<div id="product" style="padding: 20px;">
		<?php foreach ($data['data'] as $key => $value): ?>
			<div class="card mb-3 product_box">
				<?php $status_badge = empty($value['status']) ? 'danger' : 'success'; ?>
				<span class="badge badge-<?php echo $status_badge;?> pull-right" style="width: 20vw;padding-top: 1vw; position: absolute;top: 2vw;right: 10px;font-size: 3vw;"><?php echo $status[$value['status']] ?></span>
				<a href="<?php echo base_url('home/detail/'.$value['id']) ?>" ><img style="border-top-right-radius: 10%;border-top-left-radius: 10%;" src="<?php echo image_module('iklan',$value['id'].'/'.$value['map_image']) ?>" class="card-img-top" alt="..."></a>
			  <div class="card-body">
			  	<div class="row">
				    <div class="col">
				    	<p style="margin-block-end: 0;font-size: 3vw; font-weight: bold;"><?php echo $value['kota'] ?></p>
				    	<p style="font-size: 3vw;"><?php echo $value['jalan'] ?></p>
				    </div>
				    <div class="col-7 description_product">
				    	<p style="font-size: 3vw;margin-block-end: 0;"><?php echo $jenis[$value['jenis']] ?> / <?php echo $ukuran[$value['ukuran']] ?>	 M</p>
				    	<p style="font-size: 3vw;"><?php echo $dimensi[$value['dimensi']] ?> / <?php echo $light[$value['light']] ?></p>
				    </div>
			  	</div>
			  </div>
			</div>
		<?php endforeach ?>
	</div>
	<div id="loading" class="text-center d-none">
		<label for="">loading ...</label>
	</div>
	<?php
	$hiddenclass = 'd-none';
	if(!empty($data['pagination'] && !empty($full)))
	{
		$hiddenclass = '';
	}
	?>
	<div class="text-center">
		<button class="btn btn-sm btn-default <?php echo $hiddenclass ?>" id="load_more" page="1" kota="<?php echo !empty($_GET['kota']) ? htmlentities($_GET['kota']) : ''; ?>" jalan="<?php echo !empty($_GET['jalan']) ? $_GET['jalan'] : ''; ?>" jenis="<?php echo !empty($_GET['jenis']) ? $_GET['jenis'] : ''; ?>" ukuran="<?php echo !empty($_GET['ukuran']) ? $_GET['ukuran'] : ''; ?>" style="background: white;width: 90%;border-radius: 0.5rem;">Tampilkan Lainnya</button>
		<hr>
	</div>
<?php endif ?>
      
  