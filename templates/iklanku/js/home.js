function openNav() {
  document.getElementById("myNav").style.width = "100%";
}

function closeNav() {
  document.getElementById("myNav").style.width = "0%";
}
$(document).ready(function(){
	$.getJSON(_URL+'home/iklan/json_kota/',function(result){
		$('input[name="kota"]').autocomplete({
			source: result
		});
	});
	$('input[name="jalan"]').on('keyup',function(){
		var a = $(this).val();
		console.log(a);
		$.getJSON(_URL+'home/iklan/json_jalan/'+a,function(result){
			console.log(result);
			$('input[name="jalan"]').autocomplete({
				source: result
			});
		});
	});
	$('.media-iklan').on('click',function(){
		var a = $(this).val();
		var b = $(this).html();
		$('#media-opsi').html(b);
		$('#dimensi-opsi').html('Semua Ukuran');
		$('input[name="media"]').val(a);
		set_size(a);
	});
	$('#load_more').on('click',function(){
		load_product(true,true);
	});

	$(document).on('click','.dimensi_iklan',function(){
		let a = $(this).val();
		$('#dimensi-opsi').html($(this).html());
		$('#load_more').attr('ukuran',a);
		load_product(false,false);
	});
	function load_product(i = false,append = true){
		$('#loading').removeClass('d-none');
		var page = parseInt($('#load_more').attr('page'));
		var kota = $('#load_more').attr('kota');
		var jalan = $('#load_more').attr('jalan');
		var jenis = $('#load_more').attr('jenis');
		var ukuran = $('#load_more').attr('ukuran');
		var where = '';
		if(kota != ''){
			where = '&kota='+kota; 
		}

		if(jalan != ''){
			where = where.concat('&jalan='+jalan); 
		}
		if(jenis != ''){
			where = where.concat('&jenis='+jenis); 
		}
		if(ukuran != ''){
			where = where.concat('&ukuran='+ukuran); 
		}
		if(i==true){
			page = page+1;
		}
		$.getJSON(_URL+'home/iklan/json_list/?page='+page+where,function(result){
			console.log(result);
			if(result.data.length>0){
				if(append==false){
					$('#product').html('');
					console.log('ok bersih');
				}
				for(i=0;i<result.data.length;i++){
					let badge = 'badge-danger';
					if(result.data[i]['status']==1){
						badge = 'badge-success';
					}
					$('#product').append(`<div class="card mb-3 product_box">
						<span class="badge ${badge} pull-right" style="width: 20vw;padding-top: 1vw; position: absolute;top: 2vw;right: 10px;font-size: 3vw;"> ${result.status[result.data[i]['status']]} </span>
						<a href="${_URL+'home/detail/'+result.data[i]['id']}" ><img style="border-top-right-radius: 10%;border-top-left-radius: 10%;" src="${_URL+'images/modules/iklan/'+result.data[i]['id']+'/'+result.data[i]['map_image']}" class="card-img-top" alt="..."></a>
					  <div class="card-body">
					  	<div class="row">
						    <div class="col">
						    	<p style="margin-block-end: 0;font-size: 3vw; font-weight: bold;">${result.data[i]['kota']}</p>
						    	<p style="font-size: 3vw;">${result.data[i]['jalan']}</p>
						    </div>
						    <div class="col-7 description_product pl-0">
						    	<p style="font-size: 3vw;margin-block-end: 0;">${result.jenis[result.data[i]['jenis']]} / ${result.ukuran[result.data[i]['ukuran']]} M</p>
				    			<p style="font-size: 3vw;">${result.dimensi[result.data[i]['dimensi']]} / ${result.light[result.data[i]['light']]}</p>
						    </div>
					  	</div>
					  </div>
					</div>`);
				}
				$('#load_more').removeClass('d-none');
			}else{
				if(append==false){
					$('#product').html('<div class="alert alert-info">Mohon Maaf keyword yang anda cari tidak ditemukan</div>');
				}
				$('#load_more').addClass('d-none');
			}
			$('#loading').addClass('d-none');
			$('#load_more').attr('page',page);
		});
	}
	function set_size(a){
		if(a==1){
			$('#size_filter').html(`
				<button data-dismiss="modal" value="0" class="dimensi_iklan w-100 btn btn-sm btn-secondary">Semua Ukuran</button>
	      <button data-dismiss="modal" value="8" class="dimensi_iklan w-100 btn btn-sm btn-secondary">10 X 20</button>
	      <button data-dismiss="modal" value="6" class="dimensi_iklan w-100 btn btn-sm btn-secondary">6 X 12</button>
	      <button data-dismiss="modal" value="4" class="dimensi_iklan w-100 btn btn-sm btn-secondary">4 X 8</button>
	      <button data-dismiss="modal" value="7" class="dimensi_iklan w-100 btn btn-sm btn-secondary">8 X 16</button>
	      <button data-dismiss="modal" value="5" class="dimensi_iklan w-100 btn btn-sm btn-secondary">5 X 10</button>

				`);
		}else if(parseInt(a)==parseInt(2)){
			$('#size_filter').html(`
				<button data-dismiss="modal" value="0" class="dimensi_iklan w-100 btn btn-sm btn-secondary">Semua Ukuran</button>
		    <button data-dismiss="modal" value="3" class="dimensi_iklan w-100 btn btn-sm btn-secondary">4 X 6</button>
				`);
		}else if(parseInt(a)==parseInt(3)){
			$('#size_filter').html(`
				<button data-dismiss="modal" value="0" class="dimensi_iklan w-100 btn btn-sm btn-secondary">Semua Ukuran</button>
	      <button data-dismiss="modal" value="2" class="dimensi_iklan w-100 btn btn-sm btn-secondary">4 X 2</button>
	      <button data-dismiss="modal" value="1" class="dimensi_iklan w-100 btn btn-sm btn-secondary">1 X 2</button>
				`);
		}else if(parseInt(a)==parseInt(4)){
			$('#size_filter').html(`
				<button data-dismiss="modal" value="0" class="dimensi_iklan w-100 btn btn-sm btn-secondary">Semua Ukuran</button>
		    <button data-dismiss="modal" value="7" class="dimensi_iklan w-100 btn btn-sm btn-secondary">8 X 16</button>
				`);
		}else{
			$('#size_filter').html(`
				<button data-dismiss="modal" value="0" class="dimensi_iklan w-100 btn btn-sm btn-secondary">Semua Ukuran</button>
				`);
		}
		$('#load_more').attr('jenis',a);
		load_product(false,false);
	}
});