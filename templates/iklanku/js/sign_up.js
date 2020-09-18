var getJSON = function(url, callback) {
  var xhr = new XMLHttpRequest();
  xhr.open('GET', url, true);
  xhr.responseType = 'json';
  xhr.onload = function() {
    var status = xhr.status;
    if (status == 200) {
      callback(null, xhr.response);
    } else {
      callback(status);
    }
  };
  xhr.send();
};

let userInput = document.getElementById('userInput');
let emailInput = document.getElementById('emailInput');
let signForm = document.getElementById('signForm');

userInput.addEventListener('keyup',function(){
	let input = this.value;
	input = input.replace(/\s/g,'');
	this.value = input;
});

signForm.addEventListener('submit',function(e){
	if(userInput.classList.contains('is-invalid') || emailInput.classList.contains('is-invalid')){
		console.log('masih ada error');		
		e.preventDefault();
	}else{
		console.log('aman');		
	}
});

userInput.addEventListener('change',function(){
	let input = this.value;
	getJSON(_URL+'home/user_exist/'+input,  function(err, data) {
	  if (err != null) {
	    console.error(err);
	  } else {
	    if(data.status == false){
	    	document.getElementById('usernameAlert').innerHTML = `${data.msg}`;
	    	userInput.classList.remove('is-invalid');
	    	userInput.classList.add('is-invalid');
	    }else{
	    	document.getElementById('usernameAlert').innerHTML = '';
	    	userInput.classList.remove('is-invalid');
	    }
	  }
	});
});
emailInput.addEventListener('change',function(){
	let input = this.value;
	getJSON(_URL+'home/email_exist/'+input,  function(err, data) {
	  if (err != null) {
	    console.error(err);
	  } else {
	    if(data.status == false){
	    	document.getElementById('emailAlert').innerHTML = `${data.msg}`;
	    	emailInput.classList.remove('is-invalid');
	    	emailInput.classList.add('is-invalid');
	    }else{
	    	document.getElementById('emailAlert').innerHTML = '';
	    	emailInput.classList.remove('is-invalid');
	    }
	  }
	});
});