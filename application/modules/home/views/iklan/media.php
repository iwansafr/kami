<style type="text/css">
	body {
		background-color: #F7F7F8 !important;
	}

	.img {
		max-width: 50%;
	}

	.card {
		background-color: #F7F7F8 !important;
		border-color: #F7F7F8 !important;
		border-radius: 1.5rem;
	}

	.card:hover {
		background-color: #cccccc !important;
	}
</style>
<div class="container mt-5 mt-5 pt-5">
	<div class="row" style="padding: 10px 30px 0 30px;">
		<div class="col text-center">
			<div class="card">
				<a href="<?php echo base_url('home/produk/menu') ?>" style="padding: 5px 0 0 0;">
					<img src="<?php echo base_url('images/ooh_active.png') ?>" class="img img-fluid img-circle">
					<p style="text-align: center;font-size: 11px;">PRODUK</p>
				</a>
			</div>
		</div>
		<div class="col text-center">
			<div class="card">
				<a href="#" data-toggle="modal" data-target="#sosmedModal" style="padding: 5px 0 0 0;">
					<img src="<?php echo base_url('images/sosmed_disabled.png') ?>" class="img img-fluid img-circle">
					<p class="disabled" style="text-align: center;font-size: 11px;">SOCIAL MEDIA<br>CAMPAIGN</p>
				</a>
			</div>
			<div class="modal fade" id="sosmedModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
				aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLongTitle"></h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<h5>UNDERCONSTRUCTION</h5>
						</div>
						<div class="modal-footer">

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row" style="padding: 10px 30px 0 30px;">
		<div class="col text-center">
			<div class="card">
				<a href="#" data-toggle="modal" data-target="#sosmedModal" style="padding: 5px 0 0 0;">
					<img src="<?php echo base_url('images/radio_disabled.png') ?>" class="img img-fluid img-circle">
					<p class="disabled" style="text-align: center;font-size: 11px;">IKLAN RADIO</p>
				</a>
			</div>
		</div>
		<div class="col text-center">
			<div class="card">
				<a href="#" data-toggle="modal" data-target="#sosmedModal" style="padding: 5px 0 0 0;">
					<img src="<?php echo base_url('images/koran_disabled.png') ?>" class="img img-fluid img-circle">
					<p class="disabled" style="text-align: center;font-size: 11px;">IKLAN KORAN</p>
				</a>
			</div>
		</div>
	</div>
	<div class="row" style="padding: 10px 30px 0 30px;">
		<div class="col text-center">
			<div class="card">
				<a href="#" data-toggle="modal" data-target="#sosmedModal" style="padding: 5px 0 0 0;">
					<img src="<?php echo base_url('images/digitalprint_disabled.png') ?>" class="img img-fluid img-circle">
					<p class="disabled" style="text-align: center;font-size: 11px;">DIGITAL PRINT</p>
				</a>
			</div>
		</div>
		<div class="col text-center">

		</div>
	</div>
</div>