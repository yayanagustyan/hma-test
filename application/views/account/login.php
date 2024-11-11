<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Test HMA">
  <meta name="author" content="Yayan Agustyan">

  <?php $logo = $this->session->userdata('logo'); ?>

  <link rel="icon" type="image/png" href="<?= base_url('api/upload/logo/'.$logo); ?>">

  <title>HMA - Admin Login</title>

  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/js/select2/css/select2.css?v='). time() ?>">

  <link href="<?= base_url('plugins/custombox/css/custombox.min.css?v=') . time() ?>" rel="stylesheet">

  <link href="<?= base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css" />
  <link href="<?= base_url('assets/css/icons.css')?>" rel="stylesheet" type="text/css" />
  <link href="<?= base_url('assets/css/style.css?v=') . time()?>" rel="stylesheet" type="text/css" />
  <link href="<?= base_url('assets/css/month_picker.css?v=') . time()?>" rel="stylesheet" type="text/css" />
  <link href="<?= base_url('assets/css/custom.css?v=') . time()?>" rel="stylesheet" type="text/css" />

  <!-- Alertify -->
  <link href="<?= base_url('plugins/alertify/css/alertify.min.css')?>" rel="stylesheet"/>
  <!-- Default theme -->
  <link href="<?= base_url('plugins/alertify/css/themes/default.min.css')?>" rel="stylesheet"/>
  <!-- Semantic UI theme -->
  <link href="<?= base_url('plugins/alertify/css/themes/semantic.min.css')?>" rel="stylesheet"/>
  <!-- Bootstrap theme -->
  <link href="<?= base_url('plugins/alertify/css/themes/bootstrap.min.css')?>" rel="stylesheet"/>

  <script type="text/javascript" src="<?= base_url('plugins/alertify/alertify.min.js')?>"></script>

</head>
<body id="page-top" class="login-page">
  <div id="bg-image">
    <div id="overlay"></div>
  </div>

  <div class="container pt-5">
    <div class="row justify-content-center mt-5 pt-5">
      <div class="col-xl-6 col-lg-6 col-md-6">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Selamat Datang</h1><br>
                    <p class="text-dark">Admin Panel HMA</p>
                    
                  </div>
                  <div class="user">
                    <div class="form-group">
                      <span>Username</span>
                      <input type="text" class="form-control form-control-user" id="username">
                    </div>
                    <div class="form-group">
                      <span>Password</span>
                      <input type="password" class="form-control form-control-user" id="password">
                    </div>

                    <button class="btn btn-dark btn-user btn-block" onclick="doLogin()">Login</button>
                    <p class="text-center mt-2" ng-cloak>&nbsp;</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <footer class="sticky-footer bg-white">
    <div class="container my-auto">
      <div class="copyright text-center my-auto">
        <span>Copyright &copy; <?= date('Y') ?></span>
      </div>
    </div>
  </footer>

    <script>
      var resizefunc = [];
    </script>

    <!-- jQuery  -->
    <script src="<?= base_url('assets/js/jquery.min.js')?>"></script>
    <script src="<?= base_url('assets/js/popper.min.js')?>"></script><!-- Popper for Bootstrap -->
    <script src="<?= base_url('assets/js/bootstrap.min.js')?>"></script>
    <script src="<?= base_url('assets/js/detect.js')?>"></script>
    <script src="<?= base_url('assets/js/fastclick.js')?>"></script>
    <script src="<?= base_url('assets/js/jquery.slimscroll.js')?>"></script>
    <script src="<?= base_url('assets/js/jquery.blockUI.js')?>"></script>
    <script src="<?= base_url('assets/js/waves.js')?>"></script>
    <script src="<?= base_url('assets/js/wow.min.js')?>"></script>
    <script src="<?= base_url('assets/js/jquery.nicescroll.js')?>"></script>
    <script src="<?= base_url('assets/js/jquery.scrollTo.min.js')?>"></script>

    <script src="<?= base_url('plugins/custombox/js/custombox.min.js?v=') . time()?>"></script>
    <script src="<?= base_url('plugins/custombox/js/custombox.legacy.min.js?v=') . time()?>"></script>

    <script src="<?= base_url('assets/js/jquery.core.js')?>"></script>
    <script src="<?= base_url('assets/js/jquery.app.js?v=') . time() ?>"></script>

    <script src="<?= base_url('assets/js/main.js?v=') . time() ?>"></script>

    <?php $version = time(); ?>

    <?php if (isset($js)) {
      foreach ($js as $k => $v) {
        echo '<script type="text/javascript" src="'. $v ."?v=". $version .'"></script>';
      }
    } ?>


</body>

</html>