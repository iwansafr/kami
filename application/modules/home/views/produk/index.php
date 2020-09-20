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
  <button data-toggle="modal" data-target="#tambah_produk" class="btn btn-primary btn-lg" style="border-radius: 1.5rem; position: fixed;bottom: 20px;right: 20px;z-index:9;"><i class="fa fa-plus"></i></button>
  <div class="modal fade" id="tambah_produk" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="close_prod_add">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="" method="post" class="mt-1" id="kategori_form">
            <div class="form-group mb-3 pt-2">
              <div class="form-group">
                <!-- <label for="">Kategori</label> -->
                <select name="produk_kat_id" class="form-control select2 custom" name="produk_kat_id" id="prod_kat_id"></select>
              </div>
              <div class="form-group">
                <!-- <label for="">Nama Produk</label> -->
                <input type="text" name="title" placeholder="Nama Produk" class="custom form-control" id="prod_title" autocomplete="off">
              </div>
              <div class="form-group">
                <!-- <label for="">Harga Beli</label> -->
                <input type="number" name="harga_beli" placeholder="Harga Beli" class="custom form-control" id="prod_price" autocomplete="off">
              </div>
              <div class="form-group">
                <!-- <label for="">Harga Jual</label> -->
                <input type="number" name="harga_jual" placeholder="Harga Jual" class="custom form-control" id="prod_sell" autocomplete="off">
              </div>
              <div class="form-group">
                <!-- <label for="">Stok</label> -->
                <input type="number" name="stok" placeholder="Stok" class="custom form-control" id="prod_stock" autocomplete="off">
              </div>
            </div>
            <button type="submit" class="btn btn-sm btn-info main_color" style="width: 100%;border-radius: 0.5rem; font-size: 4vw;">Tambah Produk</button>
          </form>
        </div>
        <div class="modal-footer">

        </div>
      </div>
    </div>
  </div>
  <div class="form-group mb-3 pt-2">
    <div class="input-group">
      <input type="text" name="title" placeholder="Cari Produk" class="custom form-control" id="cari_produk" autocomplete="off">
    </div>
  </div>
  <div class="row" style="padding: 10px 30px 0 30px;" id="prod_list">
  </div>
  <h5 for="" class="text-center mt-3" id="loading">Loading ...</h5>
</div>