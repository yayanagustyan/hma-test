alertify.set('notifier','position', 'top-center');

function validateEmail(input) {
  var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
  if (input.match(validRegex)) {
    return true;
  } else {
    return false;
  }
}

function titleCase(str) {
  str = str.toLowerCase().split(' ');
  for (var i = 0; i < str.length; i++) {
    str[i] = str[i].charAt(0).toUpperCase() + str[i].slice(1); 
  }
  return str.join(' ');
}

function togglePass(input, eye) {
	let ele = document.getElementById(input);
	let icn = document.getElementById(eye);

	if (ele.type == 'password') {
		ele.type = 'text';
		icn.classList.add('fa-eye-slash');
	}else{
		ele.type = 'password';
		icn.classList.remove('fa-eye-slash');
	}

}

function base_url(path="") {
  var protocol = location.protocol;
  var host = location.host;
  var pathname = location.pathname;

  var base_url = protocol + '//' + host + "/app_project/test/hma2/";
  // var base_url = protocol + '//' + host + "/";
  if (path) {
  	base_url = base_url + path ;
  }
	return base_url;
}

function api_url(path="") {
	if (path) {
		return base_url("api"+path);
	}
	return base_url('api');
}

function api_headers() {
	return {
		'Authorization':'Basic aG1hdXNlcjIwMjQ6dGVzdGhtYTEyMyE=',
		'Content-Type':'application/json'
	}
}

function ajaxGet(url) {
	return new Promise(function(resolve, reject){
	  $.ajax({
	    url: url,
	    headers: api_headers(),
	    method: 'GET',
	    async: false,
	    success: function(res){
	    	resolve(res);
	    },
	    error: function(e){
	    	reject(e);
	    }
	  });
	})
}

function ajaxPost(url, data) {
	return new Promise(function(resolve, reject){
	  $.ajax({
	    url: url,
	    headers: api_headers(),
	    method: 'POST',
	    dataType: 'json',
	    data: JSON.stringify(data) ,
	    async: false,
	    success: function(res){
	    	resolve(res);
	    },
	    error: function(e){
	      reject(e);
	    }
	  });
	})
}


function setBgImage(image="bg.jpg") {
  var bg = document.getElementById("bg-image");
  if (bg) {
	  bg.style.backgroundImage = "url('../api/upload/bg/"+ image +"')";
	  bg.style.backgroundRepeat= "no-repeat";
	  bg.style.backgroundSize= "cover";
	  bg.style.backgroundPosition= "center";
  }

  // var navbar = document.getElementsByClassName('navbar-custom')[0];
  // if (navbar) {
	//   navbar.style.backgroundImage = "url('./api/upload/bg/"+ image +"')";
	//   navbar.style.backgroundRepeat= "no-repeat";
	//   navbar.style.backgroundSize= "cover";
	//   navbar.style.backgroundPosition= "top";
  // }

  // var left = document.getElementsByClassName('side-menu left')[0];
  // if (left) {
	//   left.style.backgroundImage = "url('./api/upload/bg/"+ image +"')";
	//   left.style.backgroundRepeat= "no-repeat";
	//   left.style.backgroundSize= "cover";
	//   left.style.backgroundPosition= "bottom";
  // }

 
  let thumb = document.getElementById("bg-img");
  if (thumb) {
  	thumb.src = api_url('/upload/bg/'+image);
  }
}
setBgImage();

ajaxPost(api_url('/params/id'), {"par_keys": "bg-login"}).then(function(res){
  let image = res.data[0].prm_value;
  setBgImage(image);
})
