
<div class="content-page" ng-controller="dashCtrl">
  <div class="content">
    <div class="container-fluid">

      <div class="card-box shadow rd-10">
        <div class="row">
          <div class="col-sm-10">
            <h4 class="page-title">Dashboard</h4>
            <p class="text-muted page-title-alt">Selamat datang di dashboard</p>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-3">
          <div class="card-box shadow rd-10">
            <div class="row">
              <div class="col-sm-10">
                <h2><?= $total ?></h2>
                <p class="text-muted page-title-alt">Pengguna Terdaftar</p>
              </div>
            </div>
          </div>
        </div>

        <div class="col-sm-3">
          <div class="card-box shadow rd-10">
            <div class="row">
              <div class="col-sm-10">
                <h2><?= $logged ?></h2>
                <p class="text-muted page-title-alt">Pengguna Aktif</p>
              </div>
            </div>
          </div>
        </div>

      </div>


    </div>
  </div>

</div>