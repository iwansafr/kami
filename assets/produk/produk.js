function set_kat_option() {
  var prod_kat_id = document.getElementById('prod_kat_id');
  var xhttp = new XMLHttpRequest();
  xhttp.onload = function () {
    if (xhttp.responseText != '') {
      var data = JSON.parse(xhttp.responseText);
      console.log(data);
      const kat = data.data;
      var output = '';
      for (i = 0; i < kat.length; i++) {
        var c = document.createElement("option");
        c.text = kat[i].title;
        c.value = kat[i].id;
        prod_kat_id.options.add(c, 1);
      }
    } else {
      // prod_kat_id.innerHTML = '<h5 class="text-center">Data Tidak Ditemukan</h5>';
    }
    var loading = document.getElementById('loading');
    loading.classList.add('d-none');

  }
  xhttp.open('GET', _URL + '/home/produk/kategori_search/');
  xhttp.setRequestHeader('Content-Type', 'application/json');
  xhttp.send();
}
set_kat_option();

document.addEventListener('click', function (event) {
  if (event.target.matches('.update_produk')) {
    event.preventDefault();
    var id = event.target.value;
    document.getElementById('alert_' + id).innerHTML = 'loading ...';
    var title = document.getElementById('title_produk_' + id).value;
    console.log(title);
    var xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
      var response = xhttp.responseText;
      if (response != '') {
        var data = JSON.parse(response);
        console.log(data);
        if (data.status) {
          document.getElementById('title_list_' + id).innerHTML = title;
          document.getElementById('title_produk_' + id).value = title;
          document.getElementById('alert_' + id).classList.remove('alert-danger');
          document.getElementById('alert_' + id).classList.add('alert-success');
          document.getElementById('alert_' + id).innerHTML = 'Kategori berhasil diupdate';
        } else {
          document.getElementById('alert_' + id).classList.remove('alert-success');
          document.getElementById('alert_' + id).classList.add('alert-danger');
          document.getElementById('alert_' + id).innerHTML = 'Nama Kategori tidak boleh kosong';
        }
      }
    }
    xhttp.open('POST', _URL + '/home/produk/update/' + id);
    xhttp.setRequestHeader('Content-Type', 'application/json');
    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        var response = this.responseText;
      }
    };
    var cat_title = title;
    var data = {
      title: cat_title
    };
    const stringsent = JSON.stringify(data);
    xhttp.send(stringsent);
  } else if (event.target.matches('.delete_produk')) {
    event.preventDefault();
    var id = event.target.value;
    xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
      const data = JSON.parse(xhttp.responseText);
      if (data.status) {
        document.getElementById('card_' + id).innerHTML = '';
        var loading = document.getElementById('loading');
        loading.classList.add('d-none');
      }
    }
    xhttp.open('get', _URL + '/home/produk/delete/' + id);
    xhttp.send();
  }

}, false);
function load_produk(kat) {
  var output = '';
  for (i = 0; i < kat.length; i++) {
    output = output.concat(
      `
        <div class="col-sm-6 text-center">
          <div class="card" id="card_${kat[i].id}">
            <a href = "#" data-toggle="modal" data-target="#produk_${kat[i].id}" style="padding: 5px 0 0 0;">
              <img src="${_URL}/images/ooh_active.png" class="img img-fluid img-circle">
              <p style="text-align: center;font-size: 11px;" id="title_list_${kat[i].id}">${kat[i].title}</p>
            </a>
            <div class="modal fade" id="produk_${kat[i].id}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Rubah Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                      <div class="form-group mb-3 pt-2">
                        <div class="form-group">
                          <div class="alert" id="alert_${kat[i].id}"></div>
                          <input type="text" name="title" autocomplete="off" placeholder="Nama Kategori" id="title_produk_${kat[i].id}" value="${kat[i].title}" class="custom form-control">
                        </div>
                      </div>
                    </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-info main_color update_produk" value="${kat[i].id}" style="border-radius: 0.5rem; font-size: 4vw;">Simpan</button>
                    <button type="button" class="btn btn-sm btn-danger delete_produk" data-dismiss="modal" value = "${kat[i].id}" style="border-radius: 0.5rem; font-size: 4vw;">Hapus</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        `);
  }
  return output;
}

form = document.getElementById('produk_form');
form.addEventListener('submit', function (e) {
  e.preventDefault();
  var xhttp = new XMLHttpRequest();
  xhttp.onload = function () {
    console.log(xhttp.responseText);
    data = JSON.parse(xhttp.responseText);
    const kat = data.data;
    document.getElementById('close_prod_add').click();
    let produk_list = document.getElementById('prod_list');
    var output = '';
    output = load_produk(kat);
    var oldput = produk_list.innerHTML;
    output += oldput;
    produk_list.innerHTML = output;
    var loading = document.getElementById('loading');
    loading.classList.add('d-none');

  }
  xhttp.open('POST', _URL + '/home/produk/add');
  xhttp.setRequestHeader('Content-Type', 'application/json');
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      var response = this.responseText;
    }
  };
  var prod_kat_id = document.getElementById('prod_kat_id').value;
  var prod_title = document.getElementById('prod_title').value;
  var prod_buy = document.getElementById('prod_buy').value;
  var prod_sell = document.getElementById('prod_sell').value;
  var prod_stock = document.getElementById('prod_stock').value;
  var data = {
    produk_kat_id: prod_kat_id,
    title: prod_title,
    harga_beli: prod_buy,
    harga_jual: prod_sell,
    stok: prod_stock
  };
  const stringsent = JSON.stringify(data);
  xhttp.send(stringsent);
});

list = new XMLHttpRequest();
list.onload = function () {
  const data = JSON.parse(list.responseText);
  if (data.data != undefined) {
    const kat = data.data;
    let produk_list = document.getElementById('produk_list');
    var output = '';
    output = load_produk(kat);
    produk_list.innerHTML = output;
    var loading = document.getElementById('loading');
    loading.classList.add('d-none');
  }
}
list.open('get', _URL + '/home/produk/list');
list.send();

form_cari = document.getElementById('cari_produk');
form_cari.addEventListener('keyup', function () {
  loading.classList.remove('d-none');
  let produk_list = document.getElementById('produk_list');
  produk_list.innerHTML = '';
  var title = this.value;
  var xhttp = new XMLHttpRequest();
  xhttp.onload = function () {
    if (xhttp.responseText != '') {
      var data = JSON.parse(xhttp.responseText);
      const kat = data.data;
      var output = '';
      output = load_produk(kat);
      produk_list.innerHTML = output;
    } else {
      produk_list.innerHTML = '<h5 class="text-center">Data Tidak Ditemukan</h5>';
    }
    var loading = document.getElementById('loading');
    loading.classList.add('d-none');

  }
  xhttp.open('GET', _URL + '/home/produk/search/' + title);
  xhttp.setRequestHeader('Content-Type', 'application/json');
  xhttp.send();
});