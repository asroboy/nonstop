<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1><?php echo $menu; ?></h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item active"><?php echo $menu; ?></li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<section class="content">
  <div class="row">
    <?php
      $no = 1;
      $show_nav = $this->db->query("SELECT * FROM akses WHERE id='".$this->session->ses_akses."'")->row_array();
      $url = array('visitor', 'door', 'User', 'Seller', 'AddressUser', 'AddressSeller', 'Laporan');
      $door = $this->Door_M->All($url)->result_array();
      foreach ($door as $s_door) {
        $code = $s_door['code'];
        if ($show_nav[$code] == "Y") {
        $no++;
        $bgnya = $no % 4;
        if($bgnya == 2){ $bg = 'bg-success'; }
        elseif($bgnya == 3){ $bg = 'bg-info'; }
        elseif($bgnya == 0){ $bg = 'bg-warning'; }
        elseif($bgnya == 1){ $bg = 'bg-danger'; }
    ?>
        <div class="col-lg-3 col-6">
          <div class="small-box <?php echo $bg; ?>">
            <div class="inner">
              <h3>
                <?php 
                  if ($s_door['tb'] == 'foto' OR $s_door['tb'] == 'video' OR $s_door['tb'] == 'portofolio') {
                    echo $this->Model_main->JumDataW('file', 'jenis_file',$s_door['tb']);
                  }else{
                    echo $this->Model_main->JumData($s_door['tb']);
                  }
                ?>
              </h3>

              <p><?php echo $s_door['nama']?></p>
            </div>
            <div class="icon">
              <i class="<?php echo $s_door['font']?>"></i>
            </div>
            <a href="<?php echo base_url("Panel/URI/").$s_door['url']?>" class="small-box-footer">
              Selengkapnya <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
    <?php } } ?>
  </div>
</section>