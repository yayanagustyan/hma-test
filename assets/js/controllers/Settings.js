function encodeImageFileAsURL(element, onCallback) {
  var file = element.files[0];
  var reader = new FileReader();
  reader.onloadend = onCallback;
  reader.readAsDataURL(file);
}

var lampNameLogo = "";

const actualBtn = document.getElementById('actual-btn-logo');
if (actualBtn) {
  actualBtn.addEventListener('change', function(e){
    var filename = this.files[0].name;
    $("#nama-file-logo").val(filename);

    encodeImageFileAsURL(this, function(e) {
      var base64string = e.target.result.split("base64,")[1];
      var upload = {
        "code": "logo",
        "filename": filename,
        "base_string": base64string,
      };

      var prev = document.getElementById("logo-image");
      prev.src = this.result;

      ajaxPost(api_url('/base64_upload'), upload).then(function(res){
        lampNameLogo = res.data[0].filename;
      })
    });
  })
}

function updateLogoImage(){
  let data = {
    "prm_name": "logo",
    "prm_value": lampNameLogo,
  }
  ajaxPost(api_url('/params/update'), data).then(function(res){
    alertify.success("Logo berhasil diupdate");
    window.location.reload();
  })
}


var lampNameBg = "";
const actualBtnBg = document.getElementById('actual-btn-bg');
if (actualBtnBg) {
  actualBtnBg.addEventListener('change', function(e){
    var filename = this.files[0].name;
    $("#nama-file-bg").val(filename);

    encodeImageFileAsURL(this, function(e) {
      var base64string = e.target.result.split("base64,")[1];
      var upload = {
        "code": "bg",
        "filename": filename,
        "base_string": base64string,
      };

      var prev = document.getElementById("bg-img");
      prev.src = this.result;

      ajaxPost(api_url('/base64_upload'), upload).then(function(res){
        lampNameBg = res.data[0].filename;
      })
    });
  })
}


function updateBgImage(){
  let data = {
    "prm_name": "bg-login",
    "prm_value": lampNameBg,
  }
  ajaxPost(api_url('/params/update'), data).then(function(res){
    alertify.success("Logo berhasil diupdate");
    window.location.reload();
  })
}
