<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1><?php echo $menu; ?></h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo base_url("Panel/URI/Dashboard")?>">Dashboard</a></li>
          <?php
            if (empty($this->uri->segment(5))) {
              echo '<li class="breadcrumb-item active">'.$menu.'</li>';
            }else{
              $pengguna = $this->Pengguna_M->getData($this->uri->segment(5));
              $s_pengguna = $pengguna->row_array();
              echo '<li class="breadcrumb-item"><a href="'.base_url("Panel/URI/".$this->uri->segment(3)).'">'.$menu.'</a></li>';
              echo '<li class="breadcrumb-item active">'.$s_pengguna['nama_pengguna'].'</li>';
            }
          ?>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<?php
  if (empty($this->uri->segment(5))) {
    include 'pengguna.add.php'; 
  }else{
    if ($pengguna->num_rows() > 0) {
      include 'pengguna.edit.php'; 
    }else{
      redirect(base_url("Panel/URI/".$this->uri->segment(3)));
    }
  }
?>