<?php 

$userid = "";
$nama = "";
$email = "";
$aktif = "";
$image = "noimage.png";

$isEdit = 0;

if (isset($user)) {
  echo json_encode($user);

  $isEdit = 1;

  $userid = $user[0]->user_id;
  $nama = $user[0]->user_name;
  $email = $user[0]->user_email;
  $aktif = $user[0]->user_status;
  $image = empty($user[0]->user_image) ? 'noimage.png' : $user[0]->user_image ;

  echo $image;
}

?>

<div class="content-page" ng-cloak>
  <div class="content">
    <div class="container-fluid">

      <div class="card-box shadow rd-10">
        <div class="row">
          <div class="col-sm-12">
            <h4 class="page-title">Pengguna</h4>
            <p class="text-muted page-title-alt">Data pengguna dan akses untuk aplikasi</p>
          </div>
        </div>
      </div>

      <div class="row mt-2">
        <div class="col-sm-12">
          <div class="card-box shadow-lg rd-10">
            <div>
              <h6><b><?= $this->uri->segment(2) == 'add' ? 'Tambah' : 'Edit' ?> Data</b></h6>
            </div>

            <div class="row">
              <div class="col-sm-6">
                <div class="row">
                  <div class="col-sm-6">

                    <input type="hidden" id="userId" value="<?= $userid ?>">

                    <div class="form-group">
                      <span>Nama Lengkap *</span>
                      <input type="text" class="form-control input-sm" autocomplete="off" required placeholder="Nama Lengkap" id="nama" value="<?= $nama ?>">
                    </div>

                    <div class="form-group">
                      <span>Email *</span>
                      <input type="text" class="form-control input-sm" autocomplete="off" required placeholder="Nama Lengkap" id="email" value="<?= $email ?>">
                    </div>
                    
                  </div>
                  <div class="col-sm-6">

                    <div class="form-group">
                      <span>Password *</span>
                      <div class="has-icon">
                        <input type="password" class="form-control input-sm" placeholder="Password" id="pass1">
                        <i id="eyepass1" onclick="togglePass('pass1','eyepass1')" class="fa fa-eye"></i>
                      </div>
                    </div>

                    <div class="form-group">
                      <span>Konfirmasi Password *</span>
                      <div class="has-icon">
	                      <input type="password" class="form-control input-sm" placeholder="Password" id="pass2">
                        <i id="eyepass2" onclick="togglePass('pass2','eyepass2')" class="fa fa-eye"></i>
                      </div>
                    </div>

                  </div>

                </div>

              </div>

              <div class="col-sm-6">
                <div class="row">

                  <div class="col-sm-6">

                    <div class="form-group">
                      <span>Aktif *</span>
                      <select class="select2 input-sm" id="usrActive">
                        <option></option>
                        <option value="1" <?= $aktif == "1" ? 'selected':'' ?> >Ya</option>
                        <option value="0" <?= $aktif == "0" ? 'selected':'' ?> >Tidak</option>
                      </select>
                    </div>

                    <div class="form-group" >
                      <span>Gambar</span>
                      <div>
                        <img class="img-thumb" src="<?= base_url('api/upload/users/') . $image ?>" id="thumbnail" >
                      </div>
                      <div class="input-group input-group-sm mb-3 mt-2">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">
                            <input type="file" id="actual-btn" accept="image/*" hidden/>
                            <label class="label-for-file" for="actual-btn">Pilih File</label>
                          </span>
                        </div>
                        <input type="text" readonly class="form-control custom-file input-sm " placeholder="belum ada file" id="nama-file">
                      </div>
                    </div>

                  </div>

                </div>
              </div>

            </div>

            <div class="row mt-3">
              <div class="col-sm-3">
                <div class="row">
                  <div class="col-sm-6">
                    <button class="btn btn-sm btn-default btn-rounded btn-block" onclick="saveUser(<?= $isEdit ?>)">
                      <i class="fa fa-check"></i> Simpan</button>
                  </div>
                  <div class="col-sm-6">
                    <button class="btn btn-sm btn-danger btn-rounded btn-block" onclick="cancelUser()">
                      <i class="fa fa-close"></i> Batal
                    </button>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>

    </div>
  </div>

</div>
