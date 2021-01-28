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
              if (empty($this->input->get('user_id'))) {
                echo '<li class="breadcrumb-item active">'.$menu.'</li>';
              }else{
                echo '<li class="breadcrumb-item"><a href="'.base_url("Panel/URI/".$this->uri->segment(3)).'">'.$menu.'</a></li>';
                echo '<li class="breadcrumb-item active">'.$this->UserApp_M->getDetail($this->input->get('user_id'), 'id', 'fullname').'</li>';
              }
            }else{
              $query = $this->Address_M->getData($this->uri->segment(5));
              $show = $query->row_array();
              echo '<li class="breadcrumb-item"><a href="'.base_url("Panel/URI/".$this->uri->segment(3)).'">'.$menu.'</a></li>';
              echo '<li class="breadcrumb-item active">'.$show['fullname'].'</li>';
            }
          ?>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<?php
  if (empty($this->uri->segment(5))) {
    include 'user_app_address.add.php'; 
  }else{
    if ($query->num_rows() > 0) {
      include 'user_app_address.edit.php'; 
    }else{
      redirect(base_url("Panel/URI/".$this->uri->segment(3)));
    }
  }
?>