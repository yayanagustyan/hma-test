function doEnter(e) {
  if (e.key == "Enter") {
    doLogin();
  }
}

document.getElementById('username').addEventListener("keypress", doEnter);
document.getElementById('password').addEventListener("keypress", doEnter);

function doLogin() {
  let user = $("#username").val();
  let pass = $("#password").val();

  if (!user || !pass) {
    alertify.error("Email atau Password tidak boleh kosong");
  }else{
    let valid = validateEmail(user);
    if (!valid) {
      alertify.error("Format email salah");
    }else{
      let data = {'username':user,'password':pass};
      ajaxPost(api_url('/web/login'), data).then(function(res){
        console.log(res);
        if (res.code == 200) {
          let id = res.data[0].user_id;
          window.location.href = base_url('account/login_success/'+id);
        }else{
          alertify.error(res.message);
        }
      })
    }
  }
}
