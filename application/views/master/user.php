
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

      <div class="row mt-2" >
        <div class="col-sm-12">
          <div class="card-box shadow-lg rd-10">

            <div class="row">
              <div class="col-sm-6">
                <a href="<?= base_url('users/add') ?>" class="btn btn-sm btn-rounded btn-default"><i class="fa fa-plus"></i>&nbsp; Tambah Data Baru</a>
              </div>

              <div class="col-sm-2">
              </div>

              <div class="col-sm-4">
                <div class="has-icon">
                  <input type="text" class="form-control input-sm" placeholder="Search">
                  <i class="fa fa-search"></i>
                </div>
              </div>

            </div>

            <div class="mt-2 table-responsive">
              <table class="table table-condensed table-hover mt-2">
                <tr>
                  <th>No</th>
                  <th>Nama Lengkap</th>
                  <th>Email</th>
                  <th>Aktif</th>
                  <td class="text-center"><b>Tools</b></td>
                </tr>

                <?php foreach ($users as $k => $v) { ?>
                  <tr>
                    <td><?= $k+1 ?></td>
                    <td class="nowrap"><?= $v->user_name ?></td>
                    <td class="nowrap"><?= $v->user_email ?></td>
                    <td class="nowrap"><?= $v->user_status == 1 ? 'Ya' : 'Tidak' ?></td>
                    <td width="50">
                      <div class="btn-actions">
                        <a class="no-link" href="<?= base_url('users/edit/' . $v->user_id) ?>"><i class="icon-pencil" ng-click="editUser(rc)"></i></a>
                        <i class="icon-trash" onclick="confirmDelete(<?= $v->user_id ?>)"></i>
                      </div>
                    </td>
                  </tr>
                <?php } ?>

              </table>
            </div>

          </div>

        </div>
      </div>

    </div>
  </div>


<div id="custom-modal" class="modal-demo modal-sm">
  <button type="button" class="close" id="custom-modal-close" onclick="Custombox.modal.close();">
    <span>&times;</span><span class="sr-only">Close</span>
  </button>
  <h4 class="custom-modal-title">Yakin Hapus Data Ini?</h4>
  <div class="custom-modal-text">
    Are you sure to delete this data?
  </div>
  <div class="text-center p-2">
    <input type="hidden" name="" id="delId">
    <button style="width: 120px" class="btn btn-sm btn-custom btn-default" onclick="deleteUser()">Yes</button>
    <button style="width: 120px" class="btn btn-sm btn-danger btn-custom" onclick="Custombox.modal.close();">Cancel</button>
  </div>
</div>


</div>
