$("#usrActive").select2({
	placeholder:"Aktif",
})

function cancelUser(){
	window.location.href = base_url('users');
}

var lampName = "";

function saveUser(edit){
	let nama = $("#nama").val();
	let email = $("#email").val();
	let pass1 = $("#pass1").val();
	let pass2 = $("#pass2").val();
	let aktif = $("#usrActive").val();
	let image = lampName;

	var body = {
		"user_name": titleCase(nama),
		"user_email": email,
		"user_status": aktif,
	}

	if (edit==0) {
		if (!nama || !email || !pass1 || !pass2 || !aktif) {
			alertify.error("Silahkan Lengkapi Data");
		}else{
			if (pass1 != pass2) {
				alertify.error("Password Tidak Cocok");
			}else{

				//cek email
				let valid = validateEmail(email);
				if (valid) {
					body.user_pass = pass1;
					body.user_image = lampName;

					ajaxPost(api_url('/users/save'), body).then(function(res){
						if (res.code == 200) {
							alertify.success("Data berhasil disimpan");
							window.location.href = base_url('users');
						}else{
							alertify.error(res.message);
						}
					})
				}else{
					alertify.error("Format Email Salah");
				}
			}
		}
	}else{
		body.user_id = $("#userId").val();

		if (lampName != "") {
			body.user_image = lampName;
		}
		if (pass1 || pass2) {
			if (pass1 != pass2) {
				alertify.error("Password Tidak Cocok");
			}else{
				body.user_pass = pass1;
				updateUser(body);
			}
		}else{
			updateUser(body);
		}
	}

}

function updateUser(body) {
	let valid = validateEmail(body.user_email);
	if (valid) {
		ajaxPost(api_url('/users/update'), body).then(function(res){
			if (res.code != 400) {
				alertify.success("Data berhasil disimpan");
				window.location.href = base_url('users');
			}else{
				alertify.error(res.message);
			}
		})
	}else{
		alertify.error("Format Email Salah");
	}
}

function confirmDelete(code){
	$("#delId").val(code);
	$("#modal_title").text("Hapus Data Ini?");
	new Custombox.modal({
	  content: {
	    effect: 'fadein',
	    target: '#custom-modal',
	    close: false,
	  }
	}).open();
}

function deleteUser(){
	let code = $("#delId").val();
	ajaxGet(api_url('/users/delete/'+ code)).then(function(res){
		var btn = document.getElementById('custom-modal-close');
		btn.click();
		window.location.reload();
	})
}

function encodeImageFileAsURL(element, onCallback) {
  var file = element.files[0];
  var reader = new FileReader();
  reader.onloadend = onCallback;
  reader.readAsDataURL(file);
}

const actualBtn = document.getElementById('actual-btn');
if (actualBtn) {
  actualBtn.addEventListener('change', function(e){
    var filename = this.files[0].name;
    $("#nama-file").val(filename);

    encodeImageFileAsURL(this, function(e) {
      var base64string = e.target.result.split("base64,")[1];
      var upload = {
        "code": "users",
        "filename": filename,
        "base_string": base64string,
      };

      var prev = document.getElementById("thumbnail");
      prev.src = this.result;

      ajaxPost(api_url('/base64_upload'), upload).then(function(res){
        lampName = res.data[0].filename;
      })
    });
  })
}
