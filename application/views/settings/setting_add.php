<?php 

$image = "noimage.png";

?>

<div class="content-page" ng-cloak>
  <div class="content">
    <div class="container-fluid">

      <div class="card-box shadow rd-10">
        <div class="row">
          <div class="col-sm-12">
            <h4 class="page-title">Pengaturan</h4>
            <p class="text-muted page-title-alt">Atur tampilan web</p>
          </div>
        </div>
      </div>

      <div class="row mt-2">
        <div class="col-sm-12">
          <div class="card-box shadow-lg rd-10">

            <div class="row">
              <div class="col-sm-12">
                <div class="row">
                  <div class="col-sm-3">
                    <span>Background Image</span>
                  </div>
                  <div class="col-sm-9">
                    <div>
                      <img class="img-thumb" src="<?= base_url('api/upload/users/') . $image ?>" id="bg-img">
                    </div>
                    <div class="input-group input-group-sm mb-3 mt-2">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                          <input type="file" id="actual-btn-bg" accept="image/*" hidden/>
                          <label class="label-for-file" for="actual-btn-bg">Pilih File</label>
                        </span>
                      </div>
                      <input type="text" readonly class="form-control custom-file input-sm " placeholder="belum ada file" id="nama-file-bg">
                    </div>

                    <div class="row">
                      <div class="col-sm-3">
                        <button class="btn btn-sm btn-default btn-rounded btn-block" onclick="updateBgImage()">
                          <i class="fa fa-check"></i> Update
                        </button>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
            <hr>

            <div class="row">
              <div class="col-sm-12">
                <div class="row">
                  <div class="col-sm-3">
                    <span>Logo</span>
                  </div>
                  <div class="col-sm-9">
                    <div>
                      <img class="img-thumb" src="<?= base_url('api/upload/logo/') . $this->session->userdata('logo') ?>" id="logo-image" >
                    </div>
                    <div class="input-group input-group-sm mb-3 mt-2">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon2">
                          <input type="file" id="actual-btn-logo" accept="image/*" hidden/>
                          <label class="label-for-file" for="actual-btn-logo">Pilih File</label>
                        </span>
                      </div>
                      <input type="text" readonly class="form-control custom-file input-sm " placeholder="belum ada file" id="nama-file-logo">
                    </div>

                    <div class="row">
                      <div class="col-sm-3">
                        <button class="btn btn-sm btn-default btn-rounded btn-block" onclick="updateLogoImage()">
                          <i class="fa fa-check"></i> Update
                        </button>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
            <hr>

            <div class="row">
              <div class="col-sm-12">
                <div class="row">
                  <div class="col-sm-3">
                    <span>Menu</span>
                  </div>
                  <div class="col-sm-9">
                    <table class="table table-condensed">
                      <tr>
                        <th>No</th>
                        <th>Nama Menu</th>
                        <th>Link</th>
                        <th>Icon</th>
                        <th>Urutan</th>
                        <th>Aksi</th>
                      </tr>
                      <?php foreach ($menus as $k => $v) {?>
                        <tr>
                          <td><?= $k+1 ?></td>
                          <td><?= $v->mn_name ?></td>
                          <td><?= $v->mn_link ?></td>
                          <td><?= $v->mn_icon ?></td>
                          <td><?= $v->mn_sort ?></td>
                          <td>
                            <a class="no-link" href="<?= base_url('menu/edit/').$v->mn_id ?>"><i class="icon-pencil"></i></a>
                          </td>
                        </tr>
                      <?php } ?>
                    </table>
                    <hr>

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


<script type="text/javascript">
  function updateLogoImage() {
    let ele = document.getElementById('sort-'+code);
    console.log(code + " " + ele.value);

    ajaxPost(api_url('/menus/update'), {"mn_id":code, "mn_sort":ele.value}).then(function(res){
      window.location.reload();
    })

  }
</script>