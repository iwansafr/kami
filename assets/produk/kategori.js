function load_kategori(kat) {
  var output = '';
  for (i = 0; i < kat.length; i++) {
    output = output.concat(
      `
        <div class="col-sm-6 text-center">
          <div class="card">
            <a href = "#" data-toggle="modal" data-target="#kategori_${kat[i].id}" style="padding: 5px 0 0 0;">
              <img src="${_URL}/images/ooh_active.png" class="img img-fluid img-circle">
              <p style="text-align: center;font-size: 11px;">${kat[i].title}</p>
            </a>
            <div class="modal fade" id="kategori_${kat[i].id}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Rubah Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="" method="post" class="mt-1">
                      <div class="form-group mb-3 pt-2">
                        <div class="input-group">
                          <input type="hidden" name="id" value="${kat[i].id}">
                          <input type="text" name="title" placeholder="Nama Kategori" value="${kat[i].title}" class="custom form-control">
                        </div>
                      </div>
                      <button type="submit" class="btn btn-sm btn-info main_color"
                        style="border-radius: 0.5rem; font-size: 4vw;">Simpan</button>
                      <button type="submit" class="btn btn-sm btn-danger" value = "${kat[i].id}" style="border-radius: 0.5rem; font-size: 4vw;">Hapus</button>
                    </form>
                  </div>
                  <div class="modal-footer">

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
form = document.getElementById('kategori_form');
form.addEventListener('submit', function (e) {
  e.preventDefault();
  var xhttp = new XMLHttpRequest();
  xhttp.onload = function () {
    console.log(xhttp.responseText);
  }
  xhttp.open('POST', _URL + '/home/produk/kategori_add');
  xhttp.setRequestHeader('Content-Type', 'application/json');
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      var response = this.responseText;
    }
  };
  var cat_title = document.getElementById('kat_title').value;
  var data = {
    title: cat_title
  };
  const stringsent = JSON.stringify(data);
  xhttp.send(stringsent);
});

list = new XMLHttpRequest();
list.onload = function () {
  const data = JSON.parse(list.responseText);
  if (data.data != undefined) {
    const kat = data.data;
    let kat_list = document.getElementById('kat_list');
    var output = '';
    output = load_kategori(kat);
    kat_list.innerHTML = output;
    var loading = document.getElementById('loading');
    loading.classList.add('d-none');
  }
}
list.open('get', _URL + '/home/produk/kategori_list');
list.send();

form_cari = document.getElementById('cari_kategori');
form_cari.addEventListener('keyup', function () {
  loading.classList.remove('d-none');
  let kat_list = document.getElementById('kat_list');
  kat_list.innerHTML = '';
  var title = this.value;
  var xhttp = new XMLHttpRequest();
  xhttp.onload = function () {
    if (xhttp.responseText != '') {
      var data = JSON.parse(xhttp.responseText);
      const kat = data.data;
      var output = '';
      output = load_kategori(kat);
      kat_list.innerHTML = output;
    } else {
      kat_list.innerHTML = '<h5 class="text-center">Data Tidak Ditemukan</h5>';
    }
    var loading = document.getElementById('loading');
    loading.classList.add('d-none');

  }
  xhttp.open('GET', _URL + '/home/produk/kategori_search/' + title);
  xhttp.setRequestHeader('Content-Type', 'application/json');
  xhttp.send();
});