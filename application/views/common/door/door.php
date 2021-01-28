<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1><?php echo $menu; ?></h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo base_url("Panel/URI/Dashboard")?>">Dashboard</a></li>
          <li class="breadcrumb-item active"><?php echo $menu; ?></li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<?php
  if ($this->uri->segment(4) == 'position') {
    include 'door.position.php';
  } elseif  (empty($this->uri->segment(5))) {
    include 'door.add.php'; 
  } else{
    $query = $this->Door_M->getData($this->uri->segment(5), 'id');
    $show = $query->row_array();
    if ($query->num_rows() > 0) {
      include 'door.edit.php'; 
    }else{
      redirect(base_url("Panel/URI/".$this->uri->segment(3)));
    }
  }
?>