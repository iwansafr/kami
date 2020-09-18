<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- =====  BASIC PAGE NEEDS  ===== -->
	<meta charset="utf-8">
	<title>Iklanku</title>
	<!-- =====  SEO MATE  ===== -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="distribution" content="global">
	<meta name="revisit-after" content="2 Days">
	<meta name="robots" content="ALL">
	<meta name="rating" content="8 YEARS">
	<meta name="Language" content="en-us">
	<meta name="GOOGLEBOT" content="NOARCHIVE">
	<!-- =====  MOBILE SPECIFICATION  ===== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="viewport" content="width=device-width">
	<!-- =====  CSS  ===== -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('templates/iklanku/font-awesome/css/font-awesome.min.css');?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('templates/iklanku/bootstrap/css/bootstrap.min.css');?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('templates/iklanku/font/stylesheet.css');?>" />
	<style>
		body{
			font-family: 'comfortaaregular';
		}
		
	</style>
</head>
<body>
	<div>
		<div class="title text-center">
			<div class="title mt-5 pt-5">
				<h5 class="font-weight-bold" style="font-size: 5vw;">welcome to</h5>
				<h1 class="font-weight-bold" style="font-size: 15vw;">iklan<span class="text-info">ku</span></h1>
			</div>
			<img src="<?php echo base_url('templates/iklanku/img/start.png');?>" class="img img-fluid mb-3">
			<h6 class="mt-5" style="font-size: 4vw">Pasang Iklanmu</h6>
			<h6 style="font-size: 4vw">dimanapun kapanpun</h6>
			<a class="btn btn-lg btn-info pl-5 pr-5 mb-3 mt-3" href="<?php echo base_url('home/iklan/media') ?>" style="font-size: 8vw;border-radius: 15px;">mulai</a>
			<h6 class="mt-3" style="font-size: 4vw">Sudah Punya Akun ? <a href="<?php echo base_url('home/login');?>" style="font-size: 4vw" class="text-danger">Login</a></h6>
		</div>
	</div>
	<script src="<?php echo base_url('templates/iklanku/jquery/jquery.min.js');?>"></script>
  <script src="<?php echo base_url('templates/iklanku/bootstrap/js/bootstrap.min.js');?>"></script>
</body>
</html>