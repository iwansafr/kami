<style>
	.input{
    border-radius: 0.5rem!important;
    background-color: #bcbcbc!important;
    font-size: 3vw;
	}
	.form-control{
		font-size: 3vw!important;
	}
	.select{
    border-radius: 0.5rem!important;
	}
</style>
<div class="container mt-5 pt-5 " id="pageSewa">
	<h5 class="font-weight-bold mt-5 mb-4">FORM SEWA LOKASI</h5>
	<?php if (!empty($data)): ?>
		
		<form action="" method="post" id="formSewa">
			<div class="form-group">
				<label for="">Kota / Kabupaten</label>
				<input type="text" disabled class="form-control input" value="<?php echo $data['kota'] ?>">
			</div>
			<div class="form-group">
				<label for="">Nama Jalan</label>
				<input type="text" disabled class="form-control input" value="<?php echo $data['jalan'] ?>">
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col">
						<label for="">Jenis</label>
						<input type="text" disabled class="form-control input" value="<?php echo $jenis[$data['jenis']] ?>">
					</div>
					<div class="col">
						<label for="">Dimensi</label>
						<input type="text" disabled class="form-control input" value="<?php echo $dimensi[$data['dimensi']] ?>">
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col">
						<label for="">Ukuran</label>
						<input type="text" disabled class="form-control input" value="<?php echo $ukuran[$data['ukuran']] ?> Meter">
					</div>
					<div class="col">
						<label for="">Lightning</label>
						<input type="text" disabled class="form-control input" value="<?php echo $light[$data['light']] ?>">
					</div>
					<div class="col">
						<label for="">Sisi</label>
						<select name="sisi" id="" class="form-control select">
							<option value="1">1</option>
							<option value="2">2</option>
						</select>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col">
						<div class="form-group">
							<label for="">Mulai Tayang</label>
							<input type="date" id="dateTayang" name="start" class="form-control" value="<?php echo date('Y-m-d') ?>" style="border-radius: 0.5rem;width: 85%;">
						</div>
						<div class="form-group">
							<label for="">Selesai Tayang</label>
							<input type="date" id="selesaiTayang" name="end" readonly class="form-control" value="<?php echo date('Y-m-d',strtotime("+7 days")) ?>" style="border-radius: 0.5rem;width: 85%;background-color: white;">
						</div>
					</div>
					<div class="col">
						<label for="">Durasi</label>
						<select name="durasi" id="durasi" class="form-control" style="border-radius: 0.5rem;">
							<?php foreach ($durasi as $key => $value): ?>
								<option value="<?php echo $key ?>"><?php echo $value ?></option>
							<?php endforeach ?>
						</select>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div id="dataSewa">
					<input type="hidden" name="iklan_id" value="<?php echo $data['id'] ?>">
					<input type="hidden" name="jl" value="<?php echo $data['jalan'] ?>">
					<input type="hidden" name="kota" value="<?php echo $data['kota'] ?>">
					<input type="hidden" name="jenis" value="<?php echo $data['jenis'] ?>">
					<input type="hidden" name="dimensi" value="<?php echo $data['dimensi'] ?>">
					<input type="hidden" name="ukuran" value="<?php echo $data['ukuran'] ?>">
					<input type="hidden" name="lightning" value="<?php echo $data['light'] ?>">
					<?php $user = $_SESSION[base_url().'_logged_in']; ?>
					<?php if (!empty($user['username'])): ?>
						<input type="hidden" name="user_id" value="<?php echo $user['id'] ?>">
						<input type="hidden" name="username" value="<?php echo $user['username'] ?>">
						<input type="hidden" name="role" value="<?php echo $user['role'] ?>">
						<input type="hidden" name="email" value="<?php echo $user['email'] ?>">
						<input type="hidden" name="hp" value="<?php echo $user['phone'] ?>">
					<?php else: ?>
						<?php 
						redirect(base_url()) 
						?>
					<?php endif ?>
				</div>
				<button class="btn btn-sm btn-primary btn-lg" style="border-radius: 1.5rem;width: 100%;background-color:#0872ba;line-height: 8vw;font-size: 3.5vw;font-weight: bold;">
					SELESAI
				</button>
			</div>
		</form>
	<?php else: ?>
		<?php msg('Mohon Maaf Halaman yang anda minta tidak tersedia','info') ?>
	<?php endif ?>
</div>