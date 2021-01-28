<!DOCTYPE html>
<?php $login = $this->Model_main->admn_login(); ?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $login['nama_pengguna'].' - '.$konf['nama_company_id'] ?></title>
  <meta name="author" content="<?php echo $konf['nama_company_id'] ?>">
  <meta name="title" content="<?php echo $konf['title_web'] ?>">
  <meta name="description" content="by : <?php echo $konf['nama_company_id'] ?>">
  <meta name="abstract" content="by : <?php echo $konf['nama_company_id'] ?>" />

  <link rel="icon" href="<?php echo base_url().$konf['logo_title'] ?>" type="image/x-icon" />
  <link rel="stylesheet" href="<?php echo base_url()?>assets/backend/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/backend/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/backend/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style type="text/css">
    /*label:not(.form-check-label):not(.custom-file-label) {font-weight: 500;}*/
    .badge {font-size: 85%;}
    .ke_form{width: 200px; float: left; margin-right: 5px; margin-bottom: 10px;}
  </style>
  <script src="<?php echo base_url()?>assets/backend/plugins/jquery/jquery.min.js"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Right navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
        <?php echo $login['nama_pengguna']?>&nbsp;&nbsp;
        <img data-src="<?php echo $this->Model_main->exists($login['foto'], 'user.png')?>" class="img-circle elevation-2 lazyload" alt="<?php echo $login['nama_pengguna']?>" style="width: 30px;">
          <!-- <i class="far fa-bell"></i> -->
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
          <a href="<?php echo base_url()?>Panel/URI/profile" class="dropdown-item">
            <i class="fas fa-user mr-2"></i> Profile
          </a>
          <a href="<?php echo base_url()?>Panel/URI/logout" class="dropdown-item">
            <i class="fas fa-sign-out-alt mr-2"></i> Logout!
          </a>
        </div>
      </li>
    </ul>
  </nav>
  <?php include 'header.php';?>
  <div class="content-wrapper">
    <?php 
      if ($this->uri->segment(3) == 'permiss'){ 
        include 'permis.php'; 
      } elseif ($this->uri->segment(3) == 'profile'){ 
        include 'profile/profile.php'; 
      } else { 
        $s_door = $this->Door_M->getData($this->uri->segment(3), 'url')->row_array();
        if ($this->uri->segment(3) == $s_door['url']){ 
          include $s_door['path'];
        } else {
          include 'dashboard/dashboard2.php';
        }
      } 
    ?>
  </div>
</div>
<script src="<?php echo base_url()?>assets/lazysizes.min.js"></script>
<script src="<?php echo base_url()?>assets/backend/plugins/jquery-ui/jquery-ui.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="<?php echo base_url()?>assets/backend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url()?>assets/backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="<?php echo base_url()?>assets/backend/dist/js/adminlte.min.js"></script>
<script src="<?php echo base_url()?>assets/backend/dist/js/pages/dashboard.js"></script>
<script src="<?php echo base_url()?>assets/backend/dist/js/demo.js"></script>

<script src="<?php echo base_url()?>assets/backend/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url()?>assets/backend/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="<?php echo base_url()?>assets/backend/ckeditor/ckeditor.js"></script>
<script>
  $(function () {
    $(".example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });

  $('#btn-add').click(function(){
    $("#btn-add").hide();
    $("#btn-second").hide();
    $("#hide-add").show();
    $("#form-add").show();
  });

  $('#hide-add').click(function(){
    $("#btn-add").show();
    $("#btn-second").show();
    $("#hide-add").hide();
    $("#form-add").hide();
  });
      
</script>
<script type="text/javascript">
  $( ".row_position" ).sortable({
    delay: 150,
    stop: function() {
      var selectedData = new Array();
      $('.row_position>div>div').each(function() {
        selectedData.push($(this).attr("id"));
      });
      updateOrder(selectedData);
    }
  });
  function updateOrder(data) {
    $.ajax({
      url:"<?php echo base_url("common/".$this->uri->segment(3))."/position";?>",
      type:'post',
      data:{urutan:data},
      // success:function(){
      //     alert(data);
      // }
    })
  }
</script>
<script type="text/javascript">
  $('#frm_crud').on('keydown keyup change', function(){});
  $('#frm_crud').submit(function(e){
    $('#btn_crud').html('Tunggu ...').attr("disabled", "disabled");
    for (instance in CKEDITOR.instances) 
    {
        CKEDITOR.instances[instance].updateElement();
    }
    $.ajax({
      url  : $("#frm_crud").attr('action'),
      type : "POST",
      data:new FormData(this),
      processData:false,
      contentType:false,
      cache:false,
      success: function(data){
        $('#btn_crud').html('Simpan').removeAttr("disabled");
        var res = data.split("|||");
        alert(res[0]);
        if(res[1] == 'reload'){
          window.top.location = window.top.location;
        }else if(res[1] == 'none'){

        }else if(res[1] == 'back'){
          window.history.go(-1);
        }
        
      },
      error: function (){
        $('#btn_crud').html('Simpan').removeAttr("disabled");
        var res = data.split("|||");
        alert(res[0]);
        if(res[1] == 'reload'){
          window.top.location = window.top.location;
        }else if(res[1] == 'none'){

        }else if(res[1] == 'back'){
          window.history.go(-1);
        }
      }
    });
    return false;
  });
</script>
</body>
</html>
