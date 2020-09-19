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
        <a href="<?php echo base_url('home/produk/kategori') ?>" style="padding: 5px 0 0 0;">
          <img src="<?php echo base_url('images/ooh_active.png') ?>" class="img img-fluid img-circle">
          <p style="text-align: center;font-size: 11px;">KATEGORI</p>
        </a>
      </div>
    </div>
    <div class="col text-center">
      <div class="card">
        <a href="<?php echo base_url('home/produk/') ?>" style="padding: 5px 0 0 0;">
          <img src="<?php echo base_url('images/ooh_active.png') ?>" class="img img-fluid img-circle">
          <p style="text-align: center;font-size: 11px;">PRODUK</p>
        </a>
      </div>
    </div>
  </div>
</div>