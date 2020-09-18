<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('meta') ?>
</head>
<body>
	<?php $hide_menu = true; ?>
	<?php $class = 'fixed-top' ?>
	<?php if ($mod['content'] == 'home/detail'): ?>
		<?php $class = ''; ?>
	<?php endif ?>
	<?php if ($mod['content'] != 'home/login'): ?>
		<?php $this->load->view('templates/iklanku/menu_side',['class'=>$class,'hide_menu'=>$hide_menu]) ?>
	<?php endif ?>

	<?php $this->load->view($mod['content']);?>
	<script src="<?php echo base_url('templates/iklanku/') ?>jquery/jquery.min.js"></script>
	<script src="<?php echo base_url('templates/iklanku/') ?>bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url('templates/iklanku/js/');?>jquery.magnific-popup.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
  <!-- jQuery Custom Scroller CDN -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

  <script type="text/javascript">
      $(document).ready(function () {
          $("#sidebar").mCustomScrollbar({
              theme: "minimal"
          });

          $('#dismiss, .overlay').on('click', function () {
              $('#sidebar').removeClass('active');
              $('.overlay').removeClass('active');
          });

          $('#sidebarCollapse').on('click', function () {
              $('#sidebar').addClass('active');
              $('.overlay').addClass('active');
              $('.collapse.in').toggleClass('in');
              $('a[aria-expanded=true]').attr('aria-expanded', 'false');
          });
      });
  </script>
	<script type="text/javascript">
		$('.gallery').each(function() { // the containers for all your galleries
		    $(this).magnificPopup({
		        delegate: '.gallery_item', // the selector for gallery item
		        type: 'image',
		        gallery: {
		          enabled:true
		        }
		    });
		});
	</script>

  <?php $this->load->view('script') ?>
</body>
</html>