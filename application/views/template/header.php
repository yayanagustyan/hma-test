<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <meta name="description" content="Test HMA">
	  <meta name="author" content="Yayan Agustyan">

		<?php $logo = $this->session->userdata('logo'); ?>

  	<link rel="icon" type="image/png" href="<?= base_url('api/upload/logo/') . $logo; ?>">

	  <title>HMA - <?= $title ?></title>

	  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/js/select2/css/select2.css?v='). time() ?>">
    <link href="<?= base_url('plugins/custombox/css/custombox.min.css?v=') . time() ?>" rel="stylesheet">

    <link href="<?= base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/css/icons.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/css/style.css?v=') . time()?>" rel="stylesheet" type="text/css" />
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

  <body class="fixed-left">

    <div id="wrapper">

      <div class="topbar">

        <div class="topbar-left">
          <div class="text-center">
            <a href="<?= base_url() ?>" class="logo">
              <i class="icon-c-logo"> <img class="rounded-circle" src="<?= base_url('api/upload/logo/') . $logo; ?>" height="42"/> </i>
              <span><img class="rounded-circle" src="<?= base_url('api/upload/logo/') . $logo; ?>" height="40"/></span>
            </a>
          </div>
        </div>

        <nav class="navbar-custom">
        	<ul class="list-inline float-right mb-0">

        		<li class="list-inline-item dropdown notification-list">
        			<a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
	        			aria-haspopup="false" aria-expanded="false">
	        			<img src="<?= base_url('assets/images/users/avatar-1.jpg') ?>" alt="user" class="rounded-circle">
	        		</a>

	        		<div class="dropdown-menu dropdown-menu-right profile-dropdown " aria-labelledby="Preview">
	        			<div class="dropdown-item noti-title">
	        				<h5 class="text-overflow"><small>Web Admin</small> </h5>
	        			</div>
	        		</div>
	        	</li>
	        </ul>

	        <ul class="list-inline menu-left mb-0">
	        	<li class="float-left">
	        		<button class="button-menu-mobile open-left waves-light waves-effect">
	        			<i class="dripicons-menu"></i>
	        		</button>
	        	</li>
	        </ul>
	      </nav>

	    </div>

	    <div class="left side-menu" >
	    	<div class="sidebar-inner slimscrollleft">
	    		<div id="sidebar-menu">
	    			<ul>
	    				<li class="text-muted menu-title">Menu Utama</li>
	    				<?php foreach ($this->session->userdata('menus') as $k => $v) { ?>
		    				<li>
		    					<a href="<?= base_url($v->mn_link) ?>" class="waves-effect"><i class="<?= $v->mn_icon ?>"></i> <span> <?= $v->mn_name ?> </span></a>
		    				</li>
	    				<?php } ?>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>

