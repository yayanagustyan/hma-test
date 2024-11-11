<?php 

$image = "noimage.png";
$mn = $menus[0];


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
            <b>Edit Menu</b>

            <div class="row mt-4">
              <div class="col-sm-4">
                <input type="hidden" id="mnId" value="<?= $mn->mn_id ?>">

                <div class="form-group">
                  <span>Nama Menu *</span>
                  <input type="text" class="form-control input-sm" autocomplete="off" placeholder="Nama Menu" id="nama" value="<?= $mn->mn_name ?>">
                </div>

                <div class="form-group">
                  <span>Link</span>
                  <input type="text" readonly class="form-control input-sm" placeholder="Link" id="link" value="<?= $mn->mn_link ?>">
                </div>

                <div class="form-group">
                  <span>Icon</span>
                  <input type="text" class="form-control input-sm" autocomplete="off" placeholder="Icon" id="icon" value="<?= $mn->mn_icon ?>">
                  <span><i class="fa fa-info-circle"></i> <a target="_blank" href="https://simplelineicons.github.io" class="no-link">Referensi Icon</a></span>
                </div>

                <div class="form-group">
                  <span>Urutan *</span>
                  <select class="select2" id="sort">
                    <option></option>
                    <?php for ($i=0; $i < 4; $i++) { ?>
                      <option value="<?= $i+1 ?>" <?= $mn->mn_sort == ($i+1) ? 'selected':'' ?> ><?= $i+1 ?></option>
                    <?php } ?>
                  </select>
                </div>

              </div>
            </div>
            <hr>

            <div class="row">
              <div class="col-sm-3">
                <div class="row">
                  <div class="col-sm-6">
                    <button class="btn btn-sm btn-default btn-rounded btn-block" onclick="updateMenu()">
                      <i class="fa fa-check"></i> Update
                    </button>
                  </div>

                  <div class="col-sm-6">
                    <a href="<?= base_url("settings") ?>" class="btn btn-sm btn-danger btn-rounded btn-block">
                      <i class="fa fa-check"></i> Batal
                    </a>
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
  function updateMenu() {
    let id = $("#mnId").val();
    let name = $("#nama").val();
    let link = $("#link").val();
    let icon = $("#icon").val();
    let sort = $("#sort").val();

    let icons = icon.split('-');
    if (icons[0] != 'icon') {
      icon = 'icon-' + icon;
    }

    let data = {
      "mn_id"   : id, 
      "mn_name" : name,
      "mn_link" : link,
      "mn_icon" : icon,
      "mn_sort" : sort
    };

    ajaxPost(api_url('/menus/update'), data).then(function(res){
      window.location.href = base_url('settings');
    })

  }
</script>