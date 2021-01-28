<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  $nama = "Muhamad Ade Rohayat";
  $desc_menu = "Setting";
  $query_konf = $this->db->query("SELECT * FROM konfigurasi")->row_array();
  $nama_web = $query_konf['nama_company_id'];
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Administrator System by wansolution.co.id</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/dist/css/skins/_all-skins.min.css">

  <!-- jQuery 3 -->
  <script src="<?php echo base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?php echo base_url()?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- SlimScroll -->
  <script src="<?php echo base_url()?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="<?php echo base_url()?>assets/bower_components/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url()?>assets/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?php echo base_url()?>assets/dist/js/demo.js"></script>
  <script src="<?php echo base_url()?>assets/bower_components/ckeditor/ckeditor.js"></script>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<?php 
    $this->load->view('common/body');
?>
<div class="wrapper">
  <?php 
      $this->load->view('common/header');
  ?>
  <div class="content-wrapper">
    <?php echo $this->session->flashdata('result_user'); ?>    
    <section class="content-header">
      <h1>
        <?php echo $desc_menu ?>
        <small><?php echo $nama_web ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-user-o"></i> <?php echo $desc_menu ?></li>
        <li class="active"> <?php echo $this->session->ses_nama ?></li>
      </ol>
    </section>
    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo $desc_menu ?></h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"title="Collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <?php 
            $data = $this->db->query("SELECT * FROM pengguna WHERE id='".$this->session->ses_id."'")->result(); 
              foreach ($data as $show) {
          ?>
            <div style="float: left;">
              <img src="<?php echo base_url('');?><?php echo $show->foto;?>" style="width: 350px; max-width: 100%; margin-bottom: 20px;">
              <form role="form" class="edit_gambar_konfigurasi"  enctype="multipart/form-data" action="<?php echo base_url("common/Konfigurasi/Set_akun_img")?>" method="post">
                <div class="form-group">
                  <input type="hidden" name=" id" value="<?php echo $this->session->ses_id;?>">
                  <input type="file" accept="image/*" name="file">
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary simpan">Simpan</button>
                  <button type="button" class="btn btn-primary simpanhide" style="display: none">Tunggu...</button>
                </div>
              </form>
              </div>
              <div class="table-responsive">
                <table style="margin-left: 10px; float: left;">
                  <tr>
                    <td>Akun ID</td>
                    <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                    <td><?php echo $show->id;?></td>
                  </tr>
                  <tr>
                    <td>Nama</td>
                    <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                    <td><?php echo $show->nama_pengguna;?></td>
                  </tr>
                  <tr>
                    <td>Username</td>
                    <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                    <td><?php echo $show->username;?></td>
                  </tr>                 
                  <?php if ($this->session->ses_id == $show->id) { ?>
                  <tr>
                    <form id="daftarform" method="post" action="<?php echo base_url('common/User_acounts/Edit_user_password')?>">
                      <style type="text/css">
                        input{background: white;}
                        input:valid{border-color: #d7e8d9; color:#009789;}
                        input:valid:focus{ background: #d7e8d9; color:#037d72;}
                        input:invalid{ background: #fff; border-color:#f9f2f4;}
                        input:invalid:focus{ background: #f9f2f4; color:#d12573;}
                      </style>
                      <td>Password</td>
                      <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                      <td>
                        <input type="hidden"  autocomplete="off" name="id" class="form-control" required="" value="<?php echo $show->id;?>">
                        <input type="password"  autocomplete="off" name="password" class="form-control" required="" placeholder="Password">
                      </td>
                      <td>
                        <button type="submit" class="btn btn-primary" style="outline: none; margin-left: 10px;" onclick="return confirm('Apakah data anda sudah benar?')"><i class="fa fa-send"></i></button>
                      </td>
                    </form>
                    <script>
                      $('#daftarform').on('keydown keyup change', function(){
                      });
                    </script>
                  </tr>
                  <tr>
                    <td colspan="3"><i>Ketikan password baru jika ingin me-reset password.</i></td>
                  </tr>
                  <?php } ?>
                </table>
              </div>
            <?php } ?>
            </br>
        </div>
        <!-- <div class="box-footer">
          Footer
        </div> -->
      </div>
    </section>
  </div>
</div>
      <script>
        $(document).ready(function(){
  
            $('.simpan').click(function(){
        $(".simpan").hide();
        $(".simpanhide").show().attr("disabled", "disabled");
      });
        }); 
      </script>
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>
</body>
</html>
