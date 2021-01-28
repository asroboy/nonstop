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
              $query = $this->Berita_M->getData($this->uri->segment(5));
              $show = $query->row_array();
              echo '<li class="breadcrumb-item"><a href="'.base_url("Panel/URI/".$this->uri->segment(3)).'">'.$menu.'</a></li>';
              echo '<li class="breadcrumb-item active">'.$show['judul'].'</li>';
            }
          ?>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<?php
  if (empty($this->uri->segment(5))) {
    include 'berita.add.php'; 
  }else{
    if ($query->num_rows() > 0) {
      include 'berita.edit.php'; 
    }else{
      redirect(base_url("Panel/URI/".$this->uri->segment(3)));
    }
  }
?>