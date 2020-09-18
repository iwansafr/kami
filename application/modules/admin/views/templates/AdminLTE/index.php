<!DOCTYPE html>
<html>
<head>
  <?php
  $user = $this->session->userdata(base_url().'_logged_in');
  $this->load->view('templates/'.$templates['admin_template'].'/meta');
  ?>
</head>
<body class="hold-transition skin-black sidebar-mini">
<div id="loading" class="hidden">
  <img src="<?php echo base_url('images/ajax-loader.gif') ?>" style="position: fixed;">
</div>
<div class="wrapper">
  <?php $this->load->view('header', array('user'=>$user)); ?>
  <aside class="main-sidebar">
    <?php $this->load->view('sidebar', array('user'=>$user));?>
  </aside>
  <div class="content-wrapper">
    <section class="content-header">
      <?php $this->load->view('navigation') ?>
    </section>
    <section class="content">
      <?php
      // $content = $this->esg_model->esg_data['navigation']['string'];
      // $content = $content == 'admin' ? 'home' : $content;
      $mod['name'] = $this->router->fetch_class();
      $mod['task'] = $this->router->fetch_method();
      $content  = $mod['name'].'/'.$mod['task'];
      $content = $content == 'admin/index' ? 'templates'.DIRECTORY_SEPARATOR.$templates['admin_template'].DIRECTORY_SEPARATOR.'home' :$content;
      $this->load->view($content);
      ?>
    </section>
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2019-<?php echo date('Y'); ?> <a href="https://www.mandesa.co.id">mandesa</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
        <!-- Tab panes -->
  </aside>
  <div class="control-sidebar-bg"></div>
</div>
<?php $this->load->view('js') ?>
</body>
</html>
