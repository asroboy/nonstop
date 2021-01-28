<?php $konf = $this->Model_main->Konf(); ?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login! - <?php echo $konf['nama_company_id'] ?></title>

  <meta name="author" content="<?php echo $konf['nama_company_id'] ?>">
  <meta name="title" content="<?php echo $konf['title_web'] ?>">
  <meta name="description" content="by : <?php echo $konf['nama_company_id'] ?>">
  <meta name="abstract" content="by : <?php echo $konf['nama_company_id'] ?>" />

  <link rel="icon" href="<?php echo base_url().$konf['logo_title'] ?>" type="image/x-icon" />
  <link rel="stylesheet" href="<?php echo base_url()?>assets/backend/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/backend/dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style type="text/css">
    .login-page, .register-page {
      align-items: normal;
    }
  </style>
</head>
<body class="hold-transition login-page" style="background: #f5f5f5">
<div class="login-box" style="margin-top: 5%;">
  <div class="login-logo">
    <div class="pull-left">
    <img src="<?php echo base_url().$konf['logo_web'] ?>" style="width: 150px;">
    </div>
  </div>
  <!-- /.login-logo -->
  <style type="text/css">
    .radius{
      border-radius: 10px;
    }
  </style>
  <div class="card radius">
    <div class="card-body login-card-body radius">
      <form id="loginform" action="<?php echo base_url("common/Auth/auth")?>" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="username" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Masuk</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <?php echo $this->session->flashdata('result_login'); ?>
</div>
<script src="<?php echo base_url()?>assets/backend/plugins/jquery/jquery.min.js"></script>
<script src="<?php echo base_url()?>assets/backend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url()?>assets/backend/dist/js/adminlte.min.js"></script>

</body>
</html>
