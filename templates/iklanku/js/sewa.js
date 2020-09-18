let durasi = document.getElementById('durasi');
let dateTayang = document.getElementById('dateTayang');
let selesaiTayang = document.getElementById('selesaiTayang');
let tgl = dateTayang.value;
let formSewa = document.getElementById('formSewa');
let pageSewa = document.getElementById('pageSewa');
formSewa.addEventListener('submit',function(e){
	this.classList.add('d-none');
	pageSewa.append('Sedang Mengirim Data ...');
	setInterval(function(){
		console.log('ok');
		pageSewa.append('.');
	}, 100);
});
durasi.addEventListener('change',function(){
	let lama = durasi.value;
	let start = dateTayang.value; 
	hitung(start, lama);	
});
dateTayang.addEventListener('change',function(){
	let lama = durasi.value;
	let start = dateTayang.value; 
	hitung(start, lama);	
});
function hitung(start, lama){
	let date = new Date(`${start}`);
	let month = date.getMonth();
	let day = date.getDate();
	console.log(date);
	console.log(month);
	console.log(day);
	let tipe = 1;
	if(lama == 1){
		duration = 7;
	}else if(lama == 2){
		duration = 2*7;
	}else if(lama == 3){
		duration = 3*7;
	}else if(lama == 4){
		duration = 1;
		tipe = 2;
	}else if(lama == 5){
		duration = 3;
		tipe = 2;
	}else if(lama == 6){
		duration = 6;
		tipe = 2;
	}else if(lama == 7){
		duration = 12;
		tipe = 2;
	}
	if(tipe == 1){
		date.setDate(day+duration);
	}else{
		date.setMonth(month+duration);
	}
	console.log(date);
	selesaiTayang.value = `${date.getFullYear()}-${addZero(date.getMonth()+1)}-${addZero(date.getDate())}`;
}
function addZero(i) {
	if (i < 10) {
		i = "0" + i;
	}
	return i;
}